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

 <nav class="navbar navbar-light bg-light viewnav" style="background-color: #CAE9F5">
    <a class="navbar-brand" href="<?php echo base_url('viewtask');?>"><i class="bi bi-arrow-left-circle"></i>  Back</a>
    <div class="justify-content-end">
      <img src="images/man.png" alt="" width="30" height="24" class="d-inline-block align-text-end ">
      <?php echo "  ".$this->session->userdata('username') ?>
      <a class="navbar-brand" href="#"></a>
      <a class="navbar-brand" href="#"></a>
      <a class="btn btn-danger my-2 my-sm-0 rounded-pill" href="<?= base_url('login/unset_session') ?>" role="button"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
</nav>

<body>
  <div class="container">
  <div class="col-md-10">

	<form method="post" class="update" action="<?php echo base_url('update/updatetask')?>" > 

  <div class="form-group">         
  <h1 class="text-dark">Edit</h1>
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