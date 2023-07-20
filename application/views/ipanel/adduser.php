<?php 
$flag=$this->uri->segment(2);
?>
  <script src="<?= base_url();?>assets/ipanel/dist/js/baseurl.js"></script>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Product management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">user management</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
             
                     <!--  <div class="col-md-2">
                      <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                                          </div> -->
                 <div class="card">
                            <div class="card-body">
   <h5 class="card-title">Add user</h5>
                               <div class="widget-content nopadding">
                                      


<div class="home-form-wrap">
  <form action="<?= base_url()?>admin/Registration" method="post">

  <div class="form-group">
    <input type="text" class="form-control" id="Company Name" placeholder="Name of Company" name="comp_name">
  </div>

  <div class="form-group">
    <label class="radio-inline" style="">
      <input type="radio" name="accounttype" value="buyer"  checked>Buyer Account
    </label>
    <label class="radio-inline" style="">
      <input type="radio" name="accounttype" value="seller" >Seller Account
    </label>
    <label class="radio-inline" style="">
      <input type="radio" name="accounttype" value="both" >Both Account
    </label>
</div>
  
  <div class="form-group">  
    <textarea class="form-control" rows="3" placeholder="Address" name="address"></textarea>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="phoneno" placeholder="Enter Phone Number" name="phoneno">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="contactper" placeholder="Name of Contact Perosn" name="contactper">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="designation" placeholder="Designation" name="designation">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="email" placeholder="Email" name="email">
  </div>
  <div class="form-group">
  <select multiple class="form-control" name="category[]">
  <?php foreach ($categories as $category): ?>
    <option value="<?= $category->cat_id?>"><?= $category->cat_name ;?></option>
  <?php endforeach ?>
 </select>
</div>
  <div class="form-group">
    <input type="text" class="form-control" id="gstno" placeholder="GST Number" name="gstno">
  </div>
  
  <div class="form-group">
    <input type="password" class="form-control" id="pass" placeholder="Password" name="password">
  </div>
  
  <div class="form-group">
    <input type="password" class="form-control" id="cpass" placeholder="Confirm Password" name="cpassword">
  </div>
  <div class="checkbox">
  <label>
    <input type="checkbox" value="">
    I accept terms &amp; conditions
  </label>
</div>
  <button type="submit" class="btn btn-default">Submit</button>
  <button type="reset" class="btn btn-default">Reset</button>
</form>
</div>

                                </div>
                              </div>
                            </div>
                 
        </div>
      </div>
    </div>
  </div>
