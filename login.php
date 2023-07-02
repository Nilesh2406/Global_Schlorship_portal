<?php
session_start();
// if(isset($_SESSION['username']))
// {
//   header("location: register.php");
//   exit;
// }
require_once "config.php";

$username = $password = "";
$err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
 if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
      {
     $err = "please enter username + password";
      }

    else{
$username = trim($_POST['username']);
$password = trim($_POST['password']);
}
if(empty($err)){
  $sql = "SELECT id, username, password FROM users WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $param_username);
  $param_username = $username;
 
if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)== 1){
                   mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                   if(mysqli_stmt_fetch($stmt)){
                     if(password_verify($password, $hashed_password)){
                       session_start();
                       $_SESSION["username"] = $username;
                       $_SESSION["id"] = $id;
                       $_SESSION["loggedin"] = true;
                       header("location: index.php");
                     }
                   }
                } 
}   
}
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
    height:90vh;
    width: 210vh;
    margin-left:-82px;

}
/* .rg.jpg{
    width:100%;
    height:3500px;
} */

</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Global Scholarship Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                   

                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    <section id="contact">
        <h1>
            <center>Please Login Here <center>
        </h1>
        <hr>
        <div class="container mt-4">

            <form action="" method="post">
                <div class="row-md-5">
                    <label for="inputEmail4" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="inputEmail4" placeholder=" Enter Username">
                </div>

                <div class="row-md-5">
                    <label for="inputAddress" class="form-label">password</label>
                    <input type="password" name="password" class="form-control" id="inputpassword4" placeholder="Enter Password">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </div>
</body>

</html