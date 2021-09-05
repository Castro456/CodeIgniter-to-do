<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  private $email;
  private $password;
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('loginmodel');
  }
  
  public function index($msg = NULL)
  {
    $throw_error['msg'] = $msg;
   if($this->session->userdata('username'))
   {
     redirect('home','refresh');
   }
   else {
     $this->load->view('loginview',$throw_error);
   }
  }
  
  public function loadlogin()
  {
    $this->form_validation->set_rules("em","Email Id","required|valid_email");
    $this->form_validation->set_rules("psr","Password","required");

    if ($this->form_validation->run() === FALSE)
    {
      $this->index();
    }
    else 
    {
      $password = $this->input->post('psr');
      $this->email = $this->input->post('em');
      $this->password = md5($password);
      $this->validate_email();
    }
  }

  public function validate_email()
  {
    $check_email = $this->email;
    $data = $this->loginmodel->check_email($check_email);
    if ($data === false) {
      $msg =  "Email address or Password is Incorrect";
      $this->index($msg);
    }
    else {
      $this->check_password();
    }
  }

  public function check_password()
  {
    $verify = $this->loginmodel->get_password($this->email);
    try {

      $password = $this->password;

      if($verify['pass_word'] === $password){
        $this->result = $verify;
        $this->set_session();
        redirect('login','refresh');
      }
      else {
        throw new Exception("Email address or Password is Incorrect");   
      }

  }catch(Exception $e) {
      $msg =  $e->getMessage();
      $this->index($msg);
  }

  }

  public function set_session()
  {
    $usr_session = $this->result;
    $this->session->set_userdata('username',$usr_session['username']);
    $this->session->set_userdata('id',$usr_session['id']);
  }

  public function unset_session()
  {
    session_destroy();
    redirect('login');
  }

}