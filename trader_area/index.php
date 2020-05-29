<?php        
    session_start();
    include("includes/connection.php");
    if($_SESSION['admin_type']!='trader'){
        
        //echo "Hello";
        echo "<script>window.open('../login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_type'];
        
        $get_admin = "select * from usera where USERNAME='$admin_session'";
        
        $run_admin = oci_parse($conn,$get_admin);

        oci_execute($run_admin);
        
        $row_admin = oci_fetch_array($run_admin);
        
        $admin_id = $row_admin['USER_ID'];
        
        $admin_name = $row_admin['USERNAME'];
        
        $admin_email = $row_admin['USER_EMAIL'];
        
        $admin_address=$row_admin['USER_ADDRESS'];

        $admin_contact=$row_admin['USER_PHONE'];

        $admin_type=$row_admin['USER_TYPE'];

        $admin_image=$row_admin['USER_IMAGE'];

        $admin_about=$row_admin['USER_DESCRIPTION'];

        $get_products = "select * from PRODUCT";
        
        $run_products = oci_parse($conn,$get_products);
        
        $count_products = oci_fetch($run_products);
        
        $get_customers = "select * from USERA where USER_TYPE='customer'";
        
        $run_customers = oci_parse($connn,$get_customers);
        
        $count_customers = oci_fetch($run_customers);
        
        $get_p_categories = "select * from CATEGORY";
        
        $run_p_categories = oci_parse($conn,$get_p_categories);
        
        $count_p_categories = oci_fetch($run_p_categories);
        
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taste Best Trader Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }   if(isset($_GET['insert_product'])){
                        
                        include("insert_product.php");
                        
                }   if(isset($_GET['view_products'])){
                        
                        include("view_products.php");
                        
                }   if(isset($_GET['delete_product'])){
                        
                        include("delete_product.php");
                        
                }   if(isset($_GET['edit_product'])){
                        
                        include("edit_product.php");
                        
                }   if(isset($_GET['insert_p_cat'])){
                        
                        include("insert_p_cat.php");
                        
                }   if(isset($_GET['view_p_cats'])){
                        
                        include("view_p_cats.php");
                        
                }   if(isset($_GET['delete_p_cat'])){
                        
                        include("delete_p_cat.php");
                        
                }   if(isset($_GET['edit_p_cat'])){
                        
                        include("edit_p_cat.php");
                        
                }   if(isset($_GET['insert_cat'])){
                        
                        include("insert_cat.php");
                        
                }   if(isset($_GET['view_cats'])){
                        
                        include("view_cats.php");
                        
                }   if(isset($_GET['edit_cat'])){
                        
                        include("edit_cat.php");
                        
                }   if(isset($_GET['delete_cat'])){
                        
                        include("delete_cat.php");
                        
                }   if(isset($_GET['view_customers'])){
                        
                        include("view_customers.php");
                        
                }   if(isset($_GET['delete_customer'])){
                        
                        include("delete_customer.php");
                        
                }   if(isset($_GET['view_users'])){
                        
                        include("view_users.php");
                        
                }   if(isset($_GET['delete_user'])){
                        
                        include("delete_user.php");
                        
                }   if(isset($_GET['insert_user'])){
                        
                        include("insert_user.php");
                        
                }   if(isset($_GET['user_profile'])){
                        
                        include("user_profile.php");
                        
                }
        
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>


<?php } ?>