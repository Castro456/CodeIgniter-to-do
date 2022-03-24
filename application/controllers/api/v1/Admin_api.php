<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');

/**
 * 
 * This Class contains methods related to Admin/User. 
 * @author Castro456 <castrosid456@gmail.com>
 * 
 */
class Admin_api extends REST_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("api/admin_model");
    $this->load->model("login_model");
    $this->load->model("delete_model");
    $this->load->config('secret_key'); // Loading secret key from config folder, file name of 'secret_key.php'
    $this->token = $this->input->request_headers(); // Getting JWT Token from header
  }
  


  /**
   * 
   * POST Method
   * Login as user using email and password to generate API Token
   * 
   */
  public function generate_api_post()
  {

    if($this->session->userdata('user_validated') == true)
    {
      $user_id = $this->session->userdata('user_id');
      $user_email = $this->session->userdata('user_email');
      $secret_key = $this->config->item('todo_secret_key');
      $api_data = array(
        'user_id' => $user_id,
        'user_email' => $user_email
      );
      $encoded = JWT::encode($api_data,$secret_key);
      $this->response($encoded,200);
    }

    else
    {
      $email = $this->post('email');
      $email = trim($email);
      $email = $this->security->xss_clean($email);

      $password = $this->post('password');
      $password = trim($password);
      $password = $this->security->xss_clean($password);

      if(empty($email) || empty($password))
      {
        $this->response(array(
          "status" => 0,
          "message" => "Email and Password field is required"
        ),404);
      }
      else
      {
        $data = $this->login_model->check_email($email);

        if ($data == false) 
        {
          $this->response(array(
            "status" => 0,
            "message" => "Email or Password is incorrect"
          ),200);
        }
  
        else 
        {
          $user_password = $this->login_model->get_user_password($email);
  
          $check_password = $this->login_model->check_password($user_password,$password);
  
          if ($check_password == true) 
          {
            $user_details = $this->admin_model->get_user_id($email);

            $secret_key = $this->config->item('todo_secret_key');
            $api_data = array(
              'user_id' => $user_details['id'],
              'user_email' => $user_details['email']
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
              "message" => "Email or Password is incorrect"
            ),404);
          }
       }
      }
    }

  }



  /**
  * 
  * GET Method
  * JWT Token is needed to make this request
  * To get the all users for the database
  * 
  */
  public function all_users_get()
  {

    $users_list = $this->admin_model->get_all_users();

    if (count($users_list) > 0)
    {
      $this->response(array(
        "status" => 1,
        "message" => "List of To-Do List Users",
        "data" => $users_list
      ),200);
    }

    else 
    {
      $this->response(array(
        "status"=> "0",
        "message"=> "No Users Found"
      ),404); 
    }
 
  }


  /**
   * 
   * POST Method
   * Update user details
   * To update the user details fo FirstName, LastName, Phone, Date-fo-Birth, Age
   * user-id and email fields are must to pass on post method
   * 
   */
  public function update_user_post()
  {

    $user_id = 0;

    $first_name = $this->post('fname');
    $first_name = trim($first_name);
    $first_name = $this->security->xss_clean($first_name);

    $last_name = $this->post('lname');
    $last_name = trim($last_name);
    $last_name = $this->security->xss_clean($last_name);

    $email = '';

    $phone = $this->post('phone');
    $phone = trim($phone);
    $phone = $this->security->xss_clean($phone);

    $dob = $this->post('dob');
    $dob = trim($dob);
    $dob = $this->security->xss_clean($dob);

    $age = $this->post('age');
    $age = trim($age);
    $age = $this->security->xss_clean($age);

    if ($this->session->userdata('user_validated') == true)
    {
      $user_id = $this->session->userdata('user_id');
      $email = $this->session->userdata('user_email');
    }

    else if( ! empty($this->token['Authorization']) )  // Header name should be 'Authorization'
    {
      $token = $this->token['Authorization']; 
      $token = trim($token);
      $token = $this->security->xss_clean($token);

      $secret_key = $this->config->item('todo_secret_key'); // From file 'secret_key.php' the key is stored in type array.

      try
      {
        $decode_token = JWT::decode($token,$secret_key);
        $user_id = $decode_token->user_id;
        $email = $decode_token->user_email;
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

    else
    {
      $this->response(array(
        "status" => 0,
        "error" => "Please provide a jwt token in the header to make an API request"
      ),500);
    }

   if($user_id > 0 && $email != '')
   {
      $user_details = $this->admin_model->get_user_details($user_id,$email);
      $update_user = false;

      if(empty($user_details) )
      {
        $this->response(array(
          "status" => 0,
          "message" => "Error Occurred"
        ),200);
      }
      
      else
      {
        /**
         * 
         * If empty phone/first_name/last_name/dob/age is given. The API will not replace those fields as empty fields it just keeps its old data. To provide this feature the if condition is double checked with both for empty data and same data is being entered or not.
         * 
         */
        if(!empty($phone) && $phone != $user_details['phone'])
        {
            if(!preg_match("/^\d{10}$/",$phone)) {
                $this->response(array(
                "status" => 0,
                "message" => "Enter valid phone number"
              ),200);
            }

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
              $update_user = $this->admin_model->set_phone_number($phone,$user_id);
            }
        }

        if(!empty($first_name) && $first_name != $user_details['firstname'])
        {
           if(!preg_match("/^[a-zA-Z]+$/",$first_name)) {
                $this->response(array(
                "status" => 0,
                "message" => "Enter only characters for first name"
              ),200);
            }
          $update_user = $this->admin_model->set_first_name($first_name,$user_id);
        }
  
        if(!empty($last_name) && $last_name != $user_details['lastname'])
        {
            if(!preg_match("/^[a-zA-Z]+$/",$last_name)) {
                $this->response(array(
                "status" => 0,
                "message" => "Enter only characters for last name"
              ),200);
            }
          $update_user = $this->admin_model->set_last_name($last_name,$user_id);
        }
  
        if(!empty($dob) && $dob != $user_details['dob'])
        {
          if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$dob)) { 
            $this->response(array(
            "status" => 0,
            "message" => "Enter valid date"
            ),200);
          }
          $update_user = $this->admin_model->set_dob($dob,$user_id);
        }
  
        if(!empty($age) && $age != $user_details['age'])
        {
          if(!preg_match("/^\d{1,3}$/",$age)) { 
            $this->response(array(
            "status" => 0,
            "message" => "Enter valid age"
            ),200);
          }
          $update_user = $this->admin_model->set_age($age,$user_id);
        }
  
        if($update_user === true)
        {
          /**
           *
           * Memcached Delete
           * Reason for deleting : If it is not deleted, the application session takes data from this memcached key which will be a old key of before updating the user data. 
           * 
           *  */ 
          $user_details_key = 'user'.$email.'details';
          $user_details = $this->memcached_library->delete($user_details_key);
  
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

  public function delete_user_post()
  {

    $user_id = 0;
    $email = '';
    
    if($this->session->userdata('user_validated') == true)
    {
      $user_id = $this->session->userdata('user_id');
      $email = $this->session->userdata('user_email');
    }

    else if( ! empty($this->token['Authorization']) )  // Header name should be 'Authorization'
    {
      $token = $this->token['Authorization']; 
      $token = trim($token);
      $token = $this->security->xss_clean($token);

      $secret_key = $this->config->item('todo_secret_key'); // From file 'secret_key.php' the key is stored in type array.

      try
      {
        $decode_token = JWT::decode($token,$secret_key);
        $user_id = $decode_token->user_id;
        $email = $decode_token->user_email;
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

    if($user_id > 0 && $email != '')
    {
      $task_id = $this->admin_model->get_task_id($user_id);

      if($task_id > 0)
      {
        foreach($task_id as $row)
        {
          $delete_user_task = $this->delete_model->index($row['id']);
        }
      }

      $delete_user = $this->admin_model->delete_user($user_id);

      if($delete_user)
      {
        $memcached_password_key = 'user'.$email.'password';
        $user_password = $this->memcached_library->delete($memcached_password_key);

        $user_details_key = 'user'.$email.'details';
        $user_details = $this->memcached_library->delete($user_details_key);

        $this->response(array(
        "status" => 0,
        "message" => "User deleted Successfully"
        ),200);
      }

      else
      {
        $this->response(array(
        "status" => 0,
        "message" => "Unable to delete! Please try again"
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



}
?>