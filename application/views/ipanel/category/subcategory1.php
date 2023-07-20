 <?php 
$flag=$this->uri->segment(3);
$indexid=$this->uri->segment(4);

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
                                    <li class="breadcrumb-item active" aria-current="page">Sub Category <?= $indexid ?></li>
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
                               <form class="form-horizontal" action="<?= base_url();?>ipanel/subcategory/<?= ($flag=="edit")?"update/".$this->uri->segment(4)."/".$this->uri->segment(5):"store/".$this->uri->segment(4) ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                    <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Select Category</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-control custom-select" style=" height:36px;" name="cat_id"  required>
                                            <option value="">Select</option>
                                            <?php foreach($cat_list as $val) { ?>
                                            <option value="<?= $val->cat_id ?>" <?php if($flag == "edit" AND $info->cat_id == $val->cat_id ){ echo "selected";  } ?>><?= $val->cat_name ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                    <input type="hidden" id="index" value="<?= $indexid ?>">
                                    <input type="hidden" id="filter" value="">                                    <label class="col-md-3 m-t-15 filter">Sub Category</label>
                                    <div class="col-sm-9">
                                            <input type="text" class="form-control" name="<?= ($flag=="edit")?"name":"name[]"?>" placeholder="Name Here" required value="<?php if($flag == "edit"){  echo $info->name;  } ?>">
                                           
                                           
                                    </div>


<div class="col-sm-12">
                                    <div class="input_fields_container_category">
                                      

                            

                                     </div>
</div>

                                      <?php if($flag !=="edit"){ ?>    
                                         
                                      <!--     <div class="span6">
                                          <a class="btn btn-success" id="addsub">Add more</a>
                                          </div> -->
                                           
                                            <label class="control-label col-sm-3 text-right control-label col-form-label"></label>
                                       
                                           <div class="col-sm-6">
                                            <button class="btn btn-primary" id="addsub">Add more</button>
                                            </div>
                                         
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
                                <h4 class="card-title">Sub category <?= $indexid ?> list</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Category Name</th>
                                                <th>Filtername</th>
                                                <th>Sub Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <?php $i=1; foreach($sub_cat_list as $val) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $val->cat_name ?></td>
                                                <td><?= $val->filtername ?></td>
                                                <td><?= $val->name ?></td>
                                                <td><a href="<?= base_url();?>ipanel/Subcategory/edit/<?= $this->uri->segment(4)?>/<?= $val->id;?>/<?= $val->name ?>" class="btn btn-cyan btn-sm" data-original-title="Edit" >Edit</a>
                          <?php if ($val->status =='a'){ ?>
                          <a href="<?= base_url();?>ipanel/Subcategory/status/<?= $this->uri->segment(4)?>/d/<?= $val->id;?>" class="btn btn-success btn-sm" data-original-title="Click to Deactivate">Activated</a>
                        <?php } else { ?> <a href="<?= base_url();?>ipanel/Subcategory/status/<?= $this->uri->segment(4)?>/a/<?= $val->id;?>" class="btn btn-danger btn-sm" data-original-title="Click to Activate">Deactivated</a> <?php } ?></td>
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
  $('.button_class').show('display','block');
  var url="<?= base_url()?>ipanel/subcategory/index/1";
  window.location.replace(url);


  
}
  </script>                   