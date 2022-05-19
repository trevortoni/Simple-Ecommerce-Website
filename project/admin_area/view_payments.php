<?php 
session_start();
include "includes/db.php";
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('admin_login.php','_self')</script>";
}
else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payments</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div class="view_products_container">
        <h2 class="products_table_header">List of Payments</h2>

        <table>

            <tr>
                <th>No</th>
                <th>Payment Amount</th>
                <th>Payer Email</th>
                <th>Payment Time</th>
            </tr>

            <?php
            include "includes/db.php";

            $fetch_pay = "SELECT * FROM payments ";

            $execute_pay = mysqli_query($con, $fetch_pay);

            $pay_count = 0;

            while ($row_pay = mysqli_fetch_array($execute_pay)) {

                $pay_amount = $row_pay['payment_amount'];
                $pay_email = $row_pay['customer_email'];
                $pay_time = $row_pay['payment_time'];

                $pay_count++;
            ?>

                <tr>
                    <td> <?php echo $pay_count; ?> </td>
                    <td> <?php echo 'Ksh'.number_format($pay_amount); ?> </td>
                    <td> <?php echo $pay_email; ?> </td>
                    <td> <?php echo $pay_time; ?> </td>
                </tr>

            <?php } ?>

        </table>
    </div>

</body>

</html>
<?php }?>