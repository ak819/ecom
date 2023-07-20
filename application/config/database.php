<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',

   	
    'username' => 'root',
    'password' => '',
    'database' => 'biolife',

 	/*'username' => 'stylica_euser',
	'password' => 'kMQ;VKS^J3zv',
	'database' => 'stylica_ecommerce',*/
	
	
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => TRUE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => TRUE,
	'compress' => TRUE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

