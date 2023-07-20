<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?= base_url()?>assets/web/images/favicon.ico">
<title>Biolife Agrotech</title>
<!-- Bootstrap core CSS -->
<link href="<?= base_url()?>assets/web/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->

<link href="<?= base_url()?>assets/web/style.css" rel="stylesheet">
<link href="<?= base_url()?>assets/web/css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="<?= base_url()?>assets/web/css/jquery.mCustomScrollbar.css" rel="stylesheet">

<script type="text/javascript" src="<?= base_url()?>assets/web/js/jquery-1.11.1.min.js"></script>
<script src="<?= base_url()?>assets/web/js/appath.js"></script>



</head>
<body role="document" id="Home">
<div class="login-page-lgo"><a href="<?= base_url()?>"><img src="<?= base_url()?>assets/web/images/logo-1.png" alt="Biolife Agrotech"></a></div>
<div class="product-inner-section-1">
  <div class="container-fluid">
  <div class="col-sm-4 col-sm-offset-4">
  <div class="form-wrap-inner">
  <h2 class="login-reg-heading">Register</h2>
    <form action="<?= base_url()?>registration" method="post" id="registrations"> 
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
