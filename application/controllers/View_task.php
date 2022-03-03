<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_task extends CI_Controller {

  public function index()
  {
    if ($this->session->userdata('user_validated') == true) 
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
        $error['message'] = "Nothing to display add some Task";
        $this->load->view('task_view',$error);
      }
      
    }
    else 
    {
      redirect('login','refresh');
    }
  }

}
?>
