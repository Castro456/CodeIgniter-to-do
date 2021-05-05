<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewtask extends CI_Controller {

  public function index()
  {
    
    $this->load->model('viewmodel');
    $data['row'] = $this->viewmodel->viewdb();
    $this->load->view('viewtaskview',$data);
  }
}
?>
