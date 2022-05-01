<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div class="view_products_container">
        <h2 class="products_table_header">List Of Available Brands</h2>

        <table>

            <tr>
                <th>No</th>
                <th>Brand Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
            include "includes/db.php";

            $fetch_brand = "SELECT * FROM brands ";

            $execute_brand = mysqli_query($con, $fetch_brand);

            $brand_count = 0;

            while ($row_brand = mysqli_fetch_array($execute_brand)) {

                $brand_id = $row_brand['brand_id'];
                $brand_name = $row_brand['brand_title'];

                $brand_count++;
            ?>

                <tr>
                    <td> <?php echo $brand_count; ?> </td>
                    <td> <?php echo $brand_name; ?> </td>
                    <td> <a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a> </td>
                    <td> <a href="index.php?delete_brand=<?php echo $brand_id; ?>">Delete</a> </td>
                </tr>

            <?php } ?>

        </table>
    </div>

</body>

</html>