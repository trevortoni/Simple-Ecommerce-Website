<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "functions/functions.php";
include "includes/db.php";
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
    <!-- <style>
        .sub_total{
            background-color: yellow;
        }
    </style> -->
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
                        <input type="text" name="user_query" placeholder="Search product  " />
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
                    <div id="shopping-cart-span">

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

                        if (!isset($_SESSION['customer_email'])) {

                            echo "<a href='checkout.php' style='color:blue; text-decoration:none;'>Login</a>";
                        } else {

                            echo "<a href='logout.php' style='color:blue; text-decoration:none'>Logout</a>";
                        }

                        ?>

                    </div>
                </div>
                <?php cart(); ?>


                <div id="products_box" style="width:90%;">
                    <form style="width:100%;" action="" method="post" enctype="multipart/form-data" style="margin:-50px 0 0 180px;display:flex;flex-direction:column">

                        <table style="margin:10px auto;padding:10px;justify-content:center;width:90%; background:aliceblue; border:1px solid black;">

                            <tr style="margin:auto;">
                                <td colspan="5">
                                    <h2 style="padding:20px">SHOPPING CART</h2>
                                </td>
                            </tr>
                            <tr style="margin:auto;">
                                <th colspan="2">Remove</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>


                            <?php

                            $total = 0;

                            $ip = getIp();

                            $sel_price = "SELECT * FROM cart WHERE ip_add = '$ip' ";

                            $run_price = mysqli_query($con, $sel_price);

                            while ($p_price = mysqli_fetch_array($run_price)) {

                                $pro_id = $p_price['p_id'];

                                $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id' ";

                                $run_pro_price =  mysqli_query($con, $pro_price);

                                while ($p_price = mysqli_fetch_array($run_pro_price)) {

                                    $product_price = array($p_price['product_price']);

                                    $product_title = $p_price['product_title'];

                                    $product_image = $p_price['product_image'];

                                    $single_price = $p_price['product_price'];

                                    // $product_id = $pp_price['product_id'];

                                    $values = array_sum($product_price);

                                    $total = $total + $values;


                            ?>

                                    <tr style="margin:auto;">
                                        <td colspan="2"><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
                                        <td ><?php echo $product_title; ?><br>
                                            <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60px" height="60px" />
                                        </td>
                                        <td><input style="text-align:center;" type="number" min="1" id="qty_input"  name="qty" value="<?php echo $_SESSION["qty"]; ?>" /></td>

                                        <!-- <script>
                                            var qtyInput = document.getElementById("qty_input");

                                            window.onload = function() {
                                                if (sessionStorage.getItem("autosave"))
                                                    qtyInput.value = sessionStorage.getItem("autosave");
                                            }

                                            qtyInput.addEventListener("keyup", function() {
                                                sessionStorage.setItem("autosave", qtyInput.value);
                                            });
                                        </script> -->

                                        <?php

                                        if (isset($_POST['update_cart'])) {

                                            if (isset($_SESSION['customer_email']) && $_SESSION['qty'] == 0) {

                                                $_SESSION['qty'] = 1;
                                            }
                                            // else{
                                            //     $_SESSION['qty'] =  $_SESSION['qty'];
                                            // }

                                            $qty = $_POST['qty'];

                                            $update_qty = "UPDATE cart SET qty = $qty ";

                                            $run_qty = mysqli_query($con,$update_qty);
 

                                            // try{
                                            //      $update_qty = "UPDATE cart SET qty = $qty WHERE pro_id = $pro_id ";

                                            //     $run_qty = mysqli_query($con,$update_qty);

                                            // }catch(mysqli_sql_exception $e){
                                            //     var_dump($e);
                                            //     exit; 

                                            // }

                                            $_SESSION['qty'] = $qty;

                                            $total = $total * $qty;
                                            (int)$total=(int)$total* (int)$qty;

                                            // (int)$single_price=(int)$single_price* (int)$qty;

                                            
                                        }

                                        ?>

                                        <td><?php echo "Ksh " . $single_price; ?></td>
                                    </tr>
                            <?php }
                            } ?>

                            <tr>
                                <td colspan="4" style="text-align:right;padding-right:20px;width:65%; "><b>Sub Total: </b></td>
                                <td style="text-align:left;width:35%"><?php echo "Ksh " . $total; ?></td>
                            </tr>

                            <tr>
                                <td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
                                <td  colspan="2"><input type="submit" name="continue" value="Continue Shopping" /></td>
                                <td><button><a href="checkout.php" style="text-decoration:none;color:black;">Checkout</a></button></td>

                            </tr>


                        </table>

                    </form>

                    <?php
                    // function updateCart()
                    // {
                    //     global $con;

                    $ip = getIP();

                    if (isset($_POST['update_cart'])) {

                        if (isset($_POST['remove'])) { 

                            foreach ($_POST['remove'] as $remove_id) {

                                $delete_product = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip'";

                                $run_delete = mysqli_query($con, $delete_product);
                                if ($run_delete) {
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }
                        }
                    }

                    if (isset($_POST['continue'])) {
                        echo "<script>window.open('index.php','_self')</script>";
                    }

                    //     echo $up_cart = updateCart();// if function is not working dont generate error 
                    // }
                    ?>
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