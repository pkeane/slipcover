<?php

class CouchDB_DocumentSet 
{
	protected $db;

	public function __construct($db)
	{  
		$this->db = $db;
	}

	public function listByTitle($type_filter = '')
	{
		//add type filter !!!!!!!!!!!!!!
		$map = "function(doc) { emit(doc.title,null); }";
		$view = '{"map":"'.$map.'"}';
		$view_result = $this->db->send('/_temp_view', 'post', $view);
		$docs = array();
		foreach ($view_result->getBody(true)->rows as $doc) {
			$docs[$doc->id] = $doc->key;
		}
		return $docs;
	}
}




