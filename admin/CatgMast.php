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
    <title>Category Master</title>
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
    <?php include('dashbord.php'); ?>
    <div class="container-fluid">
      <div class="well well-sm">
        <p style="text-align: center;font-size: 30px;color: #4B4276;font-weight: bold;"> Category Master</p></div>
        <div class="row">
          
          <div class="col-lg-2">
          </div>
          <div class="col-lg-4 m-auto">
            <form class="ajaxForm">
              <div class="container box">
                
                <label>Enter Category Code</label><br>
                <input type="text" name="dc" id="dc" class="form-control"  required />
                <br>
                <label>Enter Category Name</label><br>
                <input type="text" name="dn" id="dn" class="form-control"  required/>
                <br>
                <label>Enter Category Status</label><br>
                <input type="text" name="sc" id="sc" class="form-control"  required/>
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
            
            <div>
              <?php
              echo  "<table id='myTable'  width='100%' border=0>
                <thead>
                  <tr>
                    <td><strong>Category Code</strong></td>
                    <td><strong>Category Name</strong></td>
                    <td><strong>Category status</strong></td>
                    <td><strong>Action</strong></td>
                  </tr>
                </thead>";
                $qry="SELECT * FROM `catgmast`";
                
                $result = mysqli_query($conn1,$qry);
                
                
                while($res = mysqli_fetch_array($result)) {
                $dcode = "'".trim($res['CatgCode'])."'";
                echo "<tr>";
                  echo "<td >".$res['CatgCode']."</td>";
                  echo "<td >".$res['CatgName']."</td>";
                  echo "<td >".$res['CatgStat']."</td>";
                  echo '<td> <button onclick="GetUserDetails('.$dcode.')" class="btn btn-info edit"  data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger" onclick="DeleteUser('.$dcode.')"><i class="fas fa-trash"></i></button></td></tr>';
                  
                  }
                  ?>
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
                        <h4 class='modal-title' align='center'>Category Master</h4>
                      </div>
                      <div class='modal-body' id="update_data">
                        <label for="Update_dc">Update Category Code</lable>
                          <input type='text' name='updatecatcode' id='updatecatcode' value="">
                          <label for="Update_dn">Update Category Name</lable>
                            <input type='text' name='updatecatname' id='updatecatname' value="">
                            <label for="Update_sc">Update Category Status</lable>
                              <input type='text' name='updatecatsts' id='updatecatsts' value="">
                              <input type='hidden' name='oldcatcode' id='oldcatcode' value="">
                            </div>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-success' data-dismiss='modal' onclick='updaterecord()'>Update</button>
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
            
            function addrecord()
            
            {
            var firstname =$('#dc').val();
            var lastname =$('#dn').val();
            var CatgStat =$('#sc').val();
            $.ajax({
            url:"backend/Catgbackend.php",
            dataType:'json',
            type:'POST',
            data:{
            firstname:firstname,
            lastname:lastname,
            CatgStat:CatgStat,
            
            },
            success:function(res){
            if( res =="exist" )
            {
            alert("Category code and name should be unique!!");
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
            url:"backend/Catgbackend.php",
            type:'POST',
            data:{
            id:id
            },
            success:function(data,status){
            var user =JSON.parse(data);
            
            $('#update_data #updatecatcode').val(user.CatgCode);
            $('#update_data #updatecatname').val(user.CatgName);
            $('#update_data #updatecatsts').val(user.CatgStat);
            $('#update_data #oldcatcode').val(user.CatgCode);
            
            }
            });
            
            }
            
            
            function updaterecord()
            {
            var firstname =$('#update_data #updatecatcode ').val();
            var lastname =$('#update_data #updatecatname').val();
            var Update_sc=$('#update_data #updatecatsts').val();
            var oldcatcode=$('#update_data #oldcatcode').val();
            $.ajax({
            url:"backend/Catgbackend.php",
            type:'POST',
            data:{
            firstname:firstname,
            lastname:lastname,
            // hidden_user_id:hidden_user_id,
            Update_sc :Update_sc,
            oldcatcode:oldcatcode
            },
            success:function(data,status)
            {
            
            $('#myModal').modal("hide");
            location.reload(true);
            alert("Details successfully Updated!!");
            }
            });
            }
            function DeleteUser(deleteid)
            {
            // var DelId = deleteid ;
            var conf = confirm("Are you sure?");
            
            if(conf==true){
            $.ajax({
            url:"backend/Catgbackend.php",
            type:"POST",
            data: { deleteid : deleteid },
            success:function(data,status){
            location.reload(true);
            alert("Record successfully Deleted!!");
            
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