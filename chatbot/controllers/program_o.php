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
    if(false === $this->config->item('is_installed'))
    {
      header('Location: ./install');
    }
    else{
      $is_installed = ($this->config->item('is_installed')) ? 'true' : 'false';
      $data['pageTitle'] = 'Program O Interface';
      $data['content'] = "This is the main interface in it's infancy. is_installed = $is_installed";
      $data['lowerScript'] = '';
      $this->load->view('view_main', $data);
    }
  }

}

    function install()
    {
      $this->load->helper('form');
      //if (!empty($_POST)) exit('<pre>' . print_r($_POST, true));
      if ($this->input->post('action') !== false)
      {
        $action = $this->input->post('action');
        return $this->$action();
      }
      $post = $this->session->userdata('post');
      $this->session->set_userdata('post', null);
      $errMsg = $this->session->userdata('errors');
      if($errMsg !== false) $data['errMsg'] = $errMsg;
      $this->session->set_userdata('errors', null);
      $attributes = array('name' => 'installForm', 'id' => 'installForm',);
      $form = form_open('install', $attributes);
      $formVars['formOpenTag'] = $form;
      $formVars['post'] = $post;
      $formVars['domain'] = $_SERVER['HTTP_HOST'];
      $formVars['path'] = str_replace('/chatbot', '', APPPATH);
      #$data['content'] = $this->load->view('view_install_form', $formVars, true);
      $data['content'] = $this->load->view('view_install_form_no_table', $formVars, true);
      $data['pageTitle'] = 'Program O Installation';
      $data['lowerScript'] = $this->load->view('view_install_js', null, true);
      $this->load->view('view_main', $data);
    }

    function help()
    {
       $this->load->view('view_install_help');
    }

