<?php
 ob_start();
 session_start();
require_once 'dbconnection.php';

// if(isset($_POST['add'])){

//   $product_name = isset($_POST['product_name']);
//   $product_price = isset($_POST['product_price']);
//   $product_cat = isset($_POST['product_cat']);
//   $product_details = isset($_POST['product_details']);
  
//   $sql = "INSERT INTO products 
//   (product_name, 
//   product_price, 
//   product_cat, 
//   product_details)
//   VALUES (
//     '$product_name',
//     $product_price,
//     '$product_cat',
//     '$product_details'
//   );";

//   if (mysqli_query($connect, $sql)) {
//       echo "<h1 class'alert alert-success'>You added a new product.<h1>";
//   }

//  else {
//       echo "<h1 class'alert alert-danger'>Error by: </h1>" . 
//           "<p>"  . $sql . "</p>" . 
//           mysqli_error($connect);
//   }
// }
//   mysqli_close($connect);
//   echo  "</body></html>";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Home</title>
  </head>
  <body style="margin-top: 5rem">
  <div class="container">
  <div class="row">
    <div class="col-sm-2">
      <h1>Welcome</h1>
    </div>
    <div class="col-sm-8">

    <form id="insertForm">
      <div class="form-group">
        <input type="text" class="form-control" name="product_name" placeholder="Name">
      </div>
      <div class="form-group">
        <input type="number" class="form-control" name="product_price" placeholder="Price">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="product_cat" placeholder="Category">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="product_details" placeholder="Details">
      </div>

      <button type="submit" value="add" id="add" name="add" class="btn btn-primary">Add product</button>
    </form><br>
    <!-- insert xml and txt files into php page with javascript -->
    <button type="submit" value="add" id="displaytxt" name="displaytxt" class="btn btn-primary">Display txt</button>
    <button type="submit" onclick="loadDoc()" id="displayxml" name="displayxml" class="btn btn-primary">Display xml</button><br>
    <hr>
    <div  class="text-justify text-success" id="message2"><p></p></div><br>
    <table  class="table table-dark" id="message3"> </table>
    <hr>
    <span id="message"></span>
        </div>
        <div class="col-sm-2">
    <a  href="logout.php?logout">Sign Out</a>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script-ajax.js" type="text/javascript"></script>

  </body>
</html>
<?php
 //ob_end_flush(); 
 ?> 