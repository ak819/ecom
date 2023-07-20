$(document).ready(function () {
                $('.close').click(function() {
                
                // location.reload();
                 var datatable = $('#tableDiv').DataTable();
                 datatable.clear();
                 var datatable_amc = $('#tableDiv1').DataTable();
                 datatable_amc.clear();
                 var datatable_voucher = $('#tableDiv_voucher').DataTable();
                 datatable_voucher.clear();
                 
              
              }); 

              $.fn.DataTable.ext.pager.numbers_length = 10;
              $('#tableDiv1').DataTable( {
                      "pagingType":"full_numbers",
   
              } );
              $('#tableDiv_voucher').DataTable( {
                      "pagingType":"full_numbers",
   
              } );
    });
function viewallpendingbills()
{
  var apt_id = $('#apt_id').val();
 
 // alert("innnnn");
 
   $('#myModal').modal('toggle');

          $.ajax({
                    url: appRoot+'welcome/getallpendingbills',
                    type: 'post',
                    dataType: 'json',
                    data: {
                            apt_id:apt_id,
                         
                            },//send the selected area value
                success: function(data){
             //$('#myModal').show();
              var t = $('#tableDiv').DataTable();
            var counter = 1;
                      $.each(data, function(index, element) {
                        var billd=element.bill_date;
                        var billdue=element.bill_due_date;
                       
                       // alert(""+billdue);
                      var bill_date = billd.split('-');
                       //alert(""+bill_date);
                        var billdate = bill_date[2]+'/'+bill_date[1]+'/'+bill_date[0];//alert(""+billdate);
                         var bill_ddate = billdue.split('-');
                        var billddate = bill_ddate[2]+'/'+bill_ddate[1]+'/'+bill_ddate[0];
                t.row.add( [
            element.billid,
            element.name_of_owner,
            billdate,
            billddate,
            element.amt_before_due,
             element.amt_after_due,
            element.member_status
        ] ).draw( false );

                      
            });
     
                        }
                });

}
function amcreminder()
{
   $('#myModal_amc').modal('toggle');

}
function viewmemberpendingbills()
{
  var id = $('#admin_id').val();
  var name = $('#admin_name').val();
  var role = $('#user_role').val();
 //alert("id"+id); alert("name"+name);alert("role"+role);
  $('#myModal').modal('toggle');
          $.ajax({
                    url: appRoot+'welcome/getreminder',
                    type: 'post',
                    dataType: 'json',
                    data: {
                             id:id,
                            name:name,
                            role:role,
                            },//send the selected area value
                success: function(data){
             //$('#myModal').show();
                      $.each(data, function(index, element) {
                        //alert("dsf"+element.bill_date);
                        var bill_date = element.bill_date.split('-');
                        var billdate = bill_date[2]+'/'+bill_date[1]+'/'+bill_date[0];
                        var bill_ddate = element.bill_due_date.split('-');
                        var billddate = bill_ddate[2]+'/'+bill_ddate[1]+'/'+bill_ddate[0];
                        $('#tableDiv tr:last').after('<tr><td>'+element.billid+'</td><td>'+element.name_of_owner+'</td><td>'+element.bill_date+'</td><td>'+element.bill_due_date+'</td><td>'+element.amt_before_due+'</td><td>'+element.amt_after_due+'</td><td>'+element.member_status+'</td></tr>');
                
            });
     
                        }
                });
}
function voucherreminder()
{
  $('#myModal_voucher').modal('toggle');
         

}
