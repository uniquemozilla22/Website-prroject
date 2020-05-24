<?php
include("include/connection.php");

?>

<?php

if (isset($_GET['key'])) {
    # code...
		$st = "UPDATE USERA SET USER_STATUS = '1' WHERE USER_ID = (SELECT max(USER_ID) FROM USERA) ";

		$qry = oci_parse($con, $st);
		oci_execute($qry);
		header("Location:index.php");

    }else{
    	echo "Fail! Please try again";
    }

?>