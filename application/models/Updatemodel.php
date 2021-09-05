<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updatemodel extends CI_Model{

  public function updatedb($id)
  {
    $this->db->select('id, task');
    $this->db->where('id', $id);
    $query = $this->db->get('task_table');
    return $query->row_array();
  }

  public function edit($id,$task)
  {
    $this->db->set('task', $task);
    $this->db->where('id', $id);
    return $this->db->update('task_table');
  }
}