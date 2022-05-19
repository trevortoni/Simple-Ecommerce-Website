<?php
session_start();
include "includes/db.php";
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('admin_login.php','_self')</script>";
}
else{

if(isset($_GET['delete_product']))
{

    $delete_product_id = $_GET['delete_product'];

    $delete_product = "DELETE FROM products WHERE product_id = '$delete_product_id' ";

    $execute_delete = mysqli_query($con, $delete_product);

    if($execute_delete){
        echo "<script>alert('Product has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}

}

?> 