<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= base_url(); ?>"> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png"  href="images/todoapp.png"> 
    <title>To-Do List</title>
</head>

<nav class="navbar navbar-light">
  <a class="navbar-brand" href="home">
    <img src="images/todoapp.png" width="30" height="30" class="d-inline-block align-top" style="text-decoration:none">
    To-Do List Application
  </a>
  
  <form class="form-inline">
    <a href="profile">
      <img src="images/avatar.png" width="40" height="40" class="d-inline-block align-top mr-1">
    </a> 
      <?php echo $this->session->userdata('user_fname')?>    
    <a class="btn btn-danger my-2 my-sm-0 rounded-pill ml-3" href="login/unset_session" role="button">
      <i class="bi bi-door-open"></i>
      Logout</a>
    </a>      
  </form>
</nav>

<?php 
 if (!empty($message)) { ?>
    <div class="alert alert-success pill1"> 
      <i class="bi bi-check-circle"></i> <?php echo $message;
 }
?>

<body>

<div class="container ">
<div class="row justify-content-center"> 
<form class="add-container">

<div class="form-group">         
  <h1 class="text-dark">API Token</h1>
</div>

<div class="form-group">
<textarea cols='60' rows='4' class="textarea" id="api_field" readonly></textarea>
<?php echo form_error("task","<div class='text-danger'>","</div>") ?>
</div>
<div class="form-group">
  <button class="generate btn btn-success" type="button" >Generate</button>  <!-- type="button" is very important in here or-else this form submission makes page reload and ajax request can't be placed -->
<button type="button" class="btn btn-warning" id="copy">Copy</button>
</div>
</div>
</div>
</div>
</form>
<script src="./js/jquery.js"></script>
<script src="./js/api_generate.js"></script>
</body>
</html>