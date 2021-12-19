  <?php 




  include('../../dbconn.php');

  $CompCode=$_COOKIE['CompId'];
  if(isset($_POST['readrecord'])){



  echo  "<table id='myTable'  width='100%' border=0>
      <thead>
          <tr>
              <td><strong>Branch Code</strong></td>          
              <td><strong>Branch Name</strong></td>
              <td><strong>State Code</strong></td>

              <td><strong>Action</strong></td>

            
          </tr>
      </thead>";
     
     
      
       $qry="SELECT * FROM `branchmast` WHERE `branchmast`.`CompCode`='$CompCode'";
          

      $result = mysqli_query($conn1,$qry);
     
      
      while($res = mysqli_fetch_array($result)) {
         $dcode = "'".trim($res['BranchCode'])."'";

          echo "<tr>";
          echo "<td >".$res['BranchCode']."</td>";
          echo "<td >".$res['BranchName']."</td>";
          echo "<td >".$res['StateCode']."</td>";



          echo '<td> <button onclick="GetUserDetails('.$dcode.')" class="btn btn-info edit"  data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></button>
        <button class="btn btn-danger" onclick="DeleteUser('.$dcode.')"><i class="fas fa-trash"></i></button></td></tr>';
      
  }
  }



    $CompCode=$_COOKIE['CompId'];



      // read record in modal 

  if(isset($_POST['id']) && isset($_POST['id'])!="")
  {

    $CompCode=$_COOKIE['CompId'];
    $DeptCode = $_POST['id'];
    $qry="SELECT * FROM `branchmast` WHERE `DeptCode` = '$DeptCode' AND `CompCode`='$CompCode'";
    if(!$result = mysqli_query($conn1,$qry)){
      exit(mysqli_error());
    
  }
   $response =array();
   if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      $response = $row;
      }
      }
    else
   {
    $response['status']= 200;
    $response['message']="Data not found!!";
   }

   echo json_encode($resonse);
  }
   else
   {
    $response['status']= 200;
    $response['message']="Invalid http_request!!";
   }





  // Update daata

   if(isset($_POST['firstname']))
{


$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$CompCode=$_COOKIE['CompId'];

$qry="UPDATE `deptmast` SET `DeptCode`='$firstname',`DeptName`='$lastname' WHERE `CompCode`='$CompCode' AND `DeptCode`='$firstname'";
      $result = mysqli_query($conn1,$qry);

}








    // Delete record 


           if(isset($_POST['deleteid']))
           {
            $BranchCode=$_POST['deleteid'];
            // var_dump($DeptCode);
            // exit();
          
            $CompCode=$_COOKIE['CompId'];
            $query ="DELETE FROM `branchmast` WHERE `BranchCode`='$BranchCode' AND `CompCode`='$CompCode'";
            mysqli_query($conn1,$query);
            // var_dump($query);

            }




          
  ?>

     
  <script>
     jQuery(document).ready( function () {
                          jQuery('#myTable').DataTable({
                              lengthMenu: [5,10,15,100]
                          });
                      } );
  </script>