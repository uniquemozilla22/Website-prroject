
        	<div class="container">			
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
			                        </div>
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
	        				<div class="shop-grid tab-pane fade show active" id="nav-list" role="tabpanel">
	        					<div class="list__view__wrapper">
								

						<?php

						$sql_login = "SELECT  * FROM USERA where USER_TYPE='trader'";

						$login_stmt = oci_parse($conn, $sql_login);
					
							if(!$login_stmt)
							{
							echo "An error occurred in parsing the sql"; 
							exit; 
							}
					
						oci_execute($login_stmt);

					while (($row= oci_fetch_array($login_stmt))==true)
					{
						$userid = $row['USER_ID'];
						$username = $row['USERNAME'];
						$useremail=$row['USER_EMAIL'];
						$usercontact=$row['USER_PHONE'];
						$useraddress=$row['USER_ADDRESS'];
						$userdesc = $row['USER_DESCRIPTION'];
						$usertype =$row['USER_TYPE'];
						$userimage= $row['USER_IMAGE'];
						$customerrid=$row['CUSTOMER_ID'];
						$traderid=$row['TRADER_ID'];
						$admintype=$row['ADMIN_TYPE'];
						$discountid= $row['DISCOUNT_ID'];

						
						
						echo "
	        						<!-- Start Single Product -->
	        						<div class='list__view'>
	        							<div class='thumb'>
										<a class='first__img' href='traders.php?traderdisplay=$userid'><img src='trader_area/trader_images/$userimage' alt='$username'></a>
	        							<a class='second__img animation1' href='singleproduct.php'><img src='images/product/2.jpg' alt='product images'></a>
	        							</div>
	        							<div class='content'>
	        								<h2><a href='trader.php'>$username</a></h2>
											<p>$userdesc</p>
	        								
	        							</div>
									</div>
									<!-- End Single Product -->
									
									";
									}?>
							
	        					</div>
	        				</div>
						</div>
					
        			</div>
        		
        	</div>
        </div>