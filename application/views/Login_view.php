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
 if (!empty($msg)) { ?>
    <div class="alert alert-danger pill1">
    <i class="bi bi-x-circle"></i> <?php echo $msg;
 }
?>

<body>

<div class="container ">
<div class="d-flex justify-content-center centering">
<!-- <div class="col-md-4 centering"> -->

<form class="form-container needs-validation"  action="login/authentication" method="post">
<!-- form-container -->
<div class="mx-auto mb-4" style="width: 120px;">         
  <h1 class="text-dark">Login</h1>
</div>

<div class="form-group">
  <label class="text-dark">Email</label>
  <!-- <i class="bi bi-person-circle"></i>  -->
  <input type="text" class="form-control" name="em"  id="email" placeholder="Your Email" value="<?= set_value('em')?>" >
<!-- </input> -->
 <?php echo form_error("em","<p class='text-danger'>","</p>") ?>
<?="<br>" ?>
</div>

<div class="form-group">
  <!-- <i class="bi bi-lock-fill"></i> -->
<label class="text-dark">Password</label>
<input type="password" class="form-control mb-4"  name="psr" id="pass" placeholder="Your Password">
  <?php echo form_error("psr","<p class='text-danger'>","</p>") ?>
</div> 

<div class="mx-auto mb-4" style="width: 250px;">
<button  type="submit" class="btn login_btn rounded-pill" id="log" >
  Login
</button>
</div>

<p class="mx-auto mb-2" class="text-grey" style="width: 200px;">
First time here ? -
<a style="text-decoration:none" href="register">
<font s color="#00A89B";>Sign-up</font>
</a>
</p>

</div>
</div>
<!-- </div> -->
</form>

</body>
</html>