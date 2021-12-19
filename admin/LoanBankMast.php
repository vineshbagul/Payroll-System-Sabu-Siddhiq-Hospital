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
		<title>Loan Bank Master</title>
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
				<p style="text-align: center;font-size: 30px;color: #4B4276;font-weight: bold;">Loan Bank Master</p></div>
				<div class="row">
					
					<div class="col-lg-2">
					</div>
					<div class="col-lg-4 m-auto">
						<form class="ajaxForm">
							<div class="container box">
								
								<label>Enter Bank Code</label><br>
								<input type="text" name="dc" id="dc" class="form-control"  required />
								<br>
								<label>Enter Bank Name</label><br>
								<input type="text" name="dn" id="dn" class="form-control"  required/>
								<br>
								<label>Enter Branch</label><br>
								<input type="text" name="bn" id="bn" class="form-control"  required/>
								<br>
								<div>
									<input type="hidden" name="id" id="user_id">
									<input type="hidden" name="CompCode">&nbsp;
									<button type="button" name="add" onclick="addrecord()" id="b3"  class="btn btn-primary">Add</button>
								</div>
							</div>
						</div>
					</form>
					<div class="col-lg-6 m-auto" >
					
						<div><?php
								echo  "<table id='myTable'  width='100%' border=0>
								<thead>
									<tr>
										<td><strong>Loan Bank Code</strong></td>
										<td><strong>Loan Bank Name</strong></td>
										<td><strong>Branch</strong></td>
										<td><strong>Action</strong></td>
										
									</tr>
								</thead>";
								
								
								
								$qry="SELECT * FROM `loanbankmast`";
								
								$result = mysqli_query($conn1,$qry);
								
								
								while($res = mysqli_fetch_array($result)) {
								$dcode = "'".trim($res['BankCode'])."'";
								echo "<tr>";
									echo "<td >".$res['BankCode']."</td>";
									echo "<td >".$res['BankName']."</td>";
									echo "<td >".$res['Branch']."</td>";
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
												<h4 class='modal-title' align='center'>Loan Bank Master</h4>
											</div>
											<div class='modal-body' id="update_data">
												<label>Update Bank Code</lable>
													<input type='text' name='dc' id='dc' >
													<label>Update Bank Name</lable>
														<input type='text' name='dn' id='dn' >
														<label>Update Branch</lable>
															<input type='text' name='bn' id='bn' >
															<input type='hidden' name='oldcode' id='oldcode' >
															
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
						
						$("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
						$("#success-alert").alert('close');
						});
						</script>
						<script>
						
						function addrecord()
						
						{
						var firstname =$('#dc').val();
						var lastname =$('#dn').val();
						var branch=$('#bn').val();
						$.ajax({
						url:"backend/LoanBankbackend.php",
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
						alert("loan code and bank name should be unique!!");
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
							url:"backend/LoanBankbackend.php",
							type:'POST',
							data:{
							id:id
							},
									success:function(data,status){
								var user =JSON.parse(data);
						
									$('#update_data #dc').val(user.BankCode);
										$('#update_data #dn').val(user.BankName);
										$('#update_data #bn').val(user.Branch);
						$('#update_data #oldcode').val(user.BankCode);
						
							}
							});
						}
						
						
						
						function updaterecord()
						{
						var firstname1 =$('#update_data #dc').val();
						var lastname1 =$('#update_data #dn').val();
						var branch =$('#update_data #bn').val();
						var oldcode=$('#update_data #oldcode').val();
						$.ajax({
						url:"backend/LoanBankbackend.php",
						type:'POST',
						data:{
						firstname1:firstname1,
						lastname1:lastname1,
							branch:branch,
						oldcode :oldcode
						},
						success:function(data,status){
						location.reload(true);
						
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
						url:"backend/LoanBankbackend.php",
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