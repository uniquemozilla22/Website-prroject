<h1 align="center"> Change Password </h1>


<form action="" method="post"><!-- form Begin -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Your Old Password: </label>

        <input type="text" name="old_pass" class="form-control" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Your New Password: </label>

        <input type="text" name="new_pass" class="form-control" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Confirm Your New Password: </label>

        <input type="text" name="new_pass_again" class="form-control" required>

    </div><!-- form-group Finish -->

    <div class="text-center"><!-- text-center Begin -->

        <button type="submit" name="submit" class="btn btn-primary"><!-- btn btn-primary Begin -->

            <i class="fa fa-user-md"></i> Update Now

        </button><!-- btn btn-primary inish -->

    </div><!-- text-center Finish -->

</form><!-- form Finish -->


<?php



if(isset($_POST['submit'])){

    $c_id = $_SESSION['customer_id'];

    $c_old_pass = $_POST['old_pass'];

    $c_new_pass = $_POST['new_pass'];

    $c_new_pass_again = $_POST['new_pass_again'];

    $sel_c_old_pass = "select * from USERA where USER_PASSWORD='$c_old_pass'";

    $run_c_old_pass = oci_parse($conn,$sel_c_old_pass);

    oci_execute($run_c_old_pass);

    if(!$run_c_old_pass){
        echo "Error while parsing";
    }

    $check_c_old_pass = oci_fetch_array($run_c_old_pass);

    if($check_c_old_pass==0){

        echo "<script>alert('Sorry, your current password is not valid. Please try again')</script>";

        exit();

    }

    if($c_new_pass!=$c_new_pass_again){

        echo "<script>alert('Sorry, your new password did not match.')</script>";

        exit();

    }

    $update_c_pass = "update USERA set USER_PASSWORD='$c_new_pass' where USER_ID='$c_id'";

    $run_c_pass = oci_parse($con,$update_c_pass);

    oci_execute($run_c_pass );

    if($run_c_pass){

        echo "<script>alert('Your password has been updated successfully.')</script>";

        echo "<script>window.open('my_account.php?my_orders','_self')</script>";

    }

}

?>
