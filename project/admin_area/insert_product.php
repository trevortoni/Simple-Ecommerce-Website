<?php
include "includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tiny.cloud/1/57qbakrv9hrnhfjzo4g06k09ggu3h0vyqyi95iepfxg7d2hb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector: 'textarea' });</script> -->
    <title>Insert Product</title>

    <style>
        body {
            background-color: skyblue
        }

        table {
            margin: 50px auto;
            width: 750px;
            background-color:peru;
            border: 2px solid black;
        }

       
    </style>
</head>

<body>
    <form action="insert_product.php" method="post" enctype="multipart/form-data">

        <table>

            <tr>
                <td style="text-align:center" colspan="8">
                    <h1>INSERT PRODUCTS</h1>
                </td>
            </tr>

            <tr>
                <td style="text-align:right"  ><b>Product Category:</b></td>
                <td><select style="width:350px;text-align:center" name="product_cat"  required>
                    <option>Select a category</option>
                    <?php
                        $get_cats = "SELECT * FROM categories";
                        $run_cats = mysqli_query($con, $get_cats);

                        while ( $row_cats = mysqli_fetch_array ($run_cats) )
                        {
            
                        $cat_id = $row_cats['cat_id'];
                        $cat_title = $row_cats['cat_title'];

                        echo " <option value='$cat_id'>$cat_title</option> ";
                        }
                    ?>
                </select></td>
            </tr>


            <tr>
                <td style="text-align:right" ><b>Product Brand:</b></td>
                <td><select style="width:350px;text-align:center" name="product_brand"  required>
                    <option>Select a brand</option>
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
                <td style="text-align:right" ><b>Product Title:</b></td>
                <td><input style="width:342px;text-align:left"  type="text" name="product_title" required/></td>
            </tr>


            <tr>
                <td style="text-align:right" ><b>Product Price:</b></td>
                <td><input style="width:342px;text-align:left" type="text" name="product_price"  required/></td>
            </tr>


            <tr>
                <td style="text-align:right" ><b>Product Description:</b></td>
                <td><textarea style="width:342px;text-align:left;resize:none" name="product_desc" cols="20" rows="15" ></textarea></td>
            </tr>


            <tr>
                <td style="text-align:right" ><b>Product Image:</b></td>
                <td><input style="width:342px;text-align:center" type="file" name="product_image"  required/></td>
            </tr>

            <tr>
                <td style="text-align:right" ><b>Product Keywords:</b></td>
                <td><input style="width:342px;text-align:left" type="text" name="product_keywords"  required/></td>
            </tr>

            <tr>
                <td style="text-align:center" colspan="8"><input style="margin:10px;width:fit-content;font-weight:bold"  type="submit" name="insert_post" value="Add Product" /></td>
            </tr>

        </table>

    </form>
</body>

</html>

<?php

if(isset($_POST['insert_post']))
{
    //fetch text data
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];

    //fetch image data
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file( $product_image_tmp,"product_images/$product_image");

    $insert_product = "INSERT INTO products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords)
    VALUES('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

    $insert_pro = mysqli_query($con,$insert_product);

    if($insert_pro)
    {
        echo"<script>alert('Product has been added successfully!')</script>";
        echo"<script>window.open('insert_product.php','_self')</script>";
    }

}

?>

