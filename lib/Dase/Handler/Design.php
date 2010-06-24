<?php

class Dase_Handler_Design extends Dase_Handler
{

    public $resource_map = array(
        '/' => 'design_doc_form',
        '{title}' => 'design_doc_form',
    );

    protected function setup($r)
    {
    }

    public function getDesignDocForm($r) 
    {
        $t = new Dase_Template($r);
        $set = new CouchDB_DocumentSet($this->db);
        $t->assign('design_docs',$set->listDesignDocs());

        if ($r->get('title')) {
            $dd = new CouchDB_Document($this->db);
            $dd->get('_design/'.$r->get('title'));
            $set = array();
            $set['title'] = $r->get('title');
            $set['views'] = '"views": '.CouchDB::encode_json($dd->views);
            $set['rev'] = $dd->_rev;
            $t->assign('ddoc',$set);
        }
        $r->renderResponse($t->fetch('design_doc_form.tpl'));
    }

    public function postToDesignDocForm($r) 
    {
        $doc = new CouchDB_Document($this->db);
        $doc->_id = '_design/'.$r->get('title');

        if ($r->get('rev')) {
            $doc->_rev = $r->get('rev');
        }

        $views = '{'.trim($r->get('views')).'}';
        $views = html_entity_decode($views,ENT_COMPAT,'UTF-8');
        $php = CouchDB::decode_json($views);
        $doc->views = $php->views;
        $doc->save();

        $r->renderRedirect('home');
    }
}

