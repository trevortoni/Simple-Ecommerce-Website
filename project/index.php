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
            <?php include "menubar.php"; ?>
            <!--Navigation end-->

        </div>
        <!--Header end-->

        <div class="content_wrapper">

            <!--sidebar start-->

            <?php include "sidebar.php";     ?>

            <!--sidebar end-->

            <div id="content_area">

                <!-- shopping_cart start-->
                <?php include "shopping_cart.php"; ?>
                <!-- shopping_cart end-->
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

        <!-- footer start -->
        <?php require "footer.php" ?>
        <!-- footer end -->

    </div>
    <!--Main Container end-->
</body>

</html>