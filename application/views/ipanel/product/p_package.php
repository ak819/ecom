<?php 
$flag=$this->uri->segment(3);

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
              //  print_r($category);exit;?>
                <div class="row">
                    <div class="col-md-12">
                       <div id="add_cat" <?= ($flag=='edit')?"style='display:block'":"style='display:none'"?> >
                        <div class="card">
                           <form class="form-horizontal" action="<?= base_url();?>ipanel/package/<?= ($flag=="edit")?"update":"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                           <input type="hidden"  name="p_id" value="<?=$p_id?>">
                            <input type="hidden"  name="id" value="<?php if($flag == "edit"){ echo $info->id;  } ?>">
                                <div class="card-body">
                                    <h4 class="card-title">Package Details</h4>
                                    <div class="form-group row" >
                                      <label for="exampleInputEmail1" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                     
                                      <div class="col-sm-9">
                                      <input type="text" class="form-control" name="name" value="<?php if($flag == "edit"){ echo $info->name;  } ?>" placeholder="Enter Package Name Here">

                                       
                                      </div>
                                    </div>
                                    

                                     <div class="form-group row" >
                                      <label for="exampleInputEmail1" class="col-sm-3 text-right control-label col-form-label">Price</label>
                                     
                                      <div class="col-sm-9">
                                      <input type="number" class="form-control" name="price" value="<?php if($flag == "edit"){ echo $info->price;  } ?>" placeholder="Enter Package Price Here">

                                       
                                      </div>
                                    </div>

                                    <div class="form-group row" >
                                      <label for="exampleInputEmail1" class="col-sm-3 text-right control-label col-form-label">Discount</label>
                                     
                                      <div class="col-sm-9">
                                      <input type="number" class="form-control" name="discount" value="<?php if($flag == "edit"){ echo $info->discount;  } ?>" placeholder="Enter Package Discount Here">

                                       
                                      </div>
                                    </div>

                                    <div class="form-group row" >
                                      <label for="exampleInputEmail1" class="col-sm-3 text-right control-label col-form-label">Weight (In Gm Only)</label>
                                     
                                      <div class="col-sm-9">
                                      <input type="number" class="form-control" name="weight" value="<?php if($flag == "edit"){ echo $info->weight;  } ?>" placeholder="Enter Package Weight For Shipping Here">

                                       
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <div class="col-md-9">
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
                  <?php if ($this->session->flashdata('msg')) { ?>
                      
                   <div class="alert alert-success" role="alert"> <a class="close" data-dismiss="alert" href="#">x</a>
                      <?= $this->session->flashdata('msg'); ?>
                    </div>

                  <?php } ?>

                  <div class="card-header" style="margin-bottom: 30px;">
                    <h4 class="card-title"><center><?= $p_info[0]['p_name'] ?></center></h4>
                  </div>
                            <div class="card-body">
   <h5 class="card-title">Package List</h5>
                               <div class="widget-content nopadding">
                                  <table id="zero_config" class="table table-striped table-bordered">
                                 
                                        <thead>
                                           <tr>
                                                 
                                                <th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                              <!--   <th>Text</th> -->
                                                <th>Action</th>
                                            </tr>
                                             </thead>
                                            <tbody id="new_tbody">
                                              <?php

                                              if($p_packages)
                                              { $i=1;
                                              foreach ($p_packages as $key => $value) {
                                                # code...
                                                ?>
                                                 <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $value->name ?></td>
                                                <td><?= $value->price ?></td>
                                                <td><?= $value->discount ?></td>
                                              <td> <a href="<?= base_url();?>ipanel/Package/edit/<?= $value->p_id?>/<?= $value->id?>" class="btn btn-cyan btn-sm" data-original-title="Edit">Edit</a>

                                                  <?php if ($value->status=="a"){ ?>
                            <a class="btn btn-success btn-xs"  href="<?= base_url();?>ipanel/package/status/d/<?=$value->p_id;?>/<?=$value->id;?>"> <?= "Active" ?> </a>
                          <?php }else{ ?>
                            <a class="btn btn-danger btn-xs" href="<?= base_url();?>ipanel/package/status/a/<?=$value->p_id;?>/<?=$value->id;?>"> <?= "Deactive" ?> </a>
                       <?php  } ?>
                                                    
                                                </td>
                                               
                                            </tr>
                                                <?php
                                              } }
                                              ?>
                                              </tbody>
                                           
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
  $('.button_class').css('display','none');
}
function close_unit()
{
  //alert("ihjn");
 $('#add_cat').hide();
 $('.button_class').css('display','block');

}
  </script>
