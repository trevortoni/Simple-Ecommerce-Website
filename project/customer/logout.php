<?php
session_start();

include "functions/functions.php";

$ip = getIp();

$get_products = "SELECT * FROM cart WHERE ip_add = '$ip' ";

$run_get_products =mysqli_query($con, $get_products );

if(mysqli_num_rows($run_get_products) > 0 )
{

$delete_customer_cart = "DELETE FROM cart WHERE ip_add = '$ip'";

$run_delete_cart = mysqli_query($con,$delete_customer_cart);

}

session_unset();

//Go back to the home page
header("location:../index.php?");
die();


