    <?php 




    include('../../dbconn.php');

    $CompCode=$_COOKIE['CompId'];
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////// Add record///////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




             extract($_POST);
             if ( !empty($_POST['CatgStat']) && !empty($_POST['firstname']) && !empty($_POST['lastname']))
             {


                $sql = "SELECT * FROM `catgmast` WHERE `CatgCode`='$firstname' OR `CatgName`='$lastname'";
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
                  $query="INSERT INTO `catgmast`(`CatgCode`, `CatgName`, `CatgStat`,`CompCode`) VALUES ('$firstname','$lastname','$CatgStat','$CompCode')";
                  $results = mysqli_query($conn1, $query);
                  $res = 'new';                
                   echo json_encode($res);
                   // print_r($res);
                   exit();

                    }

             }   




        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////// read record in modal ////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



                  if(!empty($_POST['id']))
                  
                {
                     $CompCode=$_COOKIE['CompId'];
                     $CatgCode = $_POST['id'];
                     $qry="SELECT * FROM `catgmast` WHERE `CatgCode` = '$CatgCode' AND `CompCode`='$CompCode'";
                     $result = mysqli_query($conn1,$qry);
                     $result=mysqli_fetch_assoc($result);
                     echo json_encode($result);

                  }
                  

                    
                 



     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////// Update daata///////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




     if(isset($_POST['firstname']))
  {


        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $CompCode=$_COOKIE['CompId'];
        $Update_sc=$_POST['Update_sc'];
        $oldcatcode=$_POST['oldcatcode'];
     
        $qry="UPDATE `catgmast` SET `CatgCode`='$firstname',`CatgName`='$lastname',`CatgStat`='$Update_sc' WHERE `CompCode`='$CompCode' AND `CatgCode`='$oldcatcode'";
        $result = mysqli_query($conn1,$qry);
     
      

  }







      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////// // Delete record ////////////////////////////////////////////////////////////////////
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


             if(isset($_POST['deleteid']))
             {
              $CatgCode=$_POST['deleteid'];
              $CompCode=$_COOKIE['CompId'];
              $query ="DELETE FROM `catgmast` WHERE `CatgCode`='$CatgCode' AND `CompCode`='$CompCode' ";
              mysqli_query($conn1,$query);
              var_dump($query);

              }




  ?>
       
