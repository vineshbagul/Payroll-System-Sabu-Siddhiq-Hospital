  <?php 




  include('../../dbconn.php');


              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             //////////////////////////////////////////// add rrecord//////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


       
         $CompCode=$_COOKIE['CompId'];
               // extract($_POST);
             


            if(isset($_POST['firstname']) && isset($_POST['lastname']) && (!empty($_POST['firstname'])) && (!empty($_POST['lastname'])))
               {
                      $firstname = $_POST['firstname'];
                      $lastname = $_POST['lastname'];              
                      $CompCode=$_COOKIE['CompId'];

              $sql = "SELECT * FROM `deptmast` WHERE `DeptCode`='$firstname' OR `DeptName`='$lastname'";
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
                $query = "INSERT INTO `deptmast`(`DeptCode`, `DeptName`, `CompCode`) VALUES ('$firstname','$lastname','$CompCode')";
                $results = mysqli_query($conn1, $query);
                   // var_dump($results);

                  $res = 'new';                
                 echo json_encode($res);
                 // print_r($res);
                 exit();

                  }
                  
               }  
              




 
  




              ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              // ////////////////////////////////////////read record in modal //////////////////////////////////////////////////
              /////////////////////////////////////////////////////////////////////////////////////////////////////////////////



          if(isset($_POST['id']) && isset($_POST['id'])!="")
          {    
            $CompCode=$_COOKIE['CompId'];
            $DeptCode = $_POST['id'];

            $qry="SELECT * FROM `deptmast` WHERE `DeptCode` = '$DeptCode' AND `CompCode`='$CompCode'";
            $result = mysqli_query($conn1,$qry);
            $result=mysqli_fetch_assoc($result);
            echo json_encode($result);
            //echo "<pre>";print_r($result);exit();
              // exit(mysqli_error());
           //  $response =array();
           // if(mysqli_num_rows($result) > 0){
           //    while ($row = mysqli_fetch_assoc($result)) {
           //        $response = $row;
           //    }
           //  }
           //  echo json_encode($resonse);
           //  else
           // {
           //  $response['status']= 200;
           //  $response['message']="Data not found!!";
           // }

           
            
            }
          //  $response =array();
          //  if(mysqli_num_rows($result) > 0){
          //   while ($row = mysqli_fetch_assoc($result)) {
          //     $response = $row;
          //     }
          //     }
          //   else
          //  {
          //   $response['status']= 200;
          //   $response['message']="Data not found!!";
          //  }

          //  echo json_encode($resonse);
          // }
          //  else
          //  {
          //   $response['status']= 200;
          //   $response['message']="Invalid http_request!!";
          //  }




              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             //////////////////////////////////////////////////////////////// // Update daata//////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





         if(isset($_POST['dc']) && isset($_POST['dn']) && isset($_POST['dc1']))
            {
             // echo "<pre>";
            // print_r($_POST['dc']);exit();
            // $update_dc=$_POST['dc'];
            // setCookie('udc',$update_dc,time()+(10 * 365 * 24 * 60 * 60));       
            // $udc=$_COOKIE['udc'];

           
            // alert($update_dc);

            $update_dc=$_POST['dc'];
            $update_dn=$_POST['dn'];

            $CompCode=$_COOKIE['CompId'];
            $olddc=$_POST['dc1'];

            
          

            
           
            // $qry="UPDATE `deptmast` SET `DeptCode`='$update_dc',`DeptName`='$update_dn' WHERE  `DeptCode`='$udc' AND `CompCode`='$CompCode'";
            $qry="UPDATE `deptmast` SET `DeptCode`='$update_dc',`DeptName`='$update_dn' WHERE `DeptCode`='$olddc' AND `CompCode`='$CompCode'";
            $result = mysqli_query($conn1,$qry);
            return json_encode($result);
            // setCookie('udc',"",time()-(10 * 365 * 24 * 60 * 30));       


            // echo "<pre>";
            // print_r($qry);exit();
            }

       






                  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                 // ////////////////////////////////////////////////Delete record ////////////////////////////////////////////////////
               ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                     if(isset($_POST['deleteid']))
                     {
                      $DeptCode=$_POST['deleteid'];
                      // var_dump($DeptCode);
                      // exit();
                    
                      $CompCode=$_COOKIE['CompId'];
                      $query ="DELETE FROM `deptmast` WHERE `DeptCode`='$DeptCode' AND `CompCode`='$CompCode'";
                      mysqli_query($conn1,$query);
                      // var_dump($query);

                      }




          
  ?>

    
 