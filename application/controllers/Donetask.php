<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donetask extends CI_Controller {
	
	public function index()
	{
        $done =$this->input->post('donevalue');    
        echo ($done);
        $progress = 2;
        $this->load->model('donemodel'); 
        $response = $this->donemodel->index($done,$progress);
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