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


    public function add_task_post()
    {
        $task = $this->post('task');
        $task = trim($task);
        $task = $this->security->xss_clean($task);

        if(!empty($task))
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
                    $task_data = $this->tasks_model->add_task($user_id,$task);
    
                    if ($task_data == TRUE) 
                    {
                    $this->response(array(
                        "status"=> "1",
                        "message"=> "Task added successfully",
                    ),200);
                    }
    
                    else 
                    {
                    $this->response(array(
                        "status"=> "0",
                        "message"=> "No Task added. Please try again!"
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
        else
        {
            $this->response(array(
                "status" => 0,
                "message" => "Enter a task to add"
            ),200);
        }
    }



    public function delete_task_post()
    {
        $task_id = $this->post('task_id');
        $task_id = trim($task_id);
        $task_id = $this->security->xss_clean($task_id);

        if(!empty($task_id) && is_numeric($task_id))
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
                    $task_data = $this->tasks_model->delete_task($user_id,$task_id);
    
                    if ($task_data == TRUE) 
                    {
                    $this->response(array(
                        "status"=> "1",
                        "message"=> "Task deleted successfully",
                    ),200);
                    }
    
                    else 
                    {
                    $this->response(array(
                        "status"=> "0",
                        "message"=> "No Task deleted. Please try again!"
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
        else
        {
            $this->response(array(
                "status" => 0,
                "message" => "Enter a task_id to delete"
            ),200);
        }
    }



    public function update_task_post()
    {
        $task_id = $this->post('task_id');
        $task_id = trim($task_id);
        $task_id = $this->security->xss_clean($task_id);

        $task = $this->post('task');
        $task = trim($task);
        $task = $this->security->xss_clean($task);

        $progress = $this->post('progress');
        $progress = trim($progress);
        $progress = $this->security->xss_clean($progress);

        $allowed_progress = ["In progress","Done"];
        $update = FALSE;

        if( ! empty($this->token['JWT']) )  // Header name should be 'JWT'
        {
            $token = $this->token['JWT']; 
            $token = trim($token);
            $token = $this->security->xss_clean($token);

            $secret_key = $this->config->item('todo_secret_key'); 
            $decode_token = JWT::decode($token,$secret_key);
            $user_id = $decode_token->user_id;
            
            try
            {
                if(!empty($task_id) && is_numeric($task_id))
                {
                    $task_data = $this->tasks_model->get_task_and_progress($task_id,$user_id);

                    if($task_data)
                    {
                        if(!empty($task) && $task != $task_data['task'])
                        {
                            $update = $this->tasks_model->update_task($task_id,$task,$user_id);
                        }

                        if(!empty($progress) && $progress != $task_data['progress'])
                        {
                            if(in_array($progress,$allowed_progress))
                            {
                                $update = $this->tasks_model->update_progress($task_id,$progress);
                            }
                            else
                            {
                                $this->response(array(
                                        "status" => 0,
                                        "message" => "Enter valid progress field"
                                ),200);
                            }                      
                        } 

                        if($update == TRUE)
                        {
                            $this->response(array(
                                "status" => 1,
                                "message" => "Changes saved successfully"
                            ),200);
                        }
                        else
                        {
                            $this->response(array(
                                "status" => 0,
                                "message" => "There is nothing to save"
                            ),200);
                        }
                    }
                    else
                    {
                        $this->response(array(
                            "status" => 0,
                            "message" => "No Task is found"
                        ),404);
                    }
                }
                else
                {
                    $this->response(array(
                        "status" => 0,
                        "message" => "Enter a task_id or valid task_id"
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
                "message" => "Please provide a jwt token in the header to make an API request"
            ),200);
        }
        
    }
}