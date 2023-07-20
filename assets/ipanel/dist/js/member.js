$(document).ready(function () {
                    $('.owner').click(function () {
                      //alert("innn");
                      $('#tenant_div').hide();

                });
                $('.tenant').click(function () {
                     // alert("innn2");
                      $('#tenant_div').show();
                 });
                $('.apartmentid').change(function () {
                      //alert("innn2");
                     // $('#tenant_div').show();
                 });
                $("#apartmentid").select2();

        
               });
function getlistwingwise() {
  var wings_id = $('#wingsid').val();
  //alert("wings_id"+wings_id);
   //$("#new_tbody").remove();
   var role = $('#role_hidden').val();
  $.ajax({
        url: appRoot+'member/getlistwingwise',
        type: 'post',
        dataType: 'json',
        data: {
               // apt_id:apt_id,
                wings_id:wings_id
              },//send the selected area value
        success: function(data)
                {
               
                var t = $("#zero_config").DataTable();
                 $("#zero_config").find("tr:not(:first)").remove();
                 t.clear();
                  var table_body="";
                      $.each(data, function(index, element) {
                     if(role=="admin")
                     {

                      if(element.status=="a")
                      {
                         t.row.add( [
           
            element.wing_name,
            element.unitno,
            element.name_of_owner,
            element.name_tenant,
             element.mobile_no_owner,
            '<a href="'+appRoot+'member/view/'+element.id+'" class="btn btn-success btn-sm" data-original-title="View">View</a><a href="'+appRoot+'member/edit/'+element.id+'" class="btn btn-cyan btn-sm" data-original-title="Edit">Edit</a><a href="'+appRoot+'member/changestatus/d/'+element.id+'" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Click to Deactive">Deactive</a>',
          
        ] ).draw( false );
                        //$('#zero_config tr:last').after('<tr><td>'+element.wing_name+'</td><td>'+element.unitno+'</td><td>'+element.name_of_owner+'</td><td>'+element.name_tenant+'</td><td>'+element.mobile_no_owner+'</td><td><a href="'+appRoot+'member/view/'+element.id+'" class="btn btn-success btn-sm" data-original-title="View">View</a><a href="'+appRoot+'member/edit/'+element.id+'" class="btn btn-cyan btn-sm" data-original-title="Edit">Edit</a><a href="'+appRoot+'member/changestatus/a/'+element.id+'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Click to Activated">Activated</a></td></tr>');
                      }
                      else
                      {
                         t.row.add( [
           
            element.wing_name,
            element.unitno,
            element.name_of_owner,
            element.name_tenant,
             element.mobile_no_owner,
            '<a href="'+appRoot+'member/view/'+element.id+'" class="btn btn-success btn-sm" data-original-title="View">View</a><a href="'+appRoot+'member/edit/'+element.id+'" class="btn btn-cyan btn-sm" data-original-title="Edit">Edit</a><a href="'+appRoot+'member/changestatus/a/'+element.id+'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Click to Active">Active</a>',
          
        ] ).draw( false );
                      }
                     }
                     else
                     {
                        t.row.add( [
           
            element.wing_name,
            element.unitno,
            element.name_of_owner,
            element.name_tenant,
             element.mobile_no_owner,
            '<a href="'+appRoot+'member/view/'+element.id+'" class="btn btn-success btn-sm" data-original-title="View">View</a>',
          
        ] ).draw( false );
                     }
                    
            
            });
                   
                    
               
                 }
    });
  // body...
}
function add_new_member()
{
   window.location.href = appRoot+'member/create';
}
