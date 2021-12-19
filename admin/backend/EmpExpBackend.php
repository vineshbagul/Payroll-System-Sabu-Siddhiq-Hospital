<?php

  include('../../dbconn.php');



if(isset($_POST['empcode'])){
  
$CompCode=$_COOKIE['CompId'];
$empcode=$_POST['empcode'];
$companyname=$_POST['companyname'];
$fromperiod=$_POST['fromperiod'];

$toperiod=$_POST['toperiod'];
$jobresp=$_POST['jobresp'];
$remark=$_POST['remark'];
$sallary=$_POST['sallary'];
$Designation=$_POST['Designation1'];

// print_r($empcode);
// print_r($cocode);
// exit();
$count=0;
  
          $query="INSERT INTO `experiance`(`compname`, `EmpCode`, `CompCode`, `fromperiod`, `toperiod`, `Designation`, `jobrespons`, `sallary`, `Remark`) VALUES('$companyname','$empcode','$CompCode','$fromperiod','$toperiod','$Designation','$jobresp','$sallary','$remark')";
          $result=mysqli_query($conn1,$query);
//print_r($query);
$data='<table  class="table table-border table-srtiped">

       <tr>
             <td><strong>No.</strong></td>          
              <td><strong>Company Name</strong></td>          
              <td><strong>From Periode </strong></td>
              <td><strong>To periode</strong></td>
              <td><strong>Designation</strong></td>
              <td><strong>Job Responsibility</strong></td>
              <td><strong>Sallary</strong></td>
              <td><strong>Remark</strong></td> 
              <td><strong>Action</strong></td>
          </tr>';
          $query="INSERT INTO `experiance`(`compname`, `EmpCode`, `CompCode`, `fromperiod`, `toperiod`, `Designation1`, `jobrespons`, `sallary`, `Remark`) VALUES('$companyname','$empcode','$CompCode','$fromperiod','$toperiod','$Designation','$jobresp','$sallary','$remark')";
          $result=mysqli_query($conn1,$query);
          // print_r($query);

          $query="SELECT * FROM `experiance` WHERE `EMPCODE`='$empcode' AND `COMPCODE`='$CompCode'";
          $result=mysqli_query($conn1,$query);
          // print_r($query);
          //  exit();
             // $res=mysqli_fetch_assoc($result);
             // return json_encode($res);
        
    

           while($row=mysqli_fetch_array($result))
       {
          //$_SESSION["empmast"] = $row;
               $count++;
        $dcode = "'".trim($row['EmpCode'])."'";                     

          $data .='<tr>
          <td>'.$count.'</td>          
          <td>'.$row['compname'].'</td>
          <td>'.$row['fromperiod'].'</td>
          <td>'.$row['toperiod'].'</td>
          <td>'.$row['Designation'].'</td>
          <td>'.$row['jobrespons'].'</td>
          <td>'.$row['sallary'].'</td>
          <td>'.$row['Remark'].'</td>


          <td>
          <button onclick="DeleteEmpExp('.$dcode.')" class=btn btn-danger>Delete</button>

          </td><tr>';

       } 
   
       

      $data .='</table>';
      echo $data; 
    }
 
 ?>
                                                                                 