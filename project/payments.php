<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "includes/db.php";
?>

<!-- Payment form -->
<div class="register_form_container" style="width:fit-content;height:fit-content">
    <form action="" method="post">

        <div class="register_form_header">
            <h2>Secure Payment</h2>
        </div>

        <div class="register_form_input_control_box" style="flex-direction:column;">

            <div class="register_input_control">
                <label for="payment_amount">Due Amount(Ksh)</label>
                <input type="text" name="payment_amount" value="<?php echo totalPricetax() ?>" readonly>
            </div>

            <div class="register_input_control">
                <label for="card_number">Card Number</label>
                <input type="text" name="card_number" placeholder="Enter your card no" maxlength="16" required>
            </div>

            <div class="register_input_control">
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" placeholder="Enter the 3 digit code at the back of the card" maxlength="3" required>
            </div>


            <div class="register_input_control">
                <label for="card_type">Card Type</label>
                <select style="height:40px" type="text" name="card_type" placeholder="Choose your card type" required>
                    <option value='Visa'>Visa</option>
                    <option value='Mastercard'>Mastercard</option>
                </select>
            </div>

            <!-- <div class="register_input_control">
                <label for="customer_email">Payer Email</label>
                <input type="email" name="customer_email" placeholder="Enter email" required>
                <span style="background-color:aqua;height:15px;"></span>
            </div> -->

        </div>

        <div class="register_button_container">
            <button class="register_button" type="submit" name="pay" value="Pay">Pay Now</button>
        </div>

    </form>
</div>
<!-- Payment form -->

<?php

if (isset($_POST['pay'])) {

    $customer_email = $_SESSION['customer_email'];

    //text data
    $payment_amount =  $_POST['payment_amount'];
    $card_no =  $_POST['card_number'];
    $card_type =  $_POST['card_type'];
    $cvv =  $_POST['cvv'];

    //Form validation section
    $cvv_regex = "/^[0-9]{3}$/";
    $cardno_regex = "/^[0-9]+$/";

    if (empty($card_no)) {
        echo "<script>alert('Card number is required')</script>";
        exit();
    } else {

        if (!preg_match($cardno_regex, $card_no)) {
            echo "<script>alert('$card_no is not a valid card number')</script>";
            exit();
        }

        if (!preg_match($cvv_regex, $cvv)) {
            echo "<script>alert('CVV should be 3 digits long')</script>";
            exit();
        }


        if (strlen($card_no) < 16) {
            echo "<script>alert('Credit card number should be 16 characters long')</script>";
            exit();
        } else {

            $check_id = "SELECT customer_id FROM customers WHERE customer_email = '$customer_email' ";
            $run_check = mysqli_query($con, $check_id);
            $row_customer = mysqli_fetch_array($run_check);
            $customer_id = $row_customer['customer_id'];

            $insert_payment = "INSERT INTO payments (card_no,card_type,payment_amount,customer_email,customer_id,payment_time)
            VALUES ('$card_no','$card_type','$payment_amount','$customer_email','$customer_id',Now())";
            $run_payment = mysqli_query($con, $insert_payment);

            if ($run_payment) {
                echo "<script>alert('Payment successful')</script>";

                $customer_email = $_SESSION['customer_email'];

                $sel_customer = "SELECT * FROM customers WHERE customer_email = '$customer_email' ";

                $run_customer = mysqli_query($con, $sel_customer);

                $row_customer = mysqli_fetch_array($run_customer);

                $customer_id = $row_customer['customer_id'];

                include "orders.php";

                // echo "<script>window.open('index.php','_self')</script>";
            } else {

                echo "<script>alert('Payment not successful')</script>";
                echo "<script>window.open('payments3.php','_self')</script>";
            }


            mysqli_close($con);
            exit();
        }
    }
    // header("Location:customer_register");
}

?>