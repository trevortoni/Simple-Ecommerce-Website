<?php
include "includes/db.php";

if(isset($_GET['delete_category']))
{

    $delete_category_id = $_GET['delete_category'];

    $delete_category = "DELETE FROM categories WHERE cat_id = '$delete_category_id' ";

    $execute_delete = mysqli_query($con, $delete_category);

    if($execute_delete){
        echo "<script>alert('Category has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}

?> 