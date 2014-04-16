<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'PGODB';

$db = array();
$db['PGODB'] = array();
$db['PGODB']['hostname'] = 'mysql:host=localhost';
$db['PGODB']['username'] = 'pgo_user';
$db['PGODB']['password'] = 'pgo_pass';
$db['PGODB']['database'] = 'programo';
$db['PGODB']['dbdriver'] = 'pdo';
$db['PGODB']['dbprefix'] = '';
$db['PGODB']['pconnect'] = TRUE;
$db['PGODB']['db_debug'] = TRUE;
$db['PGODB']['cache_on'] = FALSE;
$db['PGODB']['cachedir'] = '';
$db['PGODB']['char_set'] = 'utf8';
$db['PGODB']['dbcollat'] = 'utf8_general_ci';
$db['PGODB']['swap_pre'] = '';
$db['PGODB']['autoinit'] = TRUE;
$db['PGODB']['stricton'] = FALSE;
