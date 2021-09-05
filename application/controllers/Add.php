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

    if($this->session->userdata('username'))
    {
      $this->load->view('addview',$data); 
    }
    else {
      redirect('login','refresh');
    }
  }

  public function addfetch()
  {
    $this->form_validation->set_rules("taskadd","Task","required");

      if ($this->form_validation->run() == FALSE)
      {
        $this->index();
      }
      else {
        $add_task = $this->input->post('taskadd');
        $add_task   = trim($add_task);
        $add_task   = $this->security->xss_clean($add_task);

        $userid = $this->session->userdata('id');

        $progress = 1;

        $this->load->model('addmodel');
        $verify = $this->addmodel->addtask($add_task,$userid,$progress);

        if ($verify) {
          $message = "Task Added";
          $this->index($message);
        }
        else {
          $message = "Task not added";
          $this->index($message);
        }
      }

  }

}