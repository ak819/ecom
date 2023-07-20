var appRoot = setAppRoot("housingxpro", "housingxpro");
$(document).ready(function () {
  //alert("inn");
   $("#member_id").select2({
        });
   $("#bill_id").select2({
        });
    $("#mode").select2({
        });
   
});
function getmmeberOutstanding(val)
{
 var balammout=$('#member_id').find(':selected').data("balammout");

  if (balammout > 0 ) 
  {
    $('#BalanceAmount').css('color','red');
    $('#BalanceAmount').html(balammout);
  }else{
   // $('#BalanceAmount').css('color','green');
  //  $('#BalanceAmount').html("00.00 Dues Extra Paid"+balammout);
  }

 var payment_date=$('#paymentdate').val();
// alert("payment_date"+payment_date);
 if(payment_date=="")
 {
    alert("Please Select The Payment Date....");
 }
 else
 {
   var id=$("#member_id").val()+"--"+payment_date;
   $("#bill_id").load(appRoot+"bill/getpendingbill?id="+id);
 }
    

}
function setAppRoot(devFolderName, prodFolderName){
    var hostname = window.location.hostname;

    /*
     * set the appRoot
     * This will work for both http, https with or without www
     * @type String
     */
    
    //attach trailing slash to both foldernames
    var devFolder = devFolderName ? devFolderName+"/" : "";
    var prodFolder = prodFolderName ? prodFolderName+"/" : "";
    
    var baseURL = "";
    
    if(hostname.search("localhost") !== -1 || (hostname.search("192.168.") !== -1)  || (hostname.search("127.0.0.") !== -1)){
        baseURL = window.location.origin+"/"+devFolder;
    }
    
    else{
        baseURL = window.location.origin+"/"+prodFolder;
    }
    
    return baseURL;
}
function chkmmeberselected()
{
   var member_id=$('#member_id').val();
  // alert(""+member_id);
  if(member_id==0)
  {
    alert("Please select members....");
   
  }
  else
  {
    getmmeberOutstanding(member_id);
  }
}
function calculate_amount()
{
  //alert("inn");
   $("#petty_hidden").val($('#petty_basic').val());
    $("#saving_hidden").val($('#saving_basic').val());
  var mode='';
 if($(".petty").is(':checked'))
 {
    mode=$(".petty").val();
    //alert("pp"+mode);
 }
 else if($(".saving").is(':checked'))
 {
     mode=$(".saving").val();
    // alert("sa"+mode);
 }
 else
 {
  return;
 }
    var petty_cash=$("#petty_hidden").val();
    var saving=$("#saving_hidden").val();
    var amountpaid = $("#paidamount").val();
    if((amountpaid<0) || (amountpaid==""))
    {
        alert("Please enter correct amount");
        return;
    }
   // alert("inn"+mode);
    if(mode=="Petty Cash")
    {
      //alert($(this).val());
      petty_cash=parseFloat(amountpaid)+parseFloat(petty_cash);
       $("#petty_hidden").val(petty_cash.toFixed(2));
       $('#petty_cash').html("Rs : "+petty_cash.toFixed(2));
       $("#saving_hidden").val($('#saving_basic').val());
       $('#saving_account').html("Rs : "+$('#saving_basic').val());
    
    }
    else if(mode=="Saving Account")
    {
       saving=parseFloat(amountpaid)+parseFloat(saving);
       $("#saving_hidden").val(saving.toFixed(2));
       $('#saving_account').html("Rs : "+saving.toFixed(2));
       $("#petty_hidden").val($('#petty_basic').val());
       $('#petty_cash').html("Rs : "+$('#petty_basic').val());
     
    }
 
}
function add_new_inward()
{
   window.location.href = appRoot+'Payment/inward';
}
