<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
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


						<?php

							$sql_login = "SELECT * FROM USERA WHERE USER_TYPE='trader'"; 

							$login_stmt = oci_parse($conn, $sql_login);

							if(!$login_stmt)
							{
								echo "An error occurred in parsing the sql string.\n"; 
								exit; 
							}

							oci_execute($login_stmt);

							while (($row= oci_fetch_array($login_stmt))==true)
								{
								$username = $row['USERNAME'];
								$userid = $row['USER_ID'];
								$userdesc = $row ['USER_DESCRIPTION'];
								$useremail = $row ['USER_EMAIL'];
								$usercontact = $row ['USER_PHONE'];
								$useraddress = $row ['USER_ADDRESS'];
								$userimage= $row['USER_IMAGE'];
								$discountid= $row['DISCOUNT_ID'];



						
								echo "

        				<div class='tab__container'>
	        				<div class='shop-grid tab-pane fade show active' id='nav-list' role='tabpanel'>
	        					<div class='list__view__wrapper'>
	        						<!-- Start Single Product -->
	        						<div class='list__view'>
	        							<div class='thumb'>
											<img src='trader_area/trader_images/$userimage' alt='$userimage' style='width:700;'>
											
										</div>
			
										
	        							<div class='content'>
	        								<h2>$username</h2>
	        								
	        								<h2>$useremail</h2>
											<h2>$usercontact</h2>
	        								<p>$userdesc</p>
	        								

										</div>

										
									
	        						</div>
	        						<!-- End Single Product -->
	        						
	        					</div>
	        				</div>
						</div>";
						
								}?>
        			</div>
        		
        	</div>
        </div>