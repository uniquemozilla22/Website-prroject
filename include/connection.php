<?php 
$conn = oci_connect('Example', 'unique1-2', '//localhost/xe'); 
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit; } 
    
    ?>

   