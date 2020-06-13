<?php

session_start();

if (isset($_SESSION['customer_id']) || isset($_SESSION['admin_id']))
{
    if (isset($_GET['wishadd'])){
        $wishlistserviceno= $_GET['wishadd'];
        setcookie("mywish[$wishlistserviceno]", $wishlistserviceno, time()+(60*60*24*30), "/");
        }
    include("include/connection.php");
    include("include/header.include.php");
    include("include/index/slider.include.php");
    include("include/index/productslider.include.php");
    include("include/banner.include.php");
    include("include/index/productslider.include.php"); 
    include("include/footer.include.php");
}
else{
    
   header('location: login.php');

}




?>