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

            $check_pro = "SELECT * FROM cart WHERE ip_add = '$ip' AND p_id = '$pro_id' ";

            $run_check = mysqli_query($con, $check_pro);

            if (mysqli_num_rows($run_check) > 0) {

                echo "<script>alert('Product already in Cart')</script>";
                // echo'
                // <div class="alert_box" style="visibility:visible;">
                //    <h3>Product already added to cart!</h3>
                // </div>
                // ';

            } else {

                // $insert_pro = "INSERT INTO cart (p_id,ip_add) VALUES ($pro_id,'$ip')";

                $insert_pro = "INSERT INTO cart (p_id,ip_add,qty) VALUES ('$pro_id','$ip',0)";

                $run_pro = mysqli_query($con, $insert_pro);

                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }


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
        //returns all the rows in cart table associated with the specific IP
        $sel_price = "SELECT * FROM cart WHERE ip_add = '$ip' ";

        $run_price = mysqli_query($con, $sel_price);
        //for all rows we get we put them in an array (taking the p_id)
        while ($p_price = mysqli_fetch_array($run_price)) {

            $pro_id = $p_price['p_id'];
            //using the returned product ids we pick prices from the products table
            $pro_price = "SELECT product_price FROM products WHERE product_id = '$pro_id' ";

            $run_pro_price =  mysqli_query($con, $pro_price);
            //for all rows we get we put them in an array (taking the products_price)
            while ($p_price = mysqli_fetch_array($run_pro_price)) {
                //the prices will be returned as an array
                $product_price = array($p_price['product_price']);
                //add the prices in the array
                $pro_prices_total = array_sum($product_price);
                //display the total
                $total_price = $total_price +  $pro_prices_total;
            }
        }

        $total_price_formatted = number_format($total_price);

        echo "Ksh $total_price_formatted";
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
                    <a id='price' href='index.php?add_cart=$pro_id'><button >Add to Cart</button></a> 
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
                        <a id='price' href='index.php?add_cart=$pro_id'><button >Add to Cart</button></a> 
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
                        <div id='single_product_title'>s
                        <h5>$pro_title</h5>
                        </div>
                        <img src='admin_area/product_images/$pro_image'/'>
                        <p style='color:black;'><b> Price: Ksh $pro_price_formatted</b></p>
                        <a id='details' href='details.php?pro_id=$pro_id' >Details</a>
                        <a id='price' href='index.php?add_cart=$pro_id'><button >Add to Cart</button></a> 
                    </div>
                     ";
            } //end of while loop

        }
    }
}//End of else statement
