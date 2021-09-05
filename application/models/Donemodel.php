<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donemodel extends CI_Model{
  
  public function index($done,$progress)
  {
    $this->db->set('progress', $progress);
    $this->db->where('id', $done);
    return $this->db->update('task_table'); 
  }

}