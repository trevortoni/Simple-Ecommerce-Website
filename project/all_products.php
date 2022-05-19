<?php
session_start();
include "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Bargain</title>
    <link rel="stylesheet" href="styles/style.css">
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
            <?php include "sidebar.php"; ?>
            <!--sidebar end-->

             <!--content-area start-->
            <div id="content_area"> 

                <!-- shopping_cart start-->
                <?php include "shopping_cart.php"; ?>
                <!-- shopping_cart end-->
                <?php cart(); ?>

                <!--products-box start-->
                <div id="products_box">
                    <?php
                    $get_pro = "SELECT * FROM products ORDER BY product_id DESC ";
                    $run_pro = mysqli_query($con, $get_pro);

                    while ($row_pro = mysqli_fetch_array($run_pro)) {

                        $pro_id = $row_pro['product_id'];
                        $pro_cat = $row_pro['product_cat'];
                        $pro_brand = $row_pro['product_brand'];
                        $pro_title = $row_pro['product_title'];
                        $pro_price = $row_pro['product_price'];
                        $pro_image = $row_pro['product_image'];

                        $pro_price_formatted = number_format($pro_price);

                        echo " 
                      <div id='single_product' > 
                            <div id='single_product_title'>
                            <h5>$pro_title</h5>
                            </div>
                            <img src='admin_area/product_images/$pro_image'/>
                            <p><b>Price: Ksh $pro_price_formatted</b></p>
                            <a id='details' href='details.php?pro_id=$pro_id'>Details</a>
                        <!-- <a id='price' href='index.php'><button>Add to Cart</button></a>  -->
                      </div>
                       ";
                    } //end of while loop
                    ?>
                </div>
                 <!--products-box end-->
            </div>
            <!--content-area end-->

        </div>

        <!-- footer start -->
        <?php require "footer.php" ?>
        <!-- footer end -->

    </div>
    <!--Main Container-->
</body>

</html>