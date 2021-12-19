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
    <title>Blood Master</title>
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
    <?php
    include('dashbord.php');
    ?>
    <div class="container-fluid">
      <div class="well well-sm">
        <p style="text-align: center;font-size: 30px;color: #4B4276;font-weight: bold;"> Blood Master</p></div>
        <div class="row">
          
          <div class="col-lg-2">
          </div>
          <div class="col-lg-4 m-auto">
            <form class="ajaxForm">
              <div class="container box">
                
                <label>Enter Blood Code</label><br>
                <input type="text" name="dc" id="dc" class="form-control"  required />
                <br>
                <label>Enter Blood Group</label><br>
                <input type="text" name="dn" id="dn" class="form-control"  required/>
                <br>
                <div>
                  <input type="hidden" name="id" id="user_id">
                  <input type="hidden" name="CompCode">&nbsp;
                  <button type="button" name="add" onclick="addrecord()" id="b3" class="btn btn-primary">Add</button>
                </div>
              </div>
            </div>
          </form>
          <div class="col-lg-6 m-auto" >
            
            <div><?php
              echo  "<table id='myTable'  width='100%' border=0>
                <thead>
                  <tr>
                    <td><strong>Blood Code</strong></td>
                    <td><strong>Blood Group</strong></td>
                    <td><strong>Action</strong></td>
                    
                  </tr>
                </thead>";
                
                
                
                $qry="SELECT * FROM `BloodMast`";
                
                $result = mysqli_query($conn1,$qry);
                
                
                while($res = mysqli_fetch_array($result)) {
                $dcode = "'".trim($res['BloodCode'])."'";
                echo "<tr>";
                  echo "<td >".$res['BloodCode']."</td>";
                  echo "<td >".$res['BloodGroup']."</td>";
                  echo '<td> <button onclick="GetUserDetails('.$dcode.')" class="btn btn-info edit"  data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger" onclick="DeleteUser('.$dcode.')"><i class="fas fa-trash"></i></button></td></tr>';
                  
                  }?>
                </div>
                <div>
                  <div id="records_content"></div>
                </div>
                <!-- Modal -->
                <div id='myModal' class='modal fade' id="update_user_modal" role='dialog'>
                  <div class='modal-dialog'>
                    <!-- Modal content-->
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h4 class='modal-title' align='center'>Blood Master</h4>
                      </div>
                      <div class='modal-body' id="update_data">
                        <label for="Update_dc">Update Blood Code</lable>
                          <input type='text' name='dc' id='dc'  >
                          <label for="Update_dn">Update Blood Group</lable>
                            <input type='text' name='dn' id='dn' >
                            <input type='hidden' name='oldcode' id='oldcode' >
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-success' data-dismiss='modal' onclick='updaterecord()'>Update</button>
                            <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                            <input type='hidden' name='' id='hidden_user_id'>
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
          
          
          function addrecord()
          
          {
          var firstname =$('#dc').val();
          var lastname =$('#dn').val();
          
          $.ajax({
          url:"backend/Bloodbackend.php",
          dataType:'json',
          type:'POST',
          data:{
          firstname:firstname,
          lastname:lastname
          
          },
          success:function(res){
          if( res =="exist" )
          {
          alert("Blood code and Group should be unique!!");
          }
          else if( res =="new" )
          {
          alert('Record successfully Added!!');
          }
          location.reload(true);
          
          
          }
          });
          }
          // document.getElementById('b3').onclick = function(){
          //    swal("Department Added!", "You clicked the button!", "success");
          //         };
          function GetUserDetails(id){
          $.ajax({
          url:"backend/Bloodbackend.php",
          type:'POST',
          data:{
          id:id
          },
          success:function(data,status){
          var user =JSON.parse(data);
          
          $('#update_data #dc').val(user.BloodCode);
          $('#update_data #dn').val(user.BloodGroup);
          $('#update_data #oldcode').val(user.BloodCode);
          
          }
          });
          
          }
          
          function updaterecord()
          {
          var firstname1 =$('#update_data #dc').val();
          var lastname1 =$('#update_data #dn').val();
          var oldcode=$('#update_data #oldcode').val();
          // var hidden_user_id =$('hidden_user_id').val();
          $.ajax({
          url:"backend/Bloodbackend.php",
          type:'POST',
          data:{
          firstname1:firstname1,
          lastname1:lastname1,
          // hidden_user_id:hidden_user_id,
          oldcode :oldcode
          },
          success:function(data,status){
          $('#update_user_modal').modal("hide");
          alert('Details successfully Updated!!');
          location.reload(true);
          
          }
          });
          }
          function DeleteUser(deleteid)
          {
          // var DelId = deleteid ;
          var conf = confirm("Are you sure?");
          
          if(conf==true){
          $.ajax({
          url:"backend/Bloodbackend.php",
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