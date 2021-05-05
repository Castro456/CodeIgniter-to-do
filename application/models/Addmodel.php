<?php

class Addmodel extends CI_Model{

  public function index()
  {
    return "Models";
  }

  public function addtask($add,$userid,$status)
  {
    $data = array(
      'task' => $add,
      'user' => $userid,
      'progress' => $status
    );
    $this->db->insert('task_table', $data);
  } 
}?>