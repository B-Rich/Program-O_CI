<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';

$db = array();
$db['default'] = array();
$db['default']['hostname'] = 'mysql:host=localhost';
$db['default']['username'] = 'pgo_user';
$db['default']['password'] = 'pgo_pass';
$db['default']['database'] = 'programo';
$db['default']['dbdriver'] = 'pdo';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;
