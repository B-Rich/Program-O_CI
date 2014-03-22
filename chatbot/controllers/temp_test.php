<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton
 * ©2012-2013 The Program O Group
 * Written 11-29-2013
 * temp_test.php
 * Tests various functions
 ****************************************************/

  if (!defined('BASEPATH')) exit('No direct script access allowed');

  class Temp_test extends CI_Controller
  {

    function __construct()
    {

      parent::__construct();

    }

    function index()
    {
      $content = form_open('temp_test/post') . PHP_EOL;
      $content .= 'Just type something in: <input name="foo">' . PHP_EOL;
      $content .= '<input type="submit" value="submit">' . PHP_EOL;

      $data['content'] = $content;
      $data['pageTitle'] = 'Program O - Temp Test Page';

      $this->load->view('view_main', $data);
    }

    function post()
    {
      $post = $this->input->post(null, true);
      $this->temp_post = $post;
      return $this->lookie();
    }

    function lookie()
    {
      $foo = $this->temp_post['foo'];
      $content = "You just input $foo.<br>\n";

      $data['content'] = $content;
      $data['pageTitle'] = 'Program O - Temp Test Page';

      $this->load->view('view_main', $data);
    }

  }

  //


?>