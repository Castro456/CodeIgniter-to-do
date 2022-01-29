<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Register extends CI_Controller {

  private $name;
  private $email;
  private $user_name;
  private $password;
  private $dob;
  private $age;


  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');	
    $this->load->model('register_model');
  }


  public function index($message = null)
  {

   $data['message'] = $message;

   if($this->session->userdata('user_name'))
   {
    redirect('home','refresh');
   }

   else
   {
    $this->load->view("register_view", $data);
   }

  }


  public function validate()
  {

      $this->form_validation->set_rules("firstname","Name","required|alpha");
      $this->form_validation->set_rules("email","Email","required|valid_email");
      $this->form_validation->set_rules("usr","UserName","required|alpha_numeric");
      $this->form_validation->set_rules("psr","Password","required|alpha_numeric|min_length[6]");
      $this->form_validation->set_rules("dob","DOB","required");
      $this->form_validation->set_rules("age","Age","required|greater_than_equal_to[1]");

      if ($this->form_validation->run() === FALSE)
      {
        $this->index();
      }

      else 
      {
        $password = $this->input->post('psr');
        $this->name = $this->input->post('firstname');
        $this->email = $this->input->post('email');
        $this->user_name = $this->input->post('usr');
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->dob = $this->input->post('dob');
        $this->age = $this->input->post('age');
        $this->email_verification();
      }

    }


    public function email_verification()
    {

      $email = $this->email;
      $check = $this->register_model->check_existing_email($email);

      if($check)
      {
        $message = "Entered Email already exists";
        $this->index($message);
      }

      else 
      {
        $this->register_user();
      }

    }


    public function register_user()
    {

      $create = $this->register_model->add_user($this->name,$this->email,$this->user_name,$this->password,$this->dob,$this->age);

      if($create)
      {
        redirect('login', 'refresh');
      }

      else 
      {
        $msg = "Registration Unsuccessful";
        $this->index($message);
      }

    }


}