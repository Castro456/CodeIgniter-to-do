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
    <link rel="stylesheet" type="text/css" href="css/global.css"> 

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/global.css'; ?>">

    <title>OOPS Login</title>
</head>

<body>

<nav class="navbar navbar-light" style="background-color: #d1dbda">
<form class="form-inline">
<a class="btn btn-warning my-2 my-sm-0 rounded-pill" href="<?php echo base_url('register')?>" role="button">Sign up</a>
</form>
</nav>

<div class="container ">
<div class="row justify-content-center">  
<div class="col-md-4">

<form class="form-container needs-validation"  action="<?php echo base_url().'home/loadlogin'?>" method="post">
<!-- action="classes/login.classes.php" -->

<div class="form-group">            
<h1 class="text-dark">Login</h1>
</div>

<div class="form-group">
<label class="text-dark">Email</label>
<input type="text" class="form-control" name="em"  id="email" value="<?= set_value('em')?>">
<?php echo form_error("em","<div class='alert alert-danger'>","</div>") ?>
</div>

<div class="form-group">
<label class="text-dark">Password</label>
<input type="password" class="form-control"  name="psr" id="pass">
<?php echo form_error("psr","<div class='alert alert-danger'>","</div>") ?>
</div> 
 <button  type="submit" class="btn btn-success btn-block rounded-pill" id="log">Login</button>

</div>
</div>
</div>
</form>

</body>
</html>