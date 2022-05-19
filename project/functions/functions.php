<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = "localhost";
$user = "root";
$password = "";
$db = "my_ecommerce";

// Create connection
$con = mysqli_connect($host, $user, $password, $db);

// Check connection errors
if (mysqli_connect_errno()) {
    echo "Database connection failure: " . mysqli_connect_error();
    exit();
} else {

    //get the user Ip
    function getIp()
    {
        $ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        return $ip;
    }


    //get the user shopping cart
    function cart()
    {

        if (isset($_GET['add_cart'])) {

            global $con;

            $ip = getIp();

            $pro_id = $_GET['add_cart'];

            if (isset($_POST['pro_qty'])) {

                $pro_qty = $_POST['pro_qty'];

                // echo  $pro_qty;
            }

            // $pro_qty = (int) $product_qty;

            $check_pro = "SELECT * FROM cart WHERE ip_add = '$ip' AND p_id = '$pro_id' ";

            $run_check = mysqli_query($con, $check_pro);

            // if (mysqli_num_rows($run_check) > 0) {

            //     echo "<script>alert('Product already added to cart')</script>";
            //     echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";

            // } else{

            //     // $insert_pro = "INSERT INTO cart (p_id,ip_add) VALUES ($pro_id,'$ip')";

            //     $insert_pro = "INSERT INTO cart (p_id,ip_add,qty) VALUES ('$pro_id','$ip','$pro_qty')";

            //     $run_pro = mysqli_query($con, $insert_pro);

            //     echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";                 
            // }

            if (mysqli_num_rows($run_check) == 0) {

                $insert_pro = "INSERT INTO cart (p_id,ip_add,qty) VALUES ('$pro_id','$ip','$pro_qty')";

                $run_pro = mysqli_query($con, $insert_pro);

                echo "<script>alert('Product has been added to cart')</script>";

                echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";
            } else if (mysqli_num_rows($run_check) > 0) {

                $update_pro = "UPDATE cart SET qty = '$pro_qty' WHERE p_id = '$pro_id' AND ip_add = '$ip'";

                $run_pro = mysqli_query($con, $update_pro);

                echo "<script>alert('Product quantityhas been updated')</script>";

                echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";
            }
        }
    }


    //addding to cart functionality



    //get the total items added to shopping cart
    function totalItems()
    {

        if (isset($_GET['add_cart'])) {
            global $con;

            $ip = getIp();

            $get_items = "SELECT * FROM cart WHERE ip_add = '$ip' ";
            $run_items = mysqli_query($con, $get_items);

            $count_items = mysqli_num_rows($run_items);
        } else {

            global $con;

            $ip = getIp();

            $get_items = "SELECT * FROM cart WHERE ip_add = '$ip' ";
            $run_items = mysqli_query($con, $get_items);

            $count_items = mysqli_num_rows($run_items);
        }

        echo "$count_items";
    }


    //get the total price of cart items
    function totalPrice()
    {
        global $con;

        $total_price = 0;

        $ip = getIp();

        $sel_cart = "SELECT * FROM cart WHERE ip_add = '$ip' ";

        $run_cart = mysqli_query($con, $sel_cart);
        //for all rows we get we put them in an array (taking the p_id)
        while ($cart_row = mysqli_fetch_array($run_cart)) {

            $pro_id = $cart_row['p_id'];

            $pro_qty = $cart_row['qty'];

            //using the returned product ids we pick prices from the products table
            $pro_price = "SELECT product_price FROM products WHERE product_id = '$pro_id' ";

            $run_pro_price =  mysqli_query($con, $pro_price);

            while ($pro_row = mysqli_fetch_array($run_pro_price)) {
                //add the prices in the array

                $single_price = $pro_row['product_price'];

                $sub_total =  $single_price * $pro_qty;

                $total_price =  $total_price + $sub_total;
            }
        }

        $total_price_formatted = number_format($total_price);

        echo "Ksh.$total_price_formatted";
    }


    //get the total price of cart items
    function totalPricetax()
    {
        global $con;

        $total_price = 0;

        $ip = getIp();

        $sel_cart = "SELECT * FROM cart WHERE ip_add = '$ip' ";

        $run_cart = mysqli_query($con, $sel_cart);
        //for all rows we get we put them in an array (taking the p_id)
        while ($cart_row = mysqli_fetch_array($run_cart)) {

            $pro_id = $cart_row['p_id'];

            $pro_qty = $cart_row['qty'];

            //using the returned product ids we pick prices from the products table
            $pro_price = "SELECT product_price FROM products WHERE product_id = '$pro_id' ";

            $run_pro_price =  mysqli_query($con, $pro_price);

            while ($pro_row = mysqli_fetch_array($run_pro_price)) {
                //add the prices in the array

                $single_price = $pro_row['product_price'];

                $sub_total =  $single_price * $pro_qty;

                $total_price =  $total_price + $sub_total;
            }
        }

        $vat = 0.13; 

        $tax= $total_price * $vat;

        $tax_rounded = round($tax,0);

        $total_price_taxed = ($total_price + $tax_rounded);

        echo $total_price_taxed;
    }




    //get the product categories
    function getCats()
    {

        global $con;

        $get_cats = "SELECT * FROM categories";
        $run_cats = mysqli_query($con, $get_cats);

        while ($row_cats = mysqli_fetch_array($run_cats)) {

            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];

            echo " <li><a href='index.php?cat=$cat_id'>$cat_title</a></li> ";
        }
    }


    function getBrands()
    {

        global $con;

        $get_brands = "SELECT * FROM brands";
        $run_brands = mysqli_query($con, $get_brands);

        while ($row_brands = mysqli_fetch_array($run_brands)) {

            $brand_id = $row_brands['brand_id'];
            $brand_title = $row_brands['brand_title'];

            echo " <li><a href='index.php?brand=$brand_id'>$brand_title</a></li> ";
        }
    }


    function getPro()
    {
        if (!isset($_GET['cat'])) {


            if (!isset($_GET['brand'])) {

                global $con;

                // get 6 latest products
                $get_pro = "SELECT * FROM products ORDER BY RAND() LIMIT 6";

                // $get_pro = "SELECT * FROM products";

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
                    <img src='admin_area/product_images/$pro_image'/'>
                    <p style='color:black;'><b> Price: Ksh $pro_price_formatted</b></p>
                    <a id='details' href='details.php?pro_id=$pro_id' >Details</a>
                  <!--  <a id='price' href='index.php?add_cart=$pro_id'><button >Add to Cart</button></a> -->
                 </div>
                 ";
                } //end of while loop
            }
        }
    }


    function getCatPro()
    {
        if (isset($_GET['cat'])) {

            $cat_id = $_GET['cat'];

            global $con;

            $get_cat_pro = "SELECT * FROM products WHERE product_cat = $cat_id";
            $run_cat_pro = mysqli_query($con, $get_cat_pro);

            $count_cats = mysqli_num_rows($run_cat_pro);

            if ($count_cats == 0) {
                echo "<h2 style='padding:20px;'>No products available for this category</h2>";
            }

            while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {

                $pro_id = $row_cat_pro['product_id'];
                $pro_cat = $row_cat_pro['product_cat'];
                $pro_brand = $row_cat_pro['product_brand'];
                $pro_title = $row_cat_pro['product_title'];
                $pro_price = $row_cat_pro['product_price'];
                $pro_image = $row_cat_pro['product_image'];

                $pro_price_formatted = number_format($pro_price);

                echo " 
                    <div id='single_product' > 
                    <div id='single_product_title'>
                    <h5>$pro_title</h5>
                    </div>
                    <img src='admin_area/product_images/$pro_image'/'>
                    <p style='color:black;'><b> Price: Ksh $pro_price_formatted</b></p>
                    <a id='details' href='details.php?pro_id=$pro_id' >Details</a>
                    <!--  <a id='price' href='index.php?add_cart=$pro_id'><button >Add to Cart</button></a> -->
                   </div>
                     ";
            } //end of while loop

        }
    }


    function getBrandPro()
    {
        if (isset($_GET['brand'])) {

            $brand_id = $_GET['brand'];

            global $con;

            $get_brand_pro = "SELECT * FROM products WHERE product_brand = $brand_id";
            $run_brand_pro = mysqli_query($con, $get_brand_pro);

            $count_cats = mysqli_num_rows($run_brand_pro);

            if ($count_cats == 0) {

                echo "<h2 style='padding:20px;'>No products available for this Brand</h2>";
            }

            while ($row_brand_pro = mysqli_fetch_array($run_brand_pro)) {

                $pro_id = $row_brand_pro['product_id'];
                $pro_cat = $row_brand_pro['product_cat'];
                $pro_brand = $row_brand_pro['product_brand'];
                $pro_title = $row_brand_pro['product_title'];
                $pro_price = $row_brand_pro['product_price'];
                $pro_image = $row_brand_pro['product_image'];

                $pro_price_formatted = number_format($pro_price);

                echo " 
                    <div id='single_product' > 
                        <div id='single_product_title'>
                        <h5>$pro_title</h5>
                        </div>
                        <img src='admin_area/product_images/$pro_image'/'>
                        <p style='color:black;'><b> Price: Ksh $pro_price_formatted</b></p>
                        <a id='details' href='details.php?pro_id=$pro_id' >Details</a>
                        <!--  <a id='price' href='index.php?add_cart=$pro_id'><button >Add to Cart</button></a> -->
                   </div>
                     ";
            } //end of while loop

        }
    }
}//End of else statement
