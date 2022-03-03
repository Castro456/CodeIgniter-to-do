<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login_model extends CI_Model{


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


  public function get_user_password($email1)
  {

    $this->db->select('pass_word');
    $this->db->where('email',$email1);
    $query = $this->db->get('users_table');
    $data = $query->row_array();
    return $data['pass_word'];

  }


  public function check_password($db_password,$password)
  {
    
    $login = false;

    if (password_verify($password,$db_password))
    {
      $login = true;
      return $login;
    }

    else 
    {
      return $login;
    }

  }
  

  public function get_user_details($email)
  {

    $this->db->select('id, firstname, lastname, phone, dob, age');
    $this->db->where('email',$email);
    $query = $this->db->get('users_table');
    return $data = $query->row_array();

  }
}