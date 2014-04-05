<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton, Liz Perreau and Brent Edds
 * ©2012-2013 The Program O Group
 * Written 11-27-2013
 * program_o.php
 * Controller for the main Program O interface
 ****************************************************/
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Program_o extends CI_Controller
{

  function __construct()
  {

    parent::__construct();

  }

  function index()
  {
    $data['pageTitle'] = 'Program O Interface';
      $is_installed = ($this->config->item('is_installed')) ? 'true' : 'false';
    $data['content'] = "This is the main interface in it's infancy. is_installed = $is_installed";
    $data['lowerScript'] = '';
    $this->load->view('view_main', $data);
  }

}

//



?>