<? 
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/logo.png" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css"> 

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">

</head>
  
<body class="container">

  <?php include('/../partials/msg.php');?>

  <div class="row">
    
    <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4" id="card" style="margin-top: 15px;">

     <h1 class="text-center">Registration</h1>

    <form action="<?php echo site_url('auth/postSignup');?>" method="post">

      <div class="form-group">
        <label class="sr-only" for="exampleInputEmail">Email</label>
        <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required/>
        </div>
      </div>

      <div class="form-group">
        <label class="sr-only" for="exampleInputUser">UserName</label>
        <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username" required/>
        </div>
      </div>


      <div class="form-group">
        <label class="sr-only" for="exampleInputPassword">Password</label>
        <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-shield" aria-hidden="true"></i></div>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your password" required/>
        </div>

         <div class="gender">
            <input type="radio" value="male" id="male" name="gender" checked/>
            <label for="male" class="radio" chec>Male</label>
            <input type="radio" value="female" id="female" name="gender" />
            <label for="female" class="radio">Female</label>
           </div> 

      </div>

      <div class="clearfix">
        <a href="<?php echo site_url('auth');?>" class="btn btn-danger pull-right" style="margin-left: 5px;">Login</a>
      <button type="submit" class="btn btn-danger pull-right">Register</button>
      </div>

      <div>
      <p id="para">By clicking Register, you agree on our <a href="#" class="colorh">terms and condition</p>
      </div>

    </form>
  </div>
</div>
</body>
</html>