<?php

  include('../../dbconn.php');



if(isset($_POST['empcode']) && isset($_POST['compcode'])){

                  $empcode=$_POST['empcode'];
                $cocode=$_POST['compcode'];

          $query="SELECT * FROM `empmast` WHERE `EMPCODE`='$empcode' AND `COMPCODE`='$cocode'";
          $result=mysqli_query($conn1,$query);
           $result=mysqli_fetch_assoc($result);
          echo json_encode($result);
          // print_r($query);
          //  exit();
               // $res=mysqli_fetch_assoc($result);
              // if($row=mysqli_fetch_array($result))
 // {
 //  $output["FIRSTNAME"] = $row["FIRSTNAME"];
 //  $output["MIDDLENAME"] = $row["MIDDLENAME"];
 
 // }
// echo json_encode($row);

              // echo json_encode($res); 

       //     if(mysqli_num_rows($result)> 0){

       //     if($row=mysqli_fetch_array($result))
       // { 
       //    // $res=mysqli_fetch_assoc($result);
       //       // return json_encode($res);

         


       // }

// } 
        }
       
 ?>
