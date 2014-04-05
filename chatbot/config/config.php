<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$base_url = "http" . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "s" : "") . "://";
$base_url .= isset($_SERVER['HTTP_HOST']) ?  $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
$bu = str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$base_url .= "$bu/";

$config = array();
$config['base_url'] = $base_url;
$config['index_page'] = '';
$config['uri_protocol'] = 'AUTO';
$config['url_suffix'] = '';
$config['language'] = 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['log_threshold'] = 1;
$config['log_path'] = BASEPATH . 'logs/';
$config['log_date_format'] = 'm-d-Y H:i:s';
$config['cache_path'] = '';
$config['encryption_key'] = 'dce53f20f27d417ff814dbde9ac722091398315a';
$config['sess_cookie_name'] = 'pgo_sessions';
$config['sess_expiration'] = 604800;
$config['sess_expire_on_close'] = FALSE;
$config['sess_encrypt_cookie'] = FALSE;
$config['sess_use_database'] = TRUE;
$config['sess_table_name'] = 'pgo_sessions';
$config['sess_match_ip'] = FALSE;
$config['sess_match_useragent'] = TRUE;
$config['sess_time_to_update'] = 300;
$config['cookie_prefix'] = '';
$config['cookie_domain'] = '';
$config['cookie_path'] = '/';
$config['cookie_secure'] = true;
$config['global_xss_filtering'] = true;
$config['csrf_protection'] = true;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['compress_output'] = true;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';
$config['use_membership'] = false;
$config['require_membership'] = FALSE;
$config['is_installed'] = false;
