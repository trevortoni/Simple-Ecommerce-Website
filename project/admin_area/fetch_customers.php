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
    <title>View Customers</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div style="width:100%;" class="view_products_container">
        <h2 class="products_table_header">List of Registered Customers</h2>

        <table>

            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>County</th>
                <th>City</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Delete</th>
            </tr>

            <?php
            include "includes/db.php";

            $fetch_customer = "SELECT * FROM customers ";

            $execute_fetch_customer = mysqli_query($con, $fetch_customer);

            $customer_count = 0;

            while ($row_customer = mysqli_fetch_array($execute_fetch_customer)) {

                $customer_id = $row_customer['customer_id'];
                $customer_fname= $row_customer['customer_fname'];
                $customer_lname = $row_customer['customer_lname'];
                $customer_email = $row_customer['customer_email'];
                $customer_county = $row_customer['customer_county'];
                $customer_city = $row_customer['customer_city'];
                $customer_contact = $row_customer['customer_contact'];
                $customer_address = $row_customer['customer_address'];
    

                $customer_count++;
            ?>

                <tr>
                    <td> <?php echo $customer_count; ?> </td>
                    <td> <?php echo $customer_fname; ?> </td>
                    <td> <?php echo $customer_lname; ?> </td>
                    <td> <?php echo $customer_email; ?> </td>
                    <td> <?php echo $customer_county; ?> </td>
                    <td> <?php echo $customer_city; ?> </td>
                    <td> <?php echo $customer_contact; ?> </td>
                    <td> <?php echo $customer_address; ?> </td>
                    <td> <a href="index.php?delete_customer=<?php echo $customer_id; ?>">Delete</a> </td>
                </tr>

            <?php } ?>

        </table>
    </div>

</body>

</html>
<?php }?>