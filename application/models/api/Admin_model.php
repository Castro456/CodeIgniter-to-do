<?php

/**
 * 
 * This Class contains methods related to admin model
 * @author Castro456 <castrosid456@gmail.com>
 * 
 */
class Admin_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }


  /**
   * 
   * To get all users from the database
   * 
   */
  public function get_all_users()
  {
    $this->db->select('id,firstname,lastname,email');
    $this->db->from('users_table');
    $data = $this->db->get();
    return $data->result_array();
  }


  /**
   * 
   * To get user details
   * Parameters : $user_id, $email
   * 
   */
  public function get_user_details($user_id,$email)
  {
    $this->db->select('firstname, lastname, email, phone, dob, age');
    $this->db->from('users_table');
    $this->db->where('id',$user_id);
    $this->db->where('email',$email);
    $data = $this->db->get();
    return $data->row_array();
  }


  /**
   * 
   * To update user first name
   * Parameters : $first_name, $email, $user_id
   * 
   */
  public function set_first_name($first_name,$email,$user_id)
  {
    $data = array(
      'firstname' => $first_name
    );
    $this->db->where('id',$user_id);
    $this->db->where('email',$email);
    return $this->db->update('users_table',$data);
  }


  /**
   * 
   * To update user last name
   * Parameters : $last_name, $email, $user_id
   * 
   */
  public function set_last_name($last_name,$email,$user_id)
  {
    $data = array(
      'lastname' => $last_name
    );
    $this->db->where('id',$user_id);
    $this->db->where('email',$email);
    return $this->db->update('users_table',$data);
  }


  /**
   * 
   * To update user phone number
   * Parameters : $phone, $email, $user_id
   * 
   */
  public function set_phone_number($phone,$email,$user_id)
  {
    $data = array(
      'phone' => $phone
    );
    $this->db->where('id',$user_id);
    $this->db->where('email',$email);
    return $this->db->update('users_table',$data);
  }


  /**
   * 
   * To update user email
   * Parameters : $email, $phone, $user_id
   * 
   */
  public function set_email($email,$phone,$user_id)
  {
    $data = array(
      'email' => $email
    );
    $this->db->where('id',$user_id);
    $this->db->where('phone',$phone);
    return $this->db->update('users_table',$data);
  }


  /**
   * 
   * To checking for duplicate phone number before updating
   * Parameters : $phone
   * 
   */
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


  /**
   * 
   * To update user date of birth
   * Parameters : $dob, $email, $user_id
   * 
   */
  public function set_dob($dob,$email,$user_id)
  {
    $data = array(
      'dob' => $dob
    );
    $this->db->where('id',$user_id);
    $this->db->where('email',$email);
    return $this->db->update('users_table',$data);
  }


  /**
   * 
   * To update user age
   * Parameters : $age, $email, $user_id
   * 
   */
  public function set_age($age,$email,$user_id)
  {
    $data = array(
      'age' => $age
    );
    $this->db->where('id',$user_id);
    $this->db->where('email',$email);
    return $this->db->update('users_table',$data);
  }
  
}
?>