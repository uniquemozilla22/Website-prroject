<!-- cart-main-area start -->
<?php

if (isset($_GET['itemdeleted'])){

    $message= "Wish list item has been deleted";
}
?>

<div class="wishlist-area section-padding--lg bg__white">
            <div class="container">
                <?php
                if(isset($message))
                {
                    echo "<h3 style='color:red'>Item Deleted</h3>";
                }

                ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table wnro__table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-remove"></th>
                                                <th class="product-thumbnail"></th>
                                                <th class="product-name"><span class="nobr">Product Name</span></th>
                                                <th class="product-price"><span class="nobr"> Unit Price </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Stock Status </span></th>
                                                <th class="product-add-to-cart"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                
 if (isset($_COOKIE['mywish'])){
        foreach($_COOKIE['mywish'] as $cookiename => $cookievalue){
            $cname=htmlspecialchars($cookiename);
            $productcid=htmlspecialchars($cookievalue);

            $wishquery="SELECT * FROM PRODUCT WHERE PRODUCT_ID = '$productcid'";

            $wishsearch = oci_parse($conn, $wishquery); 

            oci_execute($wishsearch);
            

            $product= oci_fetch_array($wishsearch);

            $product_id=$product['PRODUCT_ID'];
            $product_name=$product['PRODUCT_NAME'];
            $product_rate=$product['PRODUCT_PRICE'];
            $product_image =$product['PRODUCT_IMAGE'];
            $product_status=$product['PRODUCT_STATUS'];
            if ($product_status==1){
                $statuspro="Available";
            }
            else if ($product_status==0){
                $statuspro="Unavailable";
            }
            if (!empty($product_id))
            echo  "  <tr>
            <td class='product-remove'><a href='include/wishlist/wishdelete.include.php?wishdelete=$product_id'>×</a></td>
            <td class='product-thumbnail'><a href='#'><img src='images/images/$product_image' alt='' width=80px height= 100px></a></td>
            <td class='product-name'><a href='singleproduct.php?productdi=$product_id'>$product_name</a></td>
            <td class='product-price'><span class='amount'>$product_rate</span></td>
            <td class='product-stock-status'><span class='wishlist-in-stock'> $statuspro</span></td>
        </tr>";

        }
 }
                                            ?>
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end --> 