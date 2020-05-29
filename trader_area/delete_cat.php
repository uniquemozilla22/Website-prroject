<?php 
    
    session_start();
    include("includes/connection.php");
    if($_SESSION['admin_type']!='trader'){
        echo "<script>window.open('../login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_cat'])){
        
        $delete_cat_id = $_GET['delete_cat'];
        
        $delete_cat = "delete from CATEGORY where CATEGORY_ID='$delete_cat_id'";
        
        $run_delete = oci_parse($conn,$delete_cat);

        oci_execute($run_delete);
        
        if($run_delete){
            
            echo "<script>alert('One of Your Category Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_cats','_self')</script>";
            
        }
        
    }

?>




<?php } ?>