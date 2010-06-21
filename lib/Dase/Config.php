<?php

class Dase_Config_Exception extends Exception {}

class Dase_Config {

	private $conf = array();

	public function __construct($base_dir)
	{
		$this->base_dir = $base_dir;
		$this->conf['app'] = array();
		$this->conf['auth'] = array();
		$this->conf['db'] = array();
		$this->conf['request_handler'] = array();
	}

	public function getBasePath()
	{
		return $this->base_dir;
	}

	public function get($key)
	{
		if (isset($this->conf[$key])) {
			return $this->conf[$key];
		} else {
			return false;
		}
	}

	public function getAuth($setting='') 
	{
		if ($setting) {
			if (isset($this->conf['auth'][$setting])) {
				return $this->conf['auth'][$setting];
			}
		} else {
			return $this->conf['auth'];
		}
	}

	public function getAppSettings($setting='') 
	{
		if ($setting) {
			if (isset($this->conf['app'][$setting])) {
				return $this->conf['app'][$setting];
			}
		} else {
			return $this->conf['app'];
		}
	}

	public function getDb($setting='') 
	{
		if ($setting) {
			if (isset($this->conf['db'][$setting])) {
				return $this->conf['db'][$setting];
			}
		} else {
			return $this->conf['db'];
		}
	}

	public function getAll()
	{
		return $this->conf;
	}

	public function set($key,$value)
	{
		$this->conf[$key] = $value;
	}

	public function getSecret($key)
	{
		return md5($this->getAuth('token').$key);
	}

	public function getServicePassword($serviceuser)
	{
		return md5($this->getAuth('service_token').$serviceuser);
	}

	public function load($conf_file)
	{
		if ('/' != substr($conf_file,0,1)) {
			if (!$this->base_dir) {
				throw new Dase_Cache_Exception('no base_dir defined');
			}
			$conf_file = $this->base_dir.'/'.$conf_file;
		}
		if (file_exists($conf_file)) {
			$conf = $this->conf;
			include($conf_file);
			$this->conf = $conf;
		}
	}
}
