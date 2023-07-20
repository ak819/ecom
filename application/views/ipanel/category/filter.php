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
                                    <li class="breadcrumb-item active" aria-current="page">Category filter</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">

                <div id="add_cat" <?= ($flag=='editfilter')?"style='display:block'":"style='display:none'"?> >
                      <div class="card">
                      <div class="card-body">
                               <form class="form-horizontal" action="<?= base_url();?>ipanel/category/<?= ($flag=="editfilter")?"updatefilter/".$this->uri->segment(4):"storefilter" ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                 <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Category</label>
                                      <div class="col-sm-6">
                                        <select class="select2 form-control custom-select" style=" height:36px;" name="cat_id" onchange="checkhavefilter(this.value);" id="cat_id" required>
                                            <option value="">Select</option>
                                            <?php foreach($cat_list as $val) { ?>
                                            <option value="<?= $val->cat_id ?>" <?php if($flag == "editfilter" AND $cat_info->cat_id == $val->cat_id ){ echo "selected";  } ?>><?= $val->cat_name ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                  </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sub catergory 1</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="filter Name Here" name="sub_cat_1" required="1" value="<?php if($flag == "editfilter"){  echo $cat_info->sub_cat_1;  } ?>">
                                        </div>
                                         </div>
                                         <div class="form-group row">
                                          <label for="fname1" class="col-sm-3 text-right control-label col-form-label">Sub catergory 2</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname1" placeholder="filter Name Here" name="sub_cat_2"  value="<?php if($flag == "editfilter"){  echo $cat_info->sub_cat_2;  } ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sub catergory 3</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="filter Name Here" name="sub_cat_3"  value="<?php if($flag == "editfilter"){  echo $cat_info->sub_cat_3;  } ?>">
                                        </div>
                                      </div>

                                        <div class="form-group row">
                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sub catergory 4</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="filter Name Here" name="sub_cat_4"  value="<?php if($flag == "editfilter"){  echo $cat_info->sub_cat_4;  } ?>">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sub catergory 5</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="filter Name Here" name="sub_cat_5"  value="<?php if($flag == "editfilter"){  echo $cat_info->sub_cat_5;  } ?>">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sub catergory 6</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="filter Name Here" name="sub_cat_6"  value="<?php if($flag == "editfilter"){  echo $cat_info->sub_cat_6;  } ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sub catergory 7</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="filter Name Here" name="sub_cat_7"  value="<?php if($flag == "editfilter"){  echo $cat_info->sub_cat_7;  } ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sub catergory 8</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="filter Name Here" name="sub_cat_8"  value="<?php if($flag == "editfilter"){  echo $cat_info->sub_cat_8;  } ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sub catergory 9</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="filter Name Here" name="sub_cat_9"  value="<?php if($flag == "editfilter"){  echo $cat_info->sub_cat_9;  } ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sub catergory 10</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="filter Name Here" name="sub_cat_10"  value="<?php if($flag == "editfilter"){  echo $cat_info->sub_cat_10;  } ?>">
                                        </div>
                                      </div>
                                         
                                    <button type="submit" class="btn btn-success"><?= ($flag=="editfilter")?"Update":"Save"?></button>
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
                                <h4 class="card-title">CategoryList</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Category Name</th>
                                                <th>Filters</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <?php  $i=1; foreach($filters as $val) { ?>
                                            <tr>
                                               <td><?= $i++; ?></td>
                                                <td><?= $val->cat_name ?></td>
                                                <td><?php
                                                     $j=1;
                                                     foreach ($val->filterslist as $value) {
                                                      if($value->sub_cat_1)
                                                      {
                                                        echo $j++.'. '.$value->sub_cat_1.'<br>';
                                                      } 
                                                      if($value->sub_cat_2)
                                                      {
                                                        echo $j++.'. '.$value->sub_cat_2.'<br>';
                                                      } 
                                                      if($value->sub_cat_3)
                                                      {
                                                       echo $j++.'. '.$value->sub_cat_3.'<br>';
                                                      } 
                                                      if($value->sub_cat_4)
                                                      {
                                                       echo $j++.'. '.$value->sub_cat_4.'<br>';
                                                      } 
                                                      if($value->sub_cat_5)
                                                      {
                                                       echo $j++.'. '.$value->sub_cat_5.'<br>';
                                                      } 
                                                      if($value->sub_cat_6)
                                                      {
                                                        echo $j++.'. '.$value->sub_cat_6.'<br>';
                                                      } 
                                                      if($value->sub_cat_7)
                                                      {
                                                        echo $j++.'. '.$value->sub_cat_7.'<br>';
                                                      } 
                                                      if($value->sub_cat_8)
                                                      {
                                                        echo $j++.'. '.$value->sub_cat_8.'<br>';
                                                      } 
                                                      if($value->sub_cat_9)
                                                      {
                                                        echo $j++.'. '.$value->sub_cat_9.'<br>';
                                                      } 
                                                      if($value->sub_cat_10)
                                                      {
                                                        echo $j++.'. '.$value->sub_cat_10.'<br>';
                                                      } 
                                                     
                                                     }
                                                     
                                                        ?></td>
                                                <td><a href="<?= base_url();?>ipanel/category/editfilter/<?= $val->cat_id;?>" class="btn btn-cyan btn-sm" data-original-title="Edit" >Edit</a>
                                                  </td>
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