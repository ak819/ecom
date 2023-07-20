$(document).ready(function () {
                   /* $( "#add_facility" ).click(function() {
  alert( "Handler for .click() called." );
});
*/
//alert("inn");
 var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
      //  alert("inn");
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_date').append('<div class="form-group row"><label for="booking" class="col-md-3 text-right control-label col-form-label">  Date </label> <div class="custom-control custom-radio col-md-5"> <input id="unavailable_date" name="Unavaliable_date[]" type="date" class="form-control" placeholder="Unavailable Date"></div><div class="col-md-4"><a href="#" class="remove_field btn btn-danger" style="margin-left:10px;">Remove</a></div></div>'); //add input field
        }
    });  
    $('.input_fields_date').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    });
    $('.booking_status').click(function(){
	//alert("inn");
	 var selValue = $('input[name=booking]:checked').val();
	 //alert("selValue"+selValue);
	 if(selValue=="Applicable")
  	{
  		$('#applicable_div').show();
  	}
  	else
  	{
  		$('#applicable_div').hide();
  	}
});


 });

function add_fixed_deposit()
{
  //alert("ihjn");
  $('#add_fixed_deposit').show();
}
function close_fixed_deposit()
{
  //alert("ihjn");
  $('#add_fixed_deposit').hide();
}
function chkdatediv()
{
 
  var selValue = $('input[name=datesAvailability]:checked').val();
  	//alert(""+selValue);
  	if(selValue=="Yes")
  	{
  		$('#date_div').show();
  	}
  	else
  	{
  		$('#date_div').hide();
  	}
}