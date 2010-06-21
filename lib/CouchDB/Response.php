<?php

//taken from http://wiki.apache.org/couchdb/Getting_started_with_PHP with minor changes

class CouchDB_Response {

    private $raw_response = '';
    private $headers = '';
    private $body = '';

    function __construct($response = '') {
        $this->raw_response = $response;
        list($this->headers, $this->body) = explode("\r\n\r\n", $response);
    }

    function getRawResponse() {
        return $this->raw_response;
    }

    function getHeaders() {
        return $this->headers;
    }

    function getBody($decode_json = false) {
        return $decode_json ? CouchDB::decode_json($this->body) : $this->body;
    }
}




