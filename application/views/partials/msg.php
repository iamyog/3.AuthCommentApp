  <?php if ($this->session->flashdata('msg')) {?>      
  <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4 text-center" text-center id="card" style="margin-top: 20px;">
    <h4>
      <?php echo $this->session->flashdata('msg');?>
    </h4>
  </div> 
  <?php }?>