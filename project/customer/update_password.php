 <div class="update_password_form_container">
     <form action="" method="post">

         <div class="update_password_form_header">
             <h2>Update Password</h2>
         </div>

         <div class="update_input_control">
             <label for="current_password">Current Password</label>
             <input type="password" name="current_password" placeholder="Enter current password" required>
         </div>

         <div class="update_input_control">
             <label for="new_password">New Password</label>
             <input type="password" name="new_password" placeholder="Enter new password" required>
         </div>

         <div class="update_input_control">
             <label for="new_password_repeat">Confirm New Password</label>
             <input type="password" name="new_password_repeat" placeholder="Enter new password again" required>
         </div>

         <div class="update_password_button_container">
             <button class="update_password_button" type="submit" name="update_password" value="Update Password">Update</button>
         </div>

     </form>
 </div>

 <?php

    include "includes/db.php";
    if (isset($_POST['update_password'])) {

        $customer_email = $_SESSION['customer_email'];

        $current_pwd = $_POST['current_password'];
        $new_pwd = $_POST['new_password'];
        $new_pwd_repeat = $_POST['new_password_repeat'];

        $select_user_pwd = "SELECT * FROM customers WHERE customer_pass = ? ";
        $stmt = mysqli_prepare($con, $select_user_pwd);
        mysqli_stmt_bind_param($stmt, 's', $current_pwd);
        $execval = mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $row_count = mysqli_stmt_num_rows($stmt);

        //form validation

        if (empty($current_pwd) || empty($new_pwd) || empty($new_pwd_repeat)) {
            echo "
                <script>alert('All input fields must be filled')</script>
                ";
                exit;
        } else if ($row_count == 0) {
            echo "
                <script>alert('Wrong current password')</script>
                ";
                exit;
        } else if ($new_pwd != $new_pwd_repeat) {
            echo "
                <script>alert('Passwords do not match')</script>
                ";
                exit;
        } else {
            
            $update_pwd = "UPDATE customers SET customer_pass = ? WHERE customer_email = ? ";

            $stmt = mysqli_prepare($con, $update_pwd);

            mysqli_stmt_bind_param($stmt, 'ss', $new_pwd, $customer_email);

            mysqli_stmt_execute($stmt);

            $execval = mysqli_stmt_execute($stmt);

            if( $execval){

            echo "
            <script>alert('Your password has been updated successfully')</script>
            <script>window.open('my_account.php','_self')</script>
            ";
            }


        }
    }
    ?>