<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/global.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" sizes="48x48" href="images/todolist.png">
    <title>To-Do List</title>
</head>

<?php 
 if (!empty($msg)) { ?>
    <div class="alert alert-danger pill1">
    <i class="bi bi-x-circle"></i> <?php echo $msg;
 }
?>

<body>

<div class="container ">
<div class="col-md-4">

<form class="form-container needs-validation"  action="<?= base_url('login/auth')?>" method="post">

<div class="form-group">         
  <h1 class="text-dark">Login</h1>
</div>

<div class="form-group">
  <i class="bi bi-person-circle"></i> 
<label class="text-dark">Email</label>
<input type="text" class="form-control" name="em"  id="email" value="<?= set_value('em')?>" />
 <?php echo form_error("em","<p class='text-danger'>","</p>") ?>
<?="<br>" ?>
</div>

<div class="form-group">
  <i class="bi bi-lock-fill"></i>
<label class="text-dark">Password</label>
<input type="password" class="form-control"  name="psr" id="pass">
  <?php echo form_error("psr","<p class='text-danger'>","</p>") ?>
</div> 

<div class="form-group">
  <label class="text-dark"></label>
 <button  type="submit" class="btn btn-success btn-block rounded-pill" id="log">
   Login
  </button>
</div>

<div class="form-row sign">
<p>First time here?</p>
<a href="<?= base_url('register')?>"> SignUp</a>
</div>

</div>
</div>
</form>

</body>
</html>