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
				$stmt = "UPDATE USERA SET USER_STATUS ='verified' WHERE USER_STATUS='$enteredOTP'";

				$uquery = oci_parse($conn, $stmt);

				if(!$uquery)
				{
					header('location: ../../login.php?OTPnotupdated=1');
				}
				
				oci_execute($uquery);
				header('location: ../../login.php?loginSucess=1');
				
			}
			else{
				header('location: ../../login.php?entervalidOTP=1');
			}
		

    }else{
    	header('loacation: ../../login.php');
    }

?>