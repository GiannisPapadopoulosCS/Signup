<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
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

    <title>Home Page</title>
  </head>
  <body>

    <h1 class="text-center mt-5">Welcome
        <?php
            echo $_SESSION['username'],'.';
        ?>
    </h1>

    <div class = 'container mt-5'>
        <form action = "logout.php">
            <button type="submit" class="btn btn-primary w-100">Log out</button>
        </form>
    </div>

  </body>
</html>