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
        $map = "function(doc) { emit(doc.title,doc.type); }";
        $view = '{"map":"'.$map.'"}';
        $view_result = $this->db->send('/_temp_view', 'post', $view);
        $docs = array();
        $data = $view_result->getBody(true);
        if (isset($data->rows)) {
            foreach ($data->rows as $doc) {
                if (!isset($docs[$doc->value])) {
                    $docs[$doc->value] = array();
                }
                $docs[$doc->value][$doc->id] = $doc->key;
            }
            ksort($docs);
        }
        return $docs;
    }
}




