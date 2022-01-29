<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Register_model extends CI_Model{


  public function check_existing_email($email)
  {
    $this->db->select('email');
    $this->db->where('email',$email);
    $query = $this->db->get('users_table');
    $verify = $query->row_array();

    if ($verify)
    {
      return true;
    }

    else
    {
      return false;
    }

  }


  public function add_user($name,$email,$username,$password,$dob,$age)
  {

    $data = array(
      'firstname' => $name,
      'email' => $email,
      'username' => $username,
      'pass_word' => $password,
      'dob' => $dob,
      'age' => $age
    );
    
    return $this->db->insert('users_table', $data);

  }
}

