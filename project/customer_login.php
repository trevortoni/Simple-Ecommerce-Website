<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
include "includes/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div class="login_form_container">
        <form method="post" action="" >

            <div class="login_form_header">
                <h2>Login</h2>
            </div>

            <div class="input_control">
                <label for="username">Email</label>
                <input type="text" name="customer_email" placeholder="Enter email" required>
            </div>

            <div class="input_control">
                <label for="pwd">Password</label>
                <input type="password" name="customer_pass" placeholder="Enter password" required>
            </div>

            <div class="login_button_container">
                <button class="login_button" type="submit" name="login" value="Login">Login</button>
            </div>

            <h3><a href="customer_register.php">Not a member? Register Here</a></h3>

        </form>

        <?php
            if(isset($_POST['login'])){


                //get the user data
                $customer_email = $_POST['customer_email'];

                $customer_pass = $_POST['customer_pass'];


                //sekect from the user from the database
                $select_customer = "SELECT * FROM customers WHERE customer_pass = ? AND customer_email = ? "; 

                

                $stmt = mysqli_prepare($con,$select_customer);

                mysqli_stmt_bind_param($stmt,'ss',$customer_pass, $customer_email);
            
                mysqli_stmt_execute($stmt);
            
                // $execval = mysqli_stmt_execute($stmt);

                //store the result of the executed prepared statement
                mysqli_stmt_store_result($stmt);

                $customer_row_count = mysqli_stmt_num_rows($stmt);

                // echo  $customer_row_count;
                if($customer_row_count == 0){
                    echo "<script>alert('Password or Email is Incorrect.Try Again!')</script>";
                    exit();
                }

                $ip =getIp();
                
                $select_cart =  "SELECT * FROM cart WHERE ip_add = '$ip'";

                $run_cart = mysqli_query($con,$select_cart);

                $cart_row_count = mysqli_num_rows($run_cart);

                if($customer_row_count > 0 && $cart_row_count == 0){

                     $_SESSION['customer_email'] = $customer_email;

                     echo "<script>alert('Login Successful')</script>";

                     echo "<script>window.open('customer/my_account.php','_self')</script>";

                }
                else{

                    $_SESSION['customer_email'] = $customer_email;

                    echo "<script>alert('Login Successful')</script>";

                    echo "<script>window.open('checkout.php','_self')</script>";
                }
                  
                // echo $execval;
            }
        ?>
    </div>

</body>

</html>