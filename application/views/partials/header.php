<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Comments App</title>

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/logo.png" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css"> 

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">


</head>
<body>

    <div class="container">
       <nav class="navbar navbar-default">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
               <img src="<?php echo base_url();?>assets/img/logo.png" alt="logo">
           </a>
       </div>

       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('dashboard/');?>">Projects <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo site_url('about/');?>">About</a></li>

        </ul>


        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-user" aria-hidden="true"></span> Welcome 
                    <?php 
                    if ($this->session->userdata('username')) {
                        echo $this->session->userdata('username')->email;
                    }
                    ?><span class="fa fa-chevron-down" aria-hidden="true"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="navbar-login">
                            <div class="row">
                                <div class="col-md-5 col-lg-5">
                                    <p class="text-center">

                                        <img style="width: 100px;" src="<?php echo base_url();?>assets/img/user.png">
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <p><strong>

                                        <?php 
                                        if ($this->session->userdata('username')) 
                                            echo $this->session->userdata('username')->username; ?>
                                    </strong></p>
                                    <p class="small">

                                       <?php 
                                       if ($this->session->userdata('username')) 
                                        echo $this->session->userdata('username')->email; ?> 
                                </p>
                                <p class="text-left clearfix">
                                  <form method="post" action="<?php echo site_url('auth/postLogout');?>">		
                                     <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                                     <button type="button" class="btn btn-danger btn-sm" onclick="location.href='<?php echo site_url('settings');?>'">Settings</button>
                                 </form>

                             </p>
                         </div>
                     </div>
                 </div>
             </li>


         </ul>
     </li>
 </ul>      
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>