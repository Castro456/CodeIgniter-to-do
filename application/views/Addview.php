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
    <title>Add Task</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/global.css'); ?>">
</head>

<body>

<nav class="navbar navbar-light" style="background-color: #d1dbda">
    <a class="navbar-brand" href="<?php echo base_url('loggeduser');?>">Back</a>
</nav>

<div class="container ">
<div class="row justify-content-center">
<form name="addform" class="add-container" action="<?php echo base_url().'add/addfetch'?>" id="addform" method="post">
<!-- action="classes/add.classes.php" -->

<div class="form-group">
<textarea class="form-controladd" aria-label="With textarea" name="add1" id="text"></textarea>
<?php echo form_error("add1","<div class='alert alert-danger'>","</div>") ?>
</div>

<div class="align-self-end ml-auto">
<button type="submit" class="btn btn-danger rounded-pill " id="addbtn" >Add</button>

</div>
</div>
</div>
</form>

</body>
</html>