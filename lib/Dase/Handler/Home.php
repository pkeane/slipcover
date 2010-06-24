<?php

class Dase_Handler_Home extends Dase_Handler
{

	public $resource_map = array(
		'/' => 'home',
	);

	protected function setup($r)
	{
	}

	public function getHome($r) 
	{
		$t = new Dase_Template($r);
		$set = new CouchDB_DocumentSet($this->db);
		$t->assign('docs',$set->listByTitle());
		$r->renderResponse($t->fetch('home.tpl'));
	}

	public function postToHome($r) 
	{
		$doc = new CouchDB_Document($this->db);
		$doc->title = $r->get('title');
		$doc->type = $r->get('type');
		$doc->description = $r->get('description');
		$doc->save();
		$r->renderRedirect('home');
	}
}

