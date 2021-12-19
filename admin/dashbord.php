
<?php
session_start();

    if(isset($_SESSION['id']))
    {
       echo "";
       
    }
    else
    {
        header('location:../login.php');
    }
    include('../dbconn.php');
     $sql="SELECT * FROM `companydetails`;";

      $run=mysqli_query($conn,$sql);
      $data=mysqli_fetch_assoc($run);
      
?>




  <?php

  
  include('sidebar.php');


   ?>


  
       


