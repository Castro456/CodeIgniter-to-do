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
  <a class="navbar-brand" href="view_task">
    <img src="images/back-arrow.png" width="28" height="28" class="d-inline-block align-top" style="text-decoration:none">
    Back
  </a>
  
  <form class="form-inline">
    <!-- <a href="profile">
      <img src="images/avatar.png" width="40" height="40" class="d-inline-block align-top mr-1">
    </a> 
      <?php //echo $this->session->userdata('user_fname')?>     -->
    <a class="btn btn-danger my-2 my-sm-0 rounded-pill ml-3" href="login/unset_session" role="button">
      <i class="bi bi-door-open"></i>
      Logout</a>
    </a>      
  </form>
</nav>

<body>
  <div class="container">
  <div class="col-md-10">

	<form method="post" class="update" action="<?php echo base_url('update/edit_task')?>" > 

  <div class="form-group">         
  <h1 class="text-dark">Edit Task</h1>
  </div>
  <div class="input-group input-group-lg">
  <input type="text" class="form-control" name="task" value="<?php echo $data['task'] ?>">
  <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
  <p class="space"></p>
  <button class="btn btn-success" type="submit" ><i class="bi bi-check2"></i></button>
  </div>

  </form>

</div>
</div>
</div>

</body>
</html>