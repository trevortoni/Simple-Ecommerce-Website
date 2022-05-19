<?php 
session_start();
include "includes/db.php";
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('admin_login.php','_self')</script>";
}
else{
?>

<div class="add_category_form_container">

    <form class="add_category_form" action="" method="post">

        <div class="add_category_form_header">
            <h2>Add New Product Category</h2>
        </div>

        <div class="input_control">
            <label for="new_category">Category:</label>
            <input type="text" name="new_category" required>
            <button type="submit" name="add_category_button">Add Category</button>
        </div>

    </form>

</div>

<?php
}

if (isset($_POST['add_category_button'])) {

    $new_category = $_POST['new_category'];

    if (empty($new_category)) {
        echo "<script>alert('Category field cannot be empty')</script>";
        exit;
    } else {

        $add_category = "INSERT INTO categories (cat_title) VALUES('$new_category') ";

        $execute_add_category = mysqli_query($con, $add_category);

        if ($execute_add_category) {
            echo "<script>alert('New product category added successfully')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        }
    }
}
?>