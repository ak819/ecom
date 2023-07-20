<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url();?>assets/web/img/favicon.png">
<title>Stylica</title>
<!-- Bootstrap core CSS -->
<link href="<?= base_url();?>assets/web/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->

<link href="<?= base_url();?>assets/web/css/style.css" rel="stylesheet">
<link href="<?= base_url();?>assets/web/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url();?>assets/web/css/demo-slideshow.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url();?>assets/web/css/slicknav.css"/>
<script src="<?= base_url();?>assets/web/js/jquery-1.11.1.min.js"></script>
  <script src="<?= base_url();?>assets/web/js/appath.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/web/css/translateelement.css"/>
<link rel="stylesheet" href="<?= base_url();?>assets/web/css/owl.carousel.css">
<link href="<?= base_url();?>assets/web/css/owl.theme.css" rel="stylesheet">

<link id="main-css" href="<?= base_url();?>assets/web/css/demos.css" type="text/css" rel="stylesheet">
<link id="main-css" href="<?= base_url();?>assets/web/css/menuzord.css" type="text/css" rel="stylesheet">
<link  href="<?= base_url();?>assets/web/css/xzoom.css" type="text/css" rel="stylesheet">

  

<script>
	function toggleSignup(){
   document.getElementById("login-toggle").style.backgroundColor="#fff";
    document.getElementById("login-toggle").style.color="#222";
    document.getElementById("signup-toggle").style.backgroundColor="#c07d2d";
    document.getElementById("signup-toggle").style.color="#fff";
    document.getElementById("login-form").style.display="none";
    document.getElementById("signup-form").style.display="block";
}

function toggleLogin(){
    document.getElementById("login-toggle").style.backgroundColor="#c07d2d";
    document.getElementById("login-toggle").style.color="#fff";
    document.getElementById("signup-toggle").style.backgroundColor="#fff";
    document.getElementById("signup-toggle").style.color="#222";
    document.getElementById("signup-form").style.display="none";
    document.getElementById("login-form").style.display="block";
}

</script>
<?php $flag=$this->uri->segment(1);  ?>
<?php if($flag == "login" or $flag == "processlogin")  { ?>
      <style>
             #login-toggle{
              background-color:#c07d2d;
              color:#fff;
             }

               #signup-form{
               display:none;
             
             }
              #login-form{
              display:block;
             
             }


      </style>


  <?php  } ?>
  <?php if($flag == "register" or $flag == "registration")  { ?>
   <style>
             #login-toggle{
              background-color:#fff;
              color:#222;
             }
              #signup-toggle{
                 background-color: #c07d2d;
    color: #fff;
             }
               #signup-form{
               display:block;
             
             }
              #login-form{
              display:none;
             
             }


      </style>

  <?php  } ?>


</head>
<body>
    
    <div class="content">
      <div class="top-support">
        <div class="container-fluid">
          <div class="row">
            <div class="logo-wrp"><a href="<?= base_url()?>"><img src="<?= base_url()?>assets/web/img/logo-1.png"></a></div>
         
           
     
          </div>
        </div>
      </div>
    </div>
    
    
   <!--<div class="register-me">
   	<div class="container">
   		<div class="row">
  		<a href="<?= base_url()?>"><img src="<?= base_url();?>assets/web/img/logo-1.png"></a>
   		
   	</div>
   </div>
</div>-->
<div class="module-wrap">
<div class="form-modal">
    

    <div class="form-toggle">
        <button id="login-toggle" onclick="toggleLogin()">Sign in</button>
        <button id="signup-toggle" onclick="toggleSignup()">Sign up</button>
    </div>

    <div id="login-form">
      <h6 style="text-align:center;"><b><?php if($this->session->flashdata('registeryes')){ echo $this->session->flashdata('registeryes');  }  ?></b></h6>
      <h6 style="color:red;text-align:center;"><?php if($this->session->flashdata('registerno')){ echo $this->session->flashdata('registerno');  }  ?></h6>
      <h6 style="color:red;text-align:center;"><?php if($this->session->flashdata('login_status')){ echo $this->session->flashdata('login_status');  }  ?></h6>
        <form action="<?= base_url()?>processlogin" method="post" id="login">
        
            <input type="text" placeholder="Enter email id" name="signin_email" value="<?php echo set_value('signin_email'); ?>"/>
              <?php if(form_error('signin_email')) {?>
             <label class="errormsg"><?php echo form_error('signin_email'); ?></label>
             <?php } ?>

            <input type="password" placeholder="Enter password" name="signin_password" />
              <?php if(form_error('signin_password')) {?>
            <label class="errormsg"><?php echo form_error('signin_password'); ?></label>
             <?php } ?>
          	
            <a href="#">
            <button type="submit" class="btn login" style="color: #fff;">Submit</button></a>
            <p style="font-size: 13px;"><a href="<?= base_url()?>forgetpassword">Forgotten Password</a></p>
            <hr>
            <!--  <p>Clicking <strong>create account</strong> means that you are agree to our <a href="javascript:void(0)">terms of services</a>.</p>
             <p style="color: #1e5e97; font-size: 12px;"><a href="#"><i class="fa fa-chevron-circle-right" aria-hidden="true"> need help ? </i></a></p> -->
       
        </form>
    </div>

    <div id="signup-form">
        <form action="<?= base_url()?>registration" method="post" id="registrations"> 
        	<input type="text" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>"/>
           <?php if(form_error('name')) {?>
         <label class="errormsg"><?php echo form_error('name'); ?></label>
          <?php } ?>

          <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo set_value('email'); ?>"/>
          <?php if(form_error('email')) {?>
          <label class="errormsg"><?php echo form_error('email'); ?></label>
          <?php  } ?>

            <input type="number" name="mobile" placeholder="Enter your Mobile no" value="<?php echo set_value('mobile'); ?>" />
              <?php if(form_error('mobile')) {?>
             <label class="errormsg"><?php echo form_error('mobile'); ?></label>
            <?php  } ?>

            <input type="password" name="password" id="password" placeholder="password" value="" >
             <?php if(form_error('password')) { ?>
            <label class="errormsg"><?php echo form_error('password'); ?></label>
            <?php  } ?>

            <input type="password" name="cpassword" placeholder="Re-enter password" value="">
               <?php if(form_error('cpassword')) { ?>
            <label class="errormsg"><?php echo form_error('cpassword'); ?></label>
            <?php  } ?>



            <button type="submit" id="sbutton" class="btn signup" style="color: #fff;">create account</button>
            <p>Clicking <strong>create account</strong> means that you are agree to our <a href="javascript:void(0)">terms of services</a>.</p>
          <!--   <p style="color: #1e5e97; font-size: 12px;"><a href="#"><i class="fa fa-chevron-circle-right" aria-hidden="true"> need help ? </i></a></p> -->
           
        </form>

    </div>
</div>

 </div>





 <script src="<?= base_url();?>assets/web/js/bootstrap.min.js"></script>
 <script src="<?= base_url();?>assets/web/js/jqueryvalidate.js"></script>
 <script src="<?= base_url();?>assets/web/js/formvalidation.js"></script>
  
  



  




    
    <script type="text/javascript">  
    $(window).load(function(){
     $('.loader').fadeOut();


    });   
    </script>
  	  

  </body>
</html>