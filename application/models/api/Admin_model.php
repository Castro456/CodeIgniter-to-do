<?php
class Admin_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }


  public function get_all_users()
  {
    $this->db->select('id,firstname,email,username');
    $this->db->from('users_table');
    $data = $this->db->get();
    return $data->result_array();
  }

  public function get_user_details($user_id,$email)
  {
    $this->db->select('firstname, lastname, email, phone');
    $this->db->from('users_table');
    $this->db->where('id',$user_id);
    $this->db->where('email',$email);
    $data = $this->db->get();
    return $data->row_array();
  }

  public function set_first_name($first_name,$email,$user_id)
  {
    $data = array(
      'firstname' => $first_name
    );
    $this->db->where('id',$user_id);
    $this->db->where('email',$email);
    return $this->db->update('users_table',$data);
  }


  public function set_last_name($last_name,$email,$user_id)
  {
    $data = array(
      'lastname' => $last_name
    );
    $this->db->where('id',$user_id);
    $this->db->where('email',$email);
    return $this->db->update('users_table',$data);
  }


  public function set_phone_number($phone,$email,$user_id)
  {
    $data = array(
      'phone' => $phone
    );
    $this->db->where('id',$user_id);
    $this->db->where('email',$email);
    return $this->db->update('users_table',$data);
  }


  public function set_email($email,$phone,$user_id)
  {
    $data = array(
      'email' => $email
    );
    $this->db->where('id',$user_id);
    $this->db->where('phone',$phone);
    return $this->db->update('users_table',$data);
  }


  public function check_existing_phone($phone)
  {
    $this->db->select('phone');
    $this->db->where('phone',$phone);
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
  
}
?>