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
                        <h4 class="page-title">Category management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Category management</li>
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
                           <form class="form-horizontal" action="<?= base_url();?>Category/<?= ($flag=="edit")?"update/".$this->uri->segment(3):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                          
                                <div class="card-body">
                                    <h4 class="card-title">Category Details</h4>
                                      <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Category name" name="cat_name" required="1" value="<?= ($flag=='edit') ? $category->cat_name:"";?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category Image:</label>
                                        <div class="col-sm-9">
                                           <div class="custom-file">
                                            <?php  if($flag=='edit'){?>
                                            <input type="hidden" name="hidden_photo" id="hidden_photo" value="<?php echo $category->cat_img;?>" />
                                            <img src="<?php echo base_url();?>assets/ipanel/uploads/category_img/small/<?php echo $category->cat_img;?>" />
                                            <?php }?>
                                            <input type="file"  id="validatedCustomFile" name="cat_img" <?= ($flag!="edit") ? "required='1'":"";?> />
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Category Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="cat_discp" value="" placeholder="Category Description"><?= ($flag=='edit') ? $category->cat_discp:"";?></textarea>
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
                      <div class="col-md-2">
                       <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                     </div>
                 <div class="card">
                            <div class="card-body">
   <h5 class="card-title">Category Details</h5>
                               <div class="widget-content nopadding">
                                  <table id="zero_config" class="table table-striped table-bordered">
                                 
                                        <thead>
                                           <tr> 
                                                <th>Sr.No</th>
                                                <th>Category name</th>
                                                <th>Category Image</th>
                                                <th>Action</th>
                                            </tr>
                                             </thead>
                                            <tbody id="new_tbody">
                                              <?php
                                              foreach $i=0; ($categoryList as $key => $value) {
                                                # code...
                                                ?>
                                                 <tr>
                                                <td><?= $i++ ;?></td>  
                                                <td><?= $value->cat_name ?></td>
                                                <td>
                                                  <img src="<?php echo base_url();?>assets/ipanel/uploads/category_img/thumb/<?php echo $value->cat_img;?>" />
                                                </td>

                                                
                                              <td> <a href="<?= base_url();?>Category/edit/<?= $value->cat_id?>" class="btn btn-cyan btn-sm" data-original-title="Edit">Edit</a>

                                                  <?php if ($value->cat_status=="a"){ ?>
                            <a class="btn btn-success btn-xs"  href="<?= base_url();?>Category/status/d/<?=$value->cat_id;?>"> <?= "Active" ?> </a>
                          <?php }else{ ?>
                            <a class="btn btn-danger btn-xs" href="<?= base_url();?>Category/status/a/<?=$value->cat_id;?>"> <?= "Deactive" ?> </a>
                       <?php  } ?>
                                                    
                                                </td>
                                               
                                            </tr>
                                                <?php
                                              }
                                              ?>
                                              </tbody>
                                            <tfoot>
                                              <tr>
                                                <th>Category name</th>
                                                <th>Category Image</th>
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
