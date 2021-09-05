<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewmodel extends CI_Model{

  public function viewdb($username)
  {
    $this->db->select('task.id, task, time_kept, progress, username');
    $this->db->from('task_table task');
    $this->db->where('username',$username);
    $this->db->join('users_table user','task.user = user.id'); 
    $query = $this->db->get();
    return $query->result();
  }

}