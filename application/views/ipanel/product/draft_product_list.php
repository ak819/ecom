<?php 
$flag=$this->uri->segment(2);

?>
  <script src="<?= base_url();?>assets/ipanel/dist/js/baseurl.js"></script>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
              <?php if ($this->session->flashdata('msg')) { ?>
                      <div class="alert alert-success" role="alert"> <a class="close" data-dismiss="alert" href="#">x</a>
                      <?= $this->session->flashdata('msg'); ?>
                    </div>
                  <?php } ?>
                  <?php if ($this->session->flashdata('msgr')) { ?>
                      <div class="alert alert-danger" role="alert"> <a class="close" data-dismiss="alert" href="#">x</a>
                      <?= $this->session->flashdata('msgr'); ?>
                    </div>
                  <?php } ?>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Draft Product management</h4>
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

                            <div class="card-body">
                                <h4><u>Product Details</u></h4>
                                    <form class="form-horizontal" action="<?= base_url();?>ipanel/product/<?= ($flag=="edit")?"update/".$this->uri->segment(4):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Category</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select"  name="cat_id" id="cat_id" onchange="getsubcat(this.value);" required="1">
                                           <option value="">Select Category</option>
                                            <?php foreach($cat_list as $val) { ?>
                                            <option value="<?= $val->cat_id ?>" <?php if($flag == "edit" AND $info->cat_id == $val->cat_id ){ echo "selected";  } ?>><?= $val->cat_name ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>

                                  <label class="col-md-3 m-t-15 filter">Select Sub Category 1</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat"  name="sub_id1" id="sub_id1" >
                                            <option value="">Select</option>
                                    
                                        </select>
                                    </div>

                                     <label class="col-md-3 m-t-15 filter">Select Sub Category 2</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat "   name="sub_id2" id="sub_id2" >
                                            <option value="">Select</option>
                                     
                                              

                                           
                                            
                                        </select>
                                    </div>

                                     <label class="col-md-3 m-t-15 filter">Select Sub Category 3</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat"   name="sub_id3" id="sub_id3" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 4</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat"   name="sub_id4" id="sub_id4" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 5</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat"   name="sub_id5" id="sub_id5" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>
                                    
                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 6</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat"   name="sub_id6" id="sub_id6" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 7</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat"   name="sub_id7" id="sub_id7" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>
                                     
                                     <label class="col-md-3 m-t-15 filter">Select Sub Category 8</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat"   name="sub_id8" id="sub_id8" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 9</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat"   name="sub_id9" id="sub_id9" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 10</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat"   name="sub_id10" id="sub_id10" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                     <label class="col-md-3 m-t-15">Brand</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select"  name="brand" required="1">
                                            <option value="">Select Brand</option>
                                     
                                          
                                              <?php foreach($brand_list as $brand) { ?>
                                            <option value="<?= $brand->id ?>" <?php if($flag == "edit" AND $info->sub_id2 == $brand->id ){ echo "selected";  } ?>><?= $brand->name ?></option>

                                            <?php  } ?>
                                            
                                        </select>
                                    </div>


                                     <label class="col-md-3 m-t-15">Product Name</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Product Name Here" 
                                            name="p_name"  value="<?php if($flag == "edit"){  echo $info->p_name;  } ?>" required>
                                    </div>
                                    <label class="col-md-3 m-t-15">Model No</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Model Number Here" 
                                         name="model_no"  value="<?php if($flag == "edit"){  echo $info->model_no;  } ?>" required>
                                    </div>
                                     <label class="col-md-3 m-t-15">GST</label>
                                    <div class="col-md-7">
                                         <select name="gst" required="1" class="select2 form-control custom-select" id="p_gst">
                                        <option value="" selected="selected">Select GST %</option>
                                        <option value="0" <?php if($flag=='edit'){ if($info->gst== "0"){?> selected="selected"<?php } }?>>0%</option>
                                         <option value="5" <?php if($flag=='edit'){ if($info->gst== "5"){?> selected="selected"<?php } }?>>5%</option>
                                         <option value="12" <?php if($flag=='edit'){ if($info->gst== "12"){?> selected="selected"<?php } }?>>12%</option>
                                         <option value="18" <?php if($flag=='edit'){ if($info->gst== "18"){?> selected="selected"<?php } }?>>18%</option>
                                         <option value="28" <?php if($flag=='edit'){ if($info->gst== "28"){?> selected="selected"<?php } }?>>28%</option>
    
                                      </select>
                                    </div>
                                    <label class="col-md-3 m-t-15">Base Price</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Product Base Price Here" 
                                         name="base_price"  value="<?php if($flag == "edit"){  echo $info->bottom_price;  } ?>" required>
                                    </div>



                                    <label class="col-md-3 m-t-15">Discount</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Product Discount  %  Here" 
                                         name="discount"  value="<?php if($flag == "edit"){  echo $info->discount;  } ?>">
                                    </div>

                                    <label class="col-md-3 m-t-15">Technical Specification</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="tech_spec" id="tech_spec" value="" ><?php if($flag == "edit"){  echo $info->tech_spec;  } ?></textarea>
                                         <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
                                               <script type="text/javascript">
                                                
                                      CKEDITOR.replace( 'tech_spec',
                                      {
                                            width: '100%',
                                           /* enterMode: CKEDITOR.ENTER_BR,
                                             shiftEnterMode: CKEDITOR.ENTER_BR,
                                             //skin : 'office2003',
                                              language: 'nl',*/
           
                                           
                                         filebrowserBrowseUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/ckfinder.html',
                                         filebrowserImageBrowseUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/ckfinder.html?type=Images',
                                         filebrowserFlashBrowseUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/ckfinder.html?type=Flash',
                                         filebrowserUploadUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                         filebrowserImageUploadUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                         filebrowserFlashUploadUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                                         } 
                                         );
                                    </script>     

                                    </div>

                                     <label class="col-md-3 m-t-15">Warranty</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Product Warranty Here" 
                                         name="warranty"  value="<?php if($flag == "edit"){  echo $info->warranty;  } ?>">
                                    </div>
                                     <label class="col-md-3 m-t-15">Support</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Product Support Here" 
                                         name="support"  value="<?php if($flag == "edit"){  echo $info->support;  } ?>">
                                    </div>

                                    <label class="col-md-3 m-t-15">Pdf</label>
                                    <div class="col-md-7">
                                         <input type="file" name="p_pdf"/>
                                    </div>
                                  
                                   
                         </div> 
                           <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Status</label>
                                    <div class="col-md-7">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="status" required="" value="a" <?php if($flag == "edit" AND $info->status=="a"){  echo "checked";  } ?>>
                                            <label class="custom-control-label" for="customControlValidation1">Active</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="status" required="" value="d" <?php if($flag == "edit" AND $info->status=="d"){  echo "checked";  } ?>>
                                            <label class="custom-control-label" for="customControlValidation2">Deactive</label>
                                        </div>
                                    </div>
                                </div>


                        

                          <button type="submit" class="btn btn-success"><?= ($flag=="edit")?"Update":"Save"?></button>
                          <button type="button" class="btn btn-danger button_close" onclick="close_unit();">Close</button> 

                           

                         </form>
                          </div>

                             
                           </div>

                        </div>
                      </div>
                     <div class="col-md-2">
                    <!--   <button type="button" class="btn btn-primary button_class"  id="new" onclick="add_cat();">New</button> -->
                                          </div> 
                 <div class="card">
                            <div class="card-body">
   <h5 class="card-title">Draft Product List</h5>
                               <div class="widget-content nopadding">
                            <div class="table-responsive">

                     <form class="form-horizontal m-t-20" id="draftproduct" action="<?= base_url();?>ipanel/product/movetoproduct" method="POST" >            
                                  <table id="draft_table" class="table table-striped table-bordered table-condensed">
                                         <thead> 
                    <tr> 
                       <th width="2%"><input type="checkbox" name="ckbCheckAll" id="select_all"  />All</th>
                        <th>Sr.No</th> 
                        <th>Product Name</th> 
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Model No</th>
                      <!--   <th>Technical Specification</th>  -->
                        <!-- <th>GST</th>  -->
                        <th>Base Price</th> 
                      <!--   <th>Warranty</th> 
                        <th>Support</th> -->
                       <th>Action</th>
                        
                       
                    </tr> 
                    </thead> 
                    <tbody> 
                    <tr> 

                        <?php $cnt=1; foreach ($productsList as $row ): ?>
                                
                         <td><input type="checkbox" class="checkBoxClass" name="chk_product[]" value="<?=$row->id?>"/></td>
                        <td><?= $cnt++?></td> 
                        <td><?= $row->p_name?></td>
                     
                        <td><?php  echo $row->cat_name; ?>
                        <td><?= $row->brand_name ?></td>
                        <td><?= $row->model_no ?></td>
                       <!--  <td><?= $row->tech_spec  ?></td> -->
                      <!--   <td><?= $row->gst ?></td> -->
                        <td><?= $row->bottom_price ?></td>
                       <!--  <td><?= $row->warranty ?></td>
                        <td><?= $row->support ?></td> -->
                        <td><a href="<?= base_url();?>ipanel/product/draftedit/<?= $row->id;?>" class="btn btn-cyan btn-sm" data-original-title="Edit" >Edit</a>
                       <a href="<?= base_url();?>ipanel/product/draftdelete/<?= $row->id;?>" class="btn btn-cyan btn-sm deletedraft"  >Delete</a></td>  
                        

                  </tr> 
                 
                        <?php endforeach ?>
                                      
                                  </table>
                                  <?php if(empty(!$productsList)){ ?>
                                  <button class="btn btn-primary button_class" type="submit" name="move to product" id="movetoproduct" value="move to product"  >move to product</button> 
                                   <?php }else{ ?>
                                    <button class="btn btn-primary button_class" type="submit" name="move to product" id="movetoproduct" value="move to product"  disabled>move to product</button> 
                                   <?php } ?>
                                </form>
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
  $('#new').hide();
}
function close_unit()
{
  //alert("ihjn");
   $('#new').show();
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


