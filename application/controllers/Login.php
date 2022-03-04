<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


  private $email;
  private $password;
  private $user_id;
  private $user_details;


  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('login_model');
  }
  


  public function index($msg = NULL)
  {
    $throw_error['msg'] = $msg;

   if($this->session->userdata('user_validated') == true)
   {
     redirect('home','refresh');
   }

   else
   {
     $this->load->view('login_view',$throw_error);
   }

  }
  


  public function authentication()
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
      $this->password = $password;
      $this->validate_email();
    }

  }



  public function validate_email()
  {

    $check_email = $this->email;
    $data = $this->login_model->check_email($check_email);

    if ($data == false) 
    {
      $msg =  "Email or Password is Incorrect";
      $this->index($msg);
    }

    else 
    {
      $this->check_password();
    }

  }

  public function delete_mem()
  {
    $memcached_password_key = 'usercastro@geedesk.compassword';
    $user_password = $this->memcached_library->delete($memcached_password_key);
    $user_details_key = 'usercastro@geedesk.comdetails';
    $user_details = $this->memcached_library->delete($user_details_key);
  }

  public function check_password()
  {

    $password = $this->password;
    $memcached_password_key = 'user'.$this->email.'password';

    //Memcached Part
    $user_password = $this->memcached_library->get($memcached_password_key);

    if (empty($user_password)) 
    {
      $user_password = $this->login_model->get_user_password($this->email);
      $this->memcached_library->add($memcached_password_key,$user_password);
    }

    $check_password = $this->login_model->check_password($user_password,$password);

    if ($check_password == true) 
    {
      $user_details_key = 'user'.$this->email.'details';
      $user_details = $this->memcached_library->get($user_details_key);

      if (empty($user_details)) 
      {
        $user_details = $this->login_model->get_user_details($this->email);
        $this->memcached_library->add($user_details_key,$user_details);
      }

      $this->user_details = $user_details;
      $this->set_session();
      redirect('login',"refresh");
    }

    else
    {
      $msg = "Email or Password is Incorrect";
      $this->index($msg);
    }

  }



  public function set_session()
  {

    $user_data = $this->user_details;

    $session_data = array(
      'user_id' => $user_data['id'],
      'user_fname' => $user_data['firstname'],
      "user_lname" => $user_data['lastname'],
      "user_email" => $this->email,
      "user_phone" => $user_data['phone'],
      "user_dob" => $user_data['dob'],
      "user_age" => $user_data['age'],
      "user_validated" => true
    );

    $this->session->set_userdata($session_data);
  }


  public function unset_session()
  {

    $this->session->sess_destroy();
    redirect('login');

  }

}