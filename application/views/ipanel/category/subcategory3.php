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
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
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
            <div id="add_cat" <?= ($flag=='edit')?"style='display:block'":"style='display:none'"?> >
             <div class="card">
                            <div class="card-body">

                                 <form class="form-horizontal" action="<?= base_url();?>ipanel/subcategory3/<?= ($flag=="edit")?"update/".$this->uri->segment(4):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Select Category</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select" style="width: 80%; height:36px;"  name="cat_id" id="cat_id" onchange="getsubcat(this.value);" required>
                                           <option value="">Select</option>
                                            <?php foreach($cat_list as $val) { ?>
                                            <option value="<?= $val->cat_id ?>" <?php if($flag == "edit" AND $info->cat_id == $val->cat_id ){ echo "selected";  } ?>><?= $val->cat_name ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15">Select Sub Category 1</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select" style="width: 80%; height:36px;" name="sub_id1" id="sub_id1" onchange="getsubsubcat(this.value);" required >
                                            <option value="" >Select</option>
                                            <?php if($flag == "edit") {
                                             $subcatgories=$this->m_subcategory1->getcatwise($info->cat_id);
                                             ?>
                                              <?php foreach($subcatgories as $val) { ?>
                                            <option value="<?= $val->id ?>" <?php if($flag == "edit" AND $info->sub_id1 == $val->id ){ echo "selected";  } ?>><?= $val->name ?></option>

                                            <?php  } } ?>
                                        </select>
                                    </div>

                                     <label class="col-md-3 m-t-15">Select Sub Category 2</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select" style="width: 80%; height:36px;"  name="sub_id2" id="sub_id2" required>
                                            <option value="">Select</option>
                                     
                                               <?php if($flag == "edit") {
                                             $subcatgories=$this->m_subcategory2->getsubcatwise($info->sub_id1,$info->cat_id);
                                             ?>
                                              <?php foreach($subcatgories as $val2) { ?>
                                            <option value="<?= $val2->id ?>" <?php if($flag == "edit" AND $info->sub_id2 == $val2->id ){ echo "selected";  } ?>><?= $val2->name ?></option>

                                            <?php  } } ?>
                                            
                                        </select>
                                    </div>
                                   
                         </div> 

                         <div class="form-group row">
                                    
                                    <label class="col-md-3 m-t-15">Sub Category</label>
                                    <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="Name Here" 
                                            name="<?= ($flag=="edit")?"name":"name[]"?>"  value="<?php if($flag == "edit"){  echo $info->name;  } ?>"
                                                required>
                                        </div>
                                    <div class="col-sm-12">
                                    <br>
                                          <div class="input_fields_container_category">
                            

                                         </div>

                                   </div>
                                           
                                     <?php if($flag !=="edit"){ ?>     
                                   <!--  <div class="control-group">
                                          <label class="control-label"></label>
                                        <div class="controls">
                                           <div class="span6">
                                            <a class="btn btn-success" id="addsub2">Add more</a>
                                            </div>
                                          </div>
                                    </div> -->
                                    <label class="control-label col-sm-3 text-right control-label col-form-label"></label>
                                       
                                           <div class="col-sm-6">
                                            <button class="btn btn-primary" id="addsub2">Add more</button>
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
                                <h4 class="card-title">Sub Category 3 List</h4>
                                <div class="table-responsive">
                                   <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Category Name</th>
                                                <th>Sub Category 1 Name</th>
                                                 <th>Sub Category 2 Name</th>
                                                 <th>Sub Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <?php $i=1; foreach($sub_cat3_list as $val) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $val->cat_name ?></td>
                                                <td><?= $val->name1 ?></td>
                                                <td><?= $val->name2 ?></td>
                                                <td><?= $val->name ?></td>
                                                <td><a href="<?= base_url();?>ipanel/Subcategory3/edit/<?= $val->id;?>" class="btn btn-cyan btn-sm" data-original-title="Edit" >Edit</a>
                          <?php if ($val->status =='a'){ ?>
                          <a href="<?= base_url();?>ipanel/Subcategory3/status/d/<?= $val->id;?>" class="btn btn-success btn-sm" data-original-title="Click to Deactivate">Activated</a>
                        <?php } else { ?> <a href="<?= base_url();?>ipanel/Subcategory3/status/a/<?= $val->id;?>" class="btn btn-danger btn-sm" data-original-title="Click to Activate">Deactivated</a> <?php } ?></td>
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
}
  </script>                   