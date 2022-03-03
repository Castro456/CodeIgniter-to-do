<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_model extends CI_Model{

  public function view_data($user_id)
  {

    $this->db->select('task.id, task, time_kept, progress, firstname, lastname');
    $this->db->from('task_table task');
    $this->db->where('user.id',$user_id);
    $this->db->join('users_table user','task.user = user.id'); 
    $query = $this->db->get();
    return $query->result();

  }

}