<?php


$servername1 = "localhost";
$database1 = "payroll";
$username1 = "root";
$password1 = "";

$conn = mysqli_connect($servername1, $username1, $password1, $database1);



 // $conn= mysqli_connect('localhost','root','','saimondb');



 if ($conn == false)
 {
     echo "connection is failed";
    
 }
 
 
 $servername2 = "localhost";
$database2 = "payroll1";
$username2 = "root";
$password2 = "";

$conn1 = mysqli_connect($servername2, $username2, $password2, $database2);

 if ($conn == false)
 {
     echo "connection is failed";
    
 }


?>