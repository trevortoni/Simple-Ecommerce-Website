<?php

    $ip = getIp();

    $payment_status = "paid";

    $order_status = "on transit";

    $invoice_no = mt_rand();

    $sel_cart = "SELECT * FROM cart WHERE ip_add = '$ip' ";

    $run_cart =mysqli_query($con, $sel_cart);

    while($row_cart =mysqli_fetch_array($run_cart)){

        $pro_id = $row_cart['p_id'];

        $pro_qty = $row_cart['qty'];

        $get_products = "SELECT * FROM products WHERE product_id = '$pro_id' ";

        $run_get_products =mysqli_query($con,  $get_products );

        while($row_products =mysqli_fetch_array($run_get_products)){

            $product_price = $row_products['product_price'];

            $product_name = $row_products['product_title'];

            //single order total
            $order_total =  $product_price * $pro_qty;

            $insert_order = "INSERT INTO orders (customer_id,order_amount,invoice_no,product_id,product_name,quantity,order_date,payment_status,order_status) VALUES 
            ('$customer_id','$order_total','$invoice_no','$pro_id','$product_name ','$pro_qty',NOW(),'$payment_status','$order_status')";

            $run_insert_order = mysqli_query($con,$insert_order);

            $delete_customer_cart = "DELETE FROM cart WHERE ip_add = '$ip'";

            $run_delete_cart = mysqli_query($con,$delete_customer_cart);

            echo "<script>alert('Your order has been submitted successfully')</script>";

            echo "<script>window.open('customer/my_account.php')</script>";

        }


     }
