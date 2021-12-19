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
		<title>Bank Master</title>
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
		include('dashbord.php'); ?>
		<div class="container-fluid">
			<div class="well well-sm">
				<p style="text-align: center;font-size: 30px;color: #4B4276;font-weight: bold;"> Bank Master</p></div>
				<div class="row">
					
					<div class="col-lg-2">
					</div>
					<div class="col-lg-4 m-auto">
						<form class="ajaxForm">
							<div class="container box">
								
								<label >Enter Bank Code</label><br>
								<input type="text" name="dc" id="dc" class="form-control"   />
								<br>
								<label>Enter Bank Name</label><br>
								<input type="text" name="dn" id="dn" class="form-control"  />
								<br>
								<label>Enter Branch</label><br>
								<input type="text" name="bn" id="bn" class="form-control"  />
								<br>
								<div>
									<input type="hidden" name="id" id="user_id">
									<input type="hidden" name="CompCode">&nbsp;
									<button type="button" name="add" onclick="addrecord()"  class="btn btn-primary">Add</button>
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
										<td><strong>Bank Code</strong></td>
										<td><strong>Bank Name</strong></td>
										<td><strong>Branch</strong></td>
										<td><strong>Action</strong></td>
										
									</tr>
								</thead>";
								
								$qry="SELECT * FROM `bankmast`";
								
								$result = mysqli_query($conn1,$qry);
								
								
								while($res = mysqli_fetch_array($result)) {
								$dcode = "'".trim($res['BankCode'])."'";
								echo "<tr>";
									echo "<td >".$res['BankCode']."</td>";
									echo "<td >".$res['BankName']."</td>";
									echo "<td >".$res['Branch']."</td>";
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
												<h4 class='modal-title' align='center'>Bank Master</h4>
											</div>
											<div class='modal-body'  id="update_data">
												<label for='updbankco'>Update Bank Code</lable>
													<input type='text' name='bankcode' id='bankcode' >
													<label for='updbankname'>Update Bank Name</lable>
														<input type='text' name='bankname' id='bankname' >
														<label for='updbankbranch'>Update Branch</lable>
															<input type='text' name='branch' id='branch' >
															<input type='hidden' name='oldbankcode' id='oldbankcode' >
														</div>
														<div class='modal-footer'>
															<button type='button' class='btn btn-success' data-dismiss='modal' onclick='updaterecord()'>Update</button>
															<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
															<input type='hidden' name='CompCode' id='hidden_user_id'>
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
						var branch=$('#bn').val();
						$.ajax({
						url:"backend/Bankbackend.php",
						type:'POST',
						dataType:'json',
						data:{
						firstname:firstname,
						lastname:lastname,
						branch :branch
						},
						success:function(res){
						
						if( res =="exist" )
						{
						alert("Bank code and name should be unique!!");
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
							url:"backend/Bankbackend.php",
							type:'POST',
							data:{
							id:id
							},
									success:function(data,status){
								var user =JSON.parse(data);
						// console.log(user);
								
							$('#update_data #bankcode').val(user.BankCode);
								$('#update_data #bankname').val(user.BankName);
						$('#update_data #branch').val(user.Branch);
						$('#update_data #oldbankcode').val(user.BankCode);
						
							}
							});
						
						}
						
						
						function updaterecord()
						{
						var firstname =$('#update_data #bankcode').val();
						var lastname =$('#update_data #bankname').val();
						var BankCode=$('#update_data #branch').val();
						var oldbankcode=$('#update_data #oldbankcode').val();
						$.ajax({
						url:"backend/Bankbackend.php",
						type:'POST',
						data:{
						firstname:firstname,
						lastname:lastname,
						BankCode :BankCode,
						oldbankcode:oldbankcode
						},
						success:function(data,status){
						alert('Details are successfully updated!!');
						location.reload(true);
						}
						});
						}
						function DeleteUser(deleteid)
						{
						var DelId = deleteid ;
						var conf = confirm("Are you sure?");
						
						if(conf==true){
						$.ajax({
						url:"backend/Bankbackend.php",
						type:"POST",
						data: { deleteid : deleteid },
						success:function(data,status){
						location.reload(true);
						alert('Record successfully Deleted!!');
						
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
						<script>
						
						$("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
						$("#success-alert").alert('close');
						});
						</script>
					</body>
				</html>