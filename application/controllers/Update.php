<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('update_model');
  }


public function index()
{
  
  if ($this->session->userdata('user_validated') == true) 
  {
    
    $id= $this->input->post('update_id');

    if(isset($id))
    {
      $display['data'] = $this->update_model->get_task($id);

      if ($display)
      {
        $this->load->view('update_view',$display);        
      }

      else
      {
        redirect('view_task');
      }  

    }

    else
    {
      redirect('view_task');
    }

  }

  else 
  {
    redirect('login','refresh');
  }

}

public function edit_task()
{

  $task = $this->input->post('task');
  $id = $this->input->post('id');
  $response = $this->update_model->update_task($id,$task);

  if($response)
  {
    redirect('view_task');
  }
  
  else
  {
    $data['message'] = "Unable to update the Task";
    redirect('view_task',$data);
  }

}

}