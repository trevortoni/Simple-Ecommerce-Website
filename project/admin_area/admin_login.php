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
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div class="login_form_container">
        <form method="post" action="" >

            <div class="login_form_header">
                <h2>Admin Login</h2>
            </div>

            <div class="input_control">
                <label for="admin_email">Email</label>
                <input type="text" name="admin_email" placeholder="Enter email" required>
            </div>

            <div class="input_control">
                <label for="admin_pwd">Password</label>
                <input type="password" name="admin_pwd" placeholder="Enter password" required>
            </div>

            <div class="login_button_container">
                <button class="login_button" type="submit" name="login" value="Login">Login</button>
            </div>

        </form>

        <?php
            session_start();
            if(isset($_POST['login'])){


                //get the user data
                $admin_email = $_POST['admin_email'];

                $admin_pass = $_POST['admin_pwd'];


                //sekect from the user from the database
                $select_admin = "SELECT * FROM admins WHERE admin_password = ? AND admin_email = ? "; 

                

                $stmt = mysqli_prepare($con,$select_admin);

                mysqli_stmt_bind_param($stmt,'ss',$admin_pass, $admin_email);
            
                mysqli_stmt_execute($stmt);
            
                // $execval = mysqli_stmt_execute($stmt);

                //store the result of the executed prepared statement
                mysqli_stmt_store_result($stmt);

                $admin_row_count = mysqli_stmt_num_rows($stmt);

                // echo  $customer_row_count;
                if($admin_row_count == 0){
                    echo "<script>alert('Password or Email is Incorrect.Try Again!')</script>";
                    exit();
                }

                else{

                    $_SESSION['admin_email'] = $admin_email;

                    echo "<script>alert('Admin Login Successful')</script>";
                    echo "<script>window.open('index.php?admin_login_succesful','_self')</script>";
                    
                }
                  
            }
        ?>
    </div>

</body>

</html>