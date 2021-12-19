<?php
include('../../dbconn.php');
                                    ///////////////////////////////////////////////////////////////////////////
                                  //////////////////////////// // official details /////////////////////////
                                  //////////////////////////////////////////////////////////////////////////

// $CompCode=$_COOKIE['CompId'];



if( !empty($_POST['dapplication']) )
{
                 //              echo "<pre>";
                   // print_r($_POST['empcode']);
                   // print_r($_POST['dapplication']);
                   // print_r($_POST['Department']);COMPCODE
                    
                   $empcode=$_POST['empcode'];
                   $COMPCODE=$_POST['COMPCODE'];

                   $Firstname=$_POST['Firstname'];
                   $Middlename=$_POST['Middlename'];
                   $Lastname=$_POST['Lastname'];
                     $branch=$_POST['branch'];
                     $dept=$_POST['dept'];
                     $Designation=$_POST['Designation'];
                     $Grade=$_POST['Grade'];
                     $cat=$_POST['cat'];
                     $reason=$_POST['reason'];                                  
                   $dapplication=$_POST['dapplication'];
                    $dconfirm=$_POST['dconfirm'];
                  
                    $djoin=$_POST['djoin'];
                    $dleft=$_POST['dleft'];
                     $pan=$_POST['pan'];                 
                     $pfnumber=$_POST['pfnumber'];
                    $esic=$_POST['esic'];
                    $licnumber=$_POST['licnumber'];
                    $accnumber=$_POST['accnumber'];
                    $bankname=$_POST['bankname'];
                    $payment=$_POST['payment'];               
                    /*$query="INSERT INTO `empmast`(`EMPCODE`,`FIRSTNAME`,`MIDDLENAME`,`LASTNAME`,`CATGCODE`,`DESIGCODE`,
                    `DATEOFAPP`,`DATEOFCONF`,`DATEOFJOIN`,`DATEOFLEFT`,`PFNO`,`ESICNO`,`PANNO`,`BANKCODE`,`BANKACNO`,
                    `LICNO`,`COMPCODE`,`TermReason`,`BRANCHCODE`,`DEPTCODE`,`GRADE`,`PAYBY`) VALUES 
                    ('$empcode','$Firstname','$Middlename','$Lastname','$cat','$Designation',
                    '$dapplication','$dconfirm','$djoin','$dleft','$pfnumber','$esic','$pan','$bankname','$accnumber','$licnumber','$CompCode','$reason','$branch','$Department','$Grade','$payment')";*/


                         $query="UPDATE `empmast` SET `FIRSTNAME`='$Firstname',`MIDDLENAME`='$Middlename',`LASTNAME`='$Lastname',
                     `CATGCODE`='$cat',`DESIGCODE`='$Designation',`DATEOFAPP`='$dapplication' ,`DATEOFCONF`='$dconfirm',
                     `DATEOFJOIN`='$djoin', `DATEOFLEFT`='$dleft',`PFNO`='$pfnumber' ,`ESICNO`='$esic',
                     `PANNO`='$pan', `BANKCODE`='$bankname',`BANKACNO`='$accnumber' ,`LICNO`='$licnumber',
                     `BRANCHCODE`='$branch' ,`DEPTCODE`='$dept',`GRADE`='$Grade' ,`PAYBY`='$payment' WHERE `EMPCODE`='$empcode' AND `COMPCODE`='$COMPCODE'";
                    mysqli_query($conn1,$query);
                   
                      echo "<pre>";
                     print_r($_POST['empcode']);
                     print_r($query); 
                                 
                     //  exit();
                    
                    }
                 
                                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                                           ////////////////////////////////// personal details/////////////////////////////////////////////////////
                                           ////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*&& !empty($_POST['city1'])  && !empty($_POST['pincode1']) 
                && !empty($_POST['contactnumber']) && !empty($_POST['mobilenumber']) && !empty($_POST['email']) && !empty($_POST['passport']) 
                && !empty($_POST['placeissue']) && !empty($_POST['dateissue']) && !empty($_POST['dateissue']) && !empty($_POST['dob'])              
                && !empty($_POST['birthplace']) && !empty($_POST['PermenantAddres']) && !empty($_POST['city2'])  && !empty($_POST['pincode2']) 
                &&  !empty($_POST['ContactNumber'])*/
                
             
            if (!empty($_POST['presentaddrress']) )
    {                   
                             
           
                         $empcode=$_POST['empcode']; 
                         $COMPCODE=$_POST['COMPCODE'];                      

                         $presentaddrress=$_POST['presentaddrress'];                    
                         $pincode1=$_POST['pincode1'];
                         $contactnumber=$_POST['contactnumber'];
                         $mobilenumber=$_POST['mobilenumber'];
                         $email=$_POST['email'];
                         $passport=$_POST['passport'];
                         $placeissue=$_POST['placeissue'];
                         $dateissue=$_POST['dateissue'];
                         $dateexpiry=$_POST['dateexpiry'];
                         $dob=$_POST['dob'];
                         $birthplace=$_POST['birthplace'];
                         $PermenantAddres=$_POST['PermenantAddres'];
                         $city1=$_POST['city1'];
                         $city2=$_POST['city2'];
                          $pincode2=$_POST['pincode2'];
                          $perContactNumber=$_POST['perContactNumber'];
                          $Nationality=$_POST['Nationality'];
                          $LanguageKnown=$_POST['LanguageKnown'];
                          $BloodGroup=$_POST['BloodGroup'];
                          $Drivingliecence=$_POST['Drivingliecence'];   
                           $Name=$_POST['Name'];
                          $Contact=$_POST['Contact'];
                          $gender=$_POST['gender'];
                          $MaritalStatus=$_POST['MaritalStatus'];
                     
                          
                     // print_r($query);                 
                     //  exit();
       
                     $query="UPDATE `empmast` SET `PRESADDR`='$presentaddrress',`PRESCITY`='$city1',`PRESPINCODE`='$pincode1',
                     `PRESCONTACTNO`='$contactnumber',`DATEOFBIRTH`='$dob',`MobileNo`='$mobilenumber' ,`SEX`='$gender',
                     `MARITALSTAT`='$MaritalStatus', `BIRTHPLACE`='$birthplace',`PERMADDR`='$PermenantAddres' ,`PERMCITY`='$city2',
                     `PERMPINCODE`='$pincode2', `PERMCONTACTNO`='$perContactNumber',`PASSPORTNO`='$passport' ,`DATEOFISSUE`='$dateissue',
                     `DATEOFEXPIRY`='$dateexpiry' ,`PLACEOFISSUE`='$placeissue',`EMAIL`='$email' ,`NATIONALITY`='$Nationality',
                     `DrvLicense`='$Drivingliecence', `LangKnown`='$LanguageKnown',`EmgName`='$Name' ,`EmgNo`='$Contact',
                     `BLOODCODE`='$BloodGroup' WHERE `EMPCODE`='$empcode' AND `COMPCODE`='$COMPCODE'";
                        mysqli_query($conn1,$query);
                                      // echo "<pre>";
                                         print_r($query);                 
                                          // exit();
             }









                              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                              //////////////////////////////////////////////////////////////family details////////////////////////////////////////////////////////
                              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






                                 if(isset($_POST['FatherName']) && isset($_POST['MotherName']) && isset($_POST['SpouseName']) && isset($_POST['NofChild']) && isset($_POST['empcode']) )
                                     {      
                                     $empcode=$_POST['empcode'];         
                                  $FatherName=$_POST['FatherName'];
                                  $MotherName=$_POST['MotherName'];
                                  $SpouseName=$_POST['SpouseName'];
                                  $NofChild=$_POST['NofChild'];
                                   $COMPCODE=$_POST['COMPCODE'];                      

                                 $query="UPDATE `empmast` SET `FatherName`='$FatherName',`MotherName`='$MotherName',`SpouseName`='$SpouseName',`NoOfChildren`='$NofChild' WHERE `EMPCODE`='$empcode' AND `CompCode`='$COMPCODE'";
                                 // $query="INSERT INTO `empmast`(`FatherName`,`MotherName`,`SpouseName`,`NoOfChildren`) VALUES ('$FatherName','$MotherName','$SpouseName','$NofChild')";
                                 mysqli_query($conn1,$query);
                                  // echo "<pre>";
                                           print_r($query);                 
                                    //         exit();
                                             }






                      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                      //////////////////////////////////////////////////////////////qualification details/////////////////////////////////////////////////
                      //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






                                   if(isset($_POST['edu']) && isset($_POST['eduquali']) && isset($_POST['empcode']) )
                                   {        
                                                              $empcode=$_POST['empcode'];  
                                                              $edu=$_POST['edu'];
                                                              $eduquali=$_POST['eduquali'];
                                                               $COMPCODE=$_POST['COMPCODE'];                      

                                                             
                                                   $query="UPDATE `empmast` SET `EDUCATION`='$edu',`EDUQUAL`='$eduquali' WHERE `EMPCODE`='$empcode' AND `CompCode`='$COMPCODE'";
                                                   mysqli_query($conn1,$query);
                                                    // echo "<pre>";
                                                             print_r($query);                 
                                                             //  exit();
                                     }





                                                                                                
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              //////////////////////////////////////////////////////////////qualification details////////////////////////////////////////////////////////
               //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






                                     if(isset($_POST['reference']) && isset($_POST['Relation']) && isset($_POST['empcode']) )
                                     {        
                                                                $empcode=$_POST['empcode'];  
                                                                $reference=$_POST['reference'];
                                                                $Relation=$_POST['Relation'];
                                                                $contact=$_POST['contact'];
                                                                $COMPCODE=$_POST['COMPCODE'];                      

                                                               
                                $query="UPDATE `empmast` SET `REFNAME`='$reference',`RELATION`='$Relation',`CONTACT`='$contact'  WHERE `EMPCODE`='$empcode' AND `CompCode`='$COMPCODE'";
                                                    $res=mysqli_query($conn1,$query);
                                                      echo "<pre>";
                                                               print_r($query); 
                                                                 // echo "<pre>";
                                                                 // print_r($res);                 
                                                                 //  exit();
                                         }
                                
                           //////////////////////////////////// Delete Employee experiance///////////////////////
                    
                         if(isset($_POST['deleteid']))
                         {
                          $EmpCode=$_POST['deleteid'];
                          // var_dump($DeptCode);
                          // exit();
                        
                          $query ="DELETE FROM `experiance` WHERE `EmpCode`='$EmpCode'";
                          mysqli_query($conn1,$query);
                          // var_dump($query);
                          if($query)
                          {
                          echo "yes";
                          }
                      }
                         
              ?>