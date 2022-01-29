<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_task extends CI_Controller {
  
  public function index()
  {

    $delete_id =$this->input->post('delete_id');    
    $this->load->model('delete_model'); 
    $response = $this->delete_model->index($delete_id);

    if($response)
    {
      redirect('view_task');
    }

    else
    {
      $data['message'] = "Unable to delete the Task";
      redirect('view_task',$data);  
    }

  }

}