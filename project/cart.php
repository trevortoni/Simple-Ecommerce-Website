<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "functions/functions.php";
include "includes/db.php";
$_SESSION['qty'] = 1;
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
            <?php include "menubar.php"; ?>
            <!--Navigation end-->

        </div>
        <!--Header end-->

        <div class="content_wrapper">

            <div style="width:100%;" id="content_area">

                <!-- shopping_cart start-->
                <?php include "shopping_cart.php"; ?>
                <!-- shopping_cart end-->
                <?php cart(); ?>


                <div style="max-width:100%;padding:20px;flex-direction:row;flex-wrap:wrap;" id="products_box">

                    <div class="shopping_cart_form_container">
                        <form style="width:100%;" action="" method="post" enctype="multipart/form-data" style="display:flex;flex-direction:column">

                            <table style="margin:10px auto;padding:20px;justify-content:center;width:90%; background:aliceblue; border:1px solid black;">

                                <tr style="margin:auto;">
                                    <td colspan="5">
                                        <h2 style="padding:20px">SHOPPING CART</h2>
                                    </td>
                                </tr>
                                <tr style="margin:auto;">
                                    <th width="20%">Product Image</th>
                                    <th width="30%">Product Name</th>
                                    <th width="15%">Unit Price</th>
                                    <th width="10%">Quantity</th>
                                    <th width="15%">Sub Total</th>
                                    <th width="10%">Remove</th>
                                </tr>


                                <?php

                                $total = 0;

                                $ip = getIp();

                                $sel_cart = "SELECT * FROM cart WHERE ip_add = '$ip' ";

                                $run_cart = mysqli_query($con, $sel_cart);

                                while ($row_cart = mysqli_fetch_array($run_cart)) {

                                    $pro_id = $row_cart['p_id'];

                                    $pro_qty = $row_cart['qty'];

                                    $get_product = "SELECT * FROM products WHERE product_id = '$pro_id' ";

                                    $run_get_product =  mysqli_query($con, $get_product);

                                    while ($product_row = mysqli_fetch_array($run_get_product)) {

                                        $product_title = $product_row['product_title'];

                                        $product_image = $product_row['product_image'];

                                        $single_price = $product_row['product_price'];

                                        $sub_total = $pro_qty * $single_price;

                                        $total = $total + $sub_total;


                                ?>

                                        <tr style="margin:auto;">
                                            <td><img src="admin_area/product_images/<?php echo $product_image; ?>" width="60px" height="40px" /></td>
                                            <td><a style="color:blue;text-decoration:none;" href="details.php?pro_id=<?php echo $pro_id; ?>">
                                                    <p style="font-size:small;"><?php echo $product_title; ?></p>
                                                </a></td>
                                            <td><?php echo $single_price; ?></td>
                                            <td><?php echo $pro_qty; ?></td>
                                            <td><?php echo "Ksh " . $sub_total; ?></td>
                                            <td colspan="2"><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
                                        </tr>
                                <?php }
                                } ?>

                                <tr>
                                    <td colspan="4" style="text-align:right;padding-right:20px;width:65%; "><b>Cart Total: </b></td>
                                    <td style="text-align:left;width:35%"><?php echo "Ksh " . $total; ?></td>
                                </tr>

                                <tfoot>
                                    <tr>
                                        <td colspan="2"><input type="submit" name="continue" value="Continue Shopping" /></td>
                                        <td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
                                        <td><button><a href="checkout.php" style="text-decoration:none;color:black;">Checkout</a></button></td>
                                    </tr>
                                </tfoot>


                            </table>

                        </form>
                    </div> <!-- //shopping cart form container end -->

                    <div class="order_summary" style="background-color:white;width:30%;min-height:300px;max-height:fit-content;margin-top:10px;">
                        <div class="order_summary_header">
                            <h3 style="margin-bottom:10px;">Order Summary</h3>
                        </div>
                        <p>Shipping and additional costs are applied*</p>
                        <div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Order Subtotal</td>
                                        <th><?php echo 'Ksh' . $total; ?></th>
                                    </tr>

                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>Ksh 0</th>
                                    </tr>

                                    <tr>
                                        <td>Vat</td>
                                        <th>
                                            <?php
                                            $vat = $total * 0.13;
                                            $vat_rounded = round($vat, 0);
                                            echo 'Ksh' . $vat_rounded;
                                            ?>
                                        </th>
                                    </tr>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th>
                                            <?php
                                            $final_total = $total + $vat;
                                            $final_total_formatted = round($final_total, 0);
                                            echo 'Ksh' . $final_total_formatted;
                                            ?>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div> <!-- //products box end -->


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

    <!-- footer start -->
    <?php require "footer.php" ?>
    <!-- footer end -->

    </div>
    <!--Main Container-->
</body>

</html>