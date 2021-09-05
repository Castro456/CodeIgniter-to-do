<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/global.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" sizes="48x48" href="images/todolist.png">
</head>

<nav class="navbar navbar-light bg-light" style="background-color: #CAE9F5">
    <a class="navbar-brand" href="<?php echo base_url('home');?>"><i class="bi bi-arrow-left-circle"></i>  Back</a>
    <div class="justify-content-end">
        <img src="images/man.png" alt="" width="30" height="24" class="d-inline-block align-text-end ">
        <?php echo "  ".$this->session->userdata('username') ?>
        <a class="navbar-brand" href="#"></a>
        <a class="navbar-brand" href="#"></a>
        <a class="btn btn-danger my-2 my-sm-0 rounded-pill" href="<?= base_url('login/unset_session') ?>" role="button"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
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
<form name="addform" class="add-container" action="<?php echo base_url('add/addfetch')?>" id="addform" method="post">

<div class="form-group">
<input class="form-controladd" aria-label="With textarea" name="taskadd" id="text"></input>
<?php echo form_error("taskadd","<div class='text-danger'>","</div>") ?>
</div>

<div class="align-self-end ml-auto">
<button type="submit" class="btn btn-success rounded-pill " id="addbtn" >Add</button>

</div>
</div>
</div>
</form>

</body>
</html>