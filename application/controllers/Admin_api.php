<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_api extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model("login_model");
  }

  public function generate_api_key()
  {
    // $jwt = new JWT();
    $user_id = $this->session->userdata('user_id');
    $user_name = $this->session->userdata('user_name');
    $api_data = array(
      'user_id' => $user_id,
      'user_name' => $user_name
    );
    $secret_key = "zac";
    // $token['user_id'] = "1";
    $encoded = JWT::encode($api_data,$secret_key);
    echo $encoded;
  }

  
  public function sample_post()
  {
    echo "Hello";
  }

  
}
?>