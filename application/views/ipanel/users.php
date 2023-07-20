<?php 
$flag=$this->uri->segment(2);
?>

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">User management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">user management</li>
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
           
                     <!--  <div class="col-md-2">
                      <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                                          </div> -->
                 <div class="card">
                            <div class="card-body">
   <h5 class="card-title">User List  <b><?= strtoupper( $this->input->get('protype'));?></b></h5>
                               <div class="widget-content nopadding">
                            <div class="table-responsive">
                                  <table id="zero_config" class="table table-striped table-bordered table-condensed">
                                         <thead> 
                    <tr> 
                        <th>sr.no.</th> 
                        <th>Company Name</th> 
                        <th>Address</th>
                        <th>phone</th> 
                        <th>mobile</th> 
                        <th>Contact person</th> 
                        <th>Designation</th> 
                        <th>email</th> 
                        <th>GST</th> 
                        <th>Category</th> 
                        <th>Action</th> 
                        
                       
                    </tr> 
                    </thead> 
                    <tbody> 
                    <tr> 
                        <?php $cnt=1; foreach ($userlist as $row ): ?>
                       <td><?= $cnt++?></td> 
                       <td><?= $row->comp_name?></td>
                       <td><?= $row->address?></td>
                       <td><?= $row->phoneno?></td>
                       <td><?= $row->mobile?></td>
                       <td><?= $row->contactper?></td>
                       <td><?= $row->designation ;?></td>
                       <td><?= $row->email ;?></td>
                       <td><?= $row->gstno ;?></td>
                       <td><?= $row->categoryName ;?></td>
                       <td>
                    <!--     <a href="<?= base_url();?>admin/edituser/<?= $row->id;?>" class="btn btn-info btn-xs tip-bottom" data-original-title="Edit">Edit</a> -->
                          <?php if ($row->status=='y'){ ?>
                          <a href="<?= base_url();?>admin/status/n/<?= $row->id;?>" class="btn btn-success btn-xs tip-bottom" data-original-title="Click to Deactivate">Activated</a>

                        <?php } else { ?> <a href="<?= base_url();?>admin/status/y/<?= $row->id;?>" class="btn btn-danger btn-xs tip-bottom" data-original-title="Click to Activate">Deactivated</a> <?php } ?>
                       </td>
                     </tr>
                        <?php endforeach ?>
                                      
                                  </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                 
        </div>
      </div>
    </div>
  </div>

