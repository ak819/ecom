 <?php 
$flag=$this->uri->segment(2);

?>
 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
         
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                      <div class="page-breadcrumb">
                   <?php if ($this->session->flashdata('msg')) { ?>
                      <div class="alert alert-success" role="alert"> <a class="close" data-dismiss="alert" href="#">x</a>
                      <?= $this->session->flashdata('msg'); ?>
                    </div>
                  <?php } ?>
                  <?php if ($this->session->flashdata('msgr')) { ?>
                      <div class="alert alert-danger" role="alert"> <a class="close" data-dismiss="alert" href="#">x</a>
                      <?= $this->session->flashdata('msg'); ?>
                    </div>
                  <?php } ?>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">contact management</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">

                <div id="add_cat"  >
                      <div class="card">
                      <div class="card-body">
                               <form class="form-horizontal" action="<?= base_url();?>cms/updatecontact" method="post" autocomplete="off" enctype="multipart/form-data">
                                      
                                    <h3>Contact Details</h3>
                                    <div class="form-group row">
                                    <label for="description" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                        <div class="col-sm-6">
                                           <textarea class="form-control" name="address" placeholder="Enter Address Here" value="" ><?= $contact->address ?></textarea>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  placeholder="Enter Phone No Here" name="phone" required="1" value="<?= $contact->phone ?>">
                    
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="Enter Mobile No Here" name="mobile" required="1" value="<?= $contact->mobile ?>">
                    
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  placeholder="Enter Contact Email Here" name="email" required="1" value="<?= $contact->email ?>">
                    
                                        </div>
                                    </div>
                                     <hr>
                                    <h3>Social Media Details</h3>
                                     <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="Enter Social Email Here" name="email_link" required="1" value="<?= $contact->email_link ?>">
                    
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Whats app Number</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  placeholder="Enter Whats App No Here" name="whatsapp" required="1" value="<?= $contact->whatsapp ?>">
                    
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Whats app Message</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  placeholder="Enter Whats App Message Here" name="whatsapp_msg" required="1" value="<?= $contact->whatsapp_msg ?>">
                    
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Facebook Link</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" 
                                            placeholder="Enter Facebook link Here" name="facebook" required="1" value="<?= $contact->facebook ?>">
                    
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Youtube Link</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" 
                                            placeholder="Enter Facebook link Here" name="youtube" required="1" value="<?= $contact->youtube ?>">
                    
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Instagram Link</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" 
                                            placeholder="Enter Facebook link Here" name="insta" required="1" value="<?= $contact->insta ?>">
                    
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Linkdin Link</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="Enter Linkdin link Here" name="linkdin" required="1" value="<?= $contact->linkdin ?>">
                    
                                        </div>
                                    </div>

                                    
                                    <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                
                </div>

<script type="text/javascript">
    function add_cat()
{
  //alert("ihjn");
  $('#add_cat').show();
   $('.button_class').css('display','none');
}
function close_unit()
{
  //alert("ihjn");
  $('#add_cat').hide();
   $('.button_class').css('display','block');
}
  </script>