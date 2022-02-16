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

<nav class="navbar navbar-light bg-light" style="background-color: #CAE9F5">
    <a class="navbar-brand" href="home"><i class="bi bi-arrow-left-circle"> 
    </i>Back</a>
    <div class="justify-content-end">
        <img src="images/man.png" alt="" width="30" height="24" class="d-inline-block align-text-end ">
        <?php echo "  ".$this->session->userdata('user_name') ?>
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
<form class="add-container">

<div class="form-group">         
  <h1 class="text-dark">API Token</h1>
</div>

<div class="form-group">
<textarea cols='60' rows='4' class="textarea" id="api_field" disabled ></textarea>
<?php echo form_error("task","<div class='text-danger'>","</div>") ?>
</div>
<div class="form-group">
  <button class="generate btn btn-success" type="button" >Generate</button>  <!-- type="button" is very important in here or-else this form submission makes page reload and ajax request can't be placed -->
  <button type="button" class="btn btn-warning" onclick="copyToClipboard('#api_field')">Copy</button>
  
</div>
</div>
</div>
</div>
</form>
<script src="./js/jquery.js"></script>
<script src="./js/api_generate.js"></script>
</body>
</html>