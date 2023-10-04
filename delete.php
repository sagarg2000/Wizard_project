<?php 
error_reporting(0);
    include 'config.php';

    $id = $_GET['id'];
     
    $delete="DELETE FROM info WHERE id ='$id' ";
    $sql=mysqli_query($conn,$delete);

    if($sql == true){
       
       ?>
       <meta http-equiv="refresh" content="0; url=http://localhost/wiz_js/view_data.php">
       <?php
          }

          ?>
