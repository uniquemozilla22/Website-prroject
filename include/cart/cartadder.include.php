<?php

include("../connection.php");
session_start();


    if (isset($_GET['productid']))
    {
        $productid=$_GET['productid'];
    if (isset($_SESSION['customer_id']))
    {
        $userid= $_SESSION['customer_id'];
    }
    else if (isset($_SESSION['admin_id']))
    {
        $userid=$_SESSION['admin_id'];
    }
    
    $checkerquery="SELECT * FROM CART_PRODUCT CP , CART C WHERE PRODUCT_ID = '$productid'";

    $cheparse=oci_parse($conn,$checkerquery);

    if (!$cheparse)
    {
        echo "add selection not done";
    }
    oci_execute($cheparse);

    $row=oci_fetch_assoc($cheparse);


    if ($row==true)
    {
        header("location: ../../cart.php?itemalreadyoncart=1");
    }
    else{
        
    $query="SELECT * FROM  CART WHERE USER_ID='$userid'";

    $parse=oci_parse($conn,$query);

    if (!$parse)
    {
        echo "add selection not done";
    }
    oci_execute($parse);

        if ($row=oci_fetch_assoc($parse))
        {
            $cart_id=$row['CART_ID'];
    
            $inserting_query= "INSERT INTO CART_PRODUCT VALUES('$cart_id','$productid')";
    
            $insert_parse=oci_parse($conn,$inserting_query);
    
        if (!$insert_parse)
        {
            echo "add insertion not done";
        }
        oci_execute($insert_parse);
    
        header("location: ../../cart.php?itemadded=1");
        }

    }

    



    }
	
    

?>