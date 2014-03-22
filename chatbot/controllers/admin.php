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

class Admin extends CI_Controller
{

  function __construct()
  {

    parent::__construct();

  }

  function index()
  {
    $is_installed = (isset($this->config->config['is_installed'])) ? $this->config->config['is_installed'] : false;
    if (!$is_installed) redirect('install');
    $logged_in = $this->session->userdata('logged_in');
    $info['errMsg'] = $this->session->userdata('error');
    $this->session->set_userdata('error', null);
    switch ($logged_in)
    {
      case true:
      $info['bot_name'] = 'test';
      $content = $this->load->view('view_admin_main', $info, true);
      break;
      default:

      $content = $this->load->view('view_admin_login', $info, true);
    }
    $data['pageTitle'] = 'Program O Admin';
    $data['content'] = $content;
    $data['lowerScript'] = $this->load->view('view_admin_js', null, true);
    $this->load->view('view_main', $data);
  }

  function login()
  {
    $errors = array();
    $user_name = $this->input->post('user_name');
    $password  = $this->input->post('pw', true);
    $posted_pass = sha1($password);
    $this->load->model('model_admin');
    $stored_pass = $this->model_admin->get_admin_pass($user_name);
    if (!$stored_pass) $errors[] = 'Invalid username!';
    if($posted_pass !== $stored_pass) $errors[] = 'Invalid password!';
    if (count($errors) > 0)
    {
      $this->session->set_userdata('error', implode("<br>\n",$errors));
      redirect('admin');
    }
    $this->session->set_userdata('logged_in', true);
    redirect('admin');

  }

  function logout()
  {
    $this->session->set_userdata('logged_in', false);
    $this->session->set_userdata('error', 'You have successfully logged out.');
    redirect('admin');
  }

}

//



?>