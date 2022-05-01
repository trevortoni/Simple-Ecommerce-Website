<?php
include "includes/db.php";

if(isset($_GET['delete_brand']))
{

    $delete_brand_id = $_GET['delete_brand'];

    $delete_brand = "DELETE FROM brands WHERE brand_id = '$delete_brand_id' ";

    $execute_brand_delete = mysqli_query($con, $delete_brand);

    if($execute_brand_delete){
        echo "<script>alert('Brand has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}

?> 