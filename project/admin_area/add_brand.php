<?php
session_start();
 include "includes/db.php";
 if(!isset($_SESSION['admin_email']))
{
    echo "<script>window.open('admin_login.php','_self')</script>";
}
else{
?>
?>

<div class="add_category_form_container">

    <form class="add_category_form" action="" method="post">

        <div class="add_category_form_header">
            <h2>Add New Product Brand</h2>
        </div>

        <div class="input_control">
            <label for="new_brand">Brand:</label>
            <input type="text" name="new_brand" required>
            <button type="submit" name="add_brand_button">Add Brand</button>
        </div>

    </form>

</div>

<?php
}

if (isset($_POST['add_brand_button'])) {

    $new_brand = $_POST['new_brand'];

    if (empty($new_brand)) {
        echo "<script>alert('Brand field cannot be empty')</script>";
        exit;
    } else {

        $add_brand = "INSERT INTO brands (brand_title) VALUES('$new_brand') ";

        $execute_add_brand = mysqli_query($con, $add_brand);

        if ($execute_add_brand) {
            echo "<script>alert('New product brand added successfully')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }
    }
}
?>