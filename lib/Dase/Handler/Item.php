<?php

class Dase_Handler_Item extends Dase_Handler
{
	protected $couch;

	public $resource_map = array(
		'{id}' => 'item',
		'{id}/edit' => 'edit_form',
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

