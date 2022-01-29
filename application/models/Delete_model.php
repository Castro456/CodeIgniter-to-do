<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_model extends CI_Model{

  public function index($delete)
  {
    $this->db->where('id', $delete);
    return $this->db->delete('task_table');
  }
  
}
?>