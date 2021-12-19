<?php

  include('../../dbconn.php');


if(isset($_POST['empcode']) && isset($_POST['compcode'])){
  session_start();

$empcode=$_POST['empcode'];
$cocode=$_POST['compcode'];
// print_r($empcode);
// print_r($cocode);
// exit();


          $query="DELETE FROM `empmast` WHERE `EMPCODE`='$empcode' AND `COMPCODE`='$cocode'";
          $result=mysqli_query($conn1,$query);
          // print_r($query);
          //  exit();
             // $res=mysqli_fetch_assoc($result);
             // return json_encode($res);
           
         }

 ?>
