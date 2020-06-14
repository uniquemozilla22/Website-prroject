<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="upload" value="1">
              <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="business" value="sb-i47h5j2227169@business.example.com">


            <input type="hidden" name="currency_code" value="USD" >
          <input type="hidden" name="return" value="http://localhost/delicate depot/order.php">
          <input type="hidden" name="cancel_return" value="http://localhost/delicate depot/index.php">
<?php
          $i=0;
          session_start();
          include ('include/connection.php');
          $id = $_SESSION['customer_id'];
          $get_cart ="SELECT * FROM CART_PRODUCT";
          $run_cart=oci_parse($conn, $get_cart);
          oci_execute($run_cart);
           while ( $row_cart =oci_fetch_array($run_cart)) {

           $pro_id =$row_cart['PRODUCT_ID'];
           $pro_qty =$row_cart['PRODUCT_QUANTITY'];
$get_products="SELECT * FROM PRODUCT WHERE PRODUCT_ID='$pro_id'";
           $run_products=oci_parse($conn, $get_products);
           oci_execute($run_products);
           $row_products =oci_fetch_array($run_products);

           $product_title =$row_products['PRODUCT_NAME'];
           //$disper = $rowd['DISCOUNT_PERCENTAGE'];
           //$dispers = ($disper * $productprice) / 100;
           
       // $pro_price =$row_products['PRODUCT_PRICE']-$dispers;

           $i++;
           ?>

           <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>">

               <input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i;?>">

               <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price;?>">


               <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>">

<?php

}
?>
<input type="image" name="submit"src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_150x38.png" alt="PayPal" >


        </form>