<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <base href="<?= base_url(); ?>">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link href="css/toastr.scss" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png"  href="images/todoapp.png">
</head>

<body>

<nav class="navbar navbar-light">
  <a class="navbar-brand" href="home">
    <img src="images/back-arrow.png" width="28" height="28" class="d-inline-block align-top" style="text-decoration:none">
    Back
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

   <div class="container rounded bg-white mt-5">
    <div class="row profile1">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5 mb-2" src="images/avatar.png" width="170" height="170">
                <span class="font-weight-bold"><?php echo $this->session->userdata('user_fname')?></span>
                <span class="text-black-50 mb-4"><?php echo $this->session->userdata('user_email')?></span>
                <button class="btn btn-danger rounded-pill" type="button" data-toggle="modal" data-target="#deleteModal">Delete your Account</button>
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6></h6>
                    </div>
                    <button class="btn btn-warning" name="update" type="button" data-toggle="modal" data-target="#exampleModal">
                    <i class="bi bi-pencil"></i></button>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control mb-3" value="<?php echo $this->session->userdata('user_fname')?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="username">Last Name</label>
                        <input type="text" class="form-control mb-3" value="<?php echo $this->session->userdata('user_lname')?>" disabled>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control mb-3" name="phone" value="<?php echo $this->session->userdata('user_phone')?>" disabled>
                     </div>
                    <div class="col-md-6">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control mb-3" name="dob" placeholder="Email" value="<?php echo $this->session->userdata('user_dob')?>" disabled>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                      <label for="age">Age</label>
                      <input type="text" class="form-control mb-3" name="age" value="<?php echo $this->session->userdata('user_age')?>" disabled>
                     </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div> 


<!-- Edit Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
    <form action="api/admin/update-user" method="post">
      <input type="hidden" name="user_id" id="user-id" value="<?php echo $this->session->userdata('user_id')?>">
      <input type="hidden" name="email" id="email" value="<?php echo $this->session->userdata('user_email')?>">
      <div class="modal-header text-center d-block">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        </button>
      </div>
      <div class="modal-body">
            <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control mb-3" name="fname" id="fname" value="<?php echo $this->session->userdata('user_fname')?>">
                    </div>
                    <div class="col-md-6">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control mb-3" name="lname" id="lname" value="<?php echo $this->session->userdata('user_lname')?>">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control mb-3" name="phone" id="phone" value="<?php echo $this->session->userdata('user_phone')?>">
                     </div>
                    <div class="col-md-6">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control mb-3" id="dob" name="dob" placeholder="Email" value="<?php echo $this->session->userdata('user_dob')?>">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                      <label for="age">Age</label>
                      <input type="text" class="form-control mb-3" name="age" id="calage" value="<?php echo $this->session->userdata('user_age')?>" readonly>
                     </div>
                </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn login_btn save-btn">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Edit Modal End -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-block">
        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title text-center" id="exampleModalLabel">Delete</h5>
      </div>
      <div class="modal-body text-center">
        <h2> Are you sure to delete your account ? </h2>
        <br>
        <small style="color:red">Note: This will delete all of your data permanently</small>
      </div>
      <div class="modal-footer d-block text-center">
        <button type="button" class="btn btn-danger">Yes</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal End -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$(".modal").on("hidden.bs.modal", function(){
     $(this).find('form').trigger('reset');
});
</script>
<script src="./js/jquery.js"></script>
<script src="./js/agecal.js"></script>
<script src="./js/profile.js"></script>
<script src="./js/toastr.js"></script>
</body>
</html>