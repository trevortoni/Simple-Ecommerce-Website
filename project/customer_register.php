<?php
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

              <!--Sidebar start-->
              <?php include "sidebar.php"; ?>
              <!--Sidebar end-->   
            <div id="content_area">

                 <!-- shopping_cart start-->
                 <?php include "shopping_cart.php"; ?>
                <!-- shopping_cart end-->
                
                <?php cart(); ?>


                <!-- Register form -->
                <div class="register_form_container">
                    <form action="" method="post">

                        <div class="register_form_header">
                            <h1>Customer Registration</h1>
                        </div>

                        <div class="register_form_input_control_box">

                            <div class="register_input_control">
                                <label for="customer_fname">First Name</label>
                                <input type="text" name="customer_fname" placeholder="Enter your first name"  required>
                            </div>

                            <div class="register_input_control">
                                <label for="customer_lname">Last Name</label>
                                <input type="text" name="customer_lname" placeholder="Enter your last name"  required>
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
                                <label for="customer_pass_repeat">Confirm Password</label>
                                <input type="password" name="customer_pass_repeat" placeholder="Confirm password"  required>
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

                        </div>

                        <div class="register_button_container">
                            <button class="register_button" type="submit" name="register" value="Register">Signup</button>
                        </div>

                        <h3><a href="checkout.php">Already registered? Login Here</a></h3>


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

    //form data
    $customer_fname =  $_POST['customer_fname'];
    $customer_lname =  $_POST['customer_lname'];
    $customer_email =  $_POST['customer_email'];
    $customer_pass =   $_POST['customer_pass'];
    $customer_pass_repeat =  $_POST['customer_pass_repeat'];
    $customer_county = $_POST['customer_county'];
    $customer_city =   $_POST['customer_city'];
    $customer_contact = $_POST['customer_contact'];
    $customer_address =  $_POST['customer_address'];

    //Form validation section

    $name_regex = "/^[a-zA-Z ]+$/";
    $contact_regex = "/^[0-9]+$/";

    if (empty($customer_fname) || empty($customer_lname) || empty($customer_email) || empty($customer_pass) || empty($customer_pass_repeat) || empty($customer_county) || empty($customer_city) || empty($customer_contact) || empty($customer_address)) {
        echo "<script>alert('All fields are required')</script>";
        exit();
    } else {

        if (!preg_match($name_regex, $customer_fname)) {
            echo "<script>alert('$customer_fname is not a valid name')</script>";
            exit();
        }

        if (!preg_match($name_regex, $customer_lname)) {
            echo "<script>alert('$customer_lname is not a valid name')</script>";
            exit();
        }

        if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Your email is not a valid email address')</script>";
            exit();
        }


        if (strlen($customer_pass) < 6) {
            echo "<script>alert('Password should be at least 6 characters long!')</script>";
            exit();
        }

        if (strlen($customer_pass_repeat) < 6) {
            echo "<script>alert('Password should be at least 6 characters long!')</script>";
            exit();
        }

        if ($customer_pass != $customer_pass_repeat) {
            echo "<script>alert('Passwords do not match!')</script>";
            exit();
        }

        if (!preg_match($contact_regex, $customer_contact)) {
            echo "<script>alert('Mobile number is not valid!')</script>";
            exit();
        }

        if (!(strlen($customer_contact) == 10)) {

            echo "<script>alert('Phone number must be 10 characters long!')</script>";
            exit();
        }

        //check if there is an existing email address in database
        $check_email = "SELECT * FROM customers WHERE customer_email = ? ";
        $stmt = mysqli_prepare($con, $check_email);
        mysqli_stmt_bind_param($stmt, 's', $customer_email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $email_check_count = mysqli_stmt_num_rows($stmt);

        if ($email_check_count > 0) {
            echo "<script>alert('Email is already taken.Try another email address!')</script>";
            exit();
        } else {

            $insert_customer = "INSERT INTO customers (customer_ip,customer_fname,customer_lname,customer_email,customer_pass,customer_county,customer_city,customer_contact,customer_address)
            VALUES (?,?,?,?,?,?,?,?,?)";

            $stmt = mysqli_prepare($con, $insert_customer);

            mysqli_stmt_bind_param($stmt, 'sssssssss', $ip, $customer_fname, $customer_lname, $customer_email, $customer_pass, $customer_county, $customer_city, $customer_contact, $customer_address);

            mysqli_stmt_execute($stmt);

            $select_cart = "SELECT * FROM cart WHERE ip_add ='$ip'";
            $run_cart = mysqli_query($con, $select_cart);
            $check_cart = mysqli_num_rows($run_cart);

            if ($check_cart == 0) {

                $_SESSION['customer_email'] = $customer_email;
                echo "<script>alert('Account has been created successfully!')</script>";
                // echo "<script>window.open('customer/my_account.php', '_self'  )</script>";
                echo "<script>window.open('index.php', '_self'  )</script>";
            } else {

                $_SESSION['customer_email'] = $customer_email;
                echo "<script>alert('Account has been created successfully!')</script>";
                echo "<script>window.open('checkout.php', '_self')</script>";
            }


            mysqli_close($con);
            exit();
        }
    }
    header("Location:customer_register");
}

?>