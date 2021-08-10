<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

  private $taskid;

  public function index()
  {
    $id= $this->input->post('updatename');
    $this->taskid = $id; 
    $this->load->model('updatemodel');
    $display['data'] = $this->updatemodel->updatedb($id);
    $this->load->view('updateview',$display);
  }

  public function newupdate()
  {
    $task = $_POST['task'];
    $idt = $_POST['id'];
    $this->load->model('updatemodel');
    $response = $this->updatemodel->edit($idt,$task);
    if($response==true){
      redirect('viewtask');
    }
      else{
        return false;
      }
  }
}