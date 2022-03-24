<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * 
 * @author Castro456 <castrosid456@gmail.com>
 * ---------------   THIS API IS NO LONGER SUPPORTED   ----------------
 * ---------------   DON'T USE THIS    --------------------------------
 * 
 */
require (APPPATH.'libraries/REST_Controller.php');
// use chriskacerguis\RestServer\RestController;

class Tasks_api extends REST_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('api/tasks_model');   
    /**
     * Loads model for all the methods
    */
  }



  /**
   * GET request
   * To get all the tasks with id,task,username.
   */
  public function view_get()
  {
    
    $method = $_SERVER['REQUEST_METHOD'];
    /**
     * Checks request method is in GET
     */
    if ($method == 'GET') 
    {

     $disp=$this->tasks_model->get_all_task();

      if (count($disp) > 0) {
        /**
        * If the data is present gets in response
        */
        $this->response(array(
          "status"=> "1",
          "message"=> "Task Found",
          "data"=> $disp
        ), REST_Controller::HTTP_OK); #200
      }

      else 
      {
        /**
         * If no task is present in the table
         */
        $this->response(array(
          "status"=> "0",
          "message"=> "No Task Found"
        ), REST_Controller::HTTP_NOT_FOUND); #404
      }

    }

    else 
    {
      /**
       * If request method is not in GET
       */
      $this->response(array(
        "status"=> "0",
        "message"=> "Bad Request"
      ), REST_Controller::HTTP_BAD_REQUEST); #400
    }

  }



  /**
   * GET Request
   * To get a specific task
   * id parameter is passed in the url
   */
  public function oneview_get($id) 
  {

   $method = $_SERVER['REQUEST_METHOD'];

   if ($method == 'GET') 
   {

    $disp=$this->tasks_model->get_task($id);

    if (count($disp) > 0) 
    {
      $this->response(array(
        "status"=> "1",
        "message"=> "Task Found",
        "data"=> $disp
      ), REST_Controller::HTTP_OK);
    }

    else 
    {
      $this->response(array(
        "status"=> "0",
        "message"=> "No Task Found"
        ), REST_Controller::HTTP_NOT_FOUND);
    }

   }

   else 
   {
     $this->response(array(
        "status"=> "0",
        "message"=> "Bad Request"
     ), REST_Controller::HTTP_BAD_REQUEST);
   }

  }



  /**
   * PUT Request
   * Change the task name
   * id, task parameter passed as json
   */
  public function taskupdate_put() 
  {

   $method = $_SERVER['REQUEST_METHOD'];
    /**
    * Checks request method is in PUT
    */
   if ($method == 'PUT') 
   {

    $data=json_decode(file_get_contents("php://input"));

    if (isset($data->id) && isset($data->task)) 
    {
      $id=$data->id;
      $task=$data->task;
      $result = $this->tasks_model->update_task($id, $task);

      if ($result) 
      {
        $this->response(array(
          "status"=> "1",
          "message"=> "Task Changed"
        ), REST_Controller::HTTP_OK); #200
      }

      else 
      {
        $this->response(array(
          "status"=> "0",
          "message"=> "Task didn't Change"
        ), REST_Controller::HTTP_BAD_GATEWAY); #502
      }

    }

    else 
    {
      $this->response(array(
        "status"=> "0",
        "message"=> "Needed id, task field"
      ), REST_Controller::HTTP_UNPROCESSABLE_ENTITY); #422
    }

   }

   else 
   {
    $this->response(array(
      "status"=> "0",
      "message"=> "Bad Request"
    ), REST_Controller::HTTP_BAD_REQUEST);
   }

  }



   /**
   * PUT Request
   * Update the task to done/progress
   * id, progress parameter passed as json
   */
  public function task_status_put() 
  {

   $method = $_SERVER['REQUEST_METHOD'];
    /**
    * Checks request method is in PUT
    */
   if ($method == 'PUT') 
   {

    $data=json_decode(file_get_contents("php://input"));

    if (isset($data->id) && isset($data->progress)) 
    {

      if ($data->progress == "In progress" || $data->progress == 1) 
      {
         $progress = 1;
      }
      else if ($data->progress == "Done" || $data->progress == 2) 
      {
         $progress = 2;
      }
      else 
      {
        $progress = 1 ;
      }

      $id=$data->id;
      $result = $this->tasks_model->task_status($id, $progress);

      if ($result) 
      {
        $this->response(array(
          "status"=> "1",
          "message"=> "Task status is updated"
        ), REST_Controller::HTTP_OK); #200
      }

      else 
      {
        $this->response(array(
          "status"=> "0",
          "message"=> "Task status didn't change"
        ), REST_Controller::HTTP_BAD_GATEWAY); #502
      }

    }

    else 
    {
      $this->response(array(
        "status"=> "0",
        "message"=> "Needed id, progress"
      ), REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
    }

   }

   else 
   {
    $this->response(array(
      "status"=> "0",
      "message"=> "Bad Request"
    ), REST_Controller::HTTP_BAD_REQUEST);
   }

  }



  /**
   * DELETE Request
   * Deletes the specific task
   * id parameter passed as json
   */
  public function taskdelete_delete()
  {

   $method = $_SERVER['REQUEST_METHOD'];
    /**
    * Checks request method is in DELETE
    */
   if ($method == 'DELETE') 
   {
    $data=json_decode(file_get_contents("php://input"));

    if (isset($data->id)) 
    {

      $taskid=$data->id;
      $result = $this->tasks_model->delete_task($taskid);
      if ($result == TRUE) 
      {
        $this->response(array(
          "status"=> "1",
          "message"=> "Task Deleted"
        ), REST_Controller::HTTP_OK);
      }

      else 
      {
        $this->response(array(
          "status"=> "0",
          "message"=> "Task didn't Deleted"
        ), REST_Controller::HTTP_BAD_GATEWAY);
      }
      
    }
    
    else 
    {
      $this->response(array(
        "status"=> "0",
        "message"=> "Needed a id field"
      ), REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
    }

   }

   else 
   {
    $this->response(array(
      "status"=> "0",
      "message"=> "Bad Request"
    ), REST_Controller::HTTP_BAD_REQUEST);
   }

  }


  
  /**
   * POST Request
   * Add a task with user id
   * task, userid parameters passed as json
   */
  public function taskadd_post() 
  {

   $method = $_SERVER['REQUEST_METHOD'];
    /**
    * Checks request method is in POST
    */
   if ($method == 'POST') 
   {

    $data=json_decode(file_get_contents("php://input"));
    $user_id=isset($data->user_id) ? $data->user_id: " ";
    $task=isset($data->task) ? $data->task: " ";

    if ( !empty($data->task) && !empty($data->user_id)) 
    {
      $user_id=$data->user_id;
      $task=$data->task;
      // $progress=1;
      $verify = $this->tasks_model->add_task($user_id, $task);

      if ($verify == TRUE)
      {
        $this->response(array(
          "status"=> "1",
          "message"=> "Task Added"
        ), REST_Controller::HTTP_OK);
      }

      else 
      {
        $this->response(array(
          "status"=> "0",
          "message"=> "Task  didn't Added",
          "error"=> "Enter existing userid "
        ), REST_Controller::HTTP_BAD_GATEWAY);
      }
    }

    else 
    {
      $this->response(array(
        "status"=> "0",
        "message"=> "Needed user_id, task fields"
      ), REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
    }

   }

  else 
  {
    $this->response(array(
     "status"=> "0",
     "message"=> "Bad Request"
    ), REST_Controller::HTTP_BAD_REQUEST);
  }

 }

} //End of Task API
