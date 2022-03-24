<?php

class Tasks_model extends CI_Model
{
  /**
   * 
   * To get all the Tasks
   * 
  */
  public function get_all_task()
  {
    $this->db->select('task.id, task, progress, username');
    $this->db->from('task_table task');
    $this->db->join('users_table users', 'task.user = users.id');
    $query = $this->db->get();
    return $query->result();
  }


  /**
   * 
   * To get a user specific Task
   * 
  */
  public function get_task($id)
  {
    $this->db->select('id, task, time_kept, progress');
    $this->db->from('task_table');
    $this->db->where('user',$id);
    $query = $this->db->get();
    return $query->result_array();
  }


  /**
   * 
   * To Update a Task
   * 
  */
  public function update_task($task_id,$task,$user_id)
  {
    $data = array(
      'task' => $task
    );

    $this->db->where('id', $task_id);
    $this->db->where('user', $user_id);
    $result = $this->db->update('task_table',$data);

    if($result)
    {
      return TRUE;
    }
    else 
    {
      return FALSE;
    }
  }


  /**
   * 
   * To Delete a Task
   * 
  */
  public function delete_task($user_id,$task_id)
  {
    $this->db->select('id');
    $this->db->from('task_table');
    $this->db->where("id", $task_id);
    $this->db->where("user", $user_id);
    $check = $this->db->get();
    $result = $check->row();
    if ($result)
    {
      $this->db->where("id", $task_id);
      $delete = $this->db->delete("task_table");
      return TRUE;
    }
    else 
    {
      return FALSE;
    }
  }


  /**
   * 
   * To Add a Task
   * 
  */
  public function add_task($user_id,$task)
  {
    $data = array(
      'user' => $user_id,
      'task' => $task
    );
    $result = $this->db->insert("task_table",$data);

    if ($result)
    {
      return TRUE;
    }
    else 
    {
      return FALSE;
    }
  }
  

  /**
   * 
   * To Update a Task Progress
   * 
  */
  public function update_progress($task_id,$progress)
  {
    $data = array(
      'progress' => $progress
    );

    $this->db->where("id",$task_id);
    $result = $this->db->update("task_table",$data);
    
    if ($result)
    {
      return TRUE;
    }
    else 
    {
      return FALSE;
    }

  }


  /**
   * 
   * Get only task, progress for updating the task
   * 
   */
  public function get_task_and_progress($task_id,$user_id)
  {
    $this->db->select('task, progress');
    $this->db->from('task_table');
    $this->db->where('id',$task_id);
    $this->db->where('user',$user_id);
    $data = $this->db->get();
    return $data->row_array();
  }


} //End of Tasks_model