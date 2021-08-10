<?php

class Donemodel extends CI_Model{
  
  public function index($done,$progress)
  {
    $this->db->set('progress', $progress);
    $this->db->where('id', $done);
    $this->db->update('task_table'); 
  return true;
 
  }
}