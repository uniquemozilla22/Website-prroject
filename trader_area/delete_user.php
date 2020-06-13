<?php 
    
   // session_start();
    include("includes/connection.php");
    if($_SESSION['admin_type']!='trader'){
        echo "<script>window.open('../login.php','_self')</script>";
        
    }else{

?>

<center><!-- center Begin -->
    
    <h1> Are you sure you want to delete your account? </h1>
    
    <form action="" method="post"><!-- form Begin -->
        
       <input type="submit" name="Yes" value="Yes, I want to delete" class="btn btn-danger">
        
       <input type="submit" name="No" value="No, I don't want to delete" class="btn btn-primary">
        
    </form><!-- form Finish -->
    
</center><!-- center Finish -->

<?php 
    if(isset($_POST['YES'])){
        
        $delete_user = "delete from USERA where USER_TYPE='trader'";
        
        $run_delete = oci_parse($conn,$delete_user);
        
        oci_execute($run_delete);

        if($run_delete){
            
            echo "<script>alert('One of your Trader has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_users','_self')</script>";
            
        }
        
    }else if(isset($_POST['No'])){
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }

?>

<?php } ?>