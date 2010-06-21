<?php

ini_set('include_path',BASE_PATH.'/lib');

function __autoload($class_name) {
	$class_name = str_replace('_','/',$class_name).'.php';
	include ($class_name);
}

//set up configuration object
$config = new Dase_Config(BASE_PATH);
$config->load('inc/config.php');
$config->load('inc/local_config.php');

define('SMARTY_CACHE_DIR',BASE_PATH.'/templates_c');

//timer
define('START_TIME',Dase_Util::getTime());


