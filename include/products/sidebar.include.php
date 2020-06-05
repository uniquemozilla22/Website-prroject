<?php

	$sql_login = "	SELECT * FROM  CATEGORY"; 

	$login_stmt = oci_parse($conn, $sql_login);

	if(!$login_stmt)
	{
    echo "An error occurred in parsing the sql string.\n"; 
    exit; 
	}

	oci_execute($login_stmt);

?>

<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Product Categories</h3>
        						<ul>

								<?php

								$sql_login = "	SELECT * FROM  CATEGORY C"; 

								$login_stmt = oci_parse($conn, $sql_login);

								if(!$login_stmt)
								{
									echo "An error occurred in parsing the sql string.\n"; 
									exit; 
								}

								oci_execute($login_stmt);
								while ($row = oci_fetch_assoc($login_stmt))
								{
									
									$category = $row['CATEGORY_ID'];
									$category_name= $row['CATEGORY_NAME'];

									echo "
									<li><a href='sidebar.include.php?category=$category'>$category_name</a></li>
									
									";
								
								
								}
									

								?>
        						</ul>
        					</aside>
							<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">SHOP Categories</h3>
        						<ul>

								<?php

								$sql_login = "	SELECT * FROM  SHOP"; 

								$login_stmt = oci_parse($conn, $sql_login);

								if(!$login_stmt)
								{
									echo "An error occurred in parsing the sql string.\n"; 
									exit; 
								}

								oci_execute($login_stmt);
								while ($row = oci_fetch_assoc($login_stmt))
								{
									
									$SHOPID = $row['SHOP_ID'];
									$SHOP_NAME= $row['SHOP_NAME'];

									echo "
									<li><a href='sidebar.include.php?shop=$SHOPID'>$SHOP_NAME</a></li>
									
									";
								
								
								}
									

								?>
        						</ul>
        					</aside>
        				
        					<aside class="wedget__categories poroduct--tag">
        						<h3 class="wedget__title">Product Tags</h3>
        						<ul>
								<?php

								$sql_login = "	SELECT * FROM  PRODUCT"; 

								$login_stmt = oci_parse($conn, $sql_login);

								if(!$login_stmt)
								{
									echo "An error occurred in parsing the sql string.\n"; 
									exit; 
								}

								oci_execute($login_stmt);
								while ($row = oci_fetch_assoc($login_stmt))
								{
									$productkey= $row['PRODUCT_KEYWORDS'];
									$productkey_array= explode(" ",$productkey);

									foreach($productkey_array as $pa)
									{
										
											echo "
									<li><a href='sidebar.include.php?search=$pa'>$pa</a></li>
									
									";
									
									

									}
								
								
								}
									

								?>
        						</ul>
        					</aside>
        					
        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
			                        </div>
			                        <p>Showing 1–12 of 40 results</p>
			                        <div class="orderby__wrapper">
			                        	<span>Sort By</span>
			                        	<select class="shot__byselect">
			                        		<option>Default sorting</option>
			                        		<option>HeadPhone</option>
			                        		<option>Furniture</option>
			                        		<option>Jewellery</option>
			                        		<option>Handmade</option>
			                        		<option>Kids</option>
			                        	</select>
			                        </div>
		                        </div>
        					</div>
        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">

								<?php

$sql_login = "SELECT * FROM PRODUCT p , REVIEW r where p.REVIEW_ID = R.REVIEW_ID"; 

$login_stmt = oci_parse($conn, $sql_login);

if(!$login_stmt)
{
	echo "An error occurred in parsing the sql string.\n"; 
	exit; 
}

oci_execute($login_stmt);

while (($row= oci_fetch_array($login_stmt))==true)
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
	$rating = $row['RATING_REVIEW'];
	$reviewcomment=$row['REVIEW_COMMENT'];


	echo "
	
	<!-- Start Single Product -->
	<div class='product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12'>
		<div class='product__thumb'>
			<a class='first__img' href='singleproduct.php?productdisplay=$productid'><img src='images/books/$productimage' alt='$productname'></a>											
			<div class='hot__box'>
				<span class='hot-label'>$productstatus
				</span>
			</div>
		</div>
		<div class='product__content content--center'>
			<h4><a href='singleproduct.php'>$productname</a></h4>
			<ul class='prize d-flex'>
				<li>$ $productprice</li>
			</ul>
			<div class='action'>
									<div class='actions_inner'>
										<ul class='add_to_links'>
											<li><a class='cart' href='cart.php'><i class='bi bi-shopping-bag4'></i></a></li>
											<li><a class='compare' href='singleproduct.php?productdisplay=$productid'><i class='bi bi-heart-beat'></i></a></li>
										</ul>
									</div>
								</div>
			<div class='product__hover--content'>
				<ul class='rating d-flex'>
				";
				for ($i=0;$i<$rating;$i++){
					echo"
					<li class='on'><i class='fa fa-star-o'></i></li>";
				}
				echo"
				</ul>
			</div>
		</div>
	</div>
	<!-- End Single Product -->
	
	";


}


								?>

	        						
	        				
	        					</div>
	        					<ul class="wn__pagination">
	        						<li class="active"><a href="#">1</a></li>
	        						<li><a href="#">2</a></li>
	        						<li><a href="#">3</a></li>
	        						<li><a href="#">4</a></li>
	        						<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
	        					</ul>
	        				</div>
	        				
        				</div>
        			</div>
        		</div>
        	</div>
        </div>