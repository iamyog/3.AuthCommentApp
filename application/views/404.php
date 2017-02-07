<!DOCTYPE html>
<html>
<head>
	<title>404 | Comments App</title>

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/404.css">

</head>

<body>
  <div class="wrapper row2">
    <div id="container" class="clear">
      <section id="fof" class="clear">
        <div class="hgroup">
          <h1><span><strong>4</strong></span><span><strong>0</strong></span><span><strong>4</strong></span></h1>
          <h2>Error ! <span>Page Not Found</span></h2>
        </div>
        <p>For Some Reason The Page You Requested Could Not Be Found On Our Server</p>
        <p><a href="
          <?php
          if ($this->session->userdata('username')) {
            echo site_url('dashboard');
          }
          else
          {
            echo site_url('auth');
          }?>" 
          style="color: red">Go Home &raquo;</a></p>
        </section>
      </div>
    </div>
  </body>

  </html>

