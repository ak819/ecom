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
                                    <li class="breadcrumb-item active" aria-current="page">Product management</li>
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
              //  print_r($category);exit;?>
                <div class="row">
                    <div class="col-md-12">
                       <div id="add_cat" <?= ($flag=='edit')?"style='display:block'":"style='display:none'"?> >
                        <div class="card">
                           <form class="form-horizontal" action="<?= base_url();?>Product/<?= ($flag=="edit")?"update/".$this->uri->segment(3):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                          
                                <div class="card-body">
                                    <h4 class="card-title">Product Details</h4>
                                      <div class="form-group row">
                                        <label for="cname" class="col-sm-3 text-right control-label col-form-label">Category name:</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select" name="cat_id" id="cat_id" style="width: 100%; height:36px;">
                                             
                                               <?php
                                              // echo "inn";
                                              // print_r($categoryList);exit;
                                               ?>
                                              <?php foreach($categoryList as $row){?>
                                              <option value="<?php echo $row->cat_id ;?>"<?php if($flag=='edit'){ if($product->cat_id==$row->cat_id){?> selected="selected"<?php } }?>>
                                              <?php echo $row->cat_name ;?></option>
                                              <?php }?>
                                    </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product Image:</label>
                                        <div class="col-sm-9">
                                           <div class="custom-file">
                                            <?php  if($flag=='edit'){?>
                                            <input type="hidden" name="hidden_photo" id="hidden_photo" value="<?php echo $product->p_img;?>" />
                                            <img src="<?php echo base_url();?>assets/ipanel/uploads/product_img/small/<?php echo $product->p_img;?>" />
                                            <?php }?>
                                            <input type="file"  id="validatedCustomFile" name="p_img" <?= ($flag!="edit") ? "required='1'":"";?> />
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="p_name" class="col-sm-3 text-right control-label col-form-label">Product Name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="p_name" placeholder="Product Name Here" value="<?= ($flag=='edit') ? $product->p_name:"";?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Product Features:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="p_features" value="" placeholder="Product Features"><?= ($flag=='edit') ? $product->p_features:"";?></textarea>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Product Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="p_descp" value="" placeholder="Category Description"><?= ($flag=='edit') ? $product->p_descp:"";?></textarea>
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Product Specification:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="p_descp" value="" placeholder="Product Specification"><?= ($flag=='edit') ? $product->p_specification:"";?></textarea>
                                        </div>
                                    </div>  
                                     <?php if ($flag=="edit"){ ?>
     

        <div class="input_fields_container ">
            <?php 
              $cnt=1;
              foreach ($packeglist as $pack ) { ?>

            <div class="control-group">
              <label class="control-label">Product Packeging <?= $cnt++; ?> :</label>
              <div class="controls">
                <input type="hidden" name="pakage_id[]"   value="<?=$pack->pack_id?>">
                <input type="text" name="pakage_name[]" class="span3" placeholder="Product Packaging" required="1" value="<?=$pack->pack_name?>">
                <input type="text" name="pakage_mrp[]" class="span3" placeholder="Product Mrp" required="1" value="<?=$pack->pack_mrp ?>">
                <input type="text" name="pakage_price[]" class="span2" placeholder="Product Price" required="1" value="<?=$pack->pack_price ?>">
                <input type="text" name="pakage_quantity[]" class="span3" placeholder="Product  Quantity" required="1" value="<?=$pack->pack_quantity ?>">
                <?php if ($pack->pack_status=='y'){ ?>
                          <a data-id="<?= $pack->pack_id;?>" class="btn btn-success btn-mini tip-bottom changestatus" data-original-title="Click to Deactivate">Activated</a>
                        <?php } else { ?> <a data-id="<?= $pack->pack_id;?>" class="btn btn-danger btn-mini tip-bottom changestatus" data-original-title="Click to Activate" >Deactivated</a> <?php } ?>
                
              </div>
            </div>
              <?php }
             ?>
             <div class="controls">
              <button class="btn btn-sm btn-primary add_more_button">Add More</button>
        </div>
        </div>

        <?php }else{ ?>
        

        <div class="input_fields_container ">
            <div class="control-group">
              <label class="control-label">Product Packeging 1 :</label>
              <div class="controls">
                <input type="text" name="pakage_name[]" class="span3" placeholder="Product Packaging" required="1">
                <input type="text" name="pakage_mrp[]" class="span3" placeholder="Product MRP">
                <input type="text" name="pakage_price[]" class="span2" placeholder="Product Price" required="1">
                <input type="text" name="pakage_quantity[]" class="span3" placeholder="Product  Quantity" required="1">
                 <button class="btn btn-sm btn-primary add_more_button">Add More</button>
              </div>
            </div>
        </div>
<?php } ?>
                                         
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
                     <!--  <div class="col-md-2">
                      <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                                          </div> -->
                 <div class="card">
                            <div class="card-body">
   <h5 class="card-title">Product List</h5>
                               <div class="widget-content nopadding">
                            <div class="table-responsive">
                                  <table id="zero_config" class="table table-striped table-bordered table-condensed">
                                         <thead> 
                    <tr> 
                        <th>sr.no.</th> 
                        <th>Product Name</th> 
                        <th>Image</th>
                  <!--       <th>Condition</th> 
                  <th>Discription</th> 
                  <th>Specification</th>  -->
                        <th>Stock</th> 
                        <th>Price</th> 
                       <!--  <th>Reason to sell</th> --> 
                        <th>Uploaded by</th> 
                 <!--        <th>Contact</th>  -->
                        
                        <th>More details</th> 
                        
                        <th>Action</th> 
                        
                       
                    </tr> 
                    </thead> 
                    <tbody> 
                    <tr> 

                        <?php $cnt=1; foreach ($productList as $row ): ?>
                                

                        <td><?= $cnt++?></td> 
                        <td><?= $row->p_name?></td> 
                        <td><img src="<?= base_url()?>assets/ipanel/uploads/product_img/small/<?= $row->p_image?>" alt="<?= $row->p_image?>" width="50%" ></td> 
                        <!-- <td><?= $row->p_condition?></td> 
                        <td><?= $row->p_description?></td> 
                        <td><?= $row->p_specification?></td>  -->
                        <td><?= $row->p_stock?></td> 
                        <td><?= $row->p_price?></td> 
                      <!--   <td><?= $row->p_reason?></td> --> 
                        <td><?= $row->comp_name?> - <?= $row->contactper?></td> 
                        <!-- <td><?= $row->mobile?> /   <?= $row->email?></td>  -->
                        <td>
                          <button data-toggle="modal" data-target="#productDetails" data-remote="false"  class="btn btn-primary btn-xs" href="<?= base_url()?>admin/productDetails/<?= $row->id?>"> More details</button>
                        </td>
                        <td> 
                          <?php if ($row->p_status=="active"){ ?>
                            <a class="btn btn-success btn-xs"  href="<?= base_url();?>Products/status/deactive/<?=$row->id;?>"> <?= "Active" ?> </a>
                          <?php }else{ ?>
                            <a class="btn btn-danger btn-xs" href="<?= base_url();?>Products/status/active/<?=$row->id;?>"> <?= "Deactive" ?> </a>
                       <?php  } ?>
                     </td>
                  </tr> 
                 
                        <?php endforeach ?>
                                      
                                  </table>
                                  </div>
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

  <div class="modal fade" id="productDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enquiry From</h4>
      </div>
      <div class="modal-body">
        ...loading...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


