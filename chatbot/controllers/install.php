<?php

  if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

  class Install extends CI_Controller
  {

    function __construct()
    {
      parent :: __construct();
      $this->load->library('parser');
      $this->load->library('session');
    }

    function index()
    {
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
      $data['content'] = $this->load->view('view_install_form', $formVars, true);
      $data['pageTitle'] = 'Program O Installation';
      $data['lowerScript'] = $this->load->view('view_install_js', null, true);
      $this->load->view('view_main', $data);
      return null;
    }
    function foo()
    {
      $post = $this->input->post(null,true);
      exit("POST = " . print_r($_POST, true));
    }

    function error()
    {
      $post = $this->input->post(NULL, TRUE);
      $errors = $this->session->userdata('errors');
      //$errors = $this->session->all_userdata();
      if (!$errors || empty($errors) || $errors === null) $errors = array('Unspecified error. Check the server logs.');
      /*
      header('Content-type: text/plain');
      die('errors: ' . print_r($errors, true));
      */
      $info['errors'] = $this->_extract_array($errors, 'errors');
      $info['errors'] = $errors;
      $info['leftWarning'] = (isset($errors['leftWarning'])) ? $errors['leftWarning'] : '';
      $info['rightWarning'] = (isset($errors['rightWarning'])) ? $errors['rightWarning'] : '';
      $data['content'] = $this->load->view('view_install_error', $info, true);
      $data['pageTitle'] = 'Program O Installation - ERROR!';
      $data['lowerScript'] = '';

      $this->load->view('view_main', $data);

    }

    function help()
    {
      $content = $this->load->view('view_install_help', null, true);
      $lowerScript = $this->load->view('view_install_help_js', null, true);
      $data = array(
        'content' => $content,
        'pageTitle' => 'Program O Installation Help',
        'lowerScript' => $lowerScript,
      );
      $this->load->view('view_main', $data);
    }

    function success()
    {
      $content = $this->load->view('view_install_success', null, true);
      //$lowerScript = $this->load->view('view_install_js', null, true);
      $data = array(
        'content' => $content,
        'pageTitle' => 'Program O Installation - SUCCESS!',
        'lowerScript' => '',
      );
      $this->load->view('view_main', $data);
    }

    function membership()
    {
      $content = $this->load->view('view_install_membership', null, true);
      //$lowerScript = $this->load->view('view_install_js', null, true);
      $data = array(
        'content' => $content,
        'pageTitle' => 'Program O Installation - Configure Membership',
        'lowerScript' => '',
      );
      $this->load->view('view_main', $data);
    }

    function saveData()
    {
      # First, let's get both general and DB config arrays
      include CONFPATH . 'pgo_config.php';   // load the variable $config from pgo_config.php
      include CONFPATH . 'database.php'; // load the variable $db

      # Next, get the form variables
      $post = $this->input->post(null, true);
      exit("<pre>\nPOST vars:\n" . print_r($post, true));
/*
      echo ('config = <pre>' . print_r($db, true) . "\n");
      echo '$db["PGODB"] = array(' . PHP_EOL;
      foreach ($db['PGODB'] as $key => $value)
      {
        echo "  '$key' => '";
        switch (true)
        {
          case (is_string($value)):
            echo "'$value',\n";
            break;
          case (is_bool($value)):
            echo ($value) ? "true,\n" : "false,\n";
            break;
          case (is_numeric($value)):
            echo $value . ",\n";
            break;
          case (empty($value)):
            echo "'',\n";
            break;
          default:
            echo "'$value',\n";
        }
      }
      echo ");\n</pre>\n";
*/
      exit();
      redirect('install/success');

    }

    private function _extract_array($array, $arrayName)
    {
      $out = "\$$arrayName = array();\n";
      foreach ($array as $key => $value)
      {
        $index = (is_numeric($key)) ? $key : "'$key'";
        $tmpOut = "\$$arrayName"."[$index]";
        switch (true)
        {
          case (is_numeric($value)):
          $tmpVal = $value . ';';
          break;
          case (true === $value):
          $tmpVal = 'TRUE;';
          break;
          case (false === $value):
          $tmpVal = 'FALSE;';
          break;
          case (is_array($value)):
          $tmpVal = false;
          $out .= $this->_extract_array($value, $tmpOut);
          break;
          default:
          $tmpVal = "'$value';";
        }
        $out .= ($tmpVal !== false) ? "$tmpOut = $tmpVal\n" : '';
      }
      $out = str_replace('$$', '$', $out);
      return $out;
    }

  }
  //

?>