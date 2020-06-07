<?php

    $active='Account';
    include("include/header.include.php");
    //include("include/banner.include.php");
?>

   <div id="content"><!-- #content Begin -->
      
           <div class="col-md-12"><!-- col-md-12 Begin -->

               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Register
                   </li>
               </ul><!-- breadcrumb Finish -->

           </div><!-- col-md-12 Finish -->

           <div class="col-md-12"><!-- col-md-3 Begin -->

   <?php

    include("customer/includes/sidebar.include.php");

    ?>




          </div> <!-- col-md-3 finish -->

          <div class="col-md-9"> <!--col-md-9 start-->

          <?php

           if(!isset($_SESSION['USERNAME'])){

               include("customer/customer_login.php");

           }else{

               include("payment_options.php");

           }

           ?>
         </div><!--col-md-9 start-->
       
   </div><!-- #content Finish -->


     </div>




   </div>




   <?php

    include("include/footer.include.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
