<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="<?= base_url(); ?>">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="icon" type="image/png"  href="images/todoapp.png">

<title>To-Do List</title>

</head>

<nav class="navbar navbar-light">
  <a class="navbar-brand" href="home">
    <img src="images/back-arrow.png" width="28" height="28" class="d-inline-block align-top" style="text-decoration:none">
    Back
  </a>
  
  <form class="form-inline">
    <a href="profile">
      <img src="images/avatar.png" width="40" height="40" class="d-inline-block align-top mr-1">
    </a> 
      <?php echo $this->session->userdata('user_fname')?>    
    <a class="btn btn-danger my-2 my-sm-0 rounded-pill ml-3" href="login/unset_session" role="button">
      <i class="bi bi-door-open"></i>
      Logout</a>
    </a>      
  </form>
</nav>

<body>

<table class="table table-bordered">

<thead class="table-top">
<tr>
<th colspan="9" ><h1 class="taskcenter">Tasks</h1></th>
</tr >
<tr>
  <th class="taskcenter" scope="col">Id</th>
  <th class="taskcenter" scope="col">Task</th>
  <th class="taskcenter" scope="col">Date</th>
  <th class="taskcenter" scope="col">Time</th>
  <th class="taskcenter" scope="col">User</th>
  <th class="taskcenter" scope="col">Status</th>
  <th class="taskcenter" scope="col">Edit</th>
  <th class="taskcenter" scope="col">Delete</th>
  <th class="taskcenter" scope="col">Done</th>
</tr>
</thead>

<tbody id="table" >


<?php
if (empty($message)) {
 $i=1;
 foreach($row as $rows)  
 {  
?>

  <tr id= "<?php   echo $rows->id ?>">

  <!-- Datum -->
  <td class="table-light taskcenter" data-target="id"><?php echo $rows->id ?></td>
  <td class="table-light taskcenter" data-target="task"><?php echo $rows->task ?></td>
  <td class="table-light taskcenter" data-target="date"><?php echo date("d/m/Y", strtotime($rows->time_kept)) ?></td>
  <td class="table-light taskcenter" data-target="time"><?php echo date("H:i", strtotime($rows->time_kept)) ?></td>
  <td class="table-light taskcenter"  data-target="username"><?php echo $rows->firstname ." ". $rows->lastname ?></td>
  <td class="table-light taskcenter"  data-target="progress"><?php echo $rows->progress?></td>  

   <!-- Update Task -->
  <td  class="table-light taskcenter">
  <form action="update" method="post">
  <input type="hidden" name="update_id" value="<?php echo $rows->id?>">
  <button  class="btn btn-warning"  name="update" type="submit" ><i class="bi bi-pencil"></i></button>
  </form>
  </td>

  <!-- Delete Task -->
  <td class="table-light taskcenter">
  <form action="delete_task" method="post"> 
  <input type="hidden" name="delete_id" value="<?php echo $rows->id?>">
  <button  class="btn btn-danger" name="delete" ><i class="bi bi-x"></i></button>
  </form>
  </td>

  <!-- Done Task -->
  <td class="table-light taskcenter">
  <form action="done_task" method="post">
  <input type="hidden" name="done_id" value="<?php echo $rows->id?>">
  <button  class="btn btn-success"  name="done" ><i class="bi bi-check2"></i></button>
  </form>
  </td>


  </tr>
<?php
$i++;
}  //end of foreach
}  //end of if ?>

</tbody>
</table> 
<?php
if(!empty($message)) { ?>
 <div class="alert nothing-task" role="alert">
  <i class="bi bi-exclamation-lg"></i>
 <?php echo $message;
}
?>
</div>

<!-- Modal -->
<div class="modal fade " id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <div class="form-group">
    <label>Task</label>
    <input type="text" id="task" class="form-control">
    </div>
    <input type="hidden" id="userid" class="form-control">
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
    <button type="button" id="save" action="<?php echo base_url('update'); ?>" class="btn btn-success rounded-pill">Save changes</button>
    </div>
    </div>
    </div>
</div>
<!-- End of Model -->

</body>
</html>
