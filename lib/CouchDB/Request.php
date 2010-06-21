<?php

//taken from http://wiki.apache.org/couchdb/Getting_started_with_PHP with minor changes

class CouchDB_Request {

    static $VALID_HTTP_METHODS = array('DELETE', 'GET', 'POST', 'PUT');

    private $method = 'GET';
    private $url = '';
    private $data = NULL;
    private $sock = NULL;
    private $username;
    private $password;

    function __construct($host, $port = 5984, $url, $method = 'GET', $data = NULL, $username = null, $password = null) {
        $method = strtoupper($method);
        $this->host = $host;
        $this->port = $port;
        $this->url = $url;
        $this->method = $method;
        $this->data = $data;
        $this->username = $username;
        $this->password = $password;

        if(!in_array($this->method, self::$VALID_HTTP_METHODS)) {
            throw new CouchDB_Exception('Invalid HTTP method: '.$this->method);
        }
    }

    function getRequest() {
        $req = "{$this->method} {$this->url} HTTP/1.0\r\nHost: {$this->host}\r\n";

        if($this->username || $this->password)
            $req .= 'Authorization: Basic '.base64_encode($this->username.':'.$this->password)."\r\n";

        if($this->data) {
            $req .= 'Content-Length: '.strlen($this->data)."\r\n";
            $req .= 'Content-Type: application/json'."\r\n\r\n";
            $req .= $this->data."\r\n";
        } else {
            $req .= "\r\n";
        }

        return $req;
    }

    private function connect() {
        $this->sock = @fsockopen($this->host, $this->port, $err_num, $err_string);
        if(!$this->sock) {
            throw new CouchDB_Exception('Could not open connection to '.$this->host.':'.$this->port.' ('.$err_string.')');
        }
    }

    private function disconnect() {
        fclose($this->sock);
        $this->sock = NULL;
    }

    private function execute() {
        fwrite($this->sock, $this->getRequest());
        $response = '';
        while(!feof($this->sock)) {
            $response .= fgets($this->sock);
        }
        $this->response = new CouchDB_Response($response);
        return $this->response;
    }

    function send() {
        $this->connect();
        $this->execute();
        $this->disconnect();
        return $this->response;
    }

    function getResponse() {
        return $this->response;
    }
}


