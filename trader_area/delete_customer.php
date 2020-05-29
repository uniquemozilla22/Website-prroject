<?php 
    
    session_start();
    include("includes/connection.php");
    if($_SESSION['admin_type']!='trader'){
        echo "<script>window.open('../login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_customer'])){
        
        $delete_id = $_GET['delete_customer'];
        
        $delete_c = "delete from USERA where USER_ID='$delete_id' && USER_TYPE='customer";
        
        $run_delete = oci_parse($conn,$delete_c);

        oci_execute($run_delete);
        
        if($run_delete){
            
            echo "<script>alert('One of your costumer has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_customers','_self')</script>";
            
        }
        
    }

?>

<?php } ?>