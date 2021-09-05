<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deletemodel extends CI_Model{

  public function index($delete)
  {
    $this->db->where('id', $delete);
    return $this->db->delete('task_table');
  }
  
}
?>