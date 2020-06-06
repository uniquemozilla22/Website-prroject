<?php

session_start();

if (isset($_SESSION['customer_id']) || isset($_SESSION['admin_id']))
{
    include("include/connection.php");
    include("include/header.include.php");
    include("include/index/slider.include.php");
    include("include/index/productslider.include.php");
    include("include/index/productslider.include.php");
    include("include/banner.include.php");
    include("include/index/productslider.include.php"); 
    include("include/footer.include.php");
}
else{
    
   header('location: login.php');

}




?>