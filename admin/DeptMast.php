      <?php

      if(isset($_SESSION['id']))
               {  
                  header('location:DeptMast.php');
                
               }

                 
      ?>



      <!DOCTYPE html>
      <html>
      <head>
       

      	<meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<title>Department Master</title>
      	<link rel="stylesheet" href="../css/stylesheet.css">
      <style type="text/css">
        .button {
        
        /*font-size: 10px;*/
        margin: 10px 10px;
             
          font-weight: bold;
          line-height: 2em;
        /*margin: 2px 2px;*/
        padding: 8px 12px;
        border-radius: 8px;
        
      }




      </style>

      </head>

      <body>
        <?php  include('dashbord.php'); 
        $CompCode=$_COOKIE['CompId'];       
         ?>



      <div class="container-fluid"> 
         <div class="well well-sm">
      <p style="text-align: center;font-size: 30px;color: #4B4276;font-weight: bold;"> Department Master</p></div>
        <div class="row">

         
           <div class="col-lg-2">      
          </div>
          <div class="col-lg-4 m-auto">
            <form class="ajaxForm">
              <div class="container box">
           
                <label>Enter Department Code</label><br>
                <input type="text" name="dc" id="dc" class="form-control"  required />
                <br>
                <label>Enter Department Name</label><br>
                <input type="text" name="dn" id="dn" class="form-control"  required/>
                <br>
                <div>
                <input type="hidden" name="id" id="user_id">
                <input type="hidden" name="CompCode"><br>
                <button type="button" name="add" onclick="addrecord()" id="b3"  class="btn btn-primary">Add</button>
              </div>
           </div> 
          </div>
          </form>
          <div class="col-lg-6 m-auto" >
            <div class="alert alert-success" id="success-alert">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <p align="center"><strong >Success! </strong>
           You are successfully logged in.</p>
      </div>
            <div>
              <div >
              	<?php
              	// if(isset($_POST['readrecord'])){



      echo  "<table id='myTable'  width='100%' border=0>
          <thead>
              <tr>
                  <td><strong>Department Code</strong></td>          
                  <td><strong>Department Name</strong></td>
                  <td><strong>Action</strong></td>

                
              </tr>
          </thead>";
         
         
          
           $qry="SELECT * FROM `deptmast` WHERE `deptmast`.`CompCode`='$CompCode'";
              

          $result = mysqli_query($conn1,$qry);
         
          
          while($res = mysqli_fetch_array($result)) {
             $dcode = "'".trim($res['DeptCode'])."'";

              echo "<tr>";
              echo "<td >".$res['DeptCode']."</td>";
              echo "<td >".$res['DeptName']."</td>";


              echo '<td> <button onclick="GetUserDetails('.$dcode.')" class="btn btn-info edit"  data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" onclick="DeleteUser('.$dcode.')"><i class="fas fa-trash"></i></button></td></tr>';
          
      }
      ?>

              </div>
            </div>
              <!-- Modal -->
      <div id='myModal' class='modal fade' id="update_user_modal" role='dialog'>
             <div class='modal-dialog'>

          <!-- Modal content-->
                <div class='modal-content'>
                 <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                   <h4 class='modal-title' align='center'>Department Master</h4>
               </div>
                          <div class='modal-body' id="update_data">
                            <label for="Update_dc">Update Department Code</lable>
                            <input type='text' name='dc' id='dc'  value="">
                            <label for="Update_dn">Update Department Name</lable>
                            <input type='text' name='dn' id='dn' value="">
                            <input type='hidden' name='dc1' id='dc1'  value="">            
                          </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-success' data-dismiss='modal' onclick='updaterecord()'>update</button>      
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                      </div>
          </div>

        </div>
      </div>



          </table>    
          </div>
        </div>
      </div>
      </div>








       
      <script>
                         


                          $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
                         $("#success-alert").alert('close');
                          });








        function addrecord()
        
        {
          var firstname =$('#dc').val();
          var lastname =$('#dn').val();
          var CompCode=$('#CompCode').val();


          $.ajax({
            url:"backend/Deptbackend.php",
            type:'POST',
            dataType:'json',            
            data:{ 
              firstname:firstname,
              lastname:lastname,
              CompCode :CompCode

            },

            success:function(res){


                if( res =="exist" )
                    {
                      alert("Department code and name should be unique!!");
                    }
                    else if( res =="new" )
                    {
                      alert('Record successfully Added!!');
                    }  
               
                location.reload(true);

              }

          });
          
        }




            function GetUserDetails(id){
               	$.ajax({
    		        url:"backend/Deptbackend.php",
    		        type:'POST',
    		        data:{ 
    		          id:id
    		        },
    			           	success:function(data,status){
              			  var user =JSON.parse(data);
                      
              				$('#update_data #dc').val(user.DeptCode);
        				    	$('#update_data #dn').val(user.DeptName);
                      $('#update_data #dc1').val(user.DeptCode);
     
            		}

          		});
              }
              
       

        function updaterecord()
        {
          var update_dc =$('#update_data #dc').val();
          var update_dn =$('#update_data #dn').val();
          var olddc =$('#update_data #dc1').val();



          // console.log(olddc);
          // console.log(update_dc);
          // console.log(update_dn);

          $.ajax({
            url:"backend/Deptbackend.php",
            type:'POST',
            data:{dc: update_dc, dn: update_dn, dc1: olddc },
            success:function(data,status){

             //  console.log(data);
            	// console.log(status);
                location.reload(true);
          alert("Details successfully Updated!!");


              $('#myModal').modal("hide");
            }

          });

        }



        function DeleteUser(deleteid)
        {  
           // var DelId = deleteid ; 
            var conf = confirm("Are you sure?");
           
            if(conf==true){

              $.ajax({

              url:"backend/Deptbackend.php",
              type:"POST",
              data: { deleteid : deleteid },
              success:function(data,status){
               alert('Record successfully Deleted!!');               
                location.reload(true);
              }

                     });
            }

        }


      </script>
       <script>
         jQuery(document).ready( function () {
                              jQuery('#myTable').DataTable({
                                  lengthMenu: [5,10,15,100]
                              });
                          } );
      </script>


      </body>	

      </html>