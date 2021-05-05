<?php
class Viewmodel extends CI_Model{

  public function index()
  {
    return "Models";
  }

  public function viewdb()
  {
    $this->db->select('task_table.id, task, time_kept, progress, username');
    $this->db->from('task_table');
    $this->db->join('users_table','task_table.user = users_table.id'); 
    $query = $this->db->get();
    return $query->result() ;
  }
}