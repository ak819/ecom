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



                                 <form class="form-horizontal" action="<?= base_url();?>ipanel/product/importfromxls" method="post" autocomplete="off" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Select Category</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select" style="width: 80%; height:36px;"  name="cat_id" id="cat_id" onchange="getsubcat(this.value);" required="1">
                                           <option value="">Select</option>
                                             <?php foreach($cat_list as $val) { ?>
                                            <option value="<?= $val->cat_id ?>" <?php if($flag == "edit" AND $info->cat_id == $val->cat_id ){ echo "selected";  } ?>><?= $val->cat_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 1</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select subcat" style="width: 80%; height:36px;" name="sub_id1" id="sub_id1" >
                                            <option value="">Select</option>
                                    
                                        </select>
                                    </div>

                                     <label class="col-md-3 m-t-15 filter">Select Sub Category 2</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select subcat " style="width: 80%; height:36px;"  name="sub_id2" id="sub_id2" >
                                            <option value="">Select</option>
                                     
                                              

                                           
                                            
                                        </select>
                                    </div>

                                     <label class="col-md-3 m-t-15 filter">Select Sub Category 3</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select subcat" style="width: 80%; height:36px;"  name="sub_id3" id="sub_id3" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 4</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select subcat" style="width: 80%; height:36px;"  name="sub_id4" id="sub_id4" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 5</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select subcat" style="width: 80%; height:36px;"  name="sub_id5" id="sub_id5" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>
                                    
                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 6</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select subcat" style="width: 80%; height:36px;"  name="sub_id6" id="sub_id6" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 7</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select subcat" style="width: 80%; height:36px;"  name="sub_id7" id="sub_id7" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>
                                     
                                     <label class="col-md-3 m-t-15 filter">Select Sub Category 8</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select subcat" style="width: 80%; height:36px;"  name="sub_id8" id="sub_id8" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 9</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select subcat" style="width: 80%; height:36px;"  name="sub_id9" id="sub_id9" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">Select Sub Category 10</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select subcat" style="width: 80%; height:36px;"  name="sub_id10" id="sub_id10" >
                                            <option value="">Select</option>
                                     
                                            
                                        </select>
                                    </div>

                                     <!-- <label class="col-md-3 m-t-15">Select Brand</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control custom-select" style="width: 80%; height:36px;"  name="brand" >
                                            <option value="">Select</option>
                                     
                                          
                                              <?php foreach($brand_list as $brand) { ?>
                                            <option value="<?= $brand->id ?>" <?php if($flag == "edit" AND $info->sub_id2 == $brand->id ){ echo "selected";  } ?>><?= $brand->name ?></option>

                                            <?php  } ?>
                                            
                                        </select>
                                    </div> -->


                                     <label class="col-md-3 m-t-15">Select Excel </label>
                                    <div class="col-md-8">
                                        <input type="file" name="excel"  required="1"/>
                                    </div>
                                   
                         </div> 

                        

                          <button type="submit" class="btn btn-success"><?= ($flag=="edit")?"Update":"Save"?></button>
                           

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