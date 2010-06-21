<?php

$conf['db']['name'] = 'dase';
$conf['db']['host'] = 'localhost';
$conf['db']['port'] = '5984';
$conf['db']['user'] = 'username';
$conf['db']['pass'] = 'password';

//force https
$conf['app']['force_https'] = false;

$conf['app']['user_class'] = 'Dase_User';

//handler that gets invoked when APP_ROOT is requested
//$conf['default_handler'] = 'collections';
$conf['app']['default_handler'] = 'install';

//eid & admin password
//$conf['auth']['superuser']['<username>'] = '<password>';
//$conf['auth']['serviceuser']['prop'] = 'ok';
$conf['auth']['service_token'] = "changeme";

//used to create only-known-by-server security hash
$conf['auth']['token'] = 'changeme'.date('Ymd',time());

//POST/PUT/DELETE token:	
$conf['auth']['ppd_token'] = "changeme".date('Ymd',time());
