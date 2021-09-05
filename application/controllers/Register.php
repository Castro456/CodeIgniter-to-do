<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  private $name;
  private $email;
  private $user;
  private $pass;
  private $dob;
  private $age;
  private $comparemail;

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');	
    $this->load->model('registermodel');
  }


  public function index($message = null){
    $data['message'] = $message;
   if($this->session->userdata('username'))
   {
    redirect('home','refresh');
   }
   else {
    $this->load->view("registerview", $data);
   }
  }


  public function loadregister()
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
      $this->user = $this->input->post('usr');
      $this->pass = md5($password);
      $this->dob = $this->input->post('dob');
      $this->age = $this->input->post('age');
      $this->verifyemail();
      }
    }


    public function verifyemail()
    {
      $email = $this->email;
      $check = $this->registermodel->registeremail($email);

      if ($check) {
        $message = "Entered Email already exists";
        $this->index($message);
      }
      else {
        $this->datainsert();
      }
    }


    public function datainsert()
    {
      $create = $this->registermodel->registeruser($this->name,$this->email,$this->user,$this->pass,$this->dob,$this->age);
      if ($create) {
        redirect('login', 'refresh');
      }
      else {
        $msg = "Registration Unsuccessful";
        $this->index($message);
      }
    }


}