<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best-Bargain </title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&display=swap" rel="stylesheet">
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
            <?php include "menubar.php"; ?>
            <!--Navigation end-->

        </div>
        <!--Header end-->

        <div class="content_wrapper">

            <?php include "sidebar.php";   ?>

            <div id="content_area">
                <?php cart(); ?>
                <!-- shopping_cart start-->
                <?php include "shopping_cart.php"; ?>
                <!-- shopping_cart end-->

                <div id="products_box">

                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        include "customer_login.php";
                    } else {
                        $ip = getIp();
                        $select_cart = "SELECT * FROM cart WHERE ip_add = '$ip' ";
                        $run_cart = mysqli_query($con, $select_cart);
                        $count_rows = mysqli_num_rows($run_cart);
                        if ($count_rows == 0) {
                            header('Location:index.php');
                        }
                        if ($count_rows > 0) {
                            include "payments.php";
                        }
                    }
                    ?>

                </div>
            </div>

        </div>

        <!-- footer start -->
        <?php require "footer.php" ?>
        <!-- footer end -->

    </div>
    <!--Main Container-->
</body>

</html>