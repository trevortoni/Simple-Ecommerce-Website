<?php
// session_start();
// // session_destroy();
// session_unset();
// echo "<script>window.open('index.php','_self')</script>";
session_start();

include "includes/db.php";

$get_products = "SELECT * FROM cart WHERE ip_add = '$ip' ";

$run_get_products =mysqli_query($con, $get_products );

if(mysqli_num_rows($run_get_products) > 0 )
{

$delete_customer_cart = "DELETE FROM cart WHERE ip_add = '$ip'";

$run_delete_cart = mysqli_query($con,$delete_customer_cart);

}

session_unset();

//Go back to the front page
header("location:index.php?");
die();
