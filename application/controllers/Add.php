<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {


  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');	
  }


  public function index($message = null)
  {

    $data['message'] = $message;

    if($this->session->userdata('user_name'))
    {
      $this->load->view('add_view',$data); 
    }

    else 
    {
      redirect('login','refresh');
    }

  }


  public function user_task()
  {

    $this->form_validation->set_rules("task","Task","required");

    if ($this->form_validation->run() == FALSE)
    {
      $this->index();
    }

    else 
    {

      $add_task = $this->input->post('task');
      $add_task   = trim($add_task);
      $add_task   = $this->security->xss_clean($add_task);

      if (!isset($add_task))
      {
        $message = "Enter a Task";
        $this->index($message);
      }
      else 
      {
        $user_id = $this->session->userdata('user_id');

        $progress = 1;

        $this->load->model('add_model');
        $verify = $this->add_model->add_task($add_task,$user_id,$progress);

        if ($verify)
        {
          $message = "Task Added";
          $this->index($message);
        }

        else 
        {
          $message = "Task not added";
          $this->index($message);
        }

      }

    }

  }

}