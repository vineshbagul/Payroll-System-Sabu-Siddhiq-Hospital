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
		<title>Designation Master</title>
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
		?>
		
		<div class="container-fluid">
			<div class="well well-sm">
				<p style="text-align: center;font-size: 30px;color: #4B4276;font-weight: bold;"> Designation Master</p></div>
				<div class="row">
					
					<div class="col-lg-2">
					</div>
					<div class="col-lg-4 m-auto">
						<form class="ajaxForm">
							<div class="container box">
								
								<label>Enter Designation Code</label><br>
								<input type="text"  id="dc" class="form-control"  required />
								<br>
								<label>Enter Designation Name</label><br>
								<input type="text"  id="dn" class="form-control"  required/>
								<br>
								<div>
									<input type="hidden" name="id" id="user_id">
									<input type="hidden" name="CompCode"><br>
									<button type="button" name="add" onclick="addrecord()" id="b3" class="btn btn-primary">Add</button>
								</div>
							</div>
						</div>
					</form>
					<div class="col-lg-6 m-auto" >
					
						<div>
							<?php echo  "<table id='myTable'  width='100%' border=0>
								<thead>
									<tr>
										<td><strong>Designation Code</strong></td>
										<td><strong>Designation Name</strong></td>
										<td><strong>Action</strong></td>
										
									</tr>
								</thead>";
								
								
								
								$qry="SELECT * FROM `desimast` WHERE `desimast`.`CompCode`='$CompCode'";
								
								$result = mysqli_query($conn1,$qry);
								
								
								while($res = mysqli_fetch_array($result)) {
								$dcode = "'".trim($res['DesigCode'])."'";
								echo "<tr>";
									echo "<td >".$res['DesigCode']."</td>";
									echo "<td >".$res['DesigName']."</td>";
									echo '<td> <button onclick="GetUserDetails('.$dcode.')" class="btn btn-info edit"  data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></button>
									<button class="btn btn-danger" onclick="DeleteUser('.$dcode.')"><i class="fas fa-trash"></i></button></td></tr>';
									
									}
									?>
								</div>
								<div>
									<!--    <div id="records_content"></div>
								</div> -->
								<!-- Modal -->
								<!-- <div id='myModal' class='modal fade' id="update_user_modal" role='dialog'>
									<div class='modal-dialog'> -->
										<!-- Modal content-->
										<!--  <div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal'>&times;</button>
												<h4 class='modal-title' align='center'>Designation Master</h4>
											</div>
											<div class='modal-body'>
												<label for="Update_dc">Update Designation Code</lable>
													<input type='text' name='dc' id='dc' value="" >
													<label for="Update_dn">Update Designation Name</lable>
														<input type='text' name='dn' id='dn' value="">
														<input type='hidden' name='dc1' id='dc1'  value="">
													</div>
													<div class='modal-footer'>
														<button type='button' class='btn btn-success' data-dismiss='modal' onclick='updaterecord()'>Save</button>
														<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
														<input type='hidden' name='CompCode' id='hidden_user_id'>
													</div>
												</div>
											</div>
										</div> -->
										<!-- Modal -->
										<div id='myModal' class='modal fade' id="update_user_modal" role='dialog'>
											<div class='modal-dialog'>
												<!-- Modal content-->
												<div class='modal-content'>
													<div class='modal-header'>
														<button type='button' class='close' data-dismiss='modal'>&times;</button>
														<h4 class='modal-title' align='center'>Designation Master</h4>
													</div>
													<div class='modal-body' id="update_data">
														<label for="Update_dc">Update Designation Code</lable>
															<input type='text' name='desicode' id='desicode'  value="">
															<label for="Update_dn">Update Designation Name</lable>
																<input type='text'  name='desiname' id='desiname' value="">
																<input type='hidden' name='desicodeold' id='desicodeold'  value="">
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
							</script>
							<script>
							function addrecord()
							
							{
							var firstname =$('#dc').val();
							var lastname =$('#dn').val();
							var CompCode=$('#CompCode').val();
							$.ajax({
							url:"backend/Desibackend.php",
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
							alert("Designation code and name should be unique!!");
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
								url:"backend/Desibackend.php",
								type:'POST',
								data:{
								id:id
								},
										success:function(data,status){
									
									var user =JSON.parse(data);
									
									console.log(user);
									
										$('#update_data #desicode').val(user.DesigCode);
											$('#update_data #desiname').val(user.DesigName);
							$('#update_data #desicodeold').val(user.DesigCode);
							// console.log(user.DesigCode);
							// console.log(user.DesigName);
											//$('#').modal('show');
								}
								});
							
							}
							
							
							
							function updaterecord()
							{
							var firstname =$('#update_data #desicode').val();
							var lastname =$('#update_data #desiname').val();
							var desicodeold=$('#update_data #desicodeold').val();
							$.ajax({
							url:"backend/Desibackend.php",
							type:'POST',
							data:{
							firstname:firstname,
							lastname:lastname,
							desicodeold :desicodeold
							},
							success:function(data,status){
							
								alert("Details successfully Updated!!");
							
							}
							});
							}
							function DeleteUser(deleteid)
							{
							var DelId = deleteid ;
							var conf = confirm("Are you sure?");
							
							if(conf==true){
							$.ajax({
							url:"backend/Desibackend.php",
							type:"POST",
							data: { deleteid : deleteid },
							success:function(data,status){
								alert("Record successfully Deleted");
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