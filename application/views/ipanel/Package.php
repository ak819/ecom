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
                        <h4 class="page-title">Package management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Package management</li>
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
                <?php
              //  print_r($Package);exit;?>
                <div class="row">
                    <div class="col-md-12">
                       <div id="add_cat" <?= ($flag=='edit')?"style='display:block'":"style='display:none'"?> >
                        <div class="card">
                           <form class="form-horizontal" action="<?= base_url();?>Package/<?= ($flag=="edit")?"update/".$this->uri->segment(3):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                          
                                <div class="card-body">
                                    <h4 class="card-title">Package Details</h4>
                                      <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Package name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Package name" name="pack_name" required="1" value="<?= ($flag=='edit') ? $Package->pack_name:"";?>" />
                                        </div>
                                      </div>
                                      
                                      <div class="form-group row">
                                        <label for="pack_per" class="col-sm-3 text-right control-label col-form-label"> Products percentage:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Products percentage" name="pack_per" required="1" value="<?= ($flag=='edit') ? $Package->pack_per:"";?>" />
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="pack_per_product" class="col-sm-3 text-right control-label col-form-label">Fixed Per Products </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Fixed Per Products" name="pack_per_product" required="1" value="<?= ($flag=='edit') ? $Package->pack_per_product:"";?>" />
                                        </div>
                                      </div>

                                       <div class="form-group row">
                                        <label for="pack_min" class="col-sm-3 text-right control-label col-form-label"> Minimum Amount limit</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Minimum amount to be paid" name="pack_min" required="1" value="<?= ($flag=='edit') ? $Package->pack_min:"";?>" />
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="pack_max" class="col-sm-3 text-right control-label col-form-label"> Maximum Amount Limit</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Maximum Amount to be paid" name="pack_max" required="1" value="<?= ($flag=='edit') ? $Package->pack_max:"";?>" />
                                        </div>
                                      </div>


                                        <div class="form-group row">
                                        <label for="accounttype" class="col-sm-3 text-right control-label col-form-label"> User Type</label>


                                      <div class="form-check-inline">
                                        <label class="text-right control-label form-control">
                                          <input type="radio" class="form-check-input" name="accounttype" value="Seller"  <?= ($flag=="edit" && $Package->accounttype=="Seller") ? "checked='true'":""; ?> >Seller
                                        </label>
                                      </div>
                                       <div class="form-check-inline">
                                      <label class="text-right control-label form-control">
                                        <input type="radio" class="form-check-input" name="accounttype" value="Buyer" <?= ($flag=="edit" && $Package->accounttype=="Buyer") ? "checked='true'":""; ?> >Buyer
                                      </label>
                                    </div> 
                                      </div>
                                 <!--    <div class="form-group row">
                                     <label for="fname" class="col-sm-3 text-right control-label col-form-label">Package Image:</label>
                                     <div class="col-sm-9">
                                        <div class="custom-file">
                                         <?php  if($flag=='edit'){?>
                                         <input type="hidden" name="hidden_photo" id="hidden_photo" value="<?php echo $Package->pack_img;?>" />
                                         <img src="<?php echo base_url();?>assets/ipanel/uploads/Package_img/small/<?php echo $Package->pack_img;?>" />
                                         <?php }?>
                                         <input type="file"  id="validatedCustomFile" name="pack_img" <?= ($flag!="edit") ? "required='1'":"";?> />
                                       </div>
                                     </div>
                                 </div> -->
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Package Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="pack_discp" value="" placeholder="Package Description"><?= ($flag=='edit') ? $Package->pack_discp:"";?></textarea>
                                        </div>
                                    </div>  
                                         
                                    </div>
                                     
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"><?= ($flag=="edit")?"Update":"Save"?></button>
                                        <button type="button" class="btn btn-danger button_close" onclick="close_unit();">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                      </div>
                <!--       <div class="col-md-2">
                 <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                                     </div> -->
                 <div class="card">
                            <div class="card-body">
   <h5 class="card-title">Package Details</h5>
                               <div class="widget-content nopadding">
                                  <table id="zero_config" class="table table-striped table-bordered">
                                 
                                        <thead>
                                           <tr>
                                                <th>Package name</th>
                                        <!--    <th>Package Image</th> -->
                                                <th>Package Percentage</th>
                                                <th>Package Per Product</th>
                                                <th>Package Min</th>
                                                <th>Package Max</th>
                                                <th>Package for</th>
                                               <th>Package Description</th>
                                                <th>Action</th>
                                            </tr>
                                             </thead>
                                            <tbody id="new_tbody">
                                              <?php
                                              foreach ($PackageList as $key => $value) {
                                             
                                                ?>
                                                 <tr>
                                                <td><?= $value->pack_name ?></td>
                                                <td><?= $value->pack_per;?></td>
                                                <td><?= $value->pack_per_product;?></td>
                                                <td><?= $value->pack_min;?></td>
                                                <td><?= $value->pack_max;?></td>
                                                <td><?= $value->accounttype;?></td>
                                                <td><?= $value->pack_discp;?></td>
                                               <!--  <td> <img src="<?php echo base_url();?>assets/ipanel/uploads/Package_img/thumb/<?php echo $value->pack_img;?>" />
                                                                                             </td>
                                                                                              --> 
                                               <td> <a href="<?= base_url();?>Package/edit/<?= $value->pack_id?>" class="btn btn-cyan btn-sm" data-original-title="Edit">Edit</a>
                                                </td>
                                            </tr>
                                                <?php
                                              }
                                              ?>
                                              </tbody>
                                            <tfoot>
                                              <tr>
                                                <th>Package name</th>
                                               <!--  <th>Package Image</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                              </div>
                            </div>
                 
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function add_cat()
{
  //alert("ihjn");
  $('#add_cat').show();
}
function close_unit()
{
  //alert("ihjn");
  $('#add_cat').hide();
}
  </script>
