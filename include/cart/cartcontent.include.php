<!-- cart-main-area start -->
<?php

if (isset($_GET['itemadded']))
{
    $cart_message="Your item has been added to cart";
}

if (isset($_GET['productidremove'])){

    $p_id=$_GET['productidremove'];

    $query="DELETE FROM CART_PRODUCT WHERE PRODUCT_ID ='$p_id'";

    $parsing_query = oci_parse($conn,$query);

    if (!$parsing_query)
    {
        echo "Item not deleted because of sql error";
    }
    oci_execute($parsing_query); 

    $cart_message= "Your item has been removed";  

}
if(isset($_GET['itemalreadyoncart']))
{
    $cart_message="Your item is already on the cart";
}

include("include/connection.php");

    if (isset($_SESSION['customer_id']))
{
    $userid= $_SESSION['customer_id'];
}
else if (isset($_SESSION['admin_id']))
{
    $userid=$_SESSION['admin_id'];
}
?>

<div class='cart-main-area section-padding--lg bg--white'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12 col-sm-12 ol-lg-12'>
                    <div class='section__title text-center'>
							<h2 class='title__be--2'>Your <span class='color--theme'> Cart</span></h2>
						</div>
                        <form action='#'> 
                            <?php
                            if(isset($cart_message))
                            {
                                echo 
                                $cart_message;
                            }
                            ?>
                            

                            <div class='table-content wnro__table table-responsive'>
                                <table>
                                    <thead>
                                        <tr class='title-top'>
                                            <th class='product-thumbnail'>Image</th>
                                            <th class='product-name'>Product</th>
                                            <th class='product-price'>Price</th>
                                            <th class='product-quantity'>Quantity</th>
                                            <th class='product-subtotal'>Total</th>
                                            <th class='product-remove'>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    
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
    

    
    $total_price +=$productprice;
    echo"
    <tr>
    <td class='product-thumbnail'><a href='#'><img src='images/product/sm-3/1.jpg' alt='$productname'></a></td>
    <td class='product-name'><a href='#'>'$productname'</a></td>
    <td class='product-price'><span class='amount'>$ $productprice</span></td>
    <td class='product-quantity'><input type='number' value='1'></td>
    <td class='product-subtotal'>$$total_price</td>
    <td class='product-remove'><a href='cart.php?productidremove=$product_id'> X</a></td>
    </tr>
    ";
    }


   
    
}






?>

                                       
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li><a href="#">Coupon Code</a></li>
                                <li><a href="#">Apply Code</a></li>
                                <li><a href="#">Update Cart</a></li>
                                <li><a href="#">Check Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Cart total</li>
                                    <li>Sub Total</li>
                                </ul>
                                <ul class="cart__total__tk">
                                    <li>$<?php echo $total_price; ?></li>
                                    <li>$70</li>
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>$140</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <!-- cart-main-area end -->