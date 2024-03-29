<?php
 ob_start();
 session_start();
require_once 'dbconnection.php';

if(!isset($_SESSION["admin"]) && !isset($_SESSION["user"])){
  header("Location: index.php");
}


  $name = isset($_POST['product_name']);
  $price = isset($_POST['product_price']);
  $category = isset($_POST['product_cat']);
  $details = isset($_POST['product_details']);
  
  $sql = "INSERT INTO products 
  (product_name, 
  product_price, 
  product_cat, 
  product_details)
  VALUES (
    '$name',
    '$price',
    '$category',
    '$details'
  );";

  if (mysqli_query($connect, $sql)) {
      echo "<h1 class'alert alert-success'>You added a new product.<h1>";
  }

  else {
      echo "<h1 class'alert alert-danger'>Error by: </h1>" . 
          "<p>"  . $sql . "</p>" . 
          mysqli_error($connect);
  }

  //mysqli_close($connect);

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
        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Name">
      </div>
      <div class="form-group">
        <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Price">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="product_cat" id="product_cat" placeholder="Category">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="product_details" id="product_details" placeholder="Details">
      </div>

      <button type="submit" value="add" id="add" name="add" class="btn btn-primary">Add product</button>
<!-- if session is admin those buttons are visible -->
  <?php
  if (isset($_SESSION['admin'])){

     echo "<div><button type='submit' value=delete id='delete' name='delete' class='btn btn-primary'>Delete product</button>";
     echo '<button type="submit" value="update" id="update" name="update" class="btn btn-primary">Update product</button></div>';
  }
  ?>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script-ajax.js" type="text/javascript"></script>

  </body>
</html>
<?php
 ob_end_flush(); 
 ?> 