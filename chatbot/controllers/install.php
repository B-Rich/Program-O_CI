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
      $data['content'] = $this->load->view('view_install_form_no_table', $formVars, true);
      $data['pageTitle'] = 'Program O Installation';
      $data['lowerScript'] = $this->load->view('view_install_js', null, true);
      $this->load->view('view_main', $data);
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

    function save_data()
    {
      global $active_group;
      $fieldTitles = array(
        'botmaster_name' => 'You have to provide a name.',
        'debugemail' => 'Your email address seems to be missing.',
        'bot_name' => 'Your bot\'s name cannot be blank.',
        'adm_dbu' => 'The admin user name field must contain a value.',
        'adm_dbp' => 'We need a password for the admin user, please.',
        'adm_dbp_confirm' => 'Did you forget to confirm your admin password?',
        'dbh' => 'Where is your database hosted?',
        'dbn' => 'You need to provide a name for the database.',
        'dbu' => 'You left out the database user name.',
        //'dbp' => 'We can\'t log you into the database without a password.',
      );
      $errMsg  = array('You have an error in the information that you submitted.<br>Please check the fields below.<hr>');
      # First, get the form data
      $post = $this->input->post(null, true);
      foreach ($post as $key => $value)
      {
        if ($value == '')
        {
          if (!isset($fieldTitles[$key])) continue;
          $errMsg[] = $fieldTitles[$key] . '<br>';
        }
      }
      if ($post['adm_dbp_confirm'] !== $post['adm_dbp']) $errMsg[] = 'The admin password must match the confirmation password!';
      if (count($errMsg) > 1)
      {
        $newdata = array(
          'error' => implode("\n", $errMsg),
          'post' => $post,
        );
        $this->session->set_userdata($newdata);
        redirect('install');
      }
      //$this->session->set_userdata(array('error', 'test!'));
      $config_header = '<?php  if (!defined(\'BASEPATH\')) exit(\'No direct script access allowed\');' . PHP_EOL . PHP_EOL;

      # let's first create the new autoloader
      $autoload_config_file = APPPATH . 'config/autoload_backup.php'; // start from scratch, in case something broke previously
      $autoload_config_save_file = APPPATH . 'config/autoload.php';
      include($autoload_config_file);
      $autoload['libraries'] = array('database', 'session');
      $autoload_config_content = $config_header;
      $autoloadConfigText = $this->_extract_array($autoload,'autoload');
      $autoload_config_content .= $autoloadConfigText;
      write_file($autoload_config_save_file, $autoload_config_content);

      # Get DB config and write the file
      $db_config_file = APPPATH . 'config/database_backup.php';
      $db_config_save_file = APPPATH . 'config/database.php';
      include ($db_config_file);
      $db[$active_group]['hostname'] = $post['dbh'];
      $db[$active_group]['database'] = $post['dbn'];
      $db[$active_group]['username'] = $post['dbu'];
      $db[$active_group]['password'] = $post['dbp'];

      # Ok, now we need to build a new database.php
      $dbArrayText = $this->_extract_array($db,'db');
      $db_config_content = $config_header;
      $db_config_content .= '$active_group = \'' . $active_group . '\';' . PHP_EOL . PHP_EOL;
      $db_config_content .= $dbArrayText;
      write_file($db_config_save_file, $db_config_content);

      # next, the general config
      $gen_config_file = APPPATH . 'config/config_backup.php';
      $gen_config_save_file = APPPATH . 'config/config.php';
      include ($gen_config_file);
      $config['use_membership'] = (bool) $post['use_membership'];
      $config['require_membership'] = (bool) $post['require_membership'];
      $config['sess_use_database'] = TRUE;
      if (empty($config['encryption_key'])) $config['encryption_key'] = sha1(time()); // randomize the encryption key for security purposes, but only if it's blank.
      $config['encryption_key'] = sha1('DEBUG01@programo');
      $config['is_installed'] = true;
      $gen_config_content = $config_header;
      $configArrayText = $this->_extract_array($config,'config');
      $gen_config_content .= $configArrayText;
      write_file($gen_config_save_file, $gen_config_content);

      # general config complete. Now for the routes config
      $route_config_file = APPPATH . 'config/routes_backup.php';
      $route_config_save_file = APPPATH . 'config/routes.php';
      include($route_config_file);
      $route['default_controller'] = 'program_o';
      $route_config_content = $config_header;
      $routeConfigText = $this->_extract_array($route,'route');
      $route_config_content .= $routeConfigText;
      write_file($route_config_save_file, $route_config_content);

      # Configure the flexi_auth config
      $config = null; // It was set previously, so let's not contaminate things
      $flexi_auth_config_file = APPPATH . 'config/flexi_auth_backup.php';
      $flexi_auth_config_save_file = APPPATH . 'config/flexi_auth.php';
      include($flexi_auth_config_file);
      $config['security']['static_salt'] = sha1(time());
      $config['security']['recaptcha_public_key'] = 'UNSET!';
      $config['security']['recaptcha_private_key'] = 'UNSET!';
      $flexi_auth_config_content = $config_header;
      $flexi_authConfigText = $this->_extract_array($config,'config');
      $flexi_auth_config_content .= $flexi_authConfigText;
      write_file($flexi_auth_config_save_file, $flexi_auth_config_content);

      # at this point, the config files are done, so let's move on to creating the DB tables.
      $this->load->database();
      $this->load->model('model_install');
      $success = $this->model_install->makeTables();
      if (!$success) return $this->error();


      # time to create the default chatbot
      $this->session->set_userdata('post', $post);
      $success = $this->model_install->addBot();
      if (!$success) return $this->error();

      # let's add an admin account
      $this->auth = new stdClass;
      $this->load->library('flexi_auth');
      $email = $post['debugemail'];
      $username = $post['adm_dbu'];
      $password = $post['adm_dbp'];
      $user_data = null;
      $group_id = 3;
      $activate = 1;
      $user_data = null;

      $success = $this->flexi_auth->insert_user($email, $username, $password, $user_data, $group_id, $activate);
      //$this->flexi_auth->insert_user('bugs@program-o.com', 'PGO_DEBUG', sha1('DEBUG01@programo'), null, 3, 1);
      if (!$success)
      {
        $this->session->set_userdata('errors', $this->flexi_auth->error_messages());
        redirect('install/error');
      }


      # do we want to set up membership?
      if((bool) $post['use_membership']) redirect('install/membership');


      #Initial install complete. Now let's show the success page!
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