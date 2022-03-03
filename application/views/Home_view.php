<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>To-Do List</title>
  <base href="<?= base_url(); ?>">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/global.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="icon" type="image/png"  href="images/todoapp.png">
</head>

<body>

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

<div class="container">
  
  <h1 class="mx-auto" style="width: 200px; padding-top:150px;">
    Welcome
  </h1>
  <div class="d-flex justify-content-center home-height">  

<div class="form-row">
<div class="mb-2 mr-4">
<form action="add" method="post">
<button class="button" name="add" >Add Task</button>
</form>
</div>

<div class="mb-2 mr-4">
<form action="view_task" method="post">
<button class="button1" id="view" type="submit">View Task</button>
</form>
</div>

<div class="mb-2 mr-4">
<form action="admin" method="post">
<button class="button2" id="generate-api" type="submit">Generate API</button>
</form>
</div>

</div>

<!-- <div class="form-group">
<form action="api/admin/users" method="get">
<button class="button2" id="generate-api" type="submit">Check</button>
</form>
</div> -->

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>