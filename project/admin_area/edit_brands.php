<?php 
session_start();
include "includes/db.php";
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('admin_login.php','_self')</script>";
}
else{

if(isset($_GET['edit_brand'])){

    $fetch_brand_id = $_GET['edit_brand'];

    $fetch_brand = "SELECT * FROM brands WHERE brand_id = ' $fetch_brand_id' ";
    
    $execute_brand = mysqli_query($con, $fetch_brand);

    $row_brand = mysqli_fetch_array($execute_brand);

    $brand_id = $row_brand['brand_id'];

    $brand_name = $row_brand['brand_title'];
}

?>

<div class="add_category_form_container">   

    <form class="add_category_form" action="" method="post">

        <div class="add_category_form_header">
            <h2>Update Brand</h2>
        </div>

        <div class="input_control">
            <label for="updated_brand">Brand:</label>
            <input type="text" name="updated_brand" value="<?php echo $brand_name ?>" required>
            <button type="submit" name="update_brand_button">Update Brand</button>
        </div>

    </form>

</div>

<?php
}

if (isset($_POST['update_brand_button'])) {

    $update_brand_name = $_POST['updated_brand'];

    if (empty($update_brand_name)) {
        echo "<script>alert('Brand field cannot be empty')</script>";
        exit;
    } else {

        $update_brand = "UPDATE brands SET brand_title = '$update_brand_name' WHERE brand_id = '$brand_id' ";

        $execute_update_brand = mysqli_query($con, $update_brand);

        if ($execute_update_brand) {
            echo "<script>alert('Product brand updated successfully')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }
    }
}
?>