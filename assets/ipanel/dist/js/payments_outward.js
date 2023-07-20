var appRoot = setAppRoot("housingxpro", "housingxpro");
$(document).ready(function () {
  //alert("inn");
   $("#supplier_id").select2({

        });
   $("#voucher_id").select2({
     placeholder: "Select a vouchers/invoice",
        allowClear: true
        });
    $("#mode").select2({
        });
     $("#invoice_id").select2({
          
        });

  
});
function getserviceproviderOutstanding(val)
{
 
 
   var id=$("#supplier_id").val();
   var type = $('input[name=type]:checked').val(); 
  // alert("type"+type);
   if(type=="Voucher")
   {
    $("#voucher_id").empty();
       $("#voucher_id").load(appRoot+"voucher/getpendingvoucher?id="+id);
   }
   else if(type=="Invoice")
   {
   //alert("sdljfkdjg");
    $("#voucher_id").empty();
       $("#voucher_id").load(appRoot+"voucher/getpendinginvoice?id="+id);
   }
   else
   {
    window.location=appRoot+'/Payment_outward/expense';
   }
  
   
   get_gst_number(id);
 
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
        alert("Please add correct amount");
        return;
    }
  //  alert("inn"+mode);
    if(mode=="Petty Cash")
    {
     // alert($(this).val());
      petty_cash=parseFloat(petty_cash)-parseFloat(amountpaid);
       $("#petty_hidden").val(petty_cash.toFixed(2));
       $('#petty_cash').html("Rs : "+petty_cash.toFixed(2));
       $("#saving_hidden").val($('#saving_basic').val());
       $('#saving_account').html("Rs : "+$('#saving_basic').val());
    
    }
    else if(mode=="Saving Account")
    {
       saving=parseFloat(saving)-parseFloat(amountpaid);
       $("#saving_hidden").val(saving.toFixed(2));
       $('#saving_account').html("Rs : "+saving.toFixed(2));
       $("#petty_hidden").val($('#petty_basic').val());
       $('#petty_cash').html("Rs : "+$('#petty_basic').val());
     
    }
 
}
function get_gst_number(id)
{
//alert("inn");
  $.ajax({
           type: 'POST',
           url: appRoot+'Service_provider/getdetails/',
           data: {id: id},
           success: function(data){
            //alert("data"+data);
             var obj=JSON.parse(data);
             if(obj.gst_no)
             {
              console.log('success: ' + obj.gst_no);
              $('#gst_number').val(obj.gst_no);
             }
            
           }
          });
 }
 function show_div()
 {
     var selValue = $('input[name=rbnNumber]:checked').val(); 
 }
 function change_invoice()
 {
  //alert("dk,sghkjdfhgkhjkgf");
  //$('#invoice_id').select2("close");
  if($("#invoice_id option:selected").val())
{
  $('#invoice_id').val(null).trigger("change");
}
  //$('#invoice_id').val(null).trigger("change");
 }
 function change_voucher()
 {
  //alert("dk,");
//   $('#voucher_id').select2("close");
//  select2("close")
if($("#voucher_id option:selected").val())
{
  $('#voucher_id').val(null).trigger("change");
}
  
 }

 
      