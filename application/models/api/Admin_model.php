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
}
?>