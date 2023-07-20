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
                                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">

         
                         <!--  <div class="col-md-2">
                       <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                     </div> -->
                        <div class="container-fluid">
                                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">CategoryList</h4>
                                <div class="table-responsive">
                                  <form action="<?= base_url() ?>ipanel/Category/updatepriority" method="post" >
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Category Name</th>
                                                <th>Priority</th>
                                            </tr>
                                        </thead>
                                         <?php  $i=1; foreach($cat_list as $val) { ?>
                                            <tr>
                                               <td><?= $i++; ?></td>
                                                <td><?= $val->cat_name ?></td>
                                                <td><input type="number" class="span4 priority" name="priority[<?= $val->cat_id ?>]" max="<?= count($cat_list);?>" id="cat_<?= $val->cat_id ;?>" value="<?= $val->priority; ?>" ></td>
                                            </tr>

                                           <?php } ?>
                                       <tfoot>
                   <tr>
                   <th></th>
                   <th></th>
                  <td> <?php if(empty(!$cat_list))  { ?><button type="submit" class="btn btn-info" onclick="catpriority()">Update</button> <?php } ?></td>
                  </tr>
                 </tfoot>
                                    </table>
                                     </form>
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