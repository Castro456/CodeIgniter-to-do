<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewtask extends CI_Controller {

  public function index()
  {
    $this->load->model('viewmodel');
    $data['row'] = $this->viewmodel->viewdb();
    $this->load->view('viewtaskview',$data);
  }

  //  public function donedb()
  // {
  //   $done =$this->input->post('id');    
	// 	$this->load->model('donemodel'); 
  //   $response = $this->donemodel->index($done);
  //   if($response==true){
  //   // redirect('viewtask');
  //   $this->index();
  //   echo "<div class='alert alert-success'> Done", "</div>";
  // }
  //   else{
  //     return false;
  //   }
  // }
  
}
?>
