<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deletetask extends CI_Controller {
	
	public function index()
	{
    
     echo ('Model');
	}

  public function deletedb()
  {
    $del =$this->input->get('id');    
		$this->load->model('deletemodel'); 
    $response = $this->deletemodel->index($del);
    if($response==true){
    redirect('viewtask');
  }
    else{
      return false;
    }
  }

}