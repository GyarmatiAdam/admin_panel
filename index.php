<?php
ob_start();
session_start();

require_once 'dbconnection.php';

if(isset($_SESSION['user'])!="") {
 header("Location: home.php");
 exit;
}

$error = false;
$passError = "";
$emailError = "";
if(isset($_POST['login'])) {

  
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your pass." ;
 }

 if (!$error) {
  
  $passhash = hash('sha256', $pass);

  $res=mysqli_query($connect, "SELECT user_id, username, `pass` FROM users WHERE email='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res);
  echo $passhash."<br>";
  echo $row["pass"];
  if( $count == 1 && $row['pass'] == $passhash ) {
   $_SESSION['user'] = $row['user_id'];
   header("Location: home.php");
  } else {
   $errMSG = "Incorrect Credentials, Try again..." ;
  }
  
 }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
  <div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h1>Login here:</h1>
    </div>
    <div class="col-sm-6">
     
<?php
  if (isset($errMSG)) {
      echo  $errMSG;
  }
?>


        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <span class ="text-danger"><?= $emailError ?></span>
            </div>
            <div class="form-group">
                <label for="password">pass</label>
                <input type="password"  name="pass" class="form-control" placeholder="password">
                <span class ="text-danger"><?= $passError ?></span>
            </div>

            <button type="submit" value="login" name="login" class="btn btn-primary">Login</button>
        </form><br>
        <a href="register.php"><button type="submit" value="register" class="btn btn-primary">Got to register</button></a>

        </div>
        <div class="col-sm-3">

        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script-ajax.js" type="text/javascript"></script> -->
  </body>
</html>
<?php ob_end_flush(); ?>