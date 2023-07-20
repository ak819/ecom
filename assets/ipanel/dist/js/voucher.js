$(document).ready(function () {
                 
 });

function add_voucher()
{
  //alert("ihjn");
  $('#add_voucher').show();
}
function close_voucher()
{
  //alert("ihjn");
  $('#add_voucher').hide();
}
  function confirmIt(id) {
 // var bill_id=$(this).attr('id');
 // alert(""+id);
     var txt;
    if (confirm("Do You Really Want To Delete This Outward Bill ")) {
       $.ajax({

        url: appRoot+'voucher/deletevoucher',
        type: 'post',
        dataType: 'json',
        data: {
                id:id,
               
              },//send the selected area value
        success: function(data)
                {
                  if(data)
                  {
                      alert("Record Deleted Successfully.You Can View It In Trash");
                      location.reload();
                  }
                  else
                  {
                     alert("Failed To Delete Record");
                  }
                  
                 }
                
                
                
    });

    } else {
        txt = "You pressed Cancel Button!";
    }
}

