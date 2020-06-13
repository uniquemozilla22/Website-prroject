<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mywebsite</title>
    <style>
        table{
            text-align: center;
            border-color: lightgray;
            width: 80%
        }
        img{
            width: 80px;
        }
    </style>
</head>
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
<body>
    <table border="1">
        <tr>
            <th>Cart Items</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
        </tr>
        <tr>
            <td><img src="images/7239276_R_SET.jpg" alt=""></td>
           
            <td>$250</td>
            <td>3</td>
        </tr>
        <tr>
            <td><img src="images/xiaomi-redmi-3s-plus-xxl.jpg" alt=""></td>
            <td>REDMI MI INDIA'S BEST CELL PHONE</td>
            <td>$140</td>
            <td>2</td>
        </tr>
    </table>
  
      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="business" value="fakebusiness1264@gmail.com">

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
    echo"
    <input type='hidden' name='item_name_1' value='$productname'>
        <input type='hidden' name='amount_1' value='250'>
        <input type='hidden' name='quantity_1' value='3'>";
        
}
?>
        
        <input type="hidden" name="item_name_2" value="REDMI MI INDIA'S BEST CELL PHONE">
        <input type="hidden" name="return" value="http://localhost/website-prroject/return_paypal.php">
        <input type="hidden" name="amount_2" value="140">
        <input type="hidden" name="quantity_2" value="2">
        <input type="submit" value="PayPal">
        </form>
        
  
</body>
</html>