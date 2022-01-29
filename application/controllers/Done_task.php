<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Done_task extends CI_Controller {
        
public function index()
{

    $done_id =$this->input->post('done_id');    
    $progress = 2;
    $this->load->model('done_model'); 
    $response = $this->done_model->index($done_id,$progress);

    if($response)
    {
      redirect('view_task');
    }

    else
    {
      $data['message'] = "Unable to Done the Task";
      redirect('view_task',$data);
    }
    
}

}
