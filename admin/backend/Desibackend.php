  <?php 




  include('../../dbconn.php');

  $CompCode=$_COOKIE['CompId'];


//////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Add Record////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////
 
           if(!empty($_POST['firstname']) && !empty($_POST['lastname']))

           {   

              $sql = "SELECT * FROM `desimast` WHERE `DesigCode`='".($_POST['firstname'])."' OR `DesigName`='".($_POST['lastname'])."'";
              $res=0;
              $results = mysqli_query($conn1, $sql);
                  
              if (mysqli_num_rows($results) > 0) 
                {
                $res = 'exist';
                echo json_encode($res);
                exit();
                 }
              else
                 {                
               $query="INSERT INTO `desimast`(`DesigCode`, `DesigName`, `CompCode`) VALUES ( '".$_POST['firstname']."','".$_POST['lastname']."','$CompCode')";
                $results = mysqli_query($conn1, $query);
                   // var_dump($results);

                  $res = 'new';                
                 echo json_encode($res);
                 // print_r($res);
                 exit();

                  }

          }   



      ////////////////////////////////////////////////////////////////////////////////////////////////
      ///////////////////////////////////// read record in modal //////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////
      

                if(isset($_POST['id']) && isset($_POST['id'])!="")
                {

                  $CompCode=$_COOKIE['CompId'];
                  $DesigCode = $_POST['id'];
                  $qry="SELECT * FROM `desimast` WHERE `DesigCode` = '$DesigCode' AND `CompCode`='$CompCode'";
                          $result = mysqli_query($conn1,$qry);
                          $result=mysqli_fetch_assoc($result);
                          echo json_encode($result);
                          // print_r($result);

                 }

   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////// Update daata///////////////////////////////////////////////////
   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                   if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['desicodeold']))
                {


                $firstname=$_POST['firstname'];
                $lastname=$_POST['lastname'];
                $CompCode=$_COOKIE['CompId'];
                $olddc=$_POST['desicodeold'];


                $qry="UPDATE `desimast` SET `DesigCode`='$firstname',`DesigName`='$lastname' WHERE `CompCode`='$CompCode' AND `olddc`='$olddc'";
                      $result = mysqli_query($conn1,$qry);

                }



 
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////// Delete record /////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////


           if(isset($_POST['deleteid']))
           {
            $DesigCode=$_POST['deleteid'];
            // var_dump($DeptCode);
            // exit();
          
            $CompCode=$_COOKIE['CompId'];
            $query ="DELETE FROM `desimast` WHERE `DesigCode`='$DesigCode' AND `CompCode`='$CompCode'";
            mysqli_query($conn1,$query);
            // var_dump($query);

            }




          
  ?>

     
 