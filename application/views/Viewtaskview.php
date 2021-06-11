<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($_SESSION["username"]))  
{  
  redirect('loggeduser');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/global.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">


</head>
<body>
<div id="msg">
</div>
<nav class="navbar navbar-light" style="background-color: #d1dbda">
  <a class="navbar-brand" href="<?php echo base_url('loggeduser'); ?>">Back</a>
</nav> 
<div class="alert-success" id="msg">
</div> 
<div class="container ">
<table class="table table-hover table-light">
<thead class="thead-dark">
<tr>
<th colspan="9" ><h1>Tasks</h1></th>
</tr>
<tr>
  <th scope="col">No</th>
  <th scope="col">Task</th>
  <th scope="col">Date</th>
  <th scope="col">Time</th>
  <th scope="col">User</th>
  <th scope="col">Status</th>
  <th scope="col">Edit</th>
  <th scope="col">Delete</th>
  <th scope="col">Done</th>
</tr>
</thead>

<tbody id="table" >

<?php 
$i=1;
foreach($row as $rows)  
{  
?>

<tr id= "<?php   echo $rows->id ?>">
<td class="table-dark" data-target="id"><?php echo $i ?></td>
<td class="table-warning" data-target="task"><?php echo $rows->task ?></td>
<td class="table-info" data-target="date"><?php echo date("d/m/Y", strtotime($rows->time_kept)) ?></td>
<td class="table-warning" data-target="time"><?php echo date("H-i", strtotime($rows->time_kept)) ?></td>
<td class="table-success"  data-target="username"><?php echo $rows->username ?></td>
<td class="table-dark"  data-target="progress"><?php echo $rows->progress?></td>  
<!-- date("d-m-Y", strtotime($rows->time_kept)) -->
<td  class="table-warning">
<!-- <a href='update?id=<?php //echo $rows->id?>' > -->
<form action="<?= base_url().'update' ?>" method="post">
<input type="hidden" name="updatename" value="<?php echo $rows->id?>">
<button  class="btn btn-warning rounded-pill editbtn "  name="done" >Update </button>
</form>
</td>

<td class="table-danger">
  <?php //$_POST['up'] = $rows->id ?>
<a href='deletetask/deletedb?id=<?php echo $rows->id?>' >
<button  class="btn btn-danger rounded-pill deletebtn" name="delete" >Delete </button>
</a>
</td>

<!-- 
<a href='donetask/donedb?id=<?php //echo $rows->id?>' > -->
<td class="table-success">
<form action="<?= base_url().'donetask/donedb' ?>" method="post">
<input type="hidden" name="done" value="<?php echo $rows->id?>">
<button  class="btn btn-success rounded-pill donebutton "  name="done" >Done </button>
<!-- </a> -->
</form>
</td>

</tr>
<?php
$i++;
}
?>
</tbody>

</table> 
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


</body>
</html>