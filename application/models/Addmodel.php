<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addmodel extends CI_Model{

  public function addtask($add_task,$userid,$progress)
  {
    $data = array(
      'task' => $add_task,
      'user' => $userid,
      'progress' => $progress
    );

    return $this->db->insert('task_table', $data);
  } 

}
?>