<?php

class Loginmodel extends CI_Model{
  
  public function index()
  {
    return "Models";
  }

  public function logindb($check_email)
  {
    $this->db->select('id,email,pass_word,username');
    $this->db->where('email', $check_email);
    $query = $this->db->get('users_table');
    return $query->result_array();
  }
}