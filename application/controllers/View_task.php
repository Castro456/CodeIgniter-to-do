<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_task extends CI_Controller {

  public function index($message = null)
  {
    $data['row'] = null;
    $data['message'] = $message;

    if ($this->session->userdata('user_name')) 
    {

      $user_id = $this->session->userdata('user_id');
      $this->load->model('view_model');
      $data['row'] = $this->view_model->view_data($user_id);

      if ($data['row'])
      {
        $this->load->view('task_view',$data);
      }

      else
      {
        $data['message'] = "Nothing to display add some Task";
        $this->load->view('task_view',$data);
      }
      
    }
    else 
    {
      redirect('login','refresh');
    }
  }

}
?>
