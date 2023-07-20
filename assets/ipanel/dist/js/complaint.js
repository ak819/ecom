$(document).ready(function () {
         $("#member_id").select2({
        });
 });

function add_complaint()
{
  //alert("ihjn");
  $('#add_complaint').show();
}
function close_complaint()
{
  //alert("ihjn");
  $('#add_complaint').hide();
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