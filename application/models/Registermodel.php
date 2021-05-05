<?php

class Registermodel extends CI_Model{

  public function index()
  {
    return "Models";
  }

  public function registeremail($email1){
    $this->db->select('email');
    $this->db->where('email',$email1);
    $query = $this->db->get('users_table');
    return $query->result_array();
  }

  public function registeruser($name,$usrmail,$usrname,$usrpass,$usrdob,$usrage)
  {
    $data = array(
      'firstname' => $name,
      'email' => $usrmail,
      'username' => $usrname,
      'pass_word' => $usrpass,
      'dob' => $usrdob,
      'age' => $usrage
);
    $this->db->insert('users_table', $data);
  }
}

