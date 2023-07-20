<div class="inner-header">
	<img src="<?= base_url()?>assets/web/images/banner-inner-3.jpg">
	<h2>Login</h2>
 </div>

<div class="product-inner-section">
	<div class="container-fluid">
	<div class="col-sm-6 col-sm-offset-3">
	<div class="form-wrap-inner">
		<form action="<?= base_url()?>processlogin" method="post" id="login">
       <h6 style="text-align:center;"><b><?php if($this->session->flashdata('registeryes')){ echo $this->session->flashdata('registeryes');  }  ?></b></h6>
      <h6 style="color:red;text-align:center;"><?php if($this->session->flashdata('registerno')){ echo $this->session->flashdata('registerno');  }  ?></h6>
      <h6 style="color:red;text-align:center;"><?php if($this->session->flashdata('login_status')){ echo $this->session->flashdata('login_status');  }  ?></h6>
  <div class="form-group">
    <label for="email">Email<span>*</span></label>
    <input type="loginemail" class="form-control" name="signin_email" id="loginemail" placeholder="Enter Registered Email ID For Login" value="<?php echo set_value('signin_email'); ?>">
      <?php if(form_error('signin_email')) {?>
             <label class="errormsg"><?php echo form_error('signin_email'); ?></label>
             <?php } ?>
  </div>
  <div class="form-group">
    <label for="pwd">Password <span>*</span></label>
    <input type="password" class="form-control" id="pwd" placeholder="Password" name="signin_password">
     <?php if(form_error('signin_password')) { ?>
    <label class="errormsg"><?php echo form_error('signin_password'); ?></label>
     <?php } ?>
  </div>
 
  <div class="checkbox">
    <label>
      <input type="checkbox" value="" checked> Terms &amp; Conditions
    </label>
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


<p class="forgeot-passw"><a href="forget-password.html">Forgot Password</a></p>

<p class="forgeot-passw">Not registered yet? <a href="<?= base_url()?>register">Click here</a> to Register</p>


</div>
</div>
	</div>
</div>

<script src="<?= base_url();?>assets/web/js/jqueryvalidate.js"></script>
 <script src="<?= base_url();?>assets/web/js/formvalidation.js"></script>