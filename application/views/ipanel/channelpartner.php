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
                        <h4 class="page-title">Channel Partner Management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Content Management</li>
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
                           <form class="form-horizontal" action="<?= base_url();?>ipanel/channelpartner/<?= ($flag=="edit")?"update/".$this->uri->segment(4):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                          
                                <div class="card-body">
                    
                                      
                                     <div class="form-group row">

                                    <label for="exampleInputEmail1" class="col-sm-3 text-right control-label col-form-label">Logo</label><br>
                                    <?php  if($flag =='edit'){?>
                                    <input type="hidden" name="hidden_photo" id="hidden_photo" value="<?php echo $info[0]->image;?>" />

                                    <div class="col-sm-9">
                                    <img height="150" width="150" id="image_upload_preview" src="<?php echo base_url();?>assets/ipanel/uploads/banner/<?php echo $info[0]->image;?>" />
                                     </div>
                                    <?php }?><br>
                                     <?php if($flag =="index") {?>
                                     <div class="col-sm-9">
                                     <img   height="150" width="150" style="margin-bottom:20px;" id="image_upload_preview" src="<?php echo base_url()?>assets/images/download.png" alt="your image" />
                                     </div>
                                     <?php } ?>
              
                                     <div class="offset-3 col-sm-9">
                                      <input type="file" name="image" id="inputFile"  value="" <?= ($flag=="edit")? "":"required='1'";?> />
                                     </div>
                                     </div>
                                    

                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                     
                                      <div class="col-sm-6">
                                      <input type="text" class="form-control" name="title" value="<?php if($flag == "edit"){  echo $info[0]->title;  } ?>" required/>
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
   <h5 class="card-title">Channel Partner Details</h5>
                               <div class="widget-content nopadding">
                                  <table id="zero_config" class="table table-striped table-bordered">
                                 
                                        <thead>
                                           <tr>
                                                
                                                <th>Logo</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                             </thead>
                                            <tbody id="new_tbody">
                                              <?php

                                              if($channelpartner_list)
                                              {
                                              foreach ($channelpartner_list as $key => $value) {
                                                # code...
                                                ?>
                                                 <tr>
                                               
                                                <td>
                                                  <img  style="width:150px;height:100px;"src="<?php echo base_url();?>assets/ipanel/uploads/channelpartner/<?php echo $value->image; ?>" />
                                                </td>
                                                <td><?= $value->title ?></td>
                                              <td> <a href="<?= base_url();?>ipanel/channelpartner/edit/<?= $value->id?>" class="btn btn-cyan btn-sm" data-original-title="Edit">Edit</a>

                                                  <?php if ($value->status=="a"){ ?>
                            <a class="btn btn-success btn-xs"  href="<?= base_url();?>ipanel/channelpartner/status/d/<?=$value->id;?>"> <?= "Active" ?> </a>
                          <?php }else{ ?>
                            <a class="btn btn-danger btn-xs" href="<?= base_url();?>ipanel/channelpartner/status/a/<?=$value->id;?>"> <?= "Deactive" ?> </a>
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
}
function close_unit()
{
  //alert("ihjn");
  $('#add_cat').hide();
}
  </script>
