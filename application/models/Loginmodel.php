<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model{

  public function check_email($check_email)
  {
    $this->db->select('email');
    $this->db->where('email', $check_email);
    $query = $this->db->get('users_table');
    $data = $query->row_array();
    if ($data)
    {
      return true;
    }
    else
    {
       return false;
    }
  }

  public function get_password($check_email)
  {
    $this->db->select('id, pass_word, username');
    $this->db->where('email',$check_email);
    $query = $this->db->get('users_table');
    return $data = $query->row_array();
  }
  
}