<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Admin_api extends REST_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model("api/admin_model");
    $this->load->model("login_model");
    $this->load->config('secret_key'); // Loading secret key from config folder, file name of 'secret_key.php'
    $this->token = $this->input->request_headers(); // Getting JWT Token from header
  }
  

  public function generate_api_post()
  {

    $validated = false;

    if($this->session->userdata('user_validated') == true)
    {
      $validated = true;
    }
    else
    {
      $email = $this->post('email');
      $password = $this->post('password');

      if(empty($email) || empty($password))
      {
        $this->response(array(
          "status" => 0,
          "message" => "Username or Password is incorrect"
        ),200);
      }
      else
      {
        $data = $this->login_model->check_email($email);

        if ($data == false) 
        {
          $this->response(array(
            "status" => 0,
            "message" => "Username or Password is incorrect"
          ),200);
        }
  
        else 
        {
          $password = $password;
          $memcached_password_key = 'user'.$email."password";
  
          //Memcached Part
          $user_password = $this->memcached_library->get($memcached_password_key);
  
          if (empty($user_password)) 
          {
            $user_password = $this->login_model->get_user_password($email);
            $this->memcached_library->add($memcached_password_key,$user_password);
          }
  
          $check_password = $this->login_model->check_password($user_password,$password);
  
          if ($check_password == true) 
          {
            $user_details_key = 'user'.$email."details";
            $user_details = $this->memcached_library->get($user_details_key);
  
            if (empty($user_details)) 
            {
              $user_details = $this->login_model->get_user_details($email);
              $this->memcached_library->add($user_details_key,$user_details);
            }

            $secret_key = $this->config->item('todo_secret_key');
            $api_data = array(
              'user_id' => $user_details['id'],
              'user_name' => $user_details['username']
            );
            $encoded = JWT::encode($api_data,$secret_key);
            $this->response(array(
              "status" => 1,
              "message" => "Login Successful",
              "jwt"    => $encoded
            ),200);
          }
          else
          {
            $this->response(array(
              "status" => 0,
              "message" => "Username or Password is incorrect"
            ));
          }
       }
      }
    }
    if($validated == true)
    {
      $user_id = $this->session->userdata('user_id');
      $user_name = $this->session->userdata('user_name');
      $secret_key = $this->config->item('todo_secret_key');
      $api_data = array(
        'user_id' => $user_id,
        'user_name' => $user_name
      );
      $encoded = JWT::encode($api_data,$secret_key);
      $this->response($encoded,200);
    }

  }


  
  public function all_users_get()
  {

    $validated = false;
    
    if($this->session->userdata('user_validated') == true)
    {
      $validated = true;
    }

    else if( ! empty($this->token['JWT']) )  // Header name should be 'JWT'
    {
      $token = $this->token['JWT']; 
      $token = trim($token);
      $token = $this->security->xss_clean($token);

      $secret_key = $this->config->item('todo_secret_key'); // From file 'secret_key.php' the key is stored in type array.

      try
      {
        $decode_token = JWT::decode($token,$secret_key);
        $validated = true;
      }
      catch(Exception $e)
      {
        $error = $e->getMessage();
        $this->response(array(
          "status" => 0,
          "error" => $error
        ),500);
      }
    }
    
    if($validated == true)
    {
      $users_list = $this->admin_model->get_all_users();

      if (count($users_list) > 0) {
        $this->response($users_list,200);
      }

      else 
      {
        $this->response(array(
          "status"=> "0",
          "message"=> "No Users Found"
        ),200); 
      }
    }

    else
    {
      $this->response(array(
        "status" => 0,
        "error" => "Please provide a jwt token in the header to make an API request"
      ),500);
    }
  }

  public function update_user_post()
  {

    $user_id = $this->post('user-id');
    $user_id = trim($user_id);
    $user_id = $this->security->xss_clean($user_id);

    $first_name = $this->post('fname');
    $first_name = trim($first_name);
    $first_name = $this->security->xss_clean($first_name);

    $last_name = $this->post('lname');
    $last_name = trim($last_name);
    $last_name = $this->security->xss_clean($last_name);

    $email = $this->post('email'); 
    $email = trim($email);
    $email = $this->security->xss_clean($email);

    $phone = $this->post('phone');
    $phone = trim($phone);
    $phone = $this->security->xss_clean($phone);

    $user_details = $this->admin_model->get_user_details($user_id,$email);

    if(empty($user_details) )
    {
      $this->response(array(
        "status" => 0,
        "message" => "Error Occurred"
      ),200);
    }
    
    else
    {

      if(!empty($first_name) && $first_name != $user_details['firstname'])
      {
        $update_user = $this->admin_model->set_first_name($first_name,$email,$user_id);
      }

      if(!empty($last_name) && $last_name != $user_details['lastname'])
      {
        $update_user = $this->admin_model->set_last_name($last_name,$email,$user_id);
      }

      if(!empty($phone) && $phone != $user_details['phone'])
      {
          $check_phone = $this->admin_model->check_existing_phone($phone);

          if($check_phone)
          {
            $this->response(array(
              "status" => 0,
              "message" => "This phone number already exits"
            ),200);
          }

          else 
          {
            $update_user = $this->admin_model->set_phone_number($phone,$email,$user_id);
          }
      }

      if($update_user == true)
      {
        $this->response(array(
          "status" => 1,
          "message" => "User details updated"
        ),200);
      }

      else
      {
        $this->response(array(
          "status" => 0,
          "message" => "Nothing to change"
        ),200);
      }
    }
    
  }



}
?>