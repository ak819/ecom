

$(".packs").click(function(){
       
       var pid = $(this).attr('data-pid');
       var pack_id = $(this).attr('data-id');
       var id=$(this).attr('id');

      $.ajax({url: appRoot+"packdetails",method:"post",data: { id:pack_id,pid:pid},success:function(result){
        if(result)
          { 
          const obj =JSON.parse(result);
            if(obj.pricing)
            { 
              $('#pricing').empty();
              $('#pricing').append(obj.pricing);
              $( "#spinner" ).spinner();
              $(".packs").removeClass("active-units");
               $('#'+id).addClass('active-units');
            }else{
                //this.blur();
             swal ( "Oops" ,  "Not Available Now" ,  "error" )
             
            }
            
          //location.reload();
          }
  
       }});
   
  });