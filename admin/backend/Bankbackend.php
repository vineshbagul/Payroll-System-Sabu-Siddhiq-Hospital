  <?php 




  include('../../dbconn.php');



    $CompCode=$_COOKIE['CompId'];

         
           if((!empty($_POST['branch'])) && (!empty($_POST['firstname'])) && (!empty($_POST['lastname']))) 
           {  
              // print_r($_POST['branch']);
              // print_r($_POST['firstname']);
              // exit();
                      $firstname = $_POST['firstname'];
                      $lastname = $_POST['lastname'];              
                      $branch=$_POST['branch'];

              $sql = "SELECT * FROM `bankmast` WHERE `BankCode`='$firstname' OR `BankName`='$lastname'";
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
                      $query="INSERT INTO `bankmast`(`BankCode`, `BankName`, `Branch`,`CompCode`) VALUES ('$firstname','$lastname','$branch','$CompCode')";
                      $results = mysqli_query($conn1, $query);
                      $res = 'new';                
                       echo json_encode($res);
                       // print_r($res);
                       exit();

                 }


           }   


          


      //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////// read record in modal //////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




  if(isset($_POST['id'])!="")
  {

  
       $BankCode = $_POST['id'];
       $qry="SELECT * FROM `bankmast` WHERE `BankCode` = '$BankCode' AND `CompCode`='$CompCode'";

       $result = mysqli_query($conn1,$qry);
       $result=mysqli_fetch_assoc($result);
       echo json_encode($result);
      

 }


  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////// Update daata///////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




   if(isset($_POST['firstname']))

    {   

          $firstname=$_POST['firstname'];
          $lastname=$_POST['lastname'];
          $BankCode=$_POST['BankCode'];
          $oldbankcode=$_POST['oldbankcode'];
          $qry="UPDATE `bankmast` SET `BankCode`='$firstname',`BankName`='$lastname',`Branch`='$BankCode' WHERE `CompCode`='$CompCode' AND `BankCode`='$oldbankcode'";
          $result = mysqli_query($conn1,$qry);
          var_dump($qry);

    }







    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////Delete record ///////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



           if(isset($_POST['deleteid']))
           {
            $BankCode=$_POST['deleteid'];
            // var_dump($DeptCode);
            // exit();
          
            $CompCode=$_COOKIE['CompId'];
            $query ="DELETE FROM `bankmast` WHERE `BankCode`='$BankCode'";
            mysqli_query($conn1,$query);
            // var_dump($query);

            }




          
  ?>

     
