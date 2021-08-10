<?php
class App_model extends CI_Model{

  public function get_task(){
    $this->db->select('task_table.id, task, progress, username');
    $this->db->from('task_table');
    $this->db->join('users_table', 'task_table.user = users_table.id');
    $query = $this->db->get();
    return $query->result();
  }

    public function task_details($id){
    $this->db->select('task, progress');
    $this->db->from('task_table');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
  }

  public function update_task($id,$task,$progress){
    $this->db->set('task', $task);
    $this->db->set('progress', $progress);
    $this->db->where('id', $id);
    $this->db->update('task_table'); 
    return true;
  }

  public function delete_task($taskid){
    $this->db->where("id", $taskid);
    return $this->db->delete("task_table");
  }

  public function post_task($task,$userid,$progress){
    $content = array(
      'task' => $task,
      'user' => $userid,
      'progress' => $progress
    );
    return $this->db->insert("task_table",$content);
  }
}