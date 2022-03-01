<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
      <?php echo $this->session->userdata('user_name')?>    
    <a class="btn btn-danger my-2 my-sm-0 rounded-pill ml-3" href="login/unset_session" role="button">
      <i class="bi bi-door-open"></i>
      Logout</a>
    </a>      
  </form>
</nav>

   <div class="container rounded bg-white mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5 mb-2" src="images/avatar.png" width="170" height="170">
                <span class="font-weight-bold"><?php echo $this->session->userdata('user_name')?></span>
                <span class="text-black-50"><?php echo $this->session->userdata('user_email')?></span>
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6>User Details</h6>
                    </div>
                    <!-- <h6 class="text-right">Edit Profile</h6> -->
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" placeholder="first name" value="John">
                    </div>
                    <div class="col-md-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" value="Doe" placeholder="Doe">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Email" value="john_doe12@bbb.com">
                    </div>
                </div>
                <!-- <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="address" value="D-113, right avenue block, CA,USA"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="USA" placeholder="Country"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Bank Name" value="Bank of America"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="043958409584095" placeholder="Account Number"></div>
                </div> -->
                <div class="mt-5 text-right"><button class="btn login_btn" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>
</div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>
</html>