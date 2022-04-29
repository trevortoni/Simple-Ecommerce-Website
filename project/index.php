<?php
session_start();
include "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Best-Bargain</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best-Bargain</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd5be11cb7.js" crossorigin="anonymous"></script>
</head>

<body>

    <!--Main Container-->
    <div class="main_wrapper">

        <!--Header start-->
        <div class="header_wrapper">

            <a href="index.php"><img id="logo" src="images/Best Bargain5.png" /></a>
            <!-- <img id="banner" src="images/Best Bargain5.png" /> -->
            <div id="banner">
                <h1>Affordable household solutions</h1>
            </div>

            <!--Navigation start-->
            <div class="menubar">

                <!--Menu start-->
                <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="all_products.php">All Products</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                    <li><a href="customer_register.php">Sign Up</a></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                <!--Menu end-->

                <!--Search bar start-->
                <div id="form">
                    <form method="get" action="results.php" enctype="multipart/form-data">
                        <input style="height:40px;" type="text" name="user_query" placeholder="Search product  " />
                        <input type="submit" name="search" value="Search" />
                    </form>
                </div>
                <!--Search bar end-->

            </div>
            <!--Navigation end-->

        </div>
        <!--Header end-->

        <div class="content_wrapper">

            <div id="sidebar">
                <div id="sidebar_title">Categories</div>

                <ul id="cats">
                    <?php getCats(); ?>
                </ul>

                <div id="sidebar_title">Brands</div>

                <ul id="cats">
                    <?php getBrands(); ?>
                </ul>

            </div>

            <div id="content_area">

                <div id="shopping_cart">
                    <div id="shopping-cart-span" >

                        <?php
                        if (isset($_SESSION['customer_email'])) {
                            echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow'></b>";
                        } else {
                            echo "<b>Welcome Guest</b>";
                        }
                        ?>

                        <b style="color:yellow;"><i class="fa-solid fa-cart-shopping"></i></b>Total items: <?php totalItems(); ?> Total
                        Price:<?php totalPrice(); ?> <a href="cart.php" style="color:yellow;">Go to Cart </a>

                        <?php

                        if(!isset($_SESSION['customer_email']))
                        {
                          
                          echo "<a href='checkout.php' style='color:blue; text-decoration:none;'>Login</a>";
                        }
     
                        else
                        {
                           
                            echo "<a href='logout.php' style='color:blue; text-decoration:none'>Logout</a>";
                        }

                        ?>

                    </div>
                </div>
                <?php cart(); ?>

                <div id="products_box">

                    <!-- when category is not selected -->
                    <?php getPro(); ?>
                    <!-- when category is selected -->
                    <?php getCatPro(); ?>
                    <!-- when brand is selected -->
                    <?php getBrandPro(); ?>

                </div>

            </div>

        </div>

        <div id="footer">
            <h4>&copy; Trevor Toni 2022 Best Bargain.com</h4>
        </div>

    </div>
    <!--Main Container-->
</body>

</html>