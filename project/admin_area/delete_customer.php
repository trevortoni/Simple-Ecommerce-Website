<?php
session_start();
include "includes/db.php";
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('admin_login.php','_self')</script>";
}
else{

if(isset($_GET['delete_customer']))
{

    $delete_customer_id = $_GET['delete_customer'];

    $delete_customer = "DELETE FROM customers WHERE customer_id = '$delete_customer_id' ";

    $execute_delete = mysqli_query($con, $delete_customer);

    if($execute_delete){
        echo "<script>alert('Customer has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_customers','_self')</script>";
    }
}

}

?> 