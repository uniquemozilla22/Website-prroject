<?php

include('include/connection.php');
session_start();

if (isset($_SESSION['customer_id']))
{
    $userid= $_SESSION['customer_id'];
}
else if (isset($_SESSION['admin_id']))
{
    $userid=$_SESSION['admin_id'];
}

include('include/header.include.php');
include('include/banner.include.php');

$S_query ="SELECT * FROM CART c , CART_PRODUCT cp WHERE c.CART_ID=cp.CART_ID AND USER_ID='$userid'";

$cart_SELECT= oci_parse($conn,$S_query);

if(!$cart_SELECT){
    echo "sql error";
}

oci_execute($cart_SELECT);
$total_price=0;

while($row=oci_fetch_array($cart_SELECT))
{
  
    $product_id=$row['PRODUCT_ID'];
    $product_quantity=$row['PRODUCT_QUANTITY'];

    $cart_id_show=$row['CART_ID'];

    $select_query="SELECT * FROM PRODUCT WHERE PRODUCT_ID='$product_id'";

    $parsing_cart_showing=oci_parse($conn,$select_query);

    if (!$parsing_cart_showing)
    {
        echo "sql error while showing cart product";
    }

    oci_execute($parsing_cart_showing);

    if (($row=oci_fetch_assoc($parsing_cart_showing))==true)
    {
        $productname = $row['PRODUCT_NAME'];
	$productid = $row['PRODUCT_ID'];
	$productdesc = $row ['PRODUCT_DESCRIPTION'];
	$productstatus =$row['PRODUCT_STATUS'];
	$productimage= $row['PRODUCT_IMAGE'];
	$productprice=$row['PRODUCT_PRICE'];
	$productkeywords= $row['PRODUCT_KEYWORDS'];
	$minimumorder= $row['MIN_ORDER'];
	$maximumorder = $row['MAX_ORDER'];
	$allergy =$row['ALLERGY_INFORMATION'];
	$category = $row['CATEGORY_ID'];
	$orderid=$row['ORDER_ID'];
	$shopid=$row['SHOP_ID'];
	$userid=$row['USER_ID'];
    $discountid= $row['DISCOUNT_ID'];
    

    $de=$productprice*$product_quantity;
    
    $total_price +=$de;
    }
}
?>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6 px-4 pb-4">
 <h4 class="text-center text-info p-2" >Complete Your Order!</h4>
 <div class="jumbotron p-3 mb-2 text-center">
 <h6><b>Product(s)  :</b><?php</h6>
 </div>
</div>
</div>
</div>




<?php echo $total_price; 


?>

