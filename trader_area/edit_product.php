<?php 

session_start();
include("includes/connection.php");
if($_SESSION['admin_type']!='trader'){
    echo "<script>window.open('../login.php','_self')</script>";
    
}else{

?>

<?php 

    if(isset($_GET['edit_product'])){
        
        $edit_id = $_GET['edit_product'];
        
        $get_p = "select * from PRODUCT where PRODUCT_ID='$edit_id'";
        
        $run_edit = oci_parse($conn,$get_p);

        oci_execute($run_edit);
        
        $row_edit = oci_fetch_array($run_edit);
        
        $p_id = $row_edit['PRODUCT_ID'];
        
        $p_title = $row_edit['PRODUCT_NAME'];
        
        $cat = $row_edit['CATEGORY_ID'];
        
        $p_image1 = $row_edit['PRODUCT_IMAGE'];
        
        $p_price = $row_edit['PRODUCT_PRICE'];
        
        $p_keywords = $row_edit['PRODUCT_KEYWORDS'];
        
        $p_desc = $row_edit['PRODUCT_DESCRIPTION'];
        
    }
        
        
        $get_cat = "select * from CATEGORY where CATEGORY_ID='$cat'";
        
        $run_cat = oci_parse($conn,$get_cat);
        
        $row_cat = oci_fetch_array($run_cat);

        oci_execute($run_cat);
        
        $cat_title = $row_cat['CATEGORY_NAME'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Products
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Insert Product 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="cat" class="form-control"><!-- form-control Begin -->
                              
                              <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_cat = "select * from CATEGORY";
                              $run_cat = oci_parse($con,$get_cat);
                              oci_execute($run_cat);
                              
                              while ($row_cat=oci_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['CATEGORY_ID'];
                                  $cat_title = $row_cat['CATEGORY_NAME'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img1" type="file" class="form-control" required>
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Keywords </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="product_desc" cols="19" rows="6" class="form-control">
                              
                              <?php echo $p_desc; ?>
                              
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    $product_title = $_POST['PRODUCT_NAME'];
    $cat = $_POST['cat'];
    $product_price = $_POST['PRODUCT_PRICE'];
    $product_keywords = $_POST['PRODUCT_KEYWORD'];
    $product_desc = $_POST['PRODUCT_DESCRIPTION'];
    
    $product_img1 = $_FILES['PRODUCT_IMAGE']['name'];
    
    $temp_name1 = $_FILES['PRODUCT_IMAGE']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
   
    $update_product = "update PRODUCT set CATEGORY_ID='$cat',PRODUCT_NAME='$product_title',PRODUCT_IMAGE='$product_img1',PRODUCT_KEYWORD='$product_keywords',PRODUCT_DESCRIPTION='$product_desc',PRODUCT_PRICE='$product_price' where PRODUCT_ID='$p_id'";
    
    $run_product = oci_parse($conn,$update_product);
    
    oci_execute($run_product);

    if($run_product){
        
       echo "<script>alert('Your product has been updated Successfully')</script>"; 
        
       echo "<script>window.open('index.php?view_products','_self')</script>"; 
        
    }
    
}

?>


<?php } ?>