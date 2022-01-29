<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Done_model extends CI_Model{
  
  public function index($done_id,$progress)
  {
    $this->db->set('progress', $progress);
    $this->db->where('id', $done_id);
    return $this->db->update('task_table'); 
  }

}