<?php
// session_start();
// // session_destroy();
// session_unset();
// echo "<script>window.open('index.php','_self')</script>";
session_start();
session_unset();

//Go back to the front page
// header("location:../ index.php?");
echo "<script>window.open('../index.php','_self')</script>";