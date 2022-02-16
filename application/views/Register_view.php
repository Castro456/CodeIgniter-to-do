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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    
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
<div class="d-flex justify-content-center"> 
<!-- row -->
<form  class="form-container1" action="register/validate" method="post">
<!-- form-container1 -->
<div class="mx-auto mb-4" ">
<h1 class="text-dark">Sign-up</h1>
</div> 


<div class="form-row">
<div class="col-md-5 mb-4 ">
<label class="text-dark">Name</label>
<input type="text" class="form-control" name="firstname" placeholder="Your Name" value="<?= set_value('firstname')?>"> </input>
<?php echo form_error("firstname","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-5 mb-4 ">
<label class="text-dark">Email</label>
<input type="text" class="form-control" name="email" placeholder="Your Email" value="<?= set_value('email')?>">
<?php echo form_error("email","<p class='text-danger'>","</p>") ?> </input>
</div>
</div>

<div class="form-row">
<div class="col-md-5 mb-4 ">
<label class="text-dark">Username</label>
<input type="text" class="form-control" name="usr" placeholder="Name that you would like to Call" value="<?= set_value('usr')?>"></input>
<?php echo form_error("usr","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-5 mb-3">
<label class="text-dark">Password</label>
<input type="password" class="form-control" name="psr" placeholder="Minimum of 6 characters" value="<?= set_value('psr')?>"></input>
<?php echo form_error("psr","<p class='text-danger'>","</p>") ?>
</div>
<!-- </div> -->

<!-- <div class="form-row"> -->
<div class="col-md-5 mb-3">
<label class="text-dark">Confirm Password</label>
<input type="password" class="form-control" name="confirm_password" placeholder="Re-enter the Password" value="<?= set_value('confirm_password')?>"></input>
<?php echo form_error("confirm_password","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-3 mb-4">
<label class="text-dark">DateofBirth</label>
<input type="date" class="form-control" id="dob" name="dob"  placeholder="Provide your DOB" value="<?= set_value('dob')?>"></input>
<?php echo form_error("dob","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-3 mb-4">
<label class="text-dark">Age</label>
<input type="text" class="form-control" style="background : transparent;" id="calage" name="age" readonly placeholder="Atleast 1"  value="<?= set_value('age')?>"></input>
<?php echo form_error("age","<p class='text-danger'>","</p>") ?>
</div>
</div>



<div class="mx-auto mb-4" style="width: 480px;">
<button  class="btn rounded-pill create" name="create">Create</button>
</div>

<p class="mx-auto mb-2" class="text-grey" style="width: 410px;">
Already has an account -
<a style="text-decoration:none" href="login">
<font s color="#434ADA";>Login</font>
</a>
</p>

</div>
</div>
</form>

<script src="https://code.jquery.com/jquery-latest.min.js">
</script>
<script src="<?php echo base_url('./js/agecal.js'); ?>">
</script>

</body>
</html>