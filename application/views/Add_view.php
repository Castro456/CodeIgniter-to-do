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
    <img src="images/back-arrow.png" width="28" height="28" class="d-inline-block align-top" style="text-decoration:none">
    Back
  </a>
  
  <form class="form-inline">
    <a href="#">
      <img src="images/avatar.png" width="40" height="40" class="d-inline-block align-top mr-1">
    </a> 
      <?php echo $this->session->userdata('user_name')?>    
    <a class="btn btn-danger my-2 my-sm-0 rounded-pill ml-3" href="login/unset_session" role="button">
      <i class="bi bi-door-open"></i>
      Logout</a>
    </a>      
  </form>
</nav>

<body>

<div class="container">
<div class="d-flex justify-content-center">
<form class="add-container" action="add/user_task" method="post">

<div class="form-group">
<textarea cols='40' rows='3' class="textarea" name="task" id="text" ></textarea>
<?php echo form_error("task","<div class='text-danger'>","</div>") ?>
</div>

<?php 
 if (!empty($message)) { ?>
    <div class="alert alert-danger login_msg"> 
      <i class="bi bi-x-circle"></i> <?php echo $message;
 }
?>
</div>

<div class="mx-auto mb-4" style="width: 100px;">
<button type="submit" class="btn add-btn" id="addbtn">Add</button>
</div>

</form>
</div>
</div>

</body>
</html>