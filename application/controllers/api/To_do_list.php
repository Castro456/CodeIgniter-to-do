<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';
use chriskacerguis\RestServer\RestController;

class To_do_list extends REST_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('api/app_model');   
    /**
     * Loads model for all the methods
     */
  }

  /**
   * GET request
   * To get all the tasks with id,task,username.
   */
  public function view_get() {
    $method = $_SERVER['REQUEST_METHOD'];
    /**
     * Checks request method is in GET
     */
    if ($method == 'GET') {
     $disp=$this->app_model->get_task();
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
      else {
        /**
         * If no task is present in the table
         */
        $this->response(array(
          "status"=> "0",
          "message"=> "No Task Found"
          ), REST_Controller::HTTP_NOT_FOUND); #404
      }
    }else {
      /**
       * If request method is not in GET
       */
      $this->response(array(
        "status"=> "0",
        "message"=> "Check the request"
        ), REST_Controller::HTTP_BAD_REQUEST); #400
    }
  }

  /**
   * GET Request
   * To get a specific task
   * id parameter is passed in the url
   */
  public function oneview_get($id) {
   $method = $_SERVER['REQUEST_METHOD'];
   if ($method == 'GET') {
    $disp=$this->app_model->task_details($id);
    if (count($disp) > 0) {
      $this->response(array(
        "status"=> "1",
        "message"=> "Task Found",
        "data"=> $disp
        ), REST_Controller::HTTP_OK);
    }
    else {
      $this->response(array(
        "status"=> "0",
        "message"=> "No Task Found"
        ), REST_Controller::HTTP_NOT_FOUND);
    }
   }else {
     $this->response(array(
        "status"=> "0",
        "message"=> "No Task Found"
        ), REST_Controller::HTTP_BAD_REQUEST);
   }
  }

  /**
   * PUT Request
   * Update the present task
   * id, task, progress parameter passed as json
   * Can change the progress to "done" or "In progress"
   */
  public function taskupdate_put() {
   $method = $_SERVER['REQUEST_METHOD'];
    /**
    * Checks request method is in PUT
    */
   if ($method == 'PUT') {
    $data=json_decode(file_get_contents("php://input"));

    if (isset($data->id) && isset($data->task) && isset($data->progress)) {
      $id=$data->id;
      $task=$data->task;
      $progress=$data->progress;
      if ($this->app_model->update_task($id, $task, $progress)) {
        $this->response(array(
          "status"=> "1",
          "message"=> "Task Changed"
          ), REST_Controller::HTTP_OK); #200
      }
      else {
        $this->response(array(
          "status"=> "0",
          "message"=> "Task didn't Change"
          ), REST_Controller::HTTP_BAD_GATEWAY); #502
      }
    }
    else {
      $this->response(array(
        "status"=> "0",
        "message"=> "Needed id, task, progress field "
        ), REST_Controller::HTTP_UNPROCESSABLE_ENTITY); #422
    }
  }else {
     $this->response(array(
      "status"=> "0",
      "message"=> "No Task Changed"
      ), REST_Controller::HTTP_BAD_REQUEST);
  }
  }

  /**
   * DELETE Request
   * deletes the specific task
   * taskid parameter passed as json
   */
  public function taskdelete_delete() {
   $method = $_SERVER['REQUEST_METHOD'];
    /**
    * Checks request method is in DELETE
    */
   if ($method == 'DELETE') {
    $data=json_decode(file_get_contents("php://input"));

    if (isset($data->taskid)) {
      $taskid=$data->taskid;
      if ($this->app_model->delete_task($taskid)) {
        $this->response(array(
          "status"=> "1",
          "message"=> "Task Deleted"
          ), REST_Controller::HTTP_OK);
      }
      else {
        $this->response(array(
          "status"=> "0",
          "message"=> "Task didn't Deleted"
          ), REST_Controller::HTTP_BAD_GATEWAY);
      }
    }
    else {
      $this->response(array(
        "status"=> "0",
        "message"=> "Needed a taskid field"
        ), REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
    }
  }else {
    $this->response(array(
      "status"=> "0",
      "message"=> "No Task Deleted"
      ), REST_Controller::HTTP_BAD_REQUEST);
  }

  }

  /**
   * POST Request
   * Add a task with user id
   * task, userid parameters passed as json
   */
  public function taskadd_post() {
   $method = $_SERVER['REQUEST_METHOD'];
    /**
    * Checks request method is in POST
    */
   if ($method == 'POST') {
    $data=json_decode(file_get_contents("php://input"));
    $task=isset($data->task) ? $data->task: " ";
    $userid=isset($data->user_id) ? $data->user_id: " ";

    if ( !empty($data->task) && !empty($data->userid)) {
      $task=$data->task;
      $userid=$data->userid;
      $progress=1;
      if ($this->app_model->post_task($task, $userid, $progress)) {
        $this->response(array(
          "status"=> "1",
          "message"=> "Task Added"
          ), REST_Controller::HTTP_OK);
      }
      else {
        $this->response(array(
          "status"=> "0",
          "message"=> "Task  didn't Added",
          "error"=> "Enter existing userid "
          ), REST_Controller::HTTP_BAD_GATEWAY);
      }
    }
    else {
      $this->response(array(
        "status"=> "0",
        "message"=> "Needed task,userid fields"
        ), REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
    }
  }else {
    $this->response(array(
     "status"=> "0",
     "message"=> "No Task Added"
     ), REST_Controller::HTTP_BAD_REQUEST);
  }
 }
}
