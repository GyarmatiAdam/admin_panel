<?php
ob_start();
session_start();

if( isset($_SESSION['user'])!="" ){
 header("Location: index.php" );
}

    include_once "dbconnection.php";

    $error = false;

//prevent sql injection
    if ( isset($_POST['register']) ) {
    
    $firstName = trim($_POST['firstName']);
    $firstName = strip_tags($firstName);
    $firstName = htmlspecialchars($firstName);

    $lastName = trim($_POST['firstName']);
    $lastName = strip_tags($firstName);
    $lastName = htmlspecialchars($firstName);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

  // basic name validation
if (empty($firstName)) {
    $error = true ;
    $firstNameError = "Please enter your full name.";
   } else if (strlen($firstName) < 3) {
    $error = true;
    $firstNameError = "Name must have at least 3 characters.";
   } else if (!preg_match("/^[a-zA-Z ]+$/",$firstName)) {
    $error = true ;
    $firstNameError = "Name must contain alphabets and space.";
}

if (empty($lastName)) {
    $error = true ;
    $lastNameError = "Please enter your full name.";
   } else if (strlen($lastName) < 3) {
    $error = true;
    $lastNameError = "Name must have at least 3 characters.";
   } else if (!preg_match("/^[a-zA-Z ]+$/",$lastName)) {
    $error = true ;
    $lastNameError = "Name must contain alphabets and space.";
}

 //basic email validation
if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT email FROM users WHERE email='$email'";
  $result = mysqli_query($connect, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Email already exists";
  }
 }

 // password validation
if (empty($password)){
  $error = true;
  $passwordError = "Please enter password.";
 } else if(strlen($password) < 6) {
  $error = true;
  $passwordError = "Password must have atleast 6 characters." ;
}

 // password hashing for security
$passwordword = hash('sha256' , $password);


 // if there's no error, continue to signup
if( !$error ) {
  
  $query = "INSERT INTO users(firstName, lastName, email, password) VALUES('$firstName', '$lastName', '$email', '$passwordword')";
  $res = mysqli_query($connect, $query);
  
if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
    unset($firstName);
    unset($lastName);
    unset($email);
    unset($password);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
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

    <title>Register</title>
  </head>
  <body>
    <h1>Register here:</h1>
    <hr />
          
<?php
   if ( isset($errMSG) ) {
?> 
    <div  class="alert alert-<?php echo $errTyp ?>" >
<?php echo  $errMSG; ?>
    </div>

<?php 
  }
  ?> 

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
                <span   class = "text-danger" > <? isset($firstNameError); ?> </span >
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                <span   class = "text-danger" > <? isset($lastNameError); ?> </span >
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                <span   class = "text-danger" > <? isset($emailError); ?> </span >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <span   class = "text-danger" > <? isset($passwordError); ?> </span >
            </div>

            <button type="submit" value="register" name="register" class="btn btn-primary">Register</button>
        </form>
        <a href="login.php"><button type="submit" value="login" class="btn btn-primary">Got to Login</button></a>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script-ajax.js" type="text/javascript"></script> -->
  </body>
</html>
<?php  ob_end_flush(); ?>