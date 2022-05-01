<div class="delete_account_form_container">
    <form action="" method="post">
        <div class="delete_account_form_header">
            <h2>Are you sure you want to DELETE your account?</h2>
            <h3>This action cannot be undone</h3>
        </div>

        <div class="delete_buttons_container">
            <div class="delete_button_container">
                <button type="submit" name="yes" value="confirm_delete_account">Yes</button>
            </div>

            <div class="delete_button_container">
                <button type="submit" name="no" value="cancel_delete_account">No</button>
            </div>
        </div>
    </form>
    <?php

        include "includes/db.php";

        $customer_email = $_SESSION['customer_email'];

        if(isset($_POST['yes'])){

            $delete_customer = "DELETE FROM customers WHERE customer_email = '$customer_email' ";

            $execute_delete = mysqli_query($con,$delete_customer);

            echo "
            <script>alert('Your Account has been deleted')</script>
            <script>window.open('../index.php','_self')</script>
            ";
        }

        if(isset($_POST['no'])){

            $delete_customer = "DELETE FROM customers WHERE customer_email = '$customer_email' ";

            $execute_delete = mysqli_query($con,$delete_customer);

            echo "
            <script>window.open('my_account.php','_self')</script>
            ";
        }
    ?>

</div>