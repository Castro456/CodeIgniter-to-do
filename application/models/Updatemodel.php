<?php

class Updatemodel extends CI_Model{
  
  public function index()
  {
    return "Models";
  }

  public function updatedb($id)
  {
    $this->db->select('id, task');
    $this->db->where('id', $id);
    $query = $this->db->get('task_table');
    return $query->result_array();
  }

  public function edit($idt,$task)
  {
    $this->db->set('task', $task);
    $this->db->where('id', $idt);
    $this->db->update('task_table'); 
  return true;
  }
}