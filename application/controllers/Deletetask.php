<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deletetask extends CI_Controller {
	
	public function index()
	{
    $delete =$this->input->post('deteletask');    
		$this->load->model('deletemodel'); 
    $response = $this->deletemodel->index($delete);
    if($response)
    {
      redirect('viewtask');
    }
    else{
      $data['message'] = "Unable to delete the Task";
      redirect('viewtask',$data);  
    }
	}

}