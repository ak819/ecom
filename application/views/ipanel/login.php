<!DOCTYPE html>
<html dir="ltr">
<head>
<meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Tell the browser to be
responsive to screen width --> <meta name="viewport"
content="width=device-width, initial-scale=1">
<meta name="description" content=""> <meta name="author" content=""> <!-- Favicon icon --> 
<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url();?>assets/web/img/favicon.png">
<title>Biolife Agrotech Pvt. Ltd. </title> <!-- Custom CSS --> <link href="<?=
base_url();?>assets/ipanel/dist/css/style.min.css" rel="stylesheet"></head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box  border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20">
                        
                        <span class="db"><img src="<?= base_url();?>assets/web/images/logo-1.png" width="100%" alt="" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" action="<?= base_url();?>ipanel/login/authenticate" method="post">
                    <div class="card-body p-6">
                 
                    <?php if ($this->session->flashdata('msg')): ?>
                  
                    <div class="alert alert-icon alert-danger" role="alert">
                            <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> 
                            <?= $this->session->flashdata('msg');?>  
                            
                    </div>
                    <?php endif ?>
                        <div class="row p-b-10">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="email" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                      <!--  <button class="btn btn-info" id="register" type="button"><i class="fa fa-lock m-r-5"></i> Register Your Apartment </button> -->
                                        <button class="btn btn-danger" type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php 
       $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
     ); 

     ?>
  
   <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" id="token" />
                    </form>
                </div>
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" action="index.html">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                    <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        
       
      
  </div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>


        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
  <!--  <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
      <!--  <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
  <!--      <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-light">
            <div class="auth-box bg-light border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db">
                            <img src="<?= base_url();?>assets/logos/logo.png" width="100%" alt="Housing Society"  />
                        </span>
                    </div>
                    <!-- Form -->
            <!--         <form class="card" action="<?= base_url();?>ipanel/login" method="post">
                
                    <div class="card-body p-6">
                 
                    <?php if ($this->session->flashdata('msg')): ?>
                  
                    <div class="alert alert-icon alert-danger" role="alert">
                            <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> 
                            <?= $this->session->flashdata('msg');?>  
                            
                    </div>
                  <?php endif ?>
                  <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter email" required="1">
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                     <!--  <a href="<?=base_url();?>forgot-password.html" class="float-right small">I forgot password</a> -->
              <!--      </label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required="1">
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" />
                      <span class="custom-control-label">Remember me</span>
                    </label>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                  </div>
                </div>
              </form>
                </div>
                <div id="recoverform">
               
                    <div class="row m-t-20">
                        <!-- Form -->
                  <!--      <form class="col-12" action="index.html">
                            <!-- email -->
                     <!--       <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <!-- pwd -->
                      <!--     <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                    <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
   <!-- </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?= base_url();?>assets/ipanel/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url();?>assets/ipanel/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url();?>assets/ipanel/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
  <!--   <script src="../../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script> -->
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    $('#register').click(function(){
        
        $("#loginform").hide();
        $("#register_form").show();

    });
    
    </script>

</body>

</html>