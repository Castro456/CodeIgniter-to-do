<?php

class Addmodel extends CI_Model{

  public function index()
  {
    return "Models";
  }

  public function addtask($add,$userid)
  {
    $data = array(
      'task' => $add,
      'user' => $userid,
      'progress' => 2
    );
    $this->db->insert('task_table', $data);
  } 
}?>