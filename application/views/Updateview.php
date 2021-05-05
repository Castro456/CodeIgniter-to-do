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
<title>Update Data</title>
</head>
 
<body>
  <div class="container ">
  <div class="row justify-content-center"> 
  <div class="col-md-6">
	<form method="post" class="form-container2" action="<?php echo base_url('update/newupdate'); ?>" >
  
 <?php
  foreach($row = $data as $row)
  {
  ?>

		
  <div class="input-group">
  <input type="text" class="form-control" name="task" value="<?php echo $row['task'] ?>">
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
  <button class="btn btn-secondary" name="update" value="Update_Records" type="submit">Close</button>
  <button class="btn btn-success" action="<?php echo base_url('taskview'); ?>" type="submit">Update</button>
 </div>

	</form>
  </div>
  </div>
	</div>
  <?php }  ?>
</body>
</html>