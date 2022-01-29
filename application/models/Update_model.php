<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_model extends CI_Model
{

  public function get_task($id)
  {
    $this->db->select('id, task');
    $this->db->where('id', $id);
    $query = $this->db->get('task_table');
    return $query->row_array();
  }

  public function update_task($id,$task)
  {
    $this->db->set('task', $task);
    $this->db->where('id', $id);
    return $this->db->update('task_table');
  }

}