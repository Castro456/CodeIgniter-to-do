<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('user_validated') == true)
        {
            $this->load->view("profile_view");
        }

        else
        {
            redirect('login');
        }

    }

}