<?php

class Dase_Exception extends Exception {}

class Dase
{
	public static function run($config)
	{
		$db = new CouchDB($config);
		$r = new Dase_Http_Request();
		$r->init($db,$config);
		$r->getHandlerObject()->dispatch($r);
	}
}

