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

<body>

<div class="container">
<div class="d-flex justify-content-center"> 
<form  class="form-container1" action="register/validate" method="post">
<div class="mx-auto mb-4" ">
<h1 class="text-dark">Sign-up</h1>
</div> 


<div class="form-row">
<div class="col-md-5 mb-4 ">
<label class="text-dark">First Name</label>
<input type="text" class="form-control" name="first-name" placeholder="Your First name" value="<?= set_value('first-name')?>"> </input>
<?php echo form_error("first-name","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-5 mb-4 ">
<label class="text-dark">Last Name</label>
<input type="text" class="form-control" name="last-name" placeholder="Your Last name" value="<?= set_value('last-name')?>"></input>
<?php echo form_error("last-name","<p class='text-danger'>","</p>") ?>
</div>
</div>

<div class="form-row">
<div class="col-md-4 mb-4 ">
<label class="text-dark">Email</label>
<input type="text" class="form-control" name="email" placeholder="Your Email" value="<?= set_value('email')?>">
<?php echo form_error("email","<p class='text-danger'>","</p>") ?> </input>
</div>

<div class="col-md-4 mb-3">
    <label class="text-dark">Password</label>
    <input type="password" class="form-control" name="psr" placeholder="Minimum of 6 characters"></input>
    <?php echo form_error("psr","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-4 mb-3">
    <label class="text-dark">Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password" placeholder="Re-enter the Password"></input>
    <?php echo form_error("confirm_password","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-4 mb-4 ">
<label class="text-dark">Phone</label>
<input type="text" class="form-control" name="phone" placeholder="Your Phone number">
<?php echo form_error("phone","<p class='text-danger'>","</p>") ?> </input>
</div>

<div class="col-md-3 mb-4">
<label class="text-dark">DateofBirth</label>
<input type="date" class="form-control" id="dob" name="dob"  placeholder="Provide your DOB"></input>
<?php echo form_error("dob","<p class='text-danger'>","</p>") ?>
</div>

<div class="col-md-3 mb-4">
<label class="text-dark">Age</label>
<input type="text" class="form-control" style="background : transparent;" id="calage" name="age" readonly placeholder="Age must be atleast 1" ></input>
<?php echo form_error("age","<p class='text-danger'>","</p>") ?>
</div>
</div>

<?php
if(!empty($error)) 
{?>
<div class="alert alert-danger register_msg"> 
<i class="bi bi-x-circle"></i> <?php echo $error; 
}
?></div>

<?php
if(!empty($success)) 
{?>
<div class="alert alert-success register_success_msg"> 
<i class="bi bi-check-circle"></i> <?php echo $success; 
}
?></div>

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