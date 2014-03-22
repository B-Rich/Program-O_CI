<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton
 * ©2012-2013 The Program O Group
 * Written 11-29-2013
 * model_admin.php
 * Contains the DB functions for the Program O admin pages.
 ****************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_admin extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  function get_admin_pass($user_name)
  {
    //$user_name = $this->session->userdata('user_name');
    $this->db->select('password')->from('admins')->where('user_name', $user_name);
    $query = $this->db->get();
    if ($query->num_rows() == 0) return false;
    $result = $query->row();
    return $result->password;
  }
}


?>