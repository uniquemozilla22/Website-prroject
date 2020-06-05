 <!-- Start main Content -->


 <?php
if (!isset($_GET['productdisplay']))
{
	echo "<h1> Please select a product</h1>";
}
else{


	$productid=$_GET['productdisplay'];


	$sql_login = "	SELECT * FROM PRODUCT p , REVIEW r , CATEGORY C, USERA u where p.PRODUCT_ID = R.PRODUCT_ID AND r.USER_ID = u.USER_ID AND p.CATEGORY_ID = C.CATEGORY_ID AND p.PRODUCT_ID = $productid"; 

$login_stmt = oci_parse($conn, $sql_login);

if(!$login_stmt)
{
    echo "An error occurred in parsing the sql string.\n"; 
    exit; 
}

oci_execute($login_stmt);

if ($row = oci_fetch_assoc($login_stmt))
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
	$category_name= $row['CATEGORY_NAME'];
	$orderid=$row['ORDER_ID'];
	$shopid=$row['SHOP_ID'];
	$userid=$row['USER_ID'];
	$discountid= $row['DISCOUNT_ID'];
	$rating = $row['RATING_REVIEW'];
	$reviewcomment=$row['REVIEW_COMMENT'];
	$username=$row['USERNAME'];
	$reviewtime=$row['REVIEW_TIME'];



	echo " <div class='maincontent bg--white pt--80 pb--55'>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-9 col-12'>
				<div class='wn__single__product'>
					<div class='row'>
						<div class='col-lg-6 col-12'>
							<div class='wn__fotorama__wrapper'>
								<div class='fotorama wn__fotorama__action' data-nav='thumbs'>
									  <a href='1.jpg'><img src='images/product/1.jpg' alt=''></a>
						
								</div>
							</div>
						</div>
						<div class='col-lg-6 col-12'>
							<div class='product__info__main'>
								<h1>$productname</h1>
								<div class='product-reviews-summary d-flex'>
									<ul class='rating-summary d-flex'>
									";
									for ($i=0;$i<=$rating;$i++){
										echo"
										<li class='on'><i class='fa fa-star-o'></i></li>";
									}
									echo"
									</ul>
								</div>
								<div class='price-box'>
									<span>$ $productprice</span>
								</div>
								<div class='product__overview'>
								<p>$productdesc</p>
								</div>
								<div class='product__overview'>
								<p><strong>Persons who cannot have the product : $allergy</strong></p>
								</div>
								<div class='box-tocart d-flex'>
									<span>Qty</span>
									<form action ='' method='post'>
									<input id='qty' class='input-text qty' name='qty' max='$maximumorder' min='$minimumorder' value='$minimumorder' title='Qty' type='number'>
									<div class='addtocart__actions'>
										<button class='tocart' type='submit' title='Add to Cart'>Add to Cart</button>
									</div>
									</form>
									<div class='product-addto-links clearfix'>
										<a class='wishlist' href='#'></a>
										<a class='compare' href='#'></a>
									</div>
								</div>
								<div class='product_meta'>
									<span class='posted_in'>Category: 
										<a href=''>$category_name</a>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				";}
				?>

				<div class='product__info__detailed'>
					<div class='pro_details_nav nav justify-content-start' role='tablist'>
						<a class='nav-item nav-link ' data-toggle='tab' href='#nav-review' role='tab'>Reviews</a>
					</div>
					<div class='tab__container'>
						<!-- Start Single Tab Content -->
						<div class='pro__tab_label tab-pane fade' id='nav-review' role='tabpanel'>
							<div class='review__attribute'>
								<h1>Customer Reviews</h1>
								
								<?php

								
	$sql_login_stmt = "	SELECT * FROM PRODUCT p , REVIEW r , CATEGORY C, USERA u where p.PRODUCT_ID = R.PRODUCT_ID AND r.USER_ID = u.USER_ID AND p.CATEGORY_ID = C.CATEGORY_ID AND p.PRODUCT_ID = $productid"; 

	$login_stmt = oci_parse($conn, $sql_login_stmt);
	
	if(!$login_stmt)
	{
		echo "An error occurred in parsing the sql string.\n"; 
		exit; 
	}
	
	oci_execute($login_stmt);
	
	while ($row = oci_fetch_assoc($login_stmt))
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
		$category_name= $row['CATEGORY_NAME'];
		$orderid=$row['ORDER_ID'];
		$shopid=$row['SHOP_ID'];
		$userid=$row['USER_ID'];
		$discountid= $row['DISCOUNT_ID'];
		$rating = $row['RATING_REVIEW'];
		$reviewcomment=$row['REVIEW_COMMENT'];
		$username=$row['USERNAME'];
		$reviewtime=$row['REVIEW_TIME'];

		echo "
									
								<div class='review__ratings__type d-flex'>
									<div class='review-ratings'>
										<div class='rating-summary d-flex'>
											<span>Ratings ( of 5) </span>
											<ul class='rating d-flex'>
											";
											for ($i=0;$i<$rating;$i++){
												echo"
												<li><i class='zmdi zmdi-star'></i></li>";
											}
											echo"
											</ul>
										</div>
									</div>
									<div class='review-content'>
										<p style='font-size:20px;'>'$reviewcomment'</p>
										<p>Review by $username</p>
										<p>Posted on $reviewtime</p>
									</div>
								</div>
								";

										}?>

							</div>
							<div class='review-fieldset'>
								<h2>You're reviewing:</h2>
								<h3><?php echo $productname ?></h3>
								<form action ='' method='post'>
								<div class='review_form_field'>
									<div class='input__box'>
										<span>Summary</span>
										<input id='qty' class='input-text qty' name='rating' max='5' min='1' value='1' title='Qty' type='number'>										
									</div>
									<div class='input__box'>
										<span>Summary</span>
										<input id='summery_field' type='text' name='summery'>
									</div>
									<div class='review-form-actions'>
										<button name='reviewsubmit'>Submit Review</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- End Single Tab Content -->
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- End main Content -->
<?php
}

if (isset($_POST['reviewsubmit'])){

	$ratings=$_POST['rating'];
	$ratings_comment= $_POST['summery'];

	$t=time();
	$date = date("Y-m-d",$t);
	
	$idp=$_GET['productdisplay'];

	
	if (isset($_SESSION['customer_id']))
	{
		$cus=$_SESSION['customer_id'];

		$qry= "INSERT INTO REVIEW(REVIEW_ID,REVIEW_COMMENT,RATING_REVIEW,REVIEW_TIME,USER_ID,PRODUCT_ID) VALUES	(null,'$ratings_comment','$ratings',SYSDATE,'$cus','$idp')";

		$login_stmt = oci_parse($conn, $qry);

		if(!$login_stmt)
		{
		echo "An error occurred in parsing the sql string.\n"; 
		exit; 
		}

		oci_execute($login_stmt);
	}
	else if (isset($_SESSION['admin_id']))
	{
		$admin=$_SESSION['admin_id'];
		$qry= "INSERT INTO REVIEW(REVIEW_ID,REVIEW_COMMENT,RATING_REVIEW,REVIEW_TIME,USER_ID,PRODUCT_ID) VALUES	(5,$ratings_comment,$ratings,SYSDATE,$admin,$idp)";

		$login_stmt = oci_parse($conn, $qry);

		if(!$login_stmt)
		{
		echo "An error occurred in parsing the sql string.\n"; 
		exit; 
		}

		oci_execute($login_stmt);
	}




	}
	

?>