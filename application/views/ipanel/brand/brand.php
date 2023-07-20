 <?php 
$flag=$this->uri->segment(3);

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
                                    <li class="breadcrumb-item active" aria-current="page">Brand</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">

                <div id="add_cat" <?= ($flag=='edit')?"style='display:block'":"style='display:none'"?> >
                      <div class="card">
                      <div class="card-body">
                               <form class="form-horizontal" action="<?= base_url();?>ipanel/brand/<?= ($flag=="edit")?"update/".$this->uri->segment(4):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Brand Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="Brand Name Here" name="<?= ($flag=="edit")?"name":"name[]"?>" required="1" value="<?php if($flag == "edit"){  echo $info->name;  } ?>">
                                     

                                       
                                           
                                        </div>
                                   
                                  <div class="col-sm-12">
                                       <br>
                                          <div class="input_fields_container_category">
                            

                                          </div>

                                  </div>
                                           
                                     <?php if($flag !=="edit"){ ?>     
                                   
                                          <label class="control-label col-sm-3 text-right control-label col-form-label"></label>
                                       
                                           <div class="col-sm-6">
                                            <button class="btn btn-primary" id="addbrand">Add more</button>
                                            </div>
                                          
                                    
                                    <br>
                                <?php } ?>
                                    </div>
                                  
                                        

                                    <button type="submit" class="btn btn-success"><?= ($flag=="edit")?"Update":"Save"?></button>
                                     <button type="button" class="btn btn-danger button_close" onclick="close_unit();">Close</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                          <div class="col-md-2">
                       <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                     </div>
                        <div class="container-fluid">
                                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Brand List</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Brand Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <?php foreach($brandlist as $val) { ?>
                                            <tr>
                                                <td><?= $val->name ?></td>
                                                <td><a href="<?= base_url();?>ipanel/brand/edit/<?= $val->id;?>" class="btn btn-cyan btn-sm" data-original-title="Edit" target="_blank">Edit</a>
                          <?php if ($val->status =='a'){ ?>
                          <a href="<?= base_url();?>ipanel/brand/status/d/<?= $val->id;?>" class="btn btn-success btn-sm" data-original-title="Click to Deactivate">Activated</a>
                        <?php } else { ?> <a href="<?= base_url();?>ipanel/brand/status/a/<?= $val->id;?>" class="btn btn-danger btn-sm" data-original-title="Click to Activate">Deactivated</a> <?php } ?></td>
                                            </tr>

                                           <?php } ?>
                                     
                                    </table>
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