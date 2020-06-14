<?php
session_start();
include('include/connection.php');

if (isset($_SESSION['customer_id'])) {
    $userid = $_SESSION['customer_id'];
    $username = $_SESSION['customer_name'];
} else if (isset($_SESSION['admin_id'])) {
    $userid = $_SESSION['admin_id'];
    $username = $_SESSION['admin_name'];
}
// eta xai checkout successful vaesi order ma insert garney data haru.
// redirect: 

    $query="INSERT INTO PAYMENT (PAYMENT_ID, PAYMENT_STATUS,PAYMENT_TYPE,PAYMENT_DATE,USER_ID) VALUES (null,'PAID','PAYPAL',SYSDATE,'$userid')";
    $insertPayment = oci_parse($conn, $query);
        if (!$insertPayment) {
            echo "selection query on collection not parsed";
        }
        oci_execute($insertPayment);
    
        $Select_query="SELECT* FROM CART WHERE USER_ID='$userid'";
        $select_parse= oci_parse($conn, $Select_query);
        if (!$select_parse) {
            echo "selection query on collection not parsed";
        }
        oci_execute($select_parse);
    
        if (($row=oci_fetch_assoc($select_parse))==true)
        {
            $cart_id=$row['CART_ID'];
            header("location: include/order/orderconfirm.include.php?cart=$cart_id");
    
        }
    

