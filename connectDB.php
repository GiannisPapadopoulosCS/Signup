<?php

$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "mysql";
$DATABASE = "signup_forms";

$connection = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if($connection){
}else{
    die(mysqli_error($connection));
}

?>