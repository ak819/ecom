<?php 
$flag=$this->uri->segment(2);
//echo $flag;exit;
?>          
          <script src="<?= base_url();?>assets/ipanel/dist/js/apartment.js"></script>
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Apartment Registration </h4>
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
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body wizard-content">
                        <h4 class="card-title">Edit Apartment Registration Form </h4>
                        <h6 class="card-subtitle"></h6>
                        <form id="member-form" autocomplete="off" action="<?= base_url();?>apartment/<?= ($flag=="edit")?"update/".$this->uri->segment(3):"store" ?>" method="post"" class="m-t-40">
                           <div>
                                <h3>Apartment Profile</h3>
                                <section>
                                    <label for="Name Of Society/Apartment">Name Of Society/Apartment</label>
                                    <input type="text" id="name_apartment" name="name_apartment"  class="form-control" placeholder="Name Of Society/Apartment Here" value="<?= ($flag=="edit")? $apartmentdetails->name_apartment :"" ?>" >
                                    <label for="Address" >Address </label>
                                    <textarea id="address" name="address"  placeholder="Address Here" class="form-control"><?= ($flag=="edit")? $apartmentdetails->address :"" ?></textarea>
                                   <!-- <input id="address" name="address" type="text" placeholder="Address Here" class="form-control" value="<?= ($flag=="edit")? $apartmentdetails->address :"" ?>" >-->
                                    <label for="Pincode No">Pincode </label>
                                     <input type="text" class="form-control" id="pincode" name="pincode"  value="<?= ($flag=="edit")? $apartmentdetails->pincode :"" ?>" placeholder="Pincode No Here" >
                                    
                                </section>
                               <!-- <h3>Apartment other Details</h3>
                                <section>
                                   <label for="No Of Wings">No Of Wings</label>

                                    <input type="text" class="form-control no_of_wings" name="no_of_wings" id="number_of_wings" placeholder="No Of Wings" value="<?= ($flag=="edit")? $apartmentdetails->no_wings :"" ?>"  <?php if($flag=='edit') {?>  <?php } ?> >
                                    <?php
                                   if($flag=="edit")
                                   {
                                    ?>
                                    <div id="tableDiv" class="table-responsive input-field">
                                     <h5 class="card-title m-b-0">Wings Details</h5>
                                     <table class="table">
                                        <thead class="thead-light"><tr><th scope="col">Sr. No</th><th scope="col">Name of wing</th><th scope="col">View Details</th><th scope="col">Action</th></tr> </thead>
                                        <tbody class="customtable" id="appendtbody">
                                        <?php
                                        $i=1;
                                        foreach ($wingdetails as $key => $value) {
                                            # code...
                                        ?>
                                        <tr><td><?= $i?></td><td><input type="text" name="wing_name[]" value="<?= $value->wing_name ?>" class="form-control"/></td> <td><a data-id="<?= $value->id;?>" onclick="view_details('<?= $value->wing_name ?>','<?= $value->id;?>')" class="btn btn-success btn-sm wingdetails" data-original-title="Click to Deactived" data-aptid="<?= $apartmentdetails->id ?>">View Details</a></td><input type="hidden" name="hidden_id[]" value="<?= $value->id ?>" /></td>
                                            <?php
                                            if($value->status=='a')
                                            {
                                            ?>
                                            <td><a data-id="<?= $value->id;?>" data-status="d" class="btn btn-danger btn-sm wingstatus" data-original-title="Click to Deactived" data-aptid="<?= $apartmentdetails->id ?>">Deactivated</a></td>
                                            <?php
                                            }
                                            else
                                            {
                                             ?>
                                             <td><a data-id="<?= $value->id;?>" data-status="a" class="btn btn-success btn-sm wingstatus" data-original-title="Click to Activated" data-aptid="<?= $apartmentdetails->id ?>">Activated</a></td>
                                             <?php       
                                            }
                                            ?></tr>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                        </tbody>
                                     </table>
                                     <?php
                                     if($flag=="edit")
                                     {
                                        ?>
                                         <input type="button" class="btn btn-secondary" onclick="add_rows();" value="Add More"/>
                                    <?php
                                     }
                                     ?>
                                     
                                   </div>
                                    <?php
                                    }
                                    else
                                    {
                                     ?>
                                 <div id="tableDiv" class="table-responsive">
                                     
                                    </div>
                                     <?php  
                                  }
                                     ?>
                                    
                                </section> -->
                                <h3>Bank /Fixed Deposit details </h3>
                                <section>
                                    <div class="form-group row">
                                        <div class="custom-control custom-radio col-md-2">
                                        <label for="Name Of Bank">Name Of Bank</label>
                                        </div>
                                        <div class="custom-control  col-md-4">
                                            <input type="text" class="form-control" name="name_of_bank" placeholder="Name Of Bank" value="<?= ($flag=="edit")? $apartmentdetails->name_of_bank :"" ?>">
                                        </div>
                                         <div class="custom-control custom-radio col-md-2">
                                         <label for="Branch">Branch</label>
                                        </div>
                                         <div class="custom-control col-md-4">
                                            <input type="text" class="form-control" id="branch" name="branch" placeholder="Branch Here" value="<?= ($flag=="edit")? $apartmentdetails->branch :"" ?>">
                                        </div>
                                        
                                      </div>
                                      <div class="form-group row">
                                         <div class="custom-control  col-md-2">
                                        <label for="Branch">IFSC Code</label>
                                        </div>
                                         <div class="custom-control  col-md-4">
                                            <input id="ifsc_code" name="ifsc_code" type="text" class="form-control" placeholder="IFSC Code Here" value="<?= ($flag=="edit")? $apartmentdetails->ifsc_code :"" ?>">
                                        </div>
                                        <div class="custom-control  col-md-2">
                                            <label for="Branch">Account No</label>
                                        </div>
                                         <div class="custom-control  col-md-4">
                                            <input id="account_number" name="account_number" type="text" class=" form-control" placeholder="Account  Number here" value="<?= ($flag=="edit")? $apartmentdetails->account_number :"" ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                         <div class="custom-control  col-md-2">
                                        <label for="Investment_date" >Investment Date </label>
                                        </div>
                                         <div class="custom-control  col-md-4">
                                             <input type="text" class="form-control datepicker-bill"  placeholder="dd/mm/yyyy" name="Investment_date" id="Investment_date" placeholder="Investment Date Here" value="<?= ($flag=="edit")? $apartmentdetails->Investment_date :"" ?>">
                                            
                                        </div>
                                        <div class="custom-control custom-radio col-md-2">
                                            <label for="booking" >FDR Number</label>
                                        </div>
                                         <div class="custom-control custom-radio col-md-4">
                                             <input type="text" class="form-control" name="FDR_no" placeholder="FDR Number Here" value="<?= ($flag=="edit")? $apartmentdetails->FDR_no :"" ?>" >
                                        </div>
                                      </div>
                                       <div class="form-group row">
                                         <div class="custom-control  col-md-2">
                                         <label for="principal_amount" >Principal amount</label>
                                        </div>
                                         <div class="custom-control  col-md-4">
                                              <input type="text" class="form-control" id="principal_amount" name="principal_amount" placeholder="Principal amount Here" value="<?= ($flag=="edit")? $apartmentdetails->principal_amount :"" ?>" onchange="calculate();" >
                                        </div>
                                        <div class="custom-control custom-radio col-md-2">
                                            <label for="principal_amount" >Rate of interest</label>
                                        </div>
                                         <div class="custom-control custom-radio col-md-4">
                                            <input type="text" class="form-control" name="rate_of_interest" placeholder="Rate of interest Here" value="<?= ($flag=="edit")? $apartmentdetails->rate_of_interest :"" ?>" >
                                        </div>
                                      </div>

                                       <div class="form-group row">
                                         <div class="custom-control  col-md-2">
                                         <label for="Mode" >Mode</label>
                                        </div>
                                         <div class="custom-control  col-md-4">
                                              <input type="text" class="form-control" name="mode" placeholder="Mode Here" value="<?= ($flag=="edit")? $apartmentdetails->mode :"" ?>" >
                                        </div>
                                        <div class="custom-control custom-radio col-md-2">
                                           <label for="maturity_date" >Maturity date</label>
                                        </div>
                                         <div class="custom-control custom-radio col-md-4">
                                            <input type="text" class="form-control datepicker-bill"  placeholder="dd/mm/yyyy" name="maturity_date" id="maturity_date" placeholder="Investment Date Here" value="<?= ($flag=="edit")? $apartmentdetails->maturity_date :"" ?>">
                                           
                                        </div>
                                      </div>

                                        <div class="form-group row">
                                         <!--<div class="custom-control  col-md-2">
                                         <label for="Pre maturity date" >Pre maturity date</label>
                                        </div>
                                         <div class="custom-control  col-md-4">
                                            <input type="text" class="form-control datepicker-bill"  placeholder="dd/mm/yyyy" name="pre_maturity_date" id="pre_maturity_date" placeholder="Investment Date Here" value="<?= ($flag=="edit")? $apartmentdetails->pre_maturity_date :"" ?>">
                                            
                                        </div>-->
                                        <div class="custom-control custom-radio col-md-2">
                                               <label for="maturity_amount" >Maturity amount</label>
                                        </div>
                                         <div class="custom-control custom-radio col-md-4">
                                             <input type="text" class="form-control" name="maturity_amount" placeholder="Maturity amount Here" value="<?= ($flag=="edit")? $apartmentdetails->maturity_amount :"" ?>" >
                                        </div>
                                      </div>
                              
                                </section>
                                <h3>Other Details </h3>
                                <section>
                                    <div class="form-group row">
                                         <div class="custom-control  col-md-2">
                                         <label for="Free Amount In Bank" >Free Amount In Bank</label>
                                        </div>
                                         <div class="custom-control  col-md-4">
                                            <input type="text" class="form-control" name="free_amount" id="free_amount" placeholder="Free Amount In Bank Here" value="<?= ($flag=="edit")? $apartmentdetails->free_amount :"" ?>" onchange="calculate();">
                                        </div>
                                        <div class="custom-control custom-radio col-md-2">
                                               <label for="Total Petty Cash" >Total Petty Cash</label>
                                        </div>
                                         <div class="custom-control custom-radio col-md-4">
                                             <input type="text" class="form-control" name="petty_cash" id="petty_cash" placeholder="Total Petty Cash Here" value="<?= ($flag=="edit")? $apartmentdetails->petty_cash :"" ?>" onchange="calculate();" >
                                        </div>
                                      </div>
                                       
                                       <div class="form-group row">
                                         <div class="custom-control  col-md-2">
                                         <label for="Free Amount In Bank" >Total amount(Free Amount+Petty Cash)</label>
                                        </div>
                                         <div class="custom-control  col-md-4">
                                            <input type="text" class="form-control" name="total_free_cash_amount" placeholder="Free Amount In Bank Here" value="<?= ($flag=="edit")? $apartmentdetails->total_free_cash_amount :"" ?>" id="total_free_cash_amount" >
                                        </div>
                                        <div class="custom-control custom-radio col-md-2">
                                               <label for="Total Petty Cash" >Total amount(FD+Free Amount+Petty Cash)</label>
                                        </div>
                                         <div class="custom-control custom-radio col-md-4">
                                             <input type="text" class="form-control" name="total_amount" placeholder="Total amount(FD+Free Amount+Petty Cash)" value="<?= ($flag=="edit")? $apartmentdetails->total_amount :"" ?>" id="total_amount" >
                                        </div>
                                      </div>
                                      <button type="submit" class="btn btn-success"><?= ($flag=="edit")?"Update":"Save"?></button>
                                </section>
                                 <!-- <label for="Name Of Bank">Status</label>
                                   <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input owner" id="customControlValidation1" name="status"  value="a" checked>
                                            <label class="custom-control-label" for="customControlValidation1">Active</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input tenant" id="customControlValidation2" name="status" value="i">
                                            <label class="custom-control-label" for="customControlValidation2">Deactive</label>
                                        </div>
                                        -->
                                       
                                
                            </div>
                        </form>
                    </div>
              </div>
            </div>
          </div>

          <div id="myModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="width: 162%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Wing Details</h4>
      </div>
      <form id="addCatForm" class="form-horizontal">
      <div class="modal-body">
         <h5 class="card-title">Wing Details for <span id="winglable"></span></h5>
         <input type="hidden" name="wing_name_hidden" /> 
          <div class="form-group row">
            <div class="custom-control  col-md-2">
             <label for="Total Floor" >Total Floor</label>
             </div> 
              <div class="custom-control  col-md-6">
             <input type="text" class="form-control" name="total_floor" placeholder="Total Floor" id="total_floor" >
             </div>   
             </div>
             <div class="floors">
             </div>
            
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Save</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         
       
      </div>
    </form>
  </div>
</div>
</div>
