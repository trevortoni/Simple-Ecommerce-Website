<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div class="view_products_container">
        <h2 class="products_table_header">List Of Available Products</h2>

        <table>

            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
            include "includes/db.php";

            $fetch_product = "SELECT * FROM products ";

            $execute_pro = mysqli_query($con, $fetch_product);

            $product_count = 0;

            while ($row_pro = mysqli_fetch_array($execute_pro)) {

                $product_id = $row_pro['product_id'];
                $product_title = $row_pro['product_title'];
                $product_image = $row_pro['product_image'];
                $product_price = $row_pro['product_price'];

                $product_count++;
            ?>

                <tr>
                    <td> <?php echo $product_count; ?> </td>
                    <td> <?php echo $product_title; ?> </td>
                    <td> <img src="product_images/<?php echo $product_image; ?>"> </td>
                    <td> <?php echo $product_price; ?> </td>
                    <td> <a href="index.php?edit_product=<?php echo $product_id; ?>">Edit</a> </td>
                    <td> <a href="index.php?delete_product=<?php echo $product_id; ?>">Delete</a> </td>
                </tr>

            <?php } ?>

        </table>
    </div>

</body>

</html>