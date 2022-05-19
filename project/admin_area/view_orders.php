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
    <title>View Orders</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div class="view_products_container">
        <h2 class="products_table_header">List Of Orders</h2>

        <table>

            <tr>
                <th>No</th>
                <th>Customer Email</th>
                <th>Amount</th>
                <th>Transaction ID</th>
                <th>Product Name</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Order Status</th>
            </tr>

            <?php
            include "includes/db.php";

            $fetch_order = "SELECT * FROM orders ";

            $execute_order = mysqli_query($con, $fetch_order);

            $order_count = 0;

            while ($row_order = mysqli_fetch_array($execute_order)) {

                $customer_id = $row_order['customer_id'];

                $select_customer = "SELECT customer_email FROM customers WHERE customer_id ='$customer_id' ";
                $run = mysqli_query($con,$select_customer);
                $cust_row = mysqli_fetch_array($run);

                $customer_email =  $cust_row['customer_email'];
                $order_amount =  $row_order['order_amount'];
                $invoice_no =  $row_order['invoice_no'];
                $product_name =  $row_order['product_name'];
                $order_date =  $row_order['order_date'];
                $payment_status =  $row_order['payment_status'];
                $order_status =  $row_order['order_status'];

                $order_count++;
            ?>

                <tr>
                    <td> <?php echo $order_count; ?> </td>
                    <td> <?php echo $customer_email; ?> </td>
                    <td> <?php echo 'Ksh'.number_format($order_amount); ?> </td>
                    <td> <?php echo  $invoice_no; ?> </td>
                    <td> <?php echo  $product_name; ?> </td>
                    <td> <?php echo  $order_date; ?> </td>
                    <td> <?php echo  $payment_status; ?> </td>
                    <td> <?php echo  $order_status; ?> </td>
                </tr>

            <?php } ?>

        </table>
    </div>

</body>

</html>
<?php }?>