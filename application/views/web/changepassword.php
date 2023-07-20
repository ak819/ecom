<div class="inner-header">
  <img src="<?= base_url()?>assets/web/images/banner-inner-3.jpg">
  <h2>Change Password</h2>
 </div>

<div class="product-inner-section">
  <div class="container-fluid">
  <div class="col-sm-4 col-sm-offset-4">
  <div class="form-wrap-inner">
  <form action="<?= base_url()?>modifypassword" method="post" id="changepassword">

  <div class="form-group">
  <label for="password">New password <span>*</span></label>
  <input type="password" id="password" class="form-control" name="new_password"   placeholder="" <?php echo set_value('new_password'); ?>/>
  <label class="errormsg"><?php echo form_error('new_password'); ?></label>
  </div>
  
  <div class="form-group">
    <label for="cpassword">Confirm Password <span>*</span></label>
    <input type="password" id="cpassword" class="form-control" name="confirm_password"  placeholder="" <?php echo set_value('confirm_password'); ?> />
     <label class="errormsg"><?php echo form_error('confirm_password'); ?></label> 
  </div>
  
  <?php if(isset($verify)) { ?>
   <div class="form-group">
   <input type="hidden" name="id1" value="<?= $verify['id1']; ?>">
   <input type="hidden" name="id2" value="<?= $verify['id2']; ?>">
   <input type="hidden" name="id3" value="<?= $verify['id3']; ?>">
   </div>
 
  <?php }else{ ?>
    <div class="form-group">
   <input type="hidden" name="id1" value="<?= $this->uri->segment(2); ?>">
   <input type="hidden" name="id2" value="<?=$this->uri->segment(3); ?>">
   <input type="hidden" name="id3" value="<?=$this->uri->segment(4); ?>">
   </div>

  <?php } ?> 
  <button type="submit" class="btn btn-default">Submit</button>
</form>



</div>
</div>
  </div>
</div>
<script src="<?= base_url();?>assets/web/js/jqueryvalidate.js"></script>
 <script src="<?= base_url();?>assets/web/js/formvalidation.js"></script>