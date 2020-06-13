<?php
//session_start();
include("includes/connection.php");
if($_SESSION['admin_type']!='trader'){
    echo "<script>window.open('../login.php','_self')</script>";
    
}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Shops </title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
</head>
<body>
    
<div class="row"> 
    
    <div class="col-lg-12"> 
        
        <ol class="breadcrumb"> 
            
            <li class="active"> 
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Shops
                <a href="../index.php" class="btn btn-warning">Visit Website</a>
                
            </li> 
            
        </ol> 
        
    </div> 
    
</div> 
       
<div class="row"> 
    
    <div class="col-lg-12"> 
        
        <div class="panel panel-default"> 
            
           <div class="panel-heading"> 
               
               <h3 class="panel-title"> 
                   
                   <i class="fa fa-money fa-fw"></i> Insert Shops
                   
               </h3> 
             
               
           </div>  
           
           <div class="panel-body"> 
           <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Shop Name
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="shop_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    

                   

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            SHOP Description
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                          
                        <textarea name="shop_desc" cols="19" rows="6" class="form-control">
                              
                            
                              
                          </textarea>
                        
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                             
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="insert" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
               
           </div>
            
        </div>
        
    </div>    
</div>  
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script> 
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['submit'])){
    
    $shop_title = $_POST['shop_title'];
    $shop_desc = $_POST['shop_desc'];
    $userid=$_SESSION['admin_id'];
    
    

    
    $insert_shop = "INSERT INTO SHOP (SHOP_NAME,SHOP_DESCRIPTION,USER_ID) VALUES ('$shop_title',' $shop_desc','$userid')";
    
    $run_shop = oci_parse($conn,$insert_shop);

    

    oci_execute($run_shop);
    
    if($run_shop){
        

       echo "<script>alert('Your shop has been inserted Successfully')</script>"; 
        
        
        echo "<script>window.open('index.php?view_shops','_self')</script>"; 
         
        
    }
   
    
}
}
?>