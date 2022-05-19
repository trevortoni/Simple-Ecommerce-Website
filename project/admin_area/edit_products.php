<?php
session_start();
include "includes/db.php";
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('admin_login.php','_self')</script>";
}
else{


if(isset($_GET['edit_product'])){

    $fetch_id = $_GET['edit_product'];
 
    $fetch_product = "SELECT * FROM products WHERE product_id = '$fetch_id' ";

    $execute_pro = mysqli_query($con, $fetch_product);

    $row_pro = mysqli_fetch_array($execute_pro);

        $product_id = $row_pro['product_id'];
        $product_category = $row_pro['product_cat'];
        $product_brand = $row_pro['product_brand'];
        $product_title = $row_pro['product_title'];
        $product_image = $row_pro['product_image'];
        $product_price = $row_pro['product_price'];
        $product_desc = $row_pro['product_desc'];
        $product_keywords = $row_pro['product_keywords'];


        $fetch_category_name ="SELECT * FROM categories WHERE cat_id = '$product_category'";

        $execute_cat = mysqli_query($con,$fetch_category_name);

        $row_category = mysqli_fetch_array($execute_cat);

        $category_name = $row_category['cat_title'];


        $fetch_brand_name ="SELECT * FROM brands WHERE brand_id = '$product_brand'";

        $execute_brand = mysqli_query($con,$fetch_brand_name);

        $row_brand = mysqli_fetch_array($execute_brand);

        $brand_name = $row_brand['brand_title'];

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tiny.cloud/1/57qbakrv9hrnhfjzo4g06k09ggu3h0vyqyi95iepfxg7d2hb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector: 'textarea' });</script> -->
    <title>Update Product</title>

    <style>
        body {
            background-color: skyblue;
        }

        table {
            margin: 50px auto;
            width: 750px;
            background-color:darkorange;
            border: 2px solid black;
        }

       
    </style>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">

        <table style="height:500px;">

            <tr>
                <td style="text-align:center" colspan="8">
                    <h1>UPDATE PRODUCT</h1>
                </td>
            </tr>

            <tr>
                <td style="text-align:right" ><b>Product Title:</b></td>
                <td><input style="width:342px;text-align:left"  type="text" name="product_title" value="<?php echo $product_title ?>" /></td>
            </tr>


            <tr>
                <td style="text-align:right"  ><b>Product Category:</b></td>
                <td><select style="width:350px;text-align:center" name="product_cat" >
                    <option value="<?php echo $product_category ?>" ><?php echo $category_name ?></option>
                    <?php
                        $get_cats = "SELECT * FROM categories";
                        $run_cats = mysqli_query($con, $get_cats);

                        while ( $row_cats = mysqli_fetch_array ($run_cats) )
                        {
            
                        $cat_id = $row_cats['cat_id'];
                        $cat_title = $row_cats['cat_title'];

                        echo " <option value='$cat_id'> $cat_title</option> ";
                        }
                    ?>
                </select></td>
            </tr>


            <tr>
                <td style="text-align:right" ><b>Product Brand:</b></td>
                <td><select style="width:350px;text-align:center" name="product_brand">
                    <option value="<?php echo $product_brand ?>"> <?php echo $brand_name ?> </option>
                    <?php
                        $get_brands = "SELECT * FROM brands";
                        $run_brands = mysqli_query($con, $get_brands);

                        while ( $row_brands = mysqli_fetch_array ($run_brands) )
                        {
            
                        $brand_id = $row_brands['brand_id'];
                        $brand_title = $row_brands['brand_title'];

                        echo " <option value='$brand_id'>$brand_title</option> ";
                        }
                    ?>
                </select></td>
            </tr>

            <tr>
                <td style="text-align:right" ><b>Product Price:</b></td>
                <td><input style="width:342px;text-align:left" type="text" name="product_price" value="<?php echo $product_price ?>" /></td>
            </tr>


            <tr>
                <td style="text-align:right" ><b>Product Description:</b></td>
                <td><textarea style="width:342px;text-align:left;resize:none" name="product_desc" cols="20" rows="15" ><?php echo $product_desc ?></textarea></td>
            </tr>


            <tr>
                <td style="text-align:right" ><b>Product Image:</b></td>
                <td><input style="width:342px;text-align:center" type="file" name="product_image" required/><img style="height:60px;width:70px;" src="product_images/<?php echo $product_image ?>"></td>
            </tr>

            <tr>
                <td style="text-align:right" ><b>Product Keywords:</b></td>
                <td><input style="width:342px;text-align:left" type="text" name="product_keywords"  value="<?php echo $product_keywords ?>" /></td>
            </tr>

            <tr>
                <td style="text-align:center" colspan="8"><input style="margin:10px;width:fit-content;font-weight:bold"  type="submit" name="update_product" value="Update Product" /></td>
            </tr>

        </table>

    </form>
</body>

</html>

<?php
}

if(isset($_POST['update_product']))
{
    $product_id = $fetch_id;
    //fetch text data
    $product_category = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];

    //fetch image data
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file( $product_image_tmp,"product_images/$product_image");

    $update_product = " UPDATE products SET product_cat= '$product_category',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords'
    WHERE product_id = '$product_id' ";

    $execute_update = mysqli_query($con,$update_product);

    if($execute_update)
    {
        echo"<script>alert('Product has been updated successfully!')</script>";
        echo"<script>window.open('index.php?view_products','_self')</script>";
    }

}

?>
