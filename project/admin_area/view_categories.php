<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div class="view_products_container">
        <h2 class="products_table_header">List Of Available Categories</h2>

        <table>

            <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
            include "includes/db.php";

            $fetch_category = "SELECT * FROM categories ";

            $execute_category = mysqli_query($con, $fetch_category);

            $category_count = 0;

            while ($row_category = mysqli_fetch_array($execute_category)) {

                $category_id = $row_category['cat_id'];
                $category_name = $row_category['cat_title'];

                $category_count++;
            ?>

                <tr>
                    <td> <?php echo $category_count; ?> </td>
                    <td> <?php echo $category_name; ?> </td>
                    <td> <a href="index.php?edit_category=<?php echo $category_id; ?>">Edit</a> </td>
                    <td> <a href="index.php?delete_category=<?php echo $category_id; ?>">Delete</a> </td>
                </tr>

            <?php } ?>

        </table>
    </div>

</body>

</html>