<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';
use chriskacerguis\RestServer\RestController;

class To_do_list extends REST_Controller {

	public function __construct() {
		parent: :__construct();
		$this->load->model('api/app_model');
	}

	public function view_get() {
		$disp=$this->app_model->get_task();

		if (count($disp) > 0) {
			$this->response(array("status"=> "1",
					"message"=> "Task Found",
					"data"=> $disp), REST_Controller::HTTP_OK);
		}

		else {
			$this->response(array("status"=> "0",
					"message"=> "No Task Found"
				), REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function views_get($id) {
		$disp=$this->app_model->task_details($id);

		if (count($disp) > 0) {
			$this->response(array("status"=> "1",
					"message"=> "Task Found",
					"data"=> $disp), REST_Controller::HTTP_OK);
		}

		else {
			$this->response(array("status"=> "0",
					"message"=> "No Task Found"
				), REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function taskupdate_put() {
		$data=json_decode(file_get_contents("php://input"));

		if (isset($data->id) && isset($data->task) && isset($data->progress)) {
			$id=$data->id;
			$task=$data->task;
			$progress=$data->progress;

			if ($this->app_model->update_task($id, $task, $progress)) {
				$this->response(array("status"=> "1",
						"message"=> "Task Changed"
					), REST_Controller::HTTP_OK);
			}

			else {
				$this->response(array("status"=> "0",
						"message"=> "Task didn't Change"
					), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
			}
		}

		else {
			$this->response(array("status"=> "0",
					"message"=> "Needed id, task, progress field "
				), REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function taskdelete_delete() {
		$data=json_decode(file_get_contents("php://input"));

		if (isset($data->taskid)) {
			$taskid=$data->taskid;

			if ($this->app_model->delete_task($taskid)) {
				$this->response(array("status"=> "1",
						"message"=> "Task Deleted"
					), REST_Controller::HTTP_OK);
			}

			else {
				$this->response(array("status"=> "0",
						"message"=> "Task didn't Deleted"
					), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
			}
		}

		else {
			$this->response(array("status"=> "0",
					"message"=> "Needed a taskid field"
				), REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function taskadd_post() {
		$data=json_decode(file_get_contents("php://input"));
		$task=isset($data->task) ? $data->task: " ";
		$userid=isset($data->user_id) ? $data->user_id: " ";

		if ( !empty($data->task) && !empty($data->userid)) {
			$task=$data->task;
			$userid=$data->userid;
			$progress=1;

			if ($this->app_model->post_task($task, $userid, $progress)) {
				$this->response(array("status"=> "1",
						"message"=> "Task Added"
					), REST_Controller::HTTP_OK);
			}

			else {
				$this->response(array("status"=> "0",
						"message"=> "Task  didn't Added",
						"error"=> "Enter existing userid "
					), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
			}
		}

		else {
			$this->response(array("status"=> "0",
					"message"=> "Needed task,userid fields"
				), REST_Controller::HTTP_NOT_FOUND);
		}
	}
}
