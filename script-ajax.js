//display txt file to home.php
$("#displaytxt").click(function(){
    $("#message2").load("lorem.txt", function(responseTxt, statusTxt, xhr){
      if(statusTxt == "success")
        //("External content loaded successfully!");
      if(statusTxt == "error")
        alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
  });

//display xml file
function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myFunction(this);
        }
    };
    xhttp.open("GET", "mysong.xml", true);
    xhttp.send();
}
function myFunction(xml) {
    var i;
    var xmlDoc = xml.responseXML;
    var table = "<thead><tr><th>Artist</th><th>Title</th><th>Genre</th><th>Country</th><th>Year</th></tr></thead>";
    var x = xmlDoc.getElementsByTagName("song");
    for (i = 0; i < x.length; i++) {
        table += "<tbody><tr><td>" +
            x[i].getElementsByTagName("artist")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("genre")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("country")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("year")[0].childNodes[0].nodeValue +
            "</td><tr></tbody>";
    }
    document.getElementById("message3").innerHTML = table;
}

//check if email exists
$("#email").keyup(function(){

  var email = $("#email").val();
  var emptyemail = $("#email");
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (!filter.test(email)) {

    $("#error_email").text(email+" is not a valid email");
    //email.focus;
 }
 else {
     $("#error_email").text("");
 }
});

//prevent from submission
$("#submit-register").click(function(){
  var email = $("#email").val();
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]))+\.([a-zA-Z0-9]{2,4})+$/;
  if (!filter.test(email)) {
     alert('The email address you provide is not valid');
     $("#email").focus();
     return false;
  } else {
     
  }
});
////////////////inser into//////
$(document).ready(function(){
  $("#add").click(function(){
      var name=$("#product_name").val();
      var price=$("#product_price").val();
      var category=$("#product_cat").val();
      var details=$("#product_details").val();
      $.ajax({
          url:'insert.php',
          method:'POST',
          data:{
              name:name,
              product_price:price,
              product_cat:category,
              product_details:details
          },
         success:function(data){
             alert(data);
         }
      });
  });
});