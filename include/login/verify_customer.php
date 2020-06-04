<?php
include("../connection.php");

?>

<?php

if (isset($_POST['otpsubmit'])) {

	$enteredOTP=$_POST['digit'];
		$st = "SELECT * FROM USERA WHERE USER_STATUS='$enteredOTP'";

		$qry = oci_parse($conn, $st);

		if (!$qry)
		{
			header('location: ../../login.php?enterValidOTPSQL=1');
		}

		oci_execute($qry);

		if (($row= oci_fetch_array($qry))==true)
			{
				$username=$row['USERNAME'];
				$type=$row['USER_TYPE'];
				$userid=$row['USER_ID'];


				$stmt = "UPDATE USERA SET USER_STATUS ='verified' WHERE USER_STATUS='$enteredOTP'";

				$uquery = oci_parse($conn, $stmt);

				if(!$uquery)
				{
					header('location: ../../login.php?OTPnotupdated=1');
				}
				
				oci_execute($uquery);

				if ($row['USER_TYPE']=='trader')
				{
					session_start();
					$_SESSION['admin_name']=$username;
					$_SESSION['admin_id']=$userid;
					$_SESSION['admin_type']=$type;
					header("Location: ../../trader_area/index.php?dashboard");
				}
				else{

					session_start();
					$_SESSION['customer_name']=$username;
					$_SESSION['customer_id']=$userid;
					$_SESSION['customer_type']=$type;
					header("location: ../../index.php?loginSucess='$userid'");

				}
				
				
			}
			else{
				header('location: ../../login.php?entervalidOTP=1');
			}
		

    }else{
    	header('loacation: ../../login.php');
    }

?>