<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Add_model extends CI_Model{


  public function add_task($add_task,$user_id,$progress)
  {
    $data = array(
      'task' => $add_task,
      'user' => $user_id,
      'progress' => $progress
    );

    return $this->db->insert('task_table', $data);
  } 

}
?>