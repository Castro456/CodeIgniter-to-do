<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index()
  {

   if($this->session->userdata('user_name'))
   {
     $this->load->view('home_view'); 
   }

   else 
   {
     redirect('login','refresh');
   }

  }
  
}