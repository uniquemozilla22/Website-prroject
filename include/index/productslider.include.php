<?php

$sql_login = "SELECT * FROM PRODUCT p , REVIEW r where p.REVIEW_ID = R.REVIEW_ID"; 

$login_stmt = oci_parse($conn, $sql_login);

if(!$login_stmt)
{
    echo "An error occurred in parsing the sql string.\n"; 
    exit; 
}

oci_execute($login_stmt);

echo " 
<section class='wn__product__area brown--color pt--80  pb--30'>
			<div class='container'>
				<div class='row'>
					<div class='col-lg-12'>
						<div class='section__title text-center'>
							<h2 class='title__be--2'>Trader's<span class='color--theme'> Name</span></h2>
							<p>There will be some description about the trader and above will be the name of trader.</p>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class='furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50'>

	" ;

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
					<div class='product product__style--3'>
						<div class='col-lg-3 col-md-4 col-sm-6 col-12'>
							<div class='product__thumb'>
								<a class='first__img' href='singleproduct.php?productdisplay=$productid'><img src='images/books/1.jpg	' alt='$productname'></a>
								<div class='hot__box'>
									<span class='hot-label'>$productstatus</span>
								</div>
							</div>

							<div class='product__content content--center'>
								<h4><a href='singleproduct.php'>$productname</a></h4>
								<ul class='prize d-flex'>
									<li> $ $productprice</li>
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
									for ($i=0;$i<=$rating;$i++){
										echo"
										<li class='on'><i class='fa fa-star-o'></i></li>";
									}
									echo"
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- END Single Product -->
	
	";


}
?>

					
					<!-- Start Single Product -->
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>