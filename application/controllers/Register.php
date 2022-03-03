<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Register extends CI_Controller {

  private $first_name;
  private $last_name;
  private $email;
  private $password;
  private $phone;
  private $dob;
  private $age;


  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');	
    $this->load->model('register_model');
  }


  public function index($success = null)
  {

   $data['success'] = $success;

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

      $this->form_validation->set_rules("first-name","First name","required|trim|callback_alpha_dash_space");
      $this->form_validation->set_rules("last-name","Last name","required|trim|callback_alpha_dash_space");
      $this->form_validation->set_rules("email","Email","required|valid_email|is_unique[users_table.email]");
      $this->form_validation->set_rules("psr","Password","required|min_length[6]");
      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[psr]');
      $this->form_validation->set_rules('phone', 'Phone number', 'required|numeric|min_length[10]|is_unique[users_table.phone]');
      $this->form_validation->set_rules("dob","DOB","required");
      $this->form_validation->set_rules("age","Age","required|greater_than_equal_to[1]");
      
      if ($this->form_validation->run() === FALSE)
      {
        $this->index();
      }

      else 
      {
        $password = $this->input->post('psr');
        $this->first_name = $this->input->post('first-name');
        $this->last_name = $this->input->post('last-name');
        $this->email = $this->input->post('email');
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->phone = $this->input->post('phone');
        $this->dob = $this->input->post('dob');
        $this->age = $this->input->post('age');
        $this->register_user();
      }

    }


    public function alpha_dash_space($fullname)
    {
        if (empty($fullname))
        {
          $this->form_validation->set_message('alpha_dash_space', 'The %s field is required');
          return FALSE;
        }
        else if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) 
        {
          $this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
          return FALSE;
        } 
        else 
        {
          return TRUE;
        }
    }


    public function register_user()
    {

      $create = $this->register_model->add_user($this->first_name,$this->last_name,$this->email,$this->password,$this->phone,$this->dob,$this->age);

      if($create)
      {
        $success = "Registration successful can login now";
        $this->index($success);
      }

      else 
      {
        $data['error'] = "Error Occurred! Please try again";
        $this->load->view("register_view", $data);
      }

    }


}