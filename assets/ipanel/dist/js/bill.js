      var appRoot = setAppRoot("housingxpro", "housingxpro");
      $(document).ready(function() {
       $("#member_id").select2({
        placeholder: "Select a members",
        allowClear: true
        });
        
        $("#sub_cat_id").select2({
          
        });
         $("#account_id").select2({
          
        });

        
        var max_fields_limit      = 10; //set limit for maximum input fields
        var x = 1; //initialize counter for text box
        $('.add_more_bill').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
           // $('#append_div').appendTo('.input_fields_container');
            $('.input_fields_container').append('<div class="form-group row col-md-12"><div class="custom-control  col-md-1"><label class="control-label">'+x+' :</label></div><div class="custom-control  col-md-4"> <select class="select2 form-control custom-select selectedItemDefault" id="sub_cat_id_new" name="account_sub_catid[]"></select></div><div class="custom-control  col-md-3"><input type="text" name="amount_before_due[]" class="form-control  before_due_amt" onchange="calculate_before_amt();" placeholder="Amount before due date"></div><div class="custom-control  col-md-3"> <input type="text" name="amount_after_due[]" class="form-control after_due_amt" onchange="calculate_after_amt()" placeholder="Amount after due date" ></div><div class="custom-control  col-md-1"><a href="#" class="remove_field btn btn-danger" style="margin-left:10px;">Remove</a></div></div>'); //add input field
            $('.selectedItem option').each(function() {
                  $(".selectedItemDefault").append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>")
            });
            $(".selectedItemDefault").select2({
          
             });

        }

    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
        calculate_before_amt();
        calculate_after_amt();
    });
     var amt_before_due=0;
         });
    function calculate_before_amt()
    {
       var amt_before_due=0;
     //  alert("before_due_amt");
       $('.before_due_amt').each(function() {
        if($(this).val())
        {
          amt_before_due+= parseFloat($(this).val());
        }
        });
       $('#amt_before_due').html(amt_before_due);
       $('#bill_amt_before_due').val(amt_before_due);
    calculate_total();
    }
    function calculate_after_amt()
    {
       var amt_after_due=0;
       $('.after_due_amt').each(function() {
        if($(this).val())
        {
          amt_after_due+= parseFloat($(this).val());
        }
        });
       $('#amt_after_due').html(amt_after_due);
       $('#bill_amt_after_due').val(amt_after_due);
   calculate_total();
    }
    function calculate_total()
    {
      //alert("idhfgdjfhgj");
      var tot_before_due=0;
      var tot_after_due=0;
      var amt_before_due=0;
      var amt_after_due=0;
      var tot_collection_before_due=0;
      var tot_collection_after_d=0;
        //var rnd=$('#round_of').val();
     // alert($('#round_of').val());
     // return false;
      if($('#amt_before_due').html())
      {
        //alert("inn");
        amt_before_due=parseFloat($('#amt_before_due').html());
      }
      if($('#amt_after_due').html())
      {
         amt_after_due=parseFloat($('#amt_after_due').html());
      }

   
        tot_before_due=parseFloat(amt_before_due);
         tot_after_due=parseFloat(amt_after_due);

  
        var member_count = $("#member_id :selected").length;
       tot_collection_before_due=tot_before_due*member_count;
       tot_collection_after_d=tot_after_due*member_count;
        $('#bill_tot_before_due').val(tot_before_due);
        $('#bill_tot_after_due').val(tot_after_due);

       // alert("1224"+tot_collection_after_d);
          $('#total_collection_after').val(tot_collection_after_d);
          $('#total_before_due').html(tot_before_due);
        $('#total_after_due').html(tot_after_due);
        $('#collection_before_due').html(tot_collection_before_due);
        $('#collection_after_due').html(tot_collection_after_d);
        $('#total_collection_before_due').val(tot_collection_before_due);
      
      
       
    }
    function get_member_count()
    {
      //alert("inn");
      var count = $("#member_id :selected").length;
     // alert(""+count);
     $('#hidden_member_count').val(count);
     calculate_total();
    // alert(""+$('#hidden_member_count').val());
    }
    function add_account(billid)
    {
      //alert("innn"+billid);
      $("#account_id").load(appRoot+"bill/getaccounthead?id="+billid);
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

  function confirmIt(bill_id) {
 // var bill_id=$(this).attr('id');
//  alert(""+bill_id);
     var txt;
    if (confirm("Do You Really Want To Delete This Inward Bill ")) {
       $.ajax({

        url: appRoot+'regularbill/deletebill',
        type: 'post',
        dataType: 'json',
        data: {
                bill_id:bill_id,
               
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
function add_bill()
{
    window.location.href = appRoot+'bill/create';
}

