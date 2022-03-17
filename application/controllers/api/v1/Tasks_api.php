<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');

/**
 * 
 * This Class contains methods related to Tasks. 
 * @author Castro456 <castrosid456@gmail.com>
 * 
 */
class Tasks_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/tasks_model');
        $this->load->model("api/admin_model");
        $this->load->config('secret_key'); // Loading secret key from config folder, file name of 'secret_key.php'
        $this->token = $this->input->request_headers(); // Getting JWT Token from header
    }


    public function list_task_get()
    {
        if( ! empty($this->token['JWT']) )  // Header name should be 'JWT'
        {
            $token = $this->token['JWT']; 
            $token = trim($token);
            $token = $this->security->xss_clean($token);

            $secret_key = $this->config->item('todo_secret_key'); // From file 'secret_key.php' the key is stored in type array.

            try
            {
                $decode_token = JWT::decode($token,$secret_key);
                $user_id = $decode_token->user_id;
                $task_data = $this->tasks_model->get_task($user_id);

                if (count($task_data) > 0) 
                {
                $this->response(array(
                    "status"=> "1",
                    "message"=> "Task Found",
                    "data"=> $task_data
                ),200);
                }

                else 
                {
                $this->response(array(
                    "status"=> "0",
                    "message"=> "No Task Found"
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
        else
        {
            $this->response(array(
                "status" => 0,
                "error" => "Please provide a jwt token in the header to make an API request"
            ),500);
        }
    }
}