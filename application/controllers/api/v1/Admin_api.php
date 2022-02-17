<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Admin_api extends REST_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model("api/admin_model");
    $this->load->config('secret_key'); // Loading secret key from config folder, file name of 'secret_key.php'
    $this->token = $this->input->request_headers(); // Getting JWT Token from header
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

  public function delete_user_delete()
  {
    
  }



}
?>