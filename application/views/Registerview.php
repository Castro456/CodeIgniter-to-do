<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_SESSION["username"]))  
{  
  redirect('loggeduser');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/global.css'); ?>">  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/pikaday.css'); ?>">
    
    <title>Register</title>
</head>

<body>

<div class="container ">
<div class="row justify-content-center"> 

<form  class="form-container1" action="<?php echo base_url().'register/loadregister'?>" method="post">
<!-- action="includes/register.includes.php" -->

<div class="form-row">
<h1 class="text-dark">Register</h1>
</div> 

<div class="form-row">
<p>Already has an Account....</p>
<a href="<?php echo base_url().'home'?>">Login</a>
</div> 

<div class="form-row">
<div class="col-md-6 mb-3">
<label class="text-dark">Name</label>
<input type="text" class="form-control firstname" name="firstname" placeholder="Enter your full name" value="<?= set_value('firstname')?>">
<?php echo form_error("firstname","<div class='alert alert-danger'>","</div>") ?>
</div>

<div class="col-md-6 mb-3">
<label class="text-dark">Email</label>
<input type="text" class="form-control email" name="email" placeholder="Enter your email address" value="<?= set_value('email')?>">
<?php echo form_error("email","<div class='alert alert-danger'>","</div>") ?>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-3">
<label class="text-dark">UserName</label>
<input type="text" class="form-control usr" name="usr" placeholder="Provide a Username maximum of 6 characters" value="<?= set_value('usr')?>">
<?php echo form_error("usr","<div class='alert alert-danger'>","</div>") ?>
</div>

<div class="col-md-3 mb-3">
<label class="text-dark">Password</label>
<input type="password" class="form-control psr" name="psr" placeholder="Exact of 6 characters" value="<?= set_value('psr')?>">
<?php echo form_error("psr","<div class='alert alert-danger'>","</div>") ?>
</div>

<div class="col-md-3 mb-3">
<label class="text-dark">DateofBirth</label>
<input type="text" class="form-control  dob1" id="dob" name="dob" readonly placeholder="Provide your DOB" value="<?= set_value('dob')?>">
<?php echo form_error("dob","<div class='alert alert-danger'>","</div>") ?>
</div>

<div class="col-md-3 mb-3">
<label class="text-dark">Age</label>
<input type="text" class="form-control age" id="age" name="age" placeholder="Age must be atleast 1" readonly value="<?= set_value('age')?>">
<?php echo form_error("age","<div class='alert alert-danger'>","</div>") ?>
</div>
</div>

<div class="col-md-12 mb-3">
<button  class="btn btn-success btn-block rounded-pill create" name="create">Create</button>
</div>

</div>
</div>
</form>

<script src="<?php echo base_url('./js/pikaday.js'); ?>">
</script>

<script src="<?php echo base_url('./js/agecal.js'); ?>">
</script>


</body>
</html>