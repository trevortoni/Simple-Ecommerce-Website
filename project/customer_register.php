<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
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
                    <li><a href="#">Sign Up</a></li>
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
                <?php cart(); ?>
                <div id="shopping_cart">
                    <span style="float:right;font-size:18px;padding:5px;line-height:40px;">
                        Welcome Guest <b style="color:yellow;">Shopping Cart-</b>Total items: <?php totalItems(); ?> Total price:<?php totalPrice(); ?> <a href="cart.php" style="color:yellow;">
                            Go to Cart</a>
                    </span>
                </div>

                <!-- Register form -->
                <div class="register_form_container">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >

                        <div class="register_form_header">
                            <h1>Register</h1>
                        </div>

                        <div class="register_form_input_control_box">

                            <div class="register_input_control">
                                <label for="customer_fname">First Name</label>
                                <input type="text" name="customer_fname" placeholder="Enter your first name" required>
                                <!-- <span id="error" style="background-color:cadetblue;height:20px"></span> -->
                            </div>

                            <div class="register_input_control">
                                <label for="customer_lname">Last Name</label>
                                <input type="text" name="customer_lname" placeholder="Enter your last name" required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_email">Email</label>
                                <input type="email" name="customer_email" placeholder="Enter email" required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_pass">Password</label>
                                <input type="password" name="customer_pass" placeholder="Enter password" required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_county">County</label>
                                <select style="height:40px" type="text" name="customer_county" placeholder="Enter county of residence" required>
                                    <option value="">Select county of residence</option>
                                    <option value='Baringo'>Baringo</option>
                                    <option value='Bomet'>Bomet</option>
                                    <option value='Bungoma'>Bungoma</option>
                                    <option value='Busia'>Busia</option>
                                    <option value='Elgeyo-Marakwet'>Elgeyo-Marakwet</option>
                                    <option value='Embu'>Embu</option>
                                    <option value='Garissa'>Garissa</option>
                                    <option value='Homa Bay'>Homa Bay</option>
                                    <option value='Isiolo'>Isiolo</option>
                                    <option value='Kajiado'>Kajiado</option>
                                    <option value='Kakamega'>Kakamega</option>
                                    <option value='Kericho'>Kericho</option>
                                    <option value='Kiambu'>Kiambu</option>
                                    <option value='Kilifi'>Kilifi</option>
                                    <option value='Kirinyaga'>Kirinyaga</option>
                                    <option value='Kisii'>Kisii</option>
                                    <option value='Kisumu'>Kisumu</option>
                                    <option value='Kitui'>Kitui</option>
                                    <option value='Kwale'>Kwale</option>
                                    <option value='Laikipia'>Laikipia</option>
                                    <option value='Lamu'>Lamu</option>
                                    <option value='Machakos'>Machakos</option>
                                    <option value='Makueni'>Makueni</option>
                                    <option value='Mandera'>Mandera</option>
                                    <option value='Marsabit'>Marsabit</option>
                                    <option value='Meru'>Meru</option>
                                    <option value='Migori'>Migori</option>
                                    <option value='Mombasa'>Mombasa</option>
                                    <option value="Murang'a">Murang'a</option>
                                    <option value='Nairobi City'>Nairobi City</option>
                                    <option value='Nakuru'>Nakuru</option>
                                    <option value='Nandi'>Nandi</option>
                                    <option value='Narok'>Narok</option>
                                    <option value='Nyamira'>Nyamira</option>
                                    <option value='Nyandarua'>Nyandarua</option>
                                    <option value='Nyeri'>Nyeri</option>
                                    <option value='Samburu'>Samburu</option>
                                    <option value='Siaya'>Siaya</option>
                                    <option value='Taita-Taveta'>Taita-Taveta</option>
                                    <option value='Tana River'>Tana River</option>
                                    <option value='Tharaka-Nithi'>Tharaka-Nithi</option>
                                    <option value='Trans Nzoia'>Trans Nzoia</option>
                                    <option value='Turkana'>Turkana</option>
                                    <option value='Uasin Gishu'>Uasin Gishu</option>
                                    <option value='Vihiga'>Vihiga</option>
                                    <option value='West Pokot'>West Pokot</option>
                                    <option value='wajir'>Wajir</option>
                                </select>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_city">Town/City</label>
                                <input type="text" name="customer_city" placeholder="Enter city of residence" required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_contact">Contact details</label>
                                <input type="text" name="customer_contact" placeholder="Enter phone number" required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_address">Address</label>
                                <input type="text" name="customer_address" placeholder="Enter your address" required>
                            </div>

                            <!-- <div class="register_input_control">
                                <label for="customer_image">Profile Image(optional)</label>
                                <input type="file" name="customer_image" accept=".png,.jpeg,.jpg" required>
                            </div> -->

                        </div>

                        <div class="register_button_container">
                            <button class="register_button" type="submit" name="register" value="Register">Signup</button>
                        </div>

                        <!-- <h3><a href="customer_login.php">Already registered? Login Here</a></h3> -->
                        <h3><a href="checkout.php">Already registered? Login Here</a></h3>

                        <div id="alert_box"> </div>

                    </form>
                </div>
                <!-- Register form -->

            </div>

        </div>

        <div id="footer">
            <h4>&copy; Trevor Toni 2022 Best Bargain.com</h4>
        </div>

    </div>
    <!--Main Container-->
</body>

</html>

<?php

if (isset($_POST['register'])) {

    $ip = getIp();

    //text data
    $customer_fname = htmlspecialchars($_POST['customer_fname']);
    $customer_lname = htmlspecialchars($_POST['customer_lname']);
    $customer_email = htmlspecialchars($_POST['customer_email']);
    $customer_pass =  htmlspecialchars($_POST['customer_pass']);
    $customer_county = $_POST['customer_county'];
    $customer_city = htmlspecialchars($_POST['customer_city']);
    $customer_contact = htmlspecialchars($_POST['customer_contact']);
    $customer_address = htmlspecialchars($_POST['customer_address']);

    //image data
    // $customer_image = $_FILES['customer_image']['name'];
    // $customer_image_tmp = $_FILES['customer_image']['tmp_name'];

    // move_uploaded_file($customer_image_tmp, "customer/customer_images/$customer_image");

    //Form validation section

        if( $customer_fname == "" ){
            echo "
                <div class='register_input_control'>
                    <span id='error' style=' background-color:cadetblue;height:20px;color:red; '>Firstname is required!</span>
                </div>
               ";
        }

    $insert_customer = "INSERT INTO customers (customer_ip,customer_fname,customer_lname,customer_email,customer_pass,customer_county,customer_city,customer_contact,customer_address)
    VALUES (?,?,?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($con,$insert_customer);

    mysqli_stmt_bind_param($stmt,'sssssssss',$ip, $customer_fname,$customer_lname ,$customer_email, $customer_pass, $customer_county, $customer_city, $customer_contact, $customer_address);

    mysqli_stmt_execute($stmt);

    $execval = mysqli_stmt_execute($stmt);

    if($execval){

        echo"<script>alert('Registration successful')</script>";
        echo"<script>window.open('customer_register.php','_self')</script>";
    }

    else{

        echo"<script>alert('Registration not successful')</script>";
        echo"<script>window.open('customer_register.php','_self')</script>";
    }


    $select_cart ="SELECT * FROM cart WHERE ip_add ='$ip'";

    $run_cart = mysqli_query($con,$select_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_cart == 0){

        $_SESSION['customer_email'] = $customer_email; 

        echo "<script>alert('Account has been created successfully!')</script>";
        echo "<script>window.open('customer/my_account.php', '_self'  )</script>";
    }

    else{ 

        $_SESSION['customer_email'] = $customer_email; 

        echo "<script>alert('Account has been created successfully!')</script>";
        echo "<script>window.open('checkout.php', '_self')</script>";
    }


    mysqli_close($con);

}

?>