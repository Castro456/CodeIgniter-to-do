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
    $all_headers = getallheaders(); // Inbuilt php fn to get all the header while we make a request
    $token = $all_headers['JWT']; // Passing name of the header should be same 'JWT'
    $token = trim($token);
    $this->token = $this->security->xss_clean($token);
  }
  
  
  public function all_users_get()
  {
    $secret_key = $this->config->item('todo_secret_key'); // From file 'secret_key.php' the key is stored in type array.
    try
    {
      $encode_token = JWT::decode($this->token,$secret_key); // If this line error occurs, the error will be caught by catch.
      $users_list = $this->admin_model->get_all_users();

      if (count($users_list) > 0) {
        $this->response(array(
          "status"=> "1",
          "message"=> $users_list
        ),200); #200
      }

      else 
      {
        $this->response(array(
          "status"=> "0",
          "message"=> "No Users Found"
        ),200); 
      }

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



}
?>