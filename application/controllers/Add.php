<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

  private $add;
  private $userid;
  private $status;

  public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');	
	}

  public function index(){
    $this->load->view('addview');
  }

  public function addfetch(){

    $this->form_validation->set_rules("add1","Task","required");
			if ($this->form_validation->run() == FALSE)
			{
			
			}
      else {
        $this->add = $_POST['add1'];
        $this->userid = $_SESSION["id"];
        $this->status = 1;
        try {
          $this->adddb();
          echo "<div class='alert alert-success'> Task Added", "</div>";
      } catch (Throwable $th) {
        echo  "<div class='alert alert-danger'> Message:"  .$e->getMessage();    
        echo "</div>";
      }
      }
      $this->index();
  }

  public function adddb(){
    $add = $this->add;
    $userid =$this->userid;
    $status = $this->status;
    $this->load->model('addmodel');
    $this->addmodel->addtask($add,$userid,$status);
  }
}