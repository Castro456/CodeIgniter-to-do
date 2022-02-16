<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Admin_api extends REST_Controller
{


  public function __construct()
  {
    parent::__construct();
    // $this->load->model("login_model");
  }

  public function generate_api_key_get()
  {
    // $jwt = new JWT();
    $user_id = $this->session->userdata('user_id');
    $user_name = $this->session->userdata('user_name');
    $payload = array(
      'user_id' => $user_id,
      'user_name' => $user_name
    );
    $secret_key = "zac";
    // $token['user_id'] = "1";
    $encoded = JWT::encode($payload,$secret_key);
    return $encoded;
  }



}
?>