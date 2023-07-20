 $("#email").keyup(function(){

        $(".errors").remove();


        var emailField = $(this).val();
         var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

          if (reg.test(emailField) == false) 
        {
            
            $('#email').after('<span class="errors" style="color:red;">Please Enter Valid Email ID</span>');
            
            return false;

        }else{

           $.post(appRoot+"verifyemailid", {email:emailField}, function(data){ 
             var data = JSON.parse(data);
            
                if(data.is_ex == "1"){

                     
                $('#sbutton').attr('disabled',true);
                $('#email').after('<span class="errors" style="color:red;">Soryy Email ID Already Exits,Please Try Another.</span>');
                }else{
                   
                    $('#sbutton').prop('disabled',false);
                   
                }

            });
         }

       });


 $('.confirm').click(function () {

  var box=confirm('Are you sure to delete.');
   if (box==true)
            return true;
        else
           return false;

    });

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#registration").validate({

 errorPlacement: function(label, element) {
      

         if ( element.is(":radio") || element.is(":checkbox")  ) 
            {
                label.insertAfter(element.parents('.check_msg') );
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

      name: "required",
      //lname: "required",
     email: {
        required: true,
        email: true
      },
      mobile:{
             required: true,
              minlength: 10,
              maxlength:10,
      },
   
      password: {
             required: true,
              minlength: 6
      },

      cpassword:{
        required: true,
        minlength:6,
        equalTo:'#password'
       
      },
      terms: "required",
      
    },
    // Specify validation error messages
    messages: {
    
      name: "Please Enter First Name",
      //lname: "Please Enter Last Name",
      email: {
            required:"Please Enter Your Email ID",
            email:"Please Enter Valid Email ID",
         },

       mobile:{
        required: "Please Enter Your Mobile",
        minlength: "Your mobile number must be 10 digit",
        maxlength: "Your mobile number must be 10 digit",
      },

       password: {
        required: "Please Enter Password",
        minlength: "Your password must be at least 6 characters long"
      },

      cpassword:{
        required: "Please enter confirm password",
        equalTo: "Please match password",
        minlength: "password must be 6 digit",
      },

      terms: "Please Accept it",
  
    
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#login").validate({

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

     
     signin_email: {
        required: true,
        email: true
      },

    signin_password:{
             required: true,
              minlength: 6
      },
   
      
    },
    // Specify validation error messages
    messages: {
    
   
      signin_email: {
            required:"Please Enter Your Registered Email ID",
            email:"Please Enter Valid Email ID",
         },


       signin_password: {
        required: "Please Enter Password",
        minlength: "Your password must be at least 6 characters long"
      },
    
  
    
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#forget").validate({

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

     
     signin_email: {
        required: true,
        email: true
      },

      
    },
    // Specify validation error messages
    messages: {
    
   
      signin_email: {
            required:"Please Enter Your Registered Email ID",
            email:"Please Enter Valid Email ID",
         },
    
  
    
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#changepassword").validate({

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
    currentpassword:{

      required: true,
    },
     
    new_password:{
             required: true,
              minlength: 6
      },

      confirm_password:{
             required: true,
              minlength: 6,
              equalTo:'#new_password'
      },

      
    },
    // Specify validation error messages
    messages: {
    
      currentpassword:{

      required: "Please Enter  Current Password",
    },
     
      new_password: {
        required: "Please Enter  New Password",
        minlength: "Your password must be at least 6 characters long"
      },

       confirm_password: {
        required: "Please Enter Confirmed Password",
        minlength: "Your password must be at least 6 characters long",
        equalTo:"Please Enter Equal Password"
      },
      

    
  
    
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#checkoutlogins").validate({

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

     
     signin_email: {
        required: true,
        email: true
      },

    signin_password:{
             required: true,
              minlength: 6
      },
   
      
    },
    // Specify validation error messages
    messages: {
    
   
      signin_email: {
            required:"Please Enter Your Email ID",
            email:"Please Enter Valid Email ID",
         },


       signin_password: {
        required: "Please Enter Password",
        minlength: "Your password must be at least 6 characters long"
      },
    
  
    
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

$("#editmyaccount").click(function(){
  // alert('dfsdf');
  $('form input[type="submit"]').prop("disabled", false);
  $('form input[type="text"]').prop("disabled", false);
  $('form input[type="number"]').prop("disabled", false);
  
  });

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#updatename").validate({

 errorPlacement: function(label, element) {
      

         if ( element.is(":radio") || element.is(":checkbox")  ) 
            {
                label.insertAfter(element.parents('.errormsg') );
            }

            else 
            { 
               label.insertAfter(element);
            }
    },
    wrapper: 'span',

    rules: {

      name: "required",
    },
  
    messages: {
    
      name: "Please Enter  Name",
    
    
    },
  
    submitHandler: function(form) {
      form.submit();
    }
  });
});

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#updatemobile").validate({

 errorPlacement: function(label, element) {
      

         if ( element.is(":radio") || element.is(":checkbox")  ) 
            {
                label.insertAfter(element.parents('.errormsg') );
            }

            else 
            { 
               label.insertAfter(element);
            }
    },
    wrapper: 'span',

    rules: {
      
       mobile:{
             required: true,
              minlength: 10,
              maxlength:10,
           },
    },
  
    messages: {
    
        mobile:{
        required: "Please Enter Your Mobile",
        minlength: "Your mobile number must be 10 digit",
        maxlength: "Your mobile number must be 10 digit",
      },
    
    
    },
  
    submitHandler: function(form) {
      form.submit();
    }
  });
});


$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#mypassword").validate({

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
  
      newpassword:{
             required: true,
              minlength: 6
      },

       confirmpassword:{
             required: true,
              minlength: 6,
              equalTo : "#np",
      },

    },
    // Specify validation error messages
    messages: {
    
       newpassword:{
        required: "Please Enter New Password",
        minlength: "Your new password number must be 6 digit",
      },

      confirmpassword:{
        required: "Please Confirm Password",
        minlength: "Your confirm password number must be 6 digit",
        equalTo:"please Both Match Password",
      },
    
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});


$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#myaccount").validate({

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

      name: "required",
  
      mobile:{
             required: true,
              minlength: 10
      },

    },
    // Specify validation error messages
    messages: {
    
      name: "Please Enter Your Name",

    
       mobile:{
        required: "Please Enter Your Mobile",
        minlength: "Your mobile number must be 10 digit"
      },
    
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
