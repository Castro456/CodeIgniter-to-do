<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewtask extends CI_Controller {

  public function index($message = null)
  {
    $data['row'] = null;
    $data['message'] = $message;

    if ($this->session->userdata('username')) 
    {
      $username = $this->session->userdata('username');
      $this->load->model('viewmodel');
      $data['row'] = $this->viewmodel->viewdb($username);

      if ($data['row']) {
        $this->load->view('viewtaskview',$data);
      }
      else {
        $data['message'] = "Nothing to display add some Task";
        $this->load->view('viewtaskview',$data);
      }
      
    }
    else {
      redirect('login','refresh');
    }
  }

}
?>
