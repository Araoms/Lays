<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder  = TRUE;
define('Lays_CHARSET', 'UTF-8');
define('Lays_VERSION', '4.0');
define('Lays_RELEASE', '20190805');
$db['default'] =array (
  'dsn' => '',
  'hostname' => 'localhost',
  'username' => 'root',
  'password' => 'root',
  'database' => 'lays',
  'dbdriver' => 'mysqli',
  'dbprefix' => 'lays_',
  'pconnect' => false,
  'db_debug' => false,
  'cache_on' => true,
  'cachedir' => '',
  'char_set' => 'utf8',
  'dbcollat' => 'utf8_general_ci',
  'swap_pre' => '',
  'encrypt' => false,
  'compress' => false,
  'stricton' => false,
  'failover' => 
  array (
  ),
  'save_queries' => true,
);
?>