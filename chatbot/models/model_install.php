<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_install extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }
  //

  function makeTables()
  {
    $sql_path = BASEPATH . 'assets/misc/';
    $sql_path = str_replace('/core', '', $sql_path);
    $raw_queries = read_file($sql_path . 'new.sql');
    $queryArray = explode(";", $raw_queries);
    $errorCount = 0;
    foreach ($queryArray as $sql)
    {
      $sql = trim($sql);
      if ($sql == '') continue;
      $sql .= ';';
      //write_file($sql_path . 'sql.txt', $sql . PHP_EOL . '-----------------------------' . PHP_EOL, 'a');
      $result = $this->db->query($sql);
      if (!$result)
      {
        $errors = $this->session->userdata('errors');
        if(!$errors || empty($errors) || $errors === null) $errors = array();
        $errors[] = 'There was an error with the following SQL query:<br>' . PHP_EOL . "SQL = $sql<br>" . PHP_EOL;
        $this->session->set_userdata('errors', $errors);
        $errorCount++;
      }
    }
    return ($errorCount == 0) ? true : false;
  }

  function addAdmin()
  {
    $post = $this->session->userdata('post');
    $IP = $_SERVER['REMOTE_ADDR'];
    $data = array(
      'id'         => null,
      'user_name'  => $post['adm_dbu'],
      'password'   => sha1($post['adm_dbp']),
      'last_ip'    => $IP,
      'last_login' => null
    );
    $result = $this->db->insert('admins', $data);
    if (!$result)
    {
      $errors = $this->session->userdata('errors');
      if(!$errors || empty($errors) || $errors === null) $errors = array();
      $errors[] = 'There was an error with adding info to the admin table!';
      $this->session->set_userdata('errors', $errors);
    }
    return $result;
  }

  function addBot()
  {
    $post = $this->session->userdata('post');


  }
}

