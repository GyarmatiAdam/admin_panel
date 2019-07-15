
$("#add").click( function() {

       $.post($("#myForm").attr("action"),
       $("#myForm : input").serializeArray(),

       function(info){ $("#message" ).html(info);
       
       clearInput();
       });


$("#myForm" ).submit( function() {
 return  false;
});

function clearInput() {
       $ ("#myForm :input").each( function() {
              $(this).val('');
       });
}