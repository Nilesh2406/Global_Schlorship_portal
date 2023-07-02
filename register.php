<?php
require_once "config.php";
$username = $password = $confirm_password ="";
$username_err = $password_err = $confirm_password_err ="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(empty(trim($_POST["username"]))){
        $username_err ="Username cannot be blank";  
    }
    else{
        $sql ="SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST['username']);
            //try to excute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err ="This username is already taken";
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "something went wrong";
            }
        }
      }

      mysqli_stmt_close($stmt);
    
// check for password
if(empty(trim($_POST['password']))){
    $password_err ="password cannot be blank";  
}
elseif(strlen(trim($_POST['password'])) <5 ){
    $password_err ="password cannot be less than 5 characters";  
}
else{
    $password = trim($_POST['password']);
}

// if((trim($_POST['password']) != trim($_POST['confirm_password'])){
//     $password_err = "passwords should match";  
// }

if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
    $sql = " INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
       mysqli_stmt_bind_param($stmt,"ss", $param_username, $param_password);
    //set these parameters
    $param_username = $username;
    $param_password = password_hash($password, PASSWORD_DEFAULT);
    //try to execute the query
    if(mysqli_stmt_execute($stmt)){
        header("location: login.php");
    }
    else{
        echo "Something went wrong";
    }
}

mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>login page</title>
  </head>
  <style>
* {
    margin: 0;
    padding: 0;
}

html {
    scroll-behavior: smooth;
}
.container #contact{
    /* background-color: black; */
    background:url('rg.jpg')no-repeat center center/cover;
    /* height:90vh;
    width: 210vh;
    margin-left:-82px; */
height: 100%;
width: 100%;
}
@media only screen and (max-width:794px){
  .container{
    height: 100%;
    width:100%;


  }
}
  

</style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Global Scholarship Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">login</a>
        </li>
        
        <li class="nav-item">
                  <a class="nav-link" href="logout.php">LOGOUT</a>
                </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <section id="contact">
<h1><center>Please Register Here <center></h1>
<hr>
<div class="container mt-4">
    
<form action ="" method ="post">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">username</label>
    <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="username">
  </div>
  
  <div class="col-6">
    <label for="inputAddress" class="form-label"> password</label>
    <input type="password" class="form-control" name="password" id="inputpassword" placeholder ="password">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label"> confirmed password </label>
    <input type="text" class="form-control" name="confirm_password" id="inputpassword2" placeholder ="confirmed password">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Branch/department</label>
    <input type="text" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Semester</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  
  
  <div class="col-6">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
</div>
</div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>