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

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid justify-content-end">
    <img src="images/man.png" alt="" width="30" height="24" class="d-inline-block align-text-top ">
    <?php echo "  ".$this->session->userdata('username') ?>
    <a class="navbar-brand" href="#">
    </a>
    <a class="navbar-brand" href="#">
    </a>
    <a class="btn btn-danger my-2 my-sm-0 rounded-pill" href="<?= base_url('login/unset_session') ?>" role="button"><i class="bi bi-box-arrow-right"></i> Logout</a>
  </div>
</nav>

<div class="container ">
<div class="row justify-content-center">  
<div class="col-md-9"> 
<div class="form-group">
<h1 class="text-correct">To-Do List Application</h1>
</div>

<div class="form-group">
<form action="<?= base_url('add') ?>" method="post">
<button class="button" name="add" >Add Task</button>
</form>
</div>

<div class="form-group">
<form action="<?= base_url('viewtask') ?>" method="post">
<button class="button1" id="view" type="submit">View Task</button>
</form>
</div>

</div>
</div>
</div>

</body>
</html>