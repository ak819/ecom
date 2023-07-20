var appRoot = setAppRoot("housingxpro", "housingxpro");
//alert("rootpath"+appRoot);
$(document).ready(function () {
        $('#all').click(function () {
                    //  alert("innn");
                       $('#member_div').hide('fast');
                      // $('#div1').show('fast');
 });
                    $('#selected').click(function () {
                    //  alert("innn");
                       $('#member_div').show('fast');
                      // $('#div1').show('fast');
 }); 
  $("#member_idevent").select2({
        });
        $("#facility_idevent").select2({
        });  

               
 });

function add_event()
{
  //alert("ihjn");
  $('#add_event').show();
}
function close_event()
{
  //alert("ihjn");
  $('#add_event').hide();
}
function check_for_booking(fac_id)
{
    //alert(""+fac_id);
var from_date=$('#from_date').val();
var to_date=$('#to_date').val();
var from_time=$('#from_time').val();
var to_time=$('#to_time').val();
//alert(""+from_date);
if((from_date=="") || (to_date=="") || (from_time=="") || (to_time==""))
{
    alert("Please select from date, to date, from time, to time in order to check facilty availability..");

}
else
{
 // alert("inn");
    $.ajax({
                    url: appRoot+'events/checkfaciltyavailbilty',
                    type: 'post',
                    dataType: 'json',
                    data: {
                            fac_id:fac_id,
                            from_date:from_date,
                            to_date:to_date,
                            from_time:from_time,
                            to_time:to_time,
                            },//send the selected area value
                success: function(data){
                    if(data==1)
                    {
                        (current.html()=="Activated") ? current.removeClass("btn-success").addClass("btn-danger").html("Deactivated"):current.removeClass("btn-danger").addClass("btn-success").html("Activated");
                    }
                     
                        }
                });

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
$('.billdetailsstatus').click(function(e2) {
       ///alert("inn");
               current=$(this);
                
               
                 
    });

function readURL(input) {
    //alert("in");
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }