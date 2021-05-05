<?php
class Deletemodel extends CI_Model{

  public function index($del){
    $this->db->where('id', $del);
    $this->db->delete('task_table');
  return true;
}
}
?>