<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="main_wrapper">

        <div class="header">
            <img src="images/admin_panel.png">
        </div>

        <div class="sidebar">

            <h2>Admin Menu</h2>

            <a href="index.php?insert_new_product">Add New Product</a>
            <a href="index.php?view_products">View Products</a>
            <a href="index.php?add_new_category">Add Category</a>
            <a href="index.php?view_categories">View Categories</a>
            <a href="index.php?add_new_brand">Add Brand</a>
            <a href="index.php?view_brands">View Brands</a>
            <a href="index.php?view_customers">View Customers</a>
            <a href="index.php?view_orders">View Orders</a>
            <a href="index.php?view_payments">View Payments</a>
            <a href="index.php?logout">Logout</a>

        </div>

        <div class="content">
            <?php

                if(isset($_GET['insert_new_product'])){
                    include "insert_product.php";
                }

                if(isset($_GET['view_products'])){
                    include "view_products.php";
                }

                if(isset($_GET['edit_product'])){
                    include "edit_products.php";
                }

                if(isset($_GET['delete_product'])){
                    include "delete_product.php";
                }

                if(isset($_GET['add_new_category'])){
                    include "add_category.php";
                }

                if(isset($_GET['view_categories'])){
                    include "view_categories.php";
                }

                if(isset($_GET['edit_category'])){
                    include "edit_categories.php";
                }

                if(isset($_GET['delete_category'])){
                    include "delete_category.php";
                }

                if(isset($_GET['add_new_brand'])){
                    include "add_brand.php";
                }

                if(isset($_GET['view_brands'])){
                    include "view_brands.php";
                }

                if(isset($_GET['edit_brand'])){
                    include "edit_brands.php";
                }

                if(isset($_GET['delete_brand'])){
                    include "delete_brand.php";
                }

                if(isset($_GET['view_customers'])){
                    include "fetch_customers.php";
                }

                if(isset($_GET['delete_customer'])){
                    include "delete_customer.php";
                }

            ?>
        </div>

    </div>
</body>

</html>