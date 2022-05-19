 
    <div style="width:100%;padding:20px;" class="view_products_container">
        <h2 style="text-align:center;margin-bottom:20px;" class="products_table_header">Your Orders</h2>

        <table  style="width:100%">
           <thead> 
            <tr>
                <th width="10%">Order No</th>
                <th width="10%">Order Amount</th>
                <th width="20%">Transaction ID</th>
                <th width="10%">Quantity</th>
                <th width="20%">Order Date</th>
                <th width="10%">Paid/Unpaid</th>
                <th width="20%">Order Status</th>
            </tr>
           </thead>
            <?php
            include "includes/db.php";

            $fetch_customer_id = "SELECT customer_id FROM customers WHERE customer_email = '$customer_email' ";

            $run_customer_id = mysqli_query($con, $fetch_customer_id);

            $row_customer = mysqli_fetch_array($run_customer_id);

            $customer_id =$row_customer['customer_id'];

            $fetch_customer_order = "SELECT * FROM orders WHERE customer_id = '$customer_id' ";

            $run_fetch_order = mysqli_query($con, $fetch_customer_order);

            $order_count = 0;

            while ($row_order = mysqli_fetch_array($run_fetch_order)) {

                $order_amount = $row_order['order_amount'];
                $order_amount_formatted = number_format($order_amount);
                $invoice_no = $row_order['invoice_no'];
                $quantity = $row_order['quantity'];
                $order_date = $row_order['order_date'];
                $payment_status = $row_order['payment_status'];
                $order_status = $row_order['order_status'];
    
                $order_count++;
            ?>

                <tr>

                    <td> <?php echo $order_count; ?> </td>
                    <td> <?php echo 'Ksh '.$order_amount_formatted; ?> </td>
                    <td> <?php echo $invoice_no; ?> </td>
                    <td> <?php echo $quantity; ?> </td>
                    <td> <?php echo $order_date; ?> </td>
                    <td> <?php echo $payment_status; ?> </td>
                    <td> <?php echo $order_status; ?> </td>
                  
                </tr>


            <?php } ?>

        </table>
    </div>
