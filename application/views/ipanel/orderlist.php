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
                                    <li class="breadcrumb-item active" aria-current="page">Order List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                         
                        <div class="container-fluid">

                                <div class="card">
                            <div class="card-body">
                       <input type="hidden" id="orderstatus" name="orderstatus" value="<?= $status ?>">    
  <!--                             <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
                   
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-4">
                             <select class="select2 form-control custom-select" style=" height:36px;" id="status" name="status" required>
                                            <option value="">Select</option>
                                             <option value="pending">pending</option>
                                              <option value="in_proccess">Inprocess</option>
                                              <option value="dispatched">Dispatched</option>
                                              <option value="completed">Completed</option>
                                              <option value="cancel">Cancel</option>
                                            
                                        </select>
                        </div>
                    </div>
              
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div> -->
                                <h4 class="card-title">Order List</h4>
                                <div class="table-responsive">
                                   <table id="ordertable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>Order id</th>
                    <th>Billing Name</th>
                    <th>Payment id</th>
                    <th>Order amount</th>
                    <th>Paid amount</th>
                    <th>payment status</th>
                    <th>OrderDate</th>
                    <?php if($status == "cancel"){ ?>
                    <th>Canceled Reason</th>
                    <?php } ?>
                     <?php if($status == "dispatched"){ ?>
                    <th>Tracking No</th>
                    <?php } ?>
                    <th>Order details</th>
                    <th>Order status</th>
                </tr>
            </thead>
            <tbody>


            </tbody>

            <!-- <tfoot>
                   <th>No</th>
                    <th>Order id</th>
                    <th>Billing Name</th>
                    <th>Payment id</th>
                    <th>Order amount</th>
                    <th>Paid amount</th>
                    <th>payment status</th>
                    <th>Date</th>
                    <th>Order details</th>
                    <th>Order status</th>
               
            </tfoot> -->
        </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<!-- The Modal -->
  <div class="modal" id="cancelreason">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Order Cancellation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" id="order_id" value="">
         <div class="form-group ">
                                        <label for="cono1" class="text-right control-label col-form-label">Enter order cancellation reason</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="reason" value=""></textarea>
                                        </div>
                                    </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="cancelorder" >submit</button>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal" id="dispatch">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Dispatch Order</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" id="dispatch_order_id" value="">
         <div class="form-group ">
                                        <label for="cono1" class="text-right control-label col-form-label">Enter Tracking No</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="trackingno" value="" placeholder="Enter Tracking Number"></textarea>
                                        </div>
                                    </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="dispatchorder" >submit</button>
        </div>
        
      </div>
    </div>
  </div>