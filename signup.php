<?php

$success = 0;
$userExists = 0;
$spaghettiFlag1 = 0; //couldnt figure out how to not call my error handling when loading the page
$spaghettiFlag2 = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connectDB.php';
}

if(isset($_POST['username'])){
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $sql = "select * from `registration` where username = '$username'";
    }else{
        $spaghettiFlag1 = 1;
    }
}

if(isset($_POST['password'])){
    if(isset($_POST['password'])){
        $password = $_POST['password'];       
    }else{
        $spaghettiFlag2 = 1;
    }
}



if(isset($connection)){
    $result = mysqli_query($connection, $sql);
}else{
    $result = false;
}

if($result){
    $number = mysqli_num_rows($result);
    if($number > 0){
        //echo "User already exists.";
        $userExists = 1;
    }else{
        $sql = "insert into `registration`(username, password) values('$username', '$password')";

        $result = mysqli_query($connection, $sql);
        if($result){
            //echo "Signup Successful.";
            $success = 1;
        }else{
            die(mysqli_error($connection));
        }
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

    <title>Signup Page</title>
  </head>

  <body>

    <?php
        if($userExists){
            echo '<div class="alert alert-primary" role="alert">
                User already exists.
            </div>';

        }

        if($success){
            echo '<div class="alert alert-primary" role="alert">
                User successfully created.
            </div>';

        }

        if($spaghettiFlag1){
            echo '<div class="alert alert-primary" role="alert">
            Username can not be empty.
            </div>';

        }

        if($spaghettiFlag2){
            echo '<div class="alert alert-primary" role="alert">
            Password can not be empty.
            </div>';

        }
    ?>

    <h1 class="text-center">Sign up Page</h1>

    <div class = 'container mt-5'>
        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Enter your username." name="username">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password." name="password">
            </div>   
            
            <button type="submit" class="btn btn-primary w-100">Sign up</button>
        </form>

        <form action = "login.php">
            <button type="submit" class="btn btn-primary w-100 mt-3">Take me to log in page</button>
        </form>
    </div>

  </body>
</html>