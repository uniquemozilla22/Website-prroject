<html lang="en">
<head>
    <title>PHP - Paypal Payment Gateway Integration</title>
</head>
<body style="background:#E1E1E1">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
<style>
    
    .checkoubox{
background: #bce3da;
    margin: 0 0 30px;
    position: relative;
    left: 65%;
    border: solid 1px #e6e6e6;
    box-sizing: border-box;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);

}


</style>


<div class="checkoubox">

   <?php
   session_start();
   include('include/connection.php');

    $userid=$_SESSION['customer_id'];
    $select_customer ="SELECT * FROM USERA WHERE USER_ID ='$userid'";
    $run_customer =oci_parse($conn, $select_customer);
    oci_execute($run_customer);
    $row_customer =oci_fetch_array($run_customer);
    $customer_id =$row_customer['USER_ID'];

   ?> 

	<h1 class="text-center">
		  Payment Option
	</h1>
	<p class="lead text-center">
		<a href="order.php?c_id=<?php echo $customer_id;?>">Pay via. Bank</a>
	</p>
	<center>
	<img  width="150" height="130" src="images/paypl.png" >
	</center>
	<p class="lead text-center">
		<a>OR</a>
	</p>
	<p class="lead text-center">
		<a href="#">Paypal</a>
	</p>

	<center>
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"> 
			<input type="hidden" name="business" value="chgrocers1234@.com">
			<input type="hidden" name="cmd" value="_cart">
			<input type="hidden" name="upload" value="1">
			<input type="hidden" name="currency_code" value="USD" >
 		   <input type="hidden" name="return" value="http://localhost/finalstopshop/paypal_order.php?c_id=<?php echo $customer_id;?>">
 		   <input type="hidden" name="cancel_return" value="http://localhost/finalstopshop/index.php">

            <?php
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

    $Dquery="SELECT * from discount where DISCOUNT_ID=$discountid";
			
	$Dlogin_stmt = oci_parse($conn, $Dquery);

	if(!$Dlogin_stmt)
	{
	echo "An error occurred in parsing the sql string. on discount \n"; 
	exit; 
	}

	oci_execute($Dlogin_stmt);
	if($rowd= oci_fetch_array($Dlogin_stmt))
	{
        $disper=$rowd['DISCOUNT_PERCENTAGE'];
        $dispers=($disper*$productprice)/100;
        $finalprice =$productprice-$dispers;
    }
    

    if (isset($finalprice))
    {
        
    $de=$finalprice*$product_quantity;

    }
    else{

        $de=$productprice*$product_quantity;
    }
    
    $total_price +=$de;
    
    }
}
?>

 		   <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $productname; ?>">

 		   	   <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $productprice;?>">


 		   	   <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $product_quantity; ?>">

<?php


?>
<input type="image" name="submit" width="150" height="130" src="images/paypal.png">


		</form>
	
	</center>


</div>
</body>
</html>