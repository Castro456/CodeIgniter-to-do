<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function index($message = null)
  {

    $data['message'] = $message;

    if($this->session->userdata('user_validated') == true)
    {
      $this->load->view('api_view',$data); 
    }

    else 
    {
      redirect('login','refresh');
    }

  }
}