<?php 
    
   // session_start();
    include("includes/connection.php");
    if($_SESSION['admin_type']!='trader'){
        echo "<script>window.open('../login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_user'])){
        
        $delete_user_id = $_GET['delete_user'];
        
        $delete_user = "delete from USERA where USER_TYPE='trader'";
        
        $run_delete = oci_parse($conn,$delete_user);
        
        oci_execute($run_delete);

        if($run_delete){
            
          //  echo "<script>alert('One of your Trader User has been Deleted')</script>";
            
          //  echo "<script>window.open('index.php?view_users','_self')</script>";
            
        }
        
    }

?>

<?php } ?>