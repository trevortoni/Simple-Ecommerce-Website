<div class="menubar">

        <!--Menu start-->
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="all_products.php">Shop</a></li>
            <?php
            if (isset($_SESSION['customer_email'])) {
            ?>

                <li><a href="customer/my_account.php">My Account</a></li>

            <?php
            }
            ?>

            <?php
            if (!isset($_SESSION['customer_email'])) {
            ?>
                <li><a href="customer_register.php">Sign Up</a></li>
            <?php
            }
            ?>

            <li><a href="cart.php">Shopping Cart</a></li>
        </ul>
        <!--Menu end-->

        <!--Search bar start-->
        <div id="form">
            <form method="get" action="results.php" enctype="multipart/form-data">
                <input class="search_input_box" style="height:40px;" type="text" name="user_query" placeholder="Search product  " />
                <input class="search_button" style="height:40px;" type="submit" name="search" value="Search" />
            </form>
        </div>
        <!--Search bar end-->

</div>