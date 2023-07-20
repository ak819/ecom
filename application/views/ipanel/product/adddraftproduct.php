<?php 
$flag=$this->uri->segment(3);
?>
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
                       <!--  <h4 class="page-title">Sub Category Manegment</h4> -->
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div id="add_cat">
             <div class="card">
                            <div class="card-body">
                                <h4><u>Product Details</u></h4>
                                    <form class="form-horizontal" action="<?= base_url();?>ipanel/product/<?= ($flag=="draftedit")?"updatedraft/".$this->uri->segment(4):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Main Category</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select "  name="cat_id" id="cat_id" onchange="getsubcat(this.value);" required="1">
                                           <option value="">Select Category</option>
                                            <?php foreach($cat_list as $val) { ?>
                                            <option value="<?= $val->cat_id ?>" <?php if($flag == "draftedit" AND $info[0]['cat_id'] == $val->cat_id ){ echo "selected";  } ?>><?= $val->cat_name ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                  
                                  <?php for($i=1; $i <=10; $i++) {  ?>
                                    <label class="col-md-3 m-t-15 filter">
                                      <?php if(isset($filters[0]['sub_cat_'.$i.'']) AND empty(!$filters[0]['sub_cat_'.$i.''])){ echo $filters[0]['sub_cat_'.$i.'']; }else{ echo 'Sub Category'.' '.$i; } ?></label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select subcat" name="sub_id<?= $i ?>" id="sub_id<?= $i ?>">

                                            <option value="">Select <?php if(isset($filters[0]['sub_cat_'.$i.'']) AND empty(!$filters[0]['sub_cat_'.$i.''])){ echo $filters[0]['sub_cat_'.$i.'']; }else{ echo 'Sub Category'.' '.$i; } ?></option>
                                            <?php 
                                             $subcatgories=$this->m_subcategory->getcatwise($info[0]['cat_id'],$i);
                                             ?>
                                              <?php foreach($subcatgories as $val) { ?>
                                            <option value="<?= $val->id ?>" <?php if($flag == "draftedit" AND $info[0]['sub_id'.$i.''] == $val->id ){ echo "selected";  } ?>><?= $val->name ?></option>

                                            <?php  } ?>
                                        </select>

                                       
                                    </div>
                                  <?php } ?>

                                     <label class="col-md-3 m-t-15">Brand</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select"  name="brand" required="1">
                                            <option value="">Select Brand</option>
                                     
                                          
                                              <?php foreach($brand_list as $brand) { ?>
                                            <option value="<?= $brand->id ?>" <?php if($flag == "draftedit" AND $info[0]['brand_id'] == $brand->id ){ echo "selected";  } ?>><?= $brand->name ?></option>

                                            <?php  } ?>
                                            
                                        </select>
                                    </div>


                                     <label class="col-md-3 m-t-15">Product Name</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Product Name Here" 
                                            name="p_name"  value="<?php if($flag == "draftedit"){  echo $info[0]['p_name'];  } ?>" required>
                                    </div>
                                    <label class="col-md-3 m-t-15">Model No</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Model Number Here" 
                                         name="model_no"  value="<?php if($flag == "draftedit"){  echo $info[0]['model_no'];  } ?>" required>
                                    </div>
                                     <label class="col-md-3 m-t-15">GST</label>
                                    <div class="col-md-7">
                                         <select name="gst" required="1" class="select2 form-control custom-select" id="p_gst">
                                        <option value="" selected="selected">Select GST %</option>
                                        <option value="0" <?php if($flag=='draftedit'){ if($info[0]['gst']== "0"){?> selected="selected"<?php } }?>>0%</option>
                                         <option value="5" <?php if($flag=='draftedit'){ if($info[0]['gst']== "5"){?> selected="selected"<?php } }?>>5%</option>
                                         <option value="12" <?php if($flag=='draftedit'){ if($info[0]['gst']== "12"){?> selected="selected"<?php } }?>>12%</option>
                                         <option value="18" <?php if($flag=='draftedit'){ if($info[0]['gst']== "18"){?> selected="selected"<?php } }?>>18%</option>
                                         <option value="28" <?php if($flag=='draftedit'){ if($info[0]['gst']== "28"){?> selected="selected"<?php } }?>>28%</option>
    
                                      </select>
                                    </div>
                                    <label class="col-md-3 m-t-15">Base Price</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Product Base Price Here" 
                                         name="base_price"  value="<?php if($flag == "draftedit"){  echo $info[0]['bottom_price'];  } ?>" required>
                                    </div>

                                    <label class="col-md-3 m-t-15">Discount</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Product Discount  %  Here" 
                                         name="discount"  value="<?php if($flag == "draftedit"){  echo $info[0]['discount'];  } ?>">
                                    </div>

                                    <label class="col-md-3 m-t-15">Technical Specification</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="tech_spec" id="tech_spec" value="" ><?php if($flag == "draftedit"){  echo $info[0]['tech_spec'];  } ?></textarea>
                                          <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
                                               <script type="text/javascript">
                                                
                                      CKEDITOR.replace( 'tech_spec',
                                      {
                                            width: '100%',
                                           
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
                                         name="warranty"  value="<?php if($flag == "draftedit"){  echo $info[0]['warranty'];  } ?>">
                                    </div>
                                     <label class="col-md-3 m-t-15">Support</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Product Support Here" 
                                         name="support"  value="<?php if($flag == "draftedit"){  echo $info[0]['support'];  } ?>">
                                    </div>
<!-- 
                                    <?php if($flag == "draftedit"){ ?>
                                      <label class="col-md-3 m-t-15">Pdf Link</label>
                                      <div class="col-md-7">
                                          <a href="<?= $info[0]['p_pdf']?>"><?= $info[0]['p_pdf']?></a>
                                          <input type="hidden" name="hidden_pdf" value="<?= $info[0]['p_pdf']?>"/>
                                    </div>

                                    <?php } ?>
                                    <label class="col-md-3 m-t-15">Pdf</label>
                                    <div class="col-md-7">
                                         <input type="file" name="p_pdf"/>
                                    </div> -->

                                  
                                   
                         </div> 
                          <!--  <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Status</label>
                                    <div class="col-md-7">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="status" required="" value="a" <?php if($flag == "draftedit" AND $info[0]['status']=="a"){  echo "checked";  } ?>>
                                            <label class="custom-control-label" for="customControlValidation1">Active</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="status" required="" value="d" <?php if($flag == "draftedit" AND $info[0]['status']=="d"){  echo "checked";  } ?>>
                                            <label class="custom-control-label" for="customControlValidation2">Deactive</label>
                                        </div>
                                    </div>
                                </div> -->


                        

                          <button type="submit" class="btn btn-success"><?= ($flag=="draftedit")?"Update":"Save"?></button>

                           <button type="submit" class="btn btn-primary" value="move" name="move">Move To Product</button>
                           

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
  $('.button_class').show('display','block');
}
  </script>                   