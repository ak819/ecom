<div class="inner-header">
	<img src="<?= base_url()?>assets/web/images/banner-inner-3.jpg">
	<h2>My Account</h2>
 </div>

<div class="registration-inner-section">
	<div class="container">
		<div class="col-sm-6">
        
			<div class="form-wrap-inner">
			    <div class="acc-wrp">
                        <h3 class="form-heading" style="float:left;">My Profile</h3>
                        <p class="edit-element"><a href="javascript:void(0)" id="editmyaccount" >Edit</a></p>
                </div>

                <div class="clearfix"></div>
                   <form id="myaccount" action="<?=base_url()?>updatemyaccount" method="post">
          <h5 style="text-align:center"><?= ($this->session->flashdata('msg'))? $this->session->flashdata('msg')    :  "" ?></h5>
    <div class="form-group">
      <label for="fni">Name <span>*</span></label>
      <input type="text" class="form-control" id="fni" name="name" placeholder="Enter Name"  value="<?=(form_error('name'))? "":$userdetails->name ?>" <?=(form_error('name'))? "":"disabled"?>>
       <?php if(form_error('name')) {?>
    <span><label for="fni" class="error" style="display: inline-block;"><?php echo form_error('name'); ?></label></span>    
   <?php } ?>
    </div>
   
  <div class="form-group">
    <label for="mni">Mobile <span>*</span></label>
    <input type="number" class="form-control" id="mni" name="mobile" placeholder="Mobile" value="<?=(form_error('mobile'))? "":$userdetails->mobile ?>" <?=(form_error('mobile'))? "":"disabled"?>>
     <?php if(form_error('mobile')) {?>
   <span><label for="mni" class="error" style="display: inline-block;"><?php echo form_error('mobile'); ?></label></span>    
   <?php } ?>
  </div>



 <div class="form-group"> <input type="submit" class="btn btn-primary save-ch-1" value="Save changes "  <?=(form_error('name')  OR form_error('mobile'))? "":"disabled"?>></div>
  <?php 
       $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
     ); 

     ?>
  
   <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" id="token" />
</form>





</div>
</div>


<div class="col-sm-6">
        
			<div class="form-wrap-inner">
			    <div class="acc-wrp">
                       
                        <h3 class="form-heading" style="float:left;">Change Password</h3>
                </div>
                <div class="clearfix"></div>
                    <form id="changepassword" action="<?= base_url()?>updatepassword" method="post">
                          <h5 style="text-align:center"><?= ($this->session->flashdata('pwdmsg'))? $this->session->flashdata('pwdmsg')    :  "" ?></h5>
  <div class="form">

    <div class="form-group">
      <label for="currentpassword">Current Password <span>*</span></label>
      <input type="password" class="form-control" name="currentpassword" id="currentpassword" placeholder="Current Password" value="<?php  if(form_error('currentpassword')){ echo set_value('currentpassword'); } ?>">
        <?php if(form_error('currentpassword')) {?>
   <span><label for="mni" class="error" style="display: inline-block;"><?php echo form_error('currentpassword'); ?></label></span>    
   <?php } ?>
    <?php if(isset($false)){?>
                                  <span><label for="currentpassword" class="error" style="display: inline-block;">You Entered Wrong Password</label></span>
                 <?php } ?>
    </div>
    <div class="form-group">
      <label for="new_password">New Password <span>*</span></label>
      <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" value="<?php echo set_value('new_password'); ?>">
        <?php if(form_error('new_password')) {?>
   <span><label for="mni" class="error" style="display: inline-block;"><?php echo form_error('new_password'); ?></label></span>    
   <?php } ?>
    </div>
  </div>
  <div class="form-group">
    <label for="confirm_password">Confirm Password <span>*</span></label>
    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password"  value="<?php echo set_value('confirm_password'); ?>">
     <?php if(form_error('confirm_password')) {?>
   <span><label for="mni" class="error" style="display: inline-block;"><?php echo form_error('confirm_password'); ?></label></span>    
   <?php } ?>
  </div>
  <button type="submit" class="btn btn-primary save-ch-1">Save changes</button>
   <?php 
       $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
     ); 

     ?>
  
   <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" id="token" />
</form>

</div>
</div>

		
	</div>
</div>

<script src="<?= base_url() ?>assets/web/js/jqueryvalidate.js"></script>
<script src="<?= base_url() ?>assets/web/js/formvalidation.js"></script>