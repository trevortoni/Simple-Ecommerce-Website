<div id="shopping_cart">
    <div id="shopping-cart-span">

        <?php
        if (isset($_SESSION['customer_email'])) {
            echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow'></b>";
        } else {
            echo "<b>Welcome Guest</b>";
        }
        ?>

        <b style="color:yellow;"><i class="fa-solid fa-cart-shopping"></i></b>Total items: <?php totalItems(); ?> Total
        Price:<?php totalPricetax(); ?> <a href="cart.php" style="color:yellow;">Go to Cart </a>

        <?php

        if (!isset($_SESSION['customer_email'])) {

            echo "<a href='checkout.php' style='color:blue; text-decoration:none;'>Login</a>";
        } else {

            echo "<a href='logout.php' style='color:blue; text-decoration:none'>Logout</a>";
        }

        ?>

    </div>
</div>