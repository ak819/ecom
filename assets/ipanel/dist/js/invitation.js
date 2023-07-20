
$(document).ready(function () {
                   $('#selectall').click(function() {
   var selectedItems = $('#member_idinvitation option').map(function() { return this.value });
$("#member_idinvitation").select2("val", selectedItems);
});
                   
                    $("#member_idinvitation").select2({
                     	 placeholder: "Select a members",
        				allowClear: true
        				});
                     $('#customControlAutosizing1').click(function(){
        if ($('#customControlAutosizing1').is(":checked")) {
          //  $('.selectmember').prop('disabled', true);
           //  $('#selectmember option').prop('selected', true);
        } else {
           // $('.selectmember').prop('disabled', false);
        }
    })

              
                   /*  $('#member_idinvitation').multiselect({
                includeSelectAllOption: true
            });
                    /* $('#member_idinvitation-enableFiltering-includeSelectAllOption').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });*/
                   //  $('#member_idinvitation').multiselect();
                     //$("select#member_idinvitation").treeMultiselect({searchable: true, searchParams: ['section', 'text']});
                });

 function add_invitation()
{
  //alert("ihjn");
  $('#add_invitation').show();
}
function close_invitation()
{
  //alert("ihjn");
  $('#add_invitation').hide();
}
function send_invitation(id)
{

}

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

     