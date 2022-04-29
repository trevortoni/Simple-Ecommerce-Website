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
            <div class="menubar">

                <!--Menu start-->
                <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">All Products</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#">Shopping Cart</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                <!--Menu end-->

                <!--Search bar start-->
                <div id="form">
                    <form method="get" action="results.php" enctype="multipart/form-data">
                        <input type="text" name="user_query" placeholder="Search product  " />
                        <input type="submit" name="search" value="Search" />
                    </form>
                </div>
                <!--Search bar end-->

            </div>
            <!--Navigation end-->

        </div>
        <!--Header end-->

        <!-- Content wrapper start -->
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
                    <span">
                        Welcome Guest <b style="color:yellow;">Shopping Cart-</b>Total items: Total price: <a href="cart.php" style="color:yellow;">
                            Go to Cart</a>
                    </span>
                </div>
                <div id="products_box">
                    <?php

                    if (isset($_GET['pro_id']))
                    {
                        //get the product id from the url
                        $product_id = $_GET['pro_id'];

                        $get_pro = "SELECT * FROM products WHERE product_id ='$product_id' ";
                        $run_pro = mysqli_query($con, $get_pro);

                        while ($row_pro = mysqli_fetch_array($run_pro))
                        {

                            $pro_id = $row_pro['product_id'];
                            $pro_title = $row_pro['product_title'];
                            $pro_price = $row_pro['product_price'];
                            $pro_image = $row_pro['product_image'];
                            $pro_desc = $row_pro['product_desc'];

                            echo " 
    
                             <div id='single_product' style='height:fit-content;width:600px;background-color:none;'> 
                                <div style='height:50px;width:100%;'>
                                <h3>$pro_title</h3>
                                </div>
                                <img src='admin_area/product_images/$pro_image' style='width:400px;height:400px;'/>
                                <p>Price:<b>Ksh $pro_price</b></p>
                                <p>$pro_desc</p>
                                <a href='index.php' style='float:left;'>Go Back</a>
                                <a href='index.php'><button style='float:right;'>Add to Cart</button></a> 
                             </div>

                            ";
                        } //end of while loop

                    } //end of if statement

                    ?>
                </div>
            </div>

        </div>
        <!-- Content wrapper end -->
        <footer>
        <div id="footer">
            <h4>&copy; Trevor Toni 2022 Best Bargain.com</h4>
        </div>
        </footer>

    </div>
    <!--Main Container end-->
</body>

</html>