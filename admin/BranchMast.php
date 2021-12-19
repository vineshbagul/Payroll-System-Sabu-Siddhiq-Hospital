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
    <title>Branch Master</title>
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
    // add rrecord
    include('dashbord.php');
    $CompCode=$_COOKIE['CompId'];
    extract($_POST);
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['statecode']) && (!empty($_POST['statecode'])) && (!empty($_POST['firstname'])) &&
    (!empty($_POST['lastname'])))
    {
    $query="INSERT INTO `branchmast`(`BranchCode`, `BranchName`, `CompCode`,`statecode`) VALUES ('$firstname','$lastname','$CompCode','$statecode')";
    mysqli_query($conn1,$query);
    }
    
    ?>
    <div class="container-fluid">
      <div class="well well-sm">
        <p style="text-align: center;font-size: 30px;color: #4B4276;font-weight: bold;"> Branch Master</p></div>
        <div class="row">
          
          <div class="col-lg-2">
          </div>
          <div class="col-lg-4 m-auto">
            <form class="ajaxForm">
              <div class="container box">
                
                <label>Enter Branch Code</label><br>
                <input type="text" name="dc" id="dc" class="form-control"  required />
                <br>
                <label>Enter Branch Name</label><br>
                <input type="text" name="dn" id="dn" class="form-control"  required/>
                <br>
                <label>Enter State Code</label><br>
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
              <div id="records_content"></div>
            </div>
            <!-- Modal -->
            <div id='myModal' class='modal fade' id="update_user_modal" role='dialog'>
              <div class='modal-dialog'>
                <!-- Modal content-->
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title' align='center'>Branch Master</h4>
                  </div>
                  <div class='modal-body'>
                    <label for="Update_dc">Update Branch Code</lable>
                      <input type='text' name='dc' id='dc'  >
                      <label for="Update_dn">Update Branch Name</lable>
                        <input type='text' name='dn' id='dn' >
                        <label for="Update_sc">Update State code</lable>
                          <input type='text' name='sc' id='sc' >
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-success' data-dismiss='modal' onclick='updaterecord()'>Save</button>
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
        
        $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
        $("#success-alert").alert('close');
        });
        $(document).ready(function(){
        readRecord();
        });
        function readRecord()
        {
        var readrecord = "readrecord";
        $.ajax({
        url:"backend/Branchbackend.php",
        type:"post",
        data:{ readrecord:readrecord },
        success:function(data,status){
        $('#records_content').html(data);
        }
        });
        }
        function addrecord()
        
        {
        var firstname =$('#dc').val();
        var lastname =$('#dn').val();
        var statecode =$('#sc').val();
        var CompCode=$('#CompCode').val();
        $.ajax({
        url:"BranchMast.php",
        type:'POST',
        data:{
        firstname:firstname,
        lastname:lastname,
        statecode:statecode,
        CompCode :CompCode
        },
        success:function(data,status){
        
        
        }
        });
        
        location.reload();
        
        
        }
        // document.getElementById('b3').onclick = function(){
        //    swal("Department Added!", "You clicked the button!", "success");
        //         };
        function GetUserDetails(id){
        $('#hidden_user_id').val(id);
        $.POST("backend/Branchbackend.php",{  id:id }, function(data,status){
        var user =JSON.parse(data);
        $('#dc').val(user.DeptCode);
        $('#dn').val(user.DeptName);
        }
        );
        $('#update_user_modal').modal("show");
        }
        
        
        
        function updaterecord()
        {
        var firstname =$('#Update_dc').val();
        var lastname =$('#Update_dn').val();
        var CompCode=$('#CompCode').val();
        // var hidden_user_id =$('hidden_user_id').val();
        $.ajax({
        url:"backend/Branchbackend.php",
        type:'POST',
        data:{
        firstname:firstname,
        lastname:lastname,
        // hidden_user_id:hidden_user_id,
        CompCode :CompCode
        },
        success:function(data,status){
        $('#update_user_modal').modal("hide");
        readRecords();
        }
        });
        }
        function DeleteUser(deleteid)
        {
        // var DelId = deleteid ;
        var conf = confirm("Are you sure?");
        
        if(conf==true){
        $.ajax({
        url:"backend/Branchbackend.php",
        type:"POST",
        data: { deleteid : deleteid },
        success:function(data,status){
        readRecords();
        }
        });
        }
        location.reload();
        }
        </script>
      </body>
    </html>