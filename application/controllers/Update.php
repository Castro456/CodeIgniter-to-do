<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('updatemodel');
  }

public function index()
{
  
  if ($this->session->userdata('username')) 
  {
    
    $id= $this->input->post('updatename');
    if(isset($id))
    {
      $display['data'] = $this->updatemodel->updatedb($id);
      if ($display)
      {
        $this->load->view('updateview',$display);        
      }
      else
      {
        redirect('viewtask');
      }  
    }
    else
    {
      redirect('viewtask');
    }

  }
  else 
  {
    redirect('login','refresh');
  }

}

public function updatetask()
{

  $task = $this->input->post('task');
  $id = $this->input->post('id');
  $response = $this->updatemodel->edit($id,$task);

  if($response)
  {
    redirect('viewtask');
  }
  else
  {
    $data['message'] = "Unable to update the Task";
    redirect('viewtask',$data);
  }

}

}