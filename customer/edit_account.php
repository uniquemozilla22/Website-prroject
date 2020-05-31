<?php 

//session_start();
include("includes/connection.php");
if($_SESSION['customer_type']!='customer'){
    echo "<script>window.open('../login.php','_self')</script>";
    
}else{

?>
   
<?php 

    if(isset($_GET['customer_profile'])){
        
        $edit_customer = $_GET['customer_profile'];
        
        $get_customer = "select * from usera where USER_ID='$edit_customer'";
        
        $run_customer = oci_parse($conn,$get_customer);

        if(!$run_customer)
        {
             echo "An error occurred in parsing the sql string.\n"; 
            exit; 
        }

        oci_execute($run_customer);

        $row_customer = oci_fetch_array($run_customer);

        $customer_id = $row_user['USER_ID'];
        
        $customer_name = $row_user['USERNAME'];
        
        $customer_pass = $row_user['USER_PASSWORD'];
        
        $customer_email = $row_user['USER_EMAIL'];
        
        $customer_phone = $row_user['USER_PHONE'];
        
        $customer_address = $row_user['USER_ADDRESS'];

        $customer_image = $row_user['USER_IMAGE'];
        
    }

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Customer
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Customer
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Customer Username </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $customer_name; ?>" name="customer_name" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> E-mail </label> 
                      
                    <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $customer_email; ?>"  name="customer_email" type="text" class="form-control" required>
                          
                     </div><!-- col-md-6 Finish -->

                     </div><!-- form-group Finish -->


                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Address </label> 
                      
                    <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                    <input value="<?php echo $customer_address; ?>"  name="customer_address" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $customer_pass; ?>"  name="customer_pass" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Contact </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $customer_phone; ?>"  name="customer_phone" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Image </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="admin_image" type="file" class="form-control" required>

                          <img src="trader_images/<?php echo $customer_image; ?>" alt="<?php echo $customer_name; ?>" width="70" height="70">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group">                       
                      <label class="col-md-3 control-label"> User Description </label> 
                      
                      <div class="col-md-6">                        
                          <textarea name="customer_desc" value="<?php echo $customer_desc; ?>" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div>                      
                   </div>

                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Customer" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->


<?php 

if(isset($_POST['update'])){
    
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_pass = $_POST['customer_pass'];
    $customer_contact = $_POST['customer_phone'];
    $customer_address= $_POST['customer_address'];
    $customer_desc = $_POST['customer_desc'];
    $customer_image = $_FILES['customer_image']['name'];
    $temp_customer_image = $_FILES['customer_image']['tmp_name'];

    move_uploaded_file($temp_customer_image,"customer_images/$customer_image");

    $update_customer = "update usera set USERNAME='$customer_name',USER_EMAIL='$customer_email',USER_PASSWORD='$customer_pass',USER_PHONE='$customer_contact',USER_ADDRESS='$customer_addresss',USER_DESCRIPTION='$customer_desc',USER_IMAGE='$customer_image' where USER_ID='$customer_id'";
    $run_customer = oci_parse($conn,$update_customer);

    oci_execute($run_customer);
    
    if($run_customer){
        
        //echo "<script>alert('User has been updated sucessfully')</script>";
        //echo "<script>window.open('../login.php','_self')</script>";
        
       // session_destroy();
        
    }
    
}

?>


<?php } ?>