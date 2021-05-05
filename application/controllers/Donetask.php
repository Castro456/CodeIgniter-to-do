<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donetask extends CI_Controller {
	
	public function index()
	{
    
     echo ('Model');
	}

  public function donedb()
  {
    $done =$this->input->get('id');    
		$this->load->model('donemodel'); 
    $response = $this->donemodel->index($done);
    if($response==true){
    redirect('viewtask');
  }
    else{
      return false;
    }
  }

}