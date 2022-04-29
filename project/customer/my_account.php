<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

            <a href="../index.php"><img id="logo" src="images/Best Bargain5.png" /></a>
            <!-- <img id="banner" src="images/Best Bargain5.png" /> -->
            <div id="banner">
                <h1>Affordable household solutions</h1>
            </div>

            <!--Navigation start-->
            <div class="menubar">

                <!--Menu start-->
                <ul id="menu">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../all_products.php">All Products</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="../cart.php">Shopping Cart</a></li>
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
                <div id="sidebar_title">My Account</div>

                <ul id="cats">
                    
                    <?php

                    ?>

                    <li><a href="my_account.php?my_orders">My Orders</a></li>
                    <li><a href="my_account.php?edit_account">Update Account</a></li>
                    <li><a href="my_account.php?update_password">Update Password</a></li>
                    <li><a href="my_account.php?delete_account">Delete Account</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>

            </div>

            <div id="content_area">

                <div id="shopping_cart"> 
                    <div id="shopping-cart-span">

                        <?php
                        if (isset($_SESSION['customer_email'])) {

                            $customer = $_SESSION['customer_email'];

                            $select_name = "SELECT * FROM customers WHERE customer_email = '$customer' ";

                            $run_fname = mysqli_query($con, $select_name);

                            $row_fname = mysqli_fetch_array($run_fname);

                            $customer_fname = $row_fname['customer_fname'];

                            // echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow'></b>";

                            echo "<b>Welcome:</b>" . $customer_fname . "<b style='color:yellow'></b>";
                        } else {
                            echo "<b>Welcome Guest</b>";
                        }
                        ?>


                        <?php

                        if (!isset($_SESSION['customer_email'])) {

                            echo "<a href='checkout.php' style='color:blue; text-decoration:none;'>Login</a>";
                        } else {

                            echo "<a href='logout.php' style='color:blue; text-decoration:none'>Logout</a>";
                        }

                        ?>

                    </div>
                </div>

                <div id="products_box" style="justify-content:center;display:flex;flex-direction:column;">

                        <!-- <b>You can see your orders' progress here <a href="my_account.php?my_orders">orders</a></b> -->

                        <?php
                            if(!isset($_GET['my_orders'])){
                                if(!isset($_GET['edit_account'])){
                                    if(!isset($_GET['update_password'])){
                                        if(!isset($_GET['delete_account'])){
                                            echo "
                                           
                                            <h2>Welcome Dear Customer</h2>
                                            <b>You can see your orders' progress here <a href='my_account.php?my_orders'>orders</a></b>

                                            ";
                                        }
                                    }
                                }
                            }
                        ?>

                        <?php
                            if(isset($_GET['edit_account'])){

                                include ("edit_account.php");
                            }

                            if(isset($_GET['update_password'])){

                                include ("update_password.php");
                            }

                            if(isset($_GET['delete_account'])){

                                include ("delete_account.php");
                            }
                        ?>

                </div>     
                 <!-- end of products box -->

            </div>

        </div>

        <div id="footer">
            <h4>&copy; Trevor Toni 2022 Best Bargain.com</h4>
        </div>

    </div>
    <!--Main Container-->
</body>

</html>