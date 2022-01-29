<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= base_url(); ?>">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png"  href="images/todoapp.png">
    
    <title>To-Do List</title>
</head>

 <?php
 if (!empty($message)) { ?>
     <div class="alert alert-danger pill2"> 
    <i class="bi bi-x-circle"></i> <?php echo $message; 
 }
?>

<body>

<div class="container ">
<div class="row justify-content-center"> 

<form  class="form-container1" action="register/validate" method="post">

<div class="form-row">
<h1 class="text-dark">Register</h1>
</div> 

<div class="form-row">
<p>Already an user?</p>
<a href="<?= base_url('login')?>">Login</a>
</div> 

<div class="form-row">
<div class="col-md-6 mb-3">
<label class="text-dark">Firstname</label>
<input type="text" class="form-control" name="firstname" placeholder="Enter your first name" value="<?= set_value('firstname')?>">
<?php echo form_error("firstname","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-6 mb-3">
<label class="text-dark">Email</label>
<input type="text" class="form-control" name="email" placeholder="Enter your email address" value="<?= set_value('email')?>">
<?php echo form_error("email","<p class='text-danger'>","</p>") ?>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-3">
<label class="text-dark">Username</label>
<input type="text" class="form-control" name="usr" placeholder="Provide a Username maximum of 6 characters" value="<?= set_value('usr')?>">
<?php echo form_error("usr","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-3 mb-3">
<label class="text-dark">Password</label>
<input type="password" class="form-control" name="psr" placeholder="Mininum of 6 characters" value="<?= set_value('psr')?>">
<?php echo form_error("psr","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-3 mb-3">
<label class="text-dark">DateofBirth</label>
<input type="date" class="form-control" id="dob" name="dob"  placeholder="Provide your DOB" value="<?= set_value('dob')?>">
<?php echo form_error("dob","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-3 mb-3">
<label class="text-dark">Age</label>
<input type="text" class="form-control" id="calage" name="age" readonly placeholder="Age must be atleast 1"  value="<?= set_value('age')?>">
<?php echo form_error("age","<p class='text-danger'>","</p>") ?>
</div>
</div>

<div class="col-md-12 mb-3">
<button  class="btn btn-success btn-block rounded-pill create" name="create">Create</button>
</div>

</div>
</div>
</form>

<script src="https://code.jquery.com/jquery-latest.min.js">
</script>
<script src="<?php echo base_url('./js/agecal.js'); ?>">
</script>

</body>
</html>