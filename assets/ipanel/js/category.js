    $(document).ready(function() {
    var max_fields_limit   = 10; //set limit for maximum input fields
    var x = 0; //initialize counter for text box
    $('#addcat').click(function(e){
   //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
  $('.input_fields_container_category').append('<div class="form-group row"><label for="fname" class="col-sm-3 text-right control-label col-form-label">New category '+ x +' :</label><div class="col-sm-6"><input type="text" class="form-control" id="fname" placeholder="Category Name Here" name="cat_name[]" required="1"><a href="#" class="remove_field btn btn-danger ">Remove</a></div></div>');
  }
    });  
    $('.input_fields_container_category').on("click",".remove_field", function(e){ //user click on remove text links
        ///alert('hii');
        e.preventDefault(); 
        $(this).parent('div').parent('div').remove(); x--;
    });
});
    $(document).ready(function() {
    var max_fields_limit   = 10; //set limit for maximum input fields
    var x = 0; //initialize counter for text box
    $('#addbrand').click(function(e){
   //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
  $('.input_fields_container_category').append('<div class="form-group row"><label for="fname" class="col-sm-3 text-right control-label col-form-label">New category '+ x +' :</label><div class="col-sm-6"><input type="text" class="form-control" id="fname" placeholder="Brand Name Here" name="name[]" required="1"><a href="#" class="remove_field btn btn-danger ">Remove</a></div></div>');
  }
    });  
    $('.input_fields_container_category').on("click",".remove_field", function(e){ //user click on remove text links
        ///alert('hii');
        e.preventDefault(); 
        $(this).parent('div').parent('div').remove(); x--;
    });
});

     $(document).ready(function() {
    var max_fields_limit   = 10; //set limit for maximum input fields
    var x = 0; //initialize counter for text box
    $('#addcomp').click(function(e){
   //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
  $('.input_fields_container_category').append('<div class="form-group row"><label for="fname" class="col-sm-3 text-right control-label col-form-label">New Company '+ x +' :</label><div class="col-sm-6"><input type="text" class="form-control" id="fname" placeholder="Company / Manufacture Name Here" name="name[]" required="1"><a href="#" class="remove_field btn btn-danger ">Remove</a></div></div>');
  }
    });  
    $('.input_fields_container_category').on("click",".remove_field", function(e){ //user click on remove text links
        ///alert('hii');
        e.preventDefault(); 
        $(this).parent('div').parent('div').remove(); x--;
    });
});

      $(document).ready(function() {
    var max_fields_limit   = 10; //set limit for maximum input fields
    var x = 0; //initialize counter for text box
    $('#addvol').click(function(e){
   //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
  $('.input_fields_container_category').append('<div class="form-group row"><label for="fname" class="col-sm-3 text-right control-label col-form-label">New Volume '+ x +' :</label><div class="col-sm-6"><input type="text" class="form-control" id="fname" placeholder="Enter Volume Unit Here" name="name[]" required="1"><a href="#" class="remove_field btn btn-danger ">Remove</a></div></div>');
  }
    });  
    $('.input_fields_container_category').on("click",".remove_field", function(e){ //user click on remove text links
        ///alert('hii');
        e.preventDefault(); 
        $(this).parent('div').parent('div').remove(); x--;
    });
});

    $(document).ready(function() {
    var max_fields_limit   = 10; //set limit for maximum input fields
    var x = 0; //initialize counter for text box
   
    $('#addsub').click(function(e){
      var text=$('.filter').text();
   //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            
  $('.input_fields_container_category').append('<div class="form-group row"><label class="col-md-3 m-t-15">New '+text+' '+ x +' :</label><div class="col-sm-9"><input type="text" class="form-control" name="name[]" placeholder="Name Here" required><br><a href="#" class="remove_field btn btn-danger ">Remove</a></div></div>');
  }
    });  
    $('.input_fields_container_category').on("click",".remove_field", function(e){ //user click on remove text links
        ///alert('hii');
        e.preventDefault(); 
        $(this).parent('div').parent('div').remove(); x--;
    });
});

    $(document).ready(function() {
    var max_fields_limit   = 10; //set limit for maximum input fields
    var x = 0; //initialize counter for text box
   
    $('#addsub2').click(function(e){
      var text=$('.filter').text();
   //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            
  $('.input_fields_container_category').append('<div class="form-group row"><label class="col-md-3 m-t-15">New '+text+' '+ x +' :</label><div class="col-md-6"><input type="text" class="form-control" name="name[]" placeholder="Name Here" required><br><a href="#" class="remove_field btn btn-danger ">Remove</a></div></div>');
  }
    });  
    $('.input_fields_container_category').on("click",".remove_field", function(e){ //user click on remove text links
        ///alert('hii');
        e.preventDefault(); 
        $(this).parent('div').parent('div').remove(); x--;
    });
});

    


 function  getsubcat(id)
  {     
   $.post(appRoot+"ipanel/subcategory/getsubcat",
    {
        cat_id:id
    },
    function(data, status){
  
      if(data){

           $("#sub_id1").empty();
      var obj = JSON.parse(data);

        var optionsAsString = "";
$.each( obj, function( key, value ) {
 /* alert( value.color_id + ": " + value.color );*/
    optionsAsString += "<option value='" + value.id + "'>" + value.name + "</option>";
});
 $('<option value="">Select</option>').appendTo('#sub_id1');
$('#sub_id1').append( optionsAsString );

      }

    });
  }

 
  function getsubsubcat(id)
  {
   cat_id=$('#cat_id').val();
   $.post(appRoot+"ipanel/subcategory/getsubsubcatwise",
    {
        sub_cat_id:id,
        cat_id:cat_id
    },
    function(data, status){
  
      if(data){

           $("#sub_id2").empty();
      var obj = JSON.parse(data);

        var optionsAsString = "";
$.each( obj, function( key, value ) {
 /* alert( value.color_id + ": " + value.color );*/
    optionsAsString += "<option value='" + value.id + "'>" + value.name + "</option>";
});
 $('<option value="">Select</option>').appendTo('#sub_id2');
$('#sub_id2').append( optionsAsString );

      }

    });
    
  }

 
function catpriority()
 {
    $('#zero_config').DataTable().destroy();
    return true;

 }
 