<?php

class Donemodel extends CI_Model{
  
  public function index($done)
  {
    $this->db->set('progress', 2);
    $this->db->where('id', $done);
    $this->db->update('task_table'); 
  return true;
 
  }
}