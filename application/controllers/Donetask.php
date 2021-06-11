<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donetask extends CI_Controller {
	
	public function index()
	{
    
     echo ('Model');
	}

  public function donedb()
  {
    $done =$this->input->post('id');    
		$this->load->model('donemodel'); 
    $response = $this->donemodel->index($done);
    if($response==true){
    redirect('viewtask');
    // $this->load->view("viewtaskview");
    echo "<div class='alert alert-success'> Done", "</div>";
  }
    else{
      return false;
    }
  }

}