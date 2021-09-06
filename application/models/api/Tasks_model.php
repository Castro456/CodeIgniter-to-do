<?php
class Tasks_model extends CI_Model
{
  /**
   * To get all the Tasks
   * used in method view_get()
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
   * To get a specfic Task
   * used in method oneview_get()
  */
  public function get_task($id)
  {
    $this->db->select('task, progress');
    $this->db->from('task_table');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
  }


  /**
   * To Update a Task
   * used in method taskupdate_put()
  */
  public function update_task($id,$task)
  {
    $data = array(
      'task' => $task
    );
    $this->db->where('id', $id);
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
   * To Delete a Task
   * used in method taskdelete_delete()
  */
  public function delete_task($taskid)
  {
    $this->db->where("id", $taskid);
    $result = $this->db->delete("task_table");
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
   * To Add a Task
   * used in method taskadd_post()
  */
  public function add_task($userid,$task)
  {
    $content = array(
      'user' => $userid,
      'task' => $task
    );
    $result = $this->db->insert("task_table",$content);

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
   * To Update a Task status
   * used in method task_status_put()
  */
  public function task_status($task_id,$progress)
  {
    $data = array(
      'progress' => $progress
    );

    $this->db->where("id",$task_id);
    $result = $this->db->update("task_table",$data);
    return $result;

  }


} //End of Tasks_model