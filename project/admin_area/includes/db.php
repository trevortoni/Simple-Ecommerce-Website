<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "my_ecommerce";

// Create connection
$con = mysqli_connect($host, $user, $password,$db);

//Check for the connection failure
if(mysqli_connect_errno())
{
    echo "Database connection failure: ".mysqli_connect_error();
}

?>