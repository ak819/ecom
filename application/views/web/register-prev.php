<div class="inner-header">
	<img src="<?= base_url()?>assets/web/images/banner-inner-3.jpg">
	<h2>Register</h2>
 </div>

<div class="product-inner-section">
	<div class="container-fluid">
	<div class="col-sm-6 col-sm-offset-3">
	<div class="form-wrap-inner">
	<form action="<?= base_url()?>registration" method="post" id="registration"> 
   <h6 style="text-align:center;"><b><?php if($this->session->flashdata('registeryes')){ echo $this->session->flashdata('registeryes');  }  ?></b></h6>
      <h6 style="color:red;text-align:center;"><?php if($this->session->flashdata('registerno')){ echo $this->session->flashdata('registerno');  }  ?></h6>
      <h6 style="color:red;text-align:center;"><?php if($this->session->flashdata('login_status')){ echo $this->session->flashdata('login_status');  }  ?></h6>
  <div class="form-group">
    <label for="name">Name <span>*</span></label>
    <input type="text" id="name" class="form-control" name="name" placeholder="Enter Full Name "  value="<?php echo set_value('name'); ?>">
     <?php if(form_error('name')) {?>
     <label class="errormsg"><?php echo form_error('name'); ?></label>
     <?php } ?>
  </div>
  
   <div class="form-group">
    <label for="email">Email <span>*</span></label>
    <input type="text" class="form-control" id="email" placeholder="Enter Valid Email." name="email" value="<?php echo set_value('email'); ?>"  >
     <?php if(form_error('email')) {?>
     <label class="errormsg"><?php echo form_error('email'); ?></label>
     <?php  } ?>
  </div>

  <div class="form-group">
    <label for="mobile">Mobile Number<span>*</span></label>
    <input type="number" class="form-control" id="mobile" placeholder="Enter Current Mobile Number" name="mobile" value="<?php echo set_value('mobile'); ?>">
    <?php if(form_error('mobile')) {?>
             <label class="errormsg"><?php echo form_error('mobile'); ?></label>
            <?php  } ?>
  </div>
  

  <div class="form-group">
    <label for="password">Password <span>*</span></label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
     <?php if(form_error('password')) { ?>
            <label class="errormsg"><?php echo form_error('password'); ?></label>
            <?php  } ?>
  </div>
 
 <div class="form-group">
    <label for="cpassword">Confirm Password <span>*</span></label>
    <input type="password" id="cpassword" name="cpassword" class="form-control"  placeholder="Confirm Password">
     <?php if(form_error('cpassword')) { ?>
     <label class="errormsg"><?php echo form_error('cpassword'); ?></label>
     <?php  } ?>
  </div>
 
  <div class="checkbox">
    <label class="check_msg">
      <input type="checkbox" name="terms" value=""> I Accept <a href="#">Terms and Conditions.</a>
    </label>

  </div>
    <?php 
       $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
     ); 

     ?>
  
   <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" id="token" />
   
  
  
  <button type="submit" id="sbutton" class="btn btn-default">Submit</button>
</form>



<p class="forgeot-passw">Do you already have account? <a href="<?= base_url()?>login">Click here</a> to Login.</p>


</div>
</div>
	</div>
</div>

 <script src="<?= base_url();?>assets/web/js/jqueryvalidate.js"></script>
 <script src="<?= base_url();?>assets/web/js/formvalidation.js"></script>