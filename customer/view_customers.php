<?php 
    
   // session_start();
    include("includes/connection.php");
    if($_SESSION['customer_type']!='customer'){
        echo "<script>window.open('../login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Customers
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Customers
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Customer Name: </th>
                                <th> Customer E-Mail: </th>
                                <th> Customer Phone: </th>
                                <th> Customer Address: </th>
                                <th> Customer Image: </th>
                                <th> Customer Description: </th>
                                <th> Edit: </th>
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_customers = "select * from USERA where USER_TYPE='customer'";
                                
                                $run_customers = oci_parse($conn,$get_customers);

                                oci_execute($run_customers);
          
                                while($row_customers=oci_fetch_array($run_customers)){
                                    
                                    $customers_id = $row_customers['USER_ID'];
                                    
                                    $customers_name = $row_customers['USERNAME'];
                                    
                                    $customers_email = $row_customers['USER_EMAIL'];
                                    
                                    $customers_phone = $row_customers['USER_PHONE'];
                                    
                                    $customers_address=$row_customers['USER_ADDRESS'];

                                    $customers_img=$row_customers['USER_IMAGE'];

                                    $customers_description=$row_customers['USER_DESCRIPTION'];
                                    
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customers_name; ?> </td>
                                <td> <?php echo $customers_email; ?> </td>
                                <td> <?php echo $customers_phone; ?></td>
                                <td> <?php echo $customers_address; ?></td>
                                <td> <img src="image/<?php echo $customers_img; ?>" width="60" height="60"></td>
                                <td> <?php echo $customers_description; ?></td>
                                <td>    
                                     
                                     <a href="index.php?edit_profile=<?php echo $user_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
                                     </a> 

                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?delete_user=<?php echo $user_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>