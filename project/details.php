<?php
include "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best-Bargain</title>
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

            <!-- <img id="logo" src="images/Best Bargain5.png" /> -->
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

        <!-- Content wrapper start -->
        <div class="content_wrapper">

            <!--sidebar start-->
            <?php include "sidebar.php"; ?>
            <!--sidebar end-->

            <div id="content_area">

                <!-- shopping_cart start-->
                <?php include "shopping_cart.php"; ?>
                <!-- shopping_cart end-->
                <div id="products_box">
                    <?php cart(); ?>

                    <?php

                    if (isset($_GET['pro_id'])) {
                        //get the product id from the url
                        $product_id = $_GET['pro_id'];

                        $get_pro = "SELECT * FROM products WHERE product_id ='$product_id' ";
                        $run_pro = mysqli_query($con, $get_pro);

                        while ($row_pro = mysqli_fetch_array($run_pro)) {

                            $pro_id = $row_pro['product_id'];
                            $pro_title = $row_pro['product_title'];
                            $pro_price = $row_pro['product_price'];
                            $pro_image = $row_pro['product_image'];
                            $pro_desc = $row_pro['product_desc'];
                            $pro_desc_formatted = nl2br($row_pro['product_desc']);

                            echo " 
    
                             <div id='single_product' style='margin:auto;min-height:700px;max-height:fit-content;width:90%;padding:10px;display:flex;flex-direction:row;border:none;'> 

                               <div class='left_box' style='width:50%;padding:20px;display:flex;flex-direction:column;'>

                                    <div style='height:50px;width:100%;padding:10px;'>
                                    <h4>$pro_title</h4>
                                    </div>
                                    <img src='admin_area/product_images/$pro_image' style='width:400px;height:400px;'/>
                                    <p>Price:<b>Ksh $pro_price</b></p>

                                    <form action='details.php?add_cart=$pro_id' method='POST'> 

                                        <div style='width:90%;padding:5px;' class='quantity_input_box'>
                                            <label for='pro_qty'>Product quantity</label>
                                            <select style='width:50px;' name ='pro_qty' >
                                                <option value='1' >1</option>
                                                <option value='2' >2</option>
                                                <option value='3' >3</option>
                                                <option value='4' >4</option>
                                                <option value='5' >5</option>
                                            </select>
                                        </div>

                                        <div class='left_box_bottom' style='width:90%;min-height:100px;max-height:fit-content;padding:10px;display:flex;flex-direction:column;justify-content:space-evenly;'>
                                            <!--<a href='index.php'><button type='submit' style='float:right;'>Add to Cart</button></a>-->
                                            <button class='details_add_cart' style='height:50px;font-size:large;border-radius:10px;' type='submit' >Add to Cart</button>
                                            <a style='color:blue;font-size:large;' href='index.php' style='float:left;'>Continue shopping</a>
                                        </div>

                                    </form>

                                </div>

                                <div class='right_box' style='width:50%;padding:20px;text-align:left'>
                                <h3 style='margin-bottom:20px;'>Product Details</h3>
                                <p> $pro_desc_formatted</p>
                                <div>
                    
                             </div>

                            ";
                        } //end of while loop

                    } //end of if statement

                    ?>
                </div>
            </div>

        </div>
        <!-- Content wrapper end -->

    </div>
    <!--Main Container end-->

    <!-- footer start -->
    <?php require "footer.php" ?>
    <!-- footer end -->


</body>

</html>