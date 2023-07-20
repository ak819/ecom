<div class="inner-header">
  <img src="<?= base_url()?>assets/web/images/banner-inner-3.jpg">
  <h2>Forgot Password?</h2>
 </div>
<div class="product-inner-section">
  <div class="container-fluid">
  <div class="col-sm-4 col-sm-offset-4">
  <div class="form-wrap-inner">
  <form action="<?= base_url()?>processtoforget" method="post" id="forget" >
  <h6><b>Enter the email address associated with your Biolife Agrotech Account.</b></h6>
  <div class="form-group">
    <label for="signin_email">Email address<span>*</span></label>
    <input type="email" class="form-control" id="signin_email" name="signin_email" placeholder="Registered Email" value="<?php echo set_value('signin_email'); ?>">
     <?php if(form_error('signin_email')) {?>
    <label class="errormsg"><?php echo form_error('signin_email'); ?><?php if($this->session->flashdata('forget_status')){ echo $this->session->flashdata('forget_status');  }  ?></label>
    <?php } ?>
  </div>
  <?php 
       $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
     ); 

     ?>
  
   <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" id="token" />
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</div>
</div>
</div>
<script src="<?= base_url();?>assets/web/js/jqueryvalidate.js"></script>
<script src="<?= base_url();?>assets/web/js/formvalidation.js"></script>