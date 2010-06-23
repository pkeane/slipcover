<?php

class CouchDB_Document {

    public $id; 
    protected $data = null;
    protected $db;
    protected $type;
    //document subclasses allow convenience functionality
    public static $types_map = array(
        'item' => 'CouchDB_Document_Item',
    );


    public function __construct($db,$type=null)
    {  
        $this->db = $db;
        $this->type = $type;
    }

    public function __get($key)
    {
        if ( isset($this->data->$key) ) {
            return $this->data->$key;
        }
    }

    public function __set($key,$value)
    {
        if (!$this->data) {
            $this->data = new StdClass;
        }
        $this->data->$key = $value;
    }

    protected function setData($data) 
    {
        $this->data = $data;
    }

    // gets proper subclass 
    public static function getDocById($db,$id)
    {
        $data = $db->get_item($id)->getBody(true);
        if (isset($data->_id)) {
            if (isset($data->type) && isset(self::$types_map[$data->type])) {
                $class = self::$types_map[$data->type];
                $doc = new $class($db);
            } else {
                $doc = new CouchDB_Document($db);
            }
            $doc->setData($data);
            return $doc;
        } else {
            return false;
        }
    }

    public function get($id,$validate = false) 
    {
        $this->data = $this->db->get_item($id)->getBody(true);
        //check if query found a doc
        if (isset($this->data->_id)) {
            //todo: check type??
            //if ($validate) { }
            return $this;
        } else {
            return false;
        }
    }

    public function delete() 
    {
        $msg = $this->db->send('/'.$this->data->_id.'?rev='.$this->data->_rev,'delete')->getBody();
        return $msg;
    }

    public function save()
    {
        $json_data = CouchDB::encode_json($this->data);
        return $this->db->send('/','post',$json_data);
    }

    public function update()
    {
        $json_data = CouchDB::encode_json($this->data);
        return $this->db->send($this->_id,'put',$json_data);
    }

    public function attach($bits,$filename,$mime)
    {
        //get host & port from config!!!!!!
        $url = 'http://localhost:5984/'.$this->db->db.'/'.$this->_id.'/'.$filename.'?rev='.$this->_rev;
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_HTTPHEADER => array (
                "Content-Type: ".$mime,
            ),
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $bits
        );
        curl_setopt_array($ch, $options);
        $process = curl_exec($ch);
        curl_close($ch);
        return $process;
    }
}




