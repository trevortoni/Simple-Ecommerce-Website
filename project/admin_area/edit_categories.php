<?php
session_start();
include "includes/db.php";
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('admin_login.php','_self')</script>";
}
else{

if(isset($_GET['edit_category'])){

    $fetch_category_id = $_GET['edit_category'];

    $fetch_category = "SELECT * FROM categories WHERE cat_id = ' $fetch_category_id' ";
    
    $execute_category = mysqli_query($con, $fetch_category);

    $row_category = mysqli_fetch_array($execute_category);

    $category_id = $row_category['cat_id'];

    $category_name = $row_category['cat_title'];
}

?>

<div class="add_category_form_container">   

    <form class="add_category_form" action="" method="post">

        <div class="add_category_form_header">
            <h2>Update Category</h2>
        </div>

        <div class="input_control">
            <label for="updated_category">Category:</label>
            <input type="text" name="updated_category" value="<?php echo $category_name ?>" required>
            <button type="submit" name="update_category_button">Update Category</button>
        </div>

    </form>

</div>

<?php
}

if (isset($_POST['update_category_button'])) {

    $update_category_name = $_POST['updated_category'];

    if (empty($update_category_name)) {
        echo "<script>alert('Category field cannot be empty')</script>";
        exit;
    } else {

        $update_category = "UPDATE categories SET cat_title = '$update_category_name' WHERE cat_id = '$category_id' ";

        $execute_update_category = mysqli_query($con, $update_category);

        if ($execute_update_category) {
            echo "<script>alert('Product category updated successfully')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        }
    }
}
?>