<?php

$login=0;
$invalid=0;
$UsernameFlag = false;
$passwordFlag = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connectDB.php';
}

if(isset($_POST['username'])){
    if(isset($_POST['username'])){
        $username = $_POST['username'];
    }else{
        $UsernameFlag = true;
    }
}

if(isset($_POST['password'])){
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }else{
        $passwordFlag = true;
    }
}


if(isset($_POST['username']) and isset($_POST['password'])){
    $sql = "select * from `registration` where username = '$username' and password = '$password'";
}


if(isset($connection)){
    $result = mysqli_query($connection, $sql);
}else{
    $result = false;
}

if($result){
    $number = mysqli_num_rows($result);
    if($number > 0){
        $login = 1;
        session_start();
        $_SESSION['username'] = $username;
        header('location:home.php');
    }else{
        $invalid = 1;
    }
}



?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

    <title>Login Page</title>
  </head>

  <body>

    <?php
            if($login){
                echo '<div class="alert alert-primary" role="alert">
                    Successul login.
                </div>';

            }

            if($invalid){
                echo '<div class="alert alert-primary" role="alert">
                    Invalid credentials.
                </div>';

            }

            if($UsernameFlag){
                echo '<div class="alert alert-primary" role="alert">
                    Username field can not be empty.
                </div>';

            }

            if($passwordFlag){
                echo '<div class="alert alert-primary" role="alert">
                    Password field can not be empty.
                </div>';

            }
        ?>

    <h1 class="text-center">Log in to our website!</h1>

    <div class = 'container mt-5'>
        <form action = "login.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Enter your username." name="username">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password." name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Log in</button>
        </form>
        
        <form action = "signup.php">
            <button type="submit" class="btn btn-primary w-100 mt-3">Sign up</button>
        </form>
        
    </div>

  </body>
</html>