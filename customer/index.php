<?php        
    session_start();
    include("includes/connection.php");
    if($_SESSION['customer_type']!='customer'){
        
        //echo "Hello";
        echo "<script>window.open('../login.php','_self')</script>";
        
    }else{
        
        $customer_session = $_SESSION['customer_type'];
        
        $get_customer = "select * from usera where USERNAME='$customer_session'";
        
        $run_customer = oci_parse($conn,$get_customer);

        oci_execute($run_customer);
        
        $row_customer = oci_fetch_array($run_customer);
        
        $customer_id = $row_customer['USER_ID'];
        
        $customer_name = $row_customer['USERNAME'];
        
        $customer_email = $row_customer['USER_EMAIL'];
        
        $customer_address=$row_customer['USER_ADDRESS'];

        $customer_contact=$row_customer['USER_PHONE'];

        $customer_type=$row_customer['USER_TYPE'];

        $customer_image=$row_customer['USER_IMAGE'];

        $customer_about=$row_customer['USER_DESCRIPTION'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taste Best Customer Area</title>
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

                }  if(isset($_GET['view_customers'])){
                        
                        include("view_customers.php");
                        
                }   if(isset($_GET['delete_customer'])){
                        
                        include("delete_customer.php");
                        
                }     if(isset($_GET['edit_customer'])){
                        
                        include("edit_customer.php");
                        
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