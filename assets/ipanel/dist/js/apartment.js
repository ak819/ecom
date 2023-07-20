$(document).ready(function () {
                  /*  $('.no_of_wings').change(function () {
                     // alert("innn");
                      var number_of_rows = $('.no_of_wings').val();
          			  var number_of_cols = 4;
          			  var row_id=1;
          			var table_body = '<h5 class="card-title m-b-0">Wings Details</h5><table class="table">';
          			table_body+="";
          			table_body+='<thead class="thead-light"><tr><th scope="col">Sr. No</th><th scope="col">Name of wing</th><th scope="col">Number of floors</th><th scope="col">Number of flats</th></tr> </thead>';
          			 table_body+='<tbody class="customtable">';
          			for(var i=0;i<number_of_rows;i++){
          				table_body+='<tr>';
            			table_body +='<td>'+row_id+'</td><td><input type="text" name="wing_name[]" class="form-control"/></td><td><input type="text" name="no_floors[]" class="form-control"/></td><td><input type="text" name="no_flats[]" class="form-control"/></td>';
                		table_body+='</tr>';
                		row_id++;
          			}
            		table_body+='</tbody></table>';
           			$('#tableDiv').html(table_body);

                });
                */
                 $('#number_of_wings').change(function () {
                  //alert("ikfdjhgkfh");
                  var number_of_rows = $('.no_of_wings').val();
                 // var number_of_cols = 4;
                  var row_id=1;

                var table_body = '<h5 class="card-title m-b-0">Wings Details</h5><table class="table">';
                 table_body+="";
                table_body+='<thead class="thead-light"><tr><th scope="col">Sr. No</th><th scope="col">Name of wing</th><th scope="col">View Details</th><th scope="col">Action</th></tr> </thead>';
                 table_body+='<tbody class="customtable">';
                for(var i=1;i<=number_of_rows;i++){
                  table_body+='<tr>';
                  table_body +='<td>'+row_id+'</td><td><input type="text" name="wing_name[]"  id="wing_name_'+i+'" class="form-control wingname"/></td><td><input type="button" class="btn btn-secondary" onclick="show_details('+i+');"  value="View Details"/></td>';
                    table_body+='</tr>';
                    row_id++;
                }
                table_body+='</tbody></table>';
                $('#tableDiv').html(table_body);

                 });   
                 $('#total_floor').change(function () {
                 // alert("innn43546");
                 var total_floor=$('#total_floor').val();
                 for(var i=1;i<=total_floor;i++)
                 {
                    $('.floors').append('<div id=floor'+i+'><div class="form-group row" > <div class="custom-control  col-md-2">Floor  '+i+'</div><div class="custom-control  col-md-4"><label for="Total Floor" >Enter Total Flats For Floor '+i+'</label></div><div class="custom-control  col-md-4"><input type="text" name="flat_number[]" data-id="flat_number_'+i+'"  id="flat_number_'+i+'" class="form-control flat_number"/></div></div></div>');
                 }
                 
                 });
               $(document).on('change', '.flat_number', function() {
  
            var flat_number_id=$(this).data("id");
          
            var flat_number=$('#'+flat_number_id).val();
            var divid=flat_number_id.split("flat_number_");
            //String(divid).replace(/,/i, '');
            var div_id = String(divid).replace(",", "");
            for(var i=1;i<=flat_number;i++)
            {
              //alert("innn");
              $('#floor'+div_id).append('<div id=flat_'+div_id+'_'+i+'><div class="form-group row" > <div class="custom-control  col-md-4"><label for="Flat" >Flat name for flat number '+i+'</label></div><div class="custom-control  col-md-4"><input type="text" name="flat_name[]" data-id="flat_name_'+i+'"  id="flat_name_'+div_id+'_'+i+'" class="form-control flat_number"/></div></div></div>');
            }
            
          
});
               });


function add_rows()
{
 // alert("inn");
  $('#tableDiv tr:last').after('<tr id="myTableRow"><td></td><td><input type="text" name="wing_name[]" class="form-control"/></td><td><input type="text" name="no_floors[]" class="form-control"/></td><td><input type="text" name="no_flats[]" class="form-control"/></td><td><a href="#" class="remove_row btn btn-danger" style="margin-left:10px;" onclick="remove_rows();"  >Remove</a></td></tr>');
  var no_wings=$('#number_of_wings').val();
//  alert("no_wings"+no_wings);
  $('#number_of_wings').val(++no_wings);

} 
 function remove_rows() {
   
    $('#myTableRow').remove();
     var no_wings=$('#number_of_wings').val();
//  alert("no_wings"+no_wings);
  $('#number_of_wings').val(--no_wings);
 }
 function calculate()
 {
   //alert("inn");
   var freeamount=$('#free_amount').val();
   var principal_amount=$('#principal_amount').val();
   var petty_cash=$('#petty_cash').val();
   if(freeamount=='')
   {
     //alert("innn");
      freeamount=0;
   }
   if(principal_amount=='')
   {
      //alert("innn12123");
      principal_amount=0;
   }
   if(petty_cash=='')
   {
      petty_cash=0;
   }
   //alert("freeamount"+freeamount);
   //alert("principal_amount"+principal_amount);
   //alert("petty_cash"+petty_cash);
   var total_free_cash_amount = parseFloat(freeamount)+parseFloat(petty_cash);
   var total_amount = parseFloat(freeamount)+parseFloat(petty_cash)+parseFloat(principal_amount);
   //alert(total_free_cash_amount+"total_free_cash_amount");
  //  alert(total_amount+"total_amount");
   $('#total_free_cash_amount').val(total_free_cash_amount);
   $('#total_amount').val(total_amount);

 }
 function view_details(wingname,id)
 {
  //alert("innn"+element);
   // alert("innncxgfch"+id);
   $('#myModal').modal('toggle');
   $('#winglable').html(wingname);

 }
 function show_details(i)
 {
 // alert(""+i);
  // var wing_name=$(this).data("id");
  // alert("wing_name"+wing_name);
  var wingname=$('#wing_name_'+i).val();
 // alert("1223"+wingname);
   $('#myModal').modal('toggle');
   $('#winglable').html(wingname);
   $('#wing_name_hidden').val(wingname);
 }