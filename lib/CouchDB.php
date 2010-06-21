<?php

//taken from http://wiki.apache.org/couchdb/Getting_started_with_PHP with minor changes

class CouchDB {

    private $username;
    private $password;

	function __construct($config) 
	{
        $this->db = $config->getDb('name');
        $this->host = $config->getDb('host');
        $this->port = $config->getDb('port');
        $this->username = $config->getDb('user');
        $this->password = $config->getDb('pass');
    }

	static function decode_json($str) 
	{
        return json_decode($str);
    }

	static function encode_json($data) 
	{
        return json_encode($data);
    }

	function send($url, $method = 'get', $data = NULL) 
	{
        $url = '/'.$this->db.(substr($url, 0, 1) == '/' ? $url : '/'.$url);
        $request = new CouchDB_Request($this->host, $this->port, $url, $method, $data, $this->username, $this->password);
        return $request->send();
    }

	function get_all_docs() 
	{
        return $this->send('/_all_docs');
    }

	function get_item($id) 
	{
        return $this->send('/'.$id);
    }
}
