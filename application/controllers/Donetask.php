<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donetask extends CI_Controller {
        
public function index()
{
    $done =$this->input->post('donevalue');    
    $progress = 2;
    $this->load->model('donemodel'); 
    $response = $this->donemodel->index($done,$progress);

    if($response)
    {
      redirect('viewtask');
    }
    else
    {
      $data['message'] = "Unable to done the Task";
      redirect('viewtask',$data);
    }
    
}

}
