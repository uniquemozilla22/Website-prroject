<?php 

include('includes/db.php');


$customer_session = $_SESSION['customer_id'];

$get_customer = "select * from USERA where USER_ID='$customer_session'";

$run_customer = oci_parse($conn,$get_customer);

oci_execute($run_customer);

if(!$run_customer)
        {
             echo "An error occurred in parsing the sql string.\n"; 
            exit; 
        }

$row_customer = oci_fetch_array($run_customer);

$customer_id = $row_customer['USER_ID'];
        
$customer_name = $row_customer['USERNAME'];

$customer_pass = $row_customer['USER_PASSWORD'];

$customer_email = $row_customer['USER_EMAIL'];

$customer_phone = $row_customer['USER_PHONE'];

$customer_address = $row_customer['USER_ADDRESS'];

$customer_image = $row_customer['USER_IMAGE'];

$customer_desc = $row_customer['USER_DESCRIPTION'];

$admin_type=$row_customer['ADMIN_TYPE'];

$discount_id=$row_customer['DISCOUNT_ID'];


?>

<h1 align="center"> Edit Your Account </h1>

<form method="post" class="form-horizontal" action="" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Customer Username </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $customer_name; ?>" name="c_name" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Customer E-mail </label> 
                      
                    <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $customer_email; ?>"  name="c_email" type="text" class="form-control" required>
                          
                     </div><!-- col-md-6 Finish -->

                     </div><!-- form-group Finish -->


                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Customer Address </label> 
                      
                    <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                    <input value="<?php echo $customer_address; ?>"  name="c_address" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Customer Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $customer_pass; ?>"  name="c_pass" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Customer Contact </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $customer_phone; ?>"  name="c_phone" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label">Customer Image </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="c_image" type="file" class="form-control" >

                          <img src="trader_images/<?php echo $customer_image; ?>" alt="<?php echo $customer_name; ?>" width="70" height="70">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group">                       
                      <label class="col-md-3 control-label">Customer Description </label> 
                      
                      <div class="col-md-6">                        
                          <textarea name="c_desc" value="<?php echo $customer_desc; ?>" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div>                      
                   </div>

                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Customer" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
    
    
<?php 

if(isset($_POST['update'])){
    
    //$update_id = $customer_id;

    $user_name = $_POST['c_name'];
    
    $user_email = $_POST['c_email'];
    
    $user_address = $_POST['c_address'];

    $user_pass = $_POST['c_pass'];
    
    $user_contact = $_POST['c_phone'];

    $user_desc = $_POST['c_desc'];
    
    $user_image = $_FILES['c_image']['name'];
    
    $user_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
    
    $update_customer= "UPDATE USERA SET USERNAME='$user_name',USER_EMAIL='$user_email',USER_PASSWORD='$user_password',USER_PHONE='$user_contact',USER_ADDRESS='$user_address',USER_DESCRIPTION='$user_desc', USER_IMAGE='$user_image' where USER_ID='$customer_id'";
    
    $run_customer = oci_parse($conn,$update_customer);

    oci_execute($run_customer);
    
        if(!$run_customer){
            echo "<script>alert('Your account has not been updated successfully. Please login again.')</script>";
        
        }
        
        echo "<script>alert('Your account has been updated successfully. Please login again.')</script>";
        
        echo "<script>window.open('my_account.php','_self')</script>";
        
    
    
}

?>