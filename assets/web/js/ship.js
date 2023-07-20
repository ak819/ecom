$(document).ready(function(){

  $("#signincheck").click(function(){
    
    if($(this).prop("checked") == true){

                $(".signin").show();
    

            }else{

               $(".signin").hide();

            }
  });

  $(".billship").click(function(){
    
    if($(this).prop("checked") == false){

                $(".billadress").show();
    

            }else{

               $(".billadress").hide();

            }
  });

  $('.confirm').click(function () {

  var box=confirm('Are you sure to delete.');
   if (box==true)
            return true;
        else
           return false;

    });

   $("#addshiping").validate({

 errorPlacement: function(label, element) {
      

         if ( element.is(":radio") || element.is(":checkbox")  ) 
            {
                label.insertAfter(element.parents('.errormsg') );
            }

            else 
            { // This is the default behavior 
               label.insertAfter(element);
            }
    },
    wrapper: 'span',

    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side

    ship_name: "required",
  
     ship_email: {
        required: true,
        email: true
      },
      ship_mobile: {
             required: true,
              minlength: 10
      },
      ship_pin: {
             required: true,
              minlength: 6,
              maxlength:6,
      },

            ship_address:{
             required: true,
              maxlength:250,
      },
            ship_city:"required",
            ship_state:"required",
            ship_country:"required",


    
      
    },
    // Specify validation error messages
    messages: {
    
      ship_name: "Enter Valid Name",
     
      ship_email: {
            required:"Enter Valid Email ID",
            email:"Enter Valid Email ID",
         },

       ship_mobile:{
        required: "Enter Valid Mobile Number",
        minlength: "Enter 10 Digit Valid Mobile Number"
      },

       ship_pin: {
        required: "Enter valid Pin",
        minlength: "Enter 6 Digit Valid Pincode",
        maxlength:"Enter 6 Digit Valid Pincode",
      },
         ship_address  : {
        required: "Enter Valid Address",
        maxlength:"Enter must be 250 character long.",
      },
         ship_city:"Enter Valid City Name",
         ship_state:"Select Valid State", 
         ship_country:"Enter Valid Country", 

          
    
  
    
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

   $("#addshiping").on("change keyup keydown keypress", "#ship_pin", function(){
          
         var pin=$(this).val();
         
         
         if(pin.length == 6)       
        // return false;
        {

         $.ajax({url: appRoot+"getlocation",method:"post",data: { pin:pin},success:function(result){
        if(result && result!=="null")
          {
              var data = JSON.parse(result);
              $('#ship_city').val(data.city_name);
              $('#ship_state').val(data.state_name);


          }else{

            alert('Not valid pin');
            $('#ship_pin').val('');
             $('#ship_city').val('');
             $('#ship_state').val('');
            
          }
  
       }});  


        }else if(pin.length > 6 )
        {
             alert('Not valid pin');
            $('#ship_pin').val('');
             $('#ship_city').val('');
             $('#ship_state').val('');
            

        }
        else{
           
           
           $('#ship_city').val('');
           $('#ship_state').val('');
        }
       
    });


  $("#saveadress1").click(function(){
    
    var formstatus=$("#addshiping").valid();
     if(formstatus)
          {
     
        
           $("#addshiping").submit();
        
     
          }
       
      

      }); 


   
   






     $(".adressstatus").click(function(){

       var adressid = $(this).attr('data-id');
      $.ajax({url: appRoot+"changeadress",method:"post",data: { adressid:adressid},success:function(result1){
        if(result1)
          {

          location.reload();
          }
  
       }});
   
  });

});


