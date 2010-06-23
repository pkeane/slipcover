<?php

class Dase_Handler_Item extends Dase_Handler
{
	protected $couch;

	public $resource_map = array(
		'{id}' => 'item',
		'{id}/edit' => 'edit_form',
		'{id}/attach' => 'attach_form',
	);

	protected function setup($r)
	{
	}

	public function getItem($r) 
	{
		$t = new Dase_Template($r);
		$item = new CouchDB_Document_Item($this->db);

		if (!$item->get($r->get('id'))) {
			$r->renderRedirect('home');
		}
		$t->assign('item',$item);
		$r->renderResponse($t->fetch('item.tpl'));
	}

	public function getAttachForm($r) 
	{
		$t = new Dase_Template($r);
		$item = new CouchDB_Document_Item($this->db);

		if (!$item->get($r->get('id'))) {
			$r->renderRedirect('home');
		}
		$t->assign('item',$item);
		$r->renderResponse($t->fetch('item_attach.tpl'));
	}

	public function postToAttachForm($r) 
	{
        if (is_uploaded_file($_FILES['upload']['tmp_name'])) {
            $bits = file_get_contents($_FILES['upload']['tmp_name']);
            $filename = $_FILES['upload']['name'];
            $mime = $_FILES['upload']['type'];
            $item = new CouchDB_Document_Item($this->db);
            if (!$item->get($r->get('id'))) {
                $r->renderRedirect('home');
            }
            $item->attach($bits,$filename,$mime);
        }
        $r->renderRedirect('item/'.$r->get('id'));
	}

	public function getEditForm($r) 
	{
		$t = new Dase_Template($r);
		$item = new CouchDB_Document_Item($this->db);

		if (!$item->get($r->get('id'))) {
			$r->renderRedirect('home');
		}
		$t->assign('item',$item);
		$r->renderResponse($t->fetch('item_edit.tpl'));
	}

	public function postToEditForm($r) 
	{
		$item = new CouchDB_Document_Item($this->db);
		if (!$item->get($r->get('id'))) {
			$r->renderRedirect('home');
		}
		$item->description = $r->get('description');
		$item->update();
		$r->renderRedirect('item/'.$r->get('id'));
	}

	public function deleteItem($r) 
	{
		$item = new CouchDB_Document_Item($this->db);
		$item->get($r->get('id'));
		$msg = $item->delete();
		$r->renderOk($msg);
	}
}

