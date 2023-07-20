//var appRoot = setAppRoot("housingxpro", "housingxpro");
$(document).ready(function () {
    //$('#vietablemodel').DataTable();
     var t = $('#month_unit').DataTable();
     var viewmodel = $('#vietablemodel').DataTable();
      var month_unit_list = $('#month_unit1').DataTable();
     
    $('.close_model').click(function() {
     // alert("inn");
        viewmodel.clear();       
              
}); 
$('.viewunits').click(function(e2) {
    current=$(this);
    var id=$(current).data("id");
    $('#viewunitModal').modal('toggle');
     var t = $('#vietablemodel').DataTable();
   $.ajax({
                    url: appRoot+'month_unit/viewalloctedmonthunits',
                    type: 'post',
                    dataType: 'json',
                    data: {
                            id:id,
                         
                            },//send the selected area value
                success: function(data){
             //$('#myModal').show();
              $.each(data, function(index, element) {
             
                t.row.add( [
                    element.wing_name,
                    element.unitno,
                    element.name_of_owner,
                    element.previous_units,
                    element.current_units,
                    element.monthly_units,
            ] ).draw( false );

                      
            });
     
                        }
                });
               
  });

 });
  function getunit()
    {
      var charge_id = $('#charge_id').val();
       var unitdate = $('#unit_date').val();
     //alert("ch_id"+charge_id);
    // alert("unitdate"+unitdate);
    if(unitdate=="")
    {
      alert("Plese select unit date");
      $("#tableDiv").empty();
      //$('#tabletbody').empty();
      return;
    }
    if(charge_id=="")
    {
      alert("Please select charge ");
      $("#tableDiv").empty();
      return;
    }
    else
    {
      var t = $('#month_unit').DataTable();
        $.ajax({

        url: appRoot+'month_unit/getunits',
        type: 'post',
        dataType: 'json',
        data: {
                charge_id:charge_id,
                unitdate:unitdate,
              },//send the selected area value
        success: function(data)
                {
                
                var table_body="";
                var i=0;
                var j=1;
                if(data>0)
                {
                  alert("Record of this month for the given charge is already present please select another month for assigning reading");
                      $('#unit_date').val('');
                       $('#charge_id').val('');
                        $("#tableDiv").empty();
                }
                else
                {
                  $.each(data, function(index, element) {
                      if(element.current_units==null)
                    {
                      //alert("iihdkcjhsd");
                      element.current_units=0;
                    }
                     t.row.add( [
           
            element.wing_name,
            element.floor_id,
            element.unitno,
            element.name_of_owner,
             element.unittype,
            element.current_units,
              '<input type="hidden" name="previous_unit[]" value="'+element.current_units+'" /><input type="hidden" id="previous_unit_'+i+'" value="'+element.current_units+'" /><input type="text" class="form-control" name="current_units[]"  id="current_unit_'+i+'" class="form-control current_unit" onchange="getunits('+i+')"/>',
            '<input type="text" class="form-control" name="month_unit[]"  id="month_unit_'+i+'" class="form-control month_unit" onchange="getunits('+i+')"/><input type="hidden" name="unit[]" value="'+element.unitid+'"/><input type="hidden" name="previous_units[]" value="'+element.current_units+'"/>',
      
        ] ).draw( false );
                    i++;
                    j++;
                  });
                
                }
                      
                 }
    });  
   

    }

   
     

    }   
function getunits(i)
{
 
 var previous_unit=$('#previous_unit_'+i).val();
 
 var current_unit=$('#current_unit_'+i).val();
 var month_unit=$('#month_unit_'+i).val();
 if(previous_unit=="")
 {
  previous_unit=0;
 }
if((month_unit=="") || (current_unit!=""))
{
    month_unit = parseFloat(current_unit)-parseFloat(previous_unit);
    $('#month_unit_'+i).val(month_unit);
}
else if((current_unit=="") || (month_unit!=""))
{
   current_unit = parseFloat(month_unit)+parseFloat(previous_unit);
    $('#current_unit_'+i).val(current_unit);

}
}
 function checkdate() {
  // body...
  var date1=$('#unit_date').val();
  var charge_id=$('#charge_id').val();
  $.ajax({

        url: appRoot+'month_unit/getdatedetails',
        type: 'post',
        dataType: 'json',
        data: {
                date1:date1,
              },//send the selected area value
        success: function(data)
                {
                  //alert("data"+data);
                  if(data>0)
                  {
                      alert("Record of this month is already present please select another month for assigning reading");
                      $('#unit_date').val('');
                  }
                  else
                  {
                   // alert("Record of this month is already present please select another month for assigning reading");
                     // $('#unit_date').val('');

                  }
               
                 }
    }); 

}
$(function(){
        $("#form_month_unit").submit(function(event){
            event.preventDefault();
            //alert("iufgfdkighi");
            var oTable = $('#month_unit').dataTable();
             //var form = this;
              var flag=$('#flag').val();
              var id=$('#id_update').val();
              var charge_id=$('#charge_id').val();
              var unit_date=$('#unit_date').val();
            var data = oTable.$('input,select,textarea,hidden').serializeArray();
           console.log(data);
            if(flag=="edit")
            {
             
               $.ajax({
                    url:appRoot+'month_unit/update?id1='+id+'&charge_id='+charge_id+"&unit_date="+unit_date,
                    type:'GET',
                    data : data,
                    success:function(result){
                      console.log(result);
                      if(result==1)
                      {
                        alert("Units updated successfully");
                       location.reload();
                        
                      }

                    }

            });

            }
            else
            {
              $.ajax({
                    url:appRoot+'month_unit/store?charge_id='+charge_id+"&unit_date="+unit_date,
                    type:'GET',
                    data : data,
                    success:function(result){
                   //   alert(result);
                    //  if(result==1)
                     // {
                        alert("Units assigned successfully");
                       location.reload();
                        //$("#response").text(result);
                     // }

                    }

            });
            }
            
        });
    });

