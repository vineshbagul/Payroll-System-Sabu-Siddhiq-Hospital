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
		<title>Employee Master</title>
		<link rel="stylesheet" href="../css/stylesheet.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<style>
		body {font-family: Arial;}
		/* Style the tab */
		.tab {
		overflow: hidden;
		border: 1px solid #ccc;
		background-color: #f1f1f1;
		}
		/* Style the buttons inside the tab */
		.tab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
		font-size: 17px;
		}
		/* Change background color of buttons on hover */
		.tab button:hover {
		background-color: #4B4276;
		color: white;
		}
		/* Create an active/current tablink class */
		.tab button.active {
		background-color: #ccc;
		}
		/* Style the tab content */
		.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
		}
		</style>
	</head>
	<body>
		<?php
		include('dashbord.php');
		?>
		<div class="container-fluid">
			<div class="jumbotron">
				<form align="center" >
					<div class="form-group">
						<label for="ecode" >Enter Employee code:</label>
						<input type="text"  id="empcode" placeholder="Employee Code" name="empcode">
					</div>
					<div class="form-group">
						<label for="companycode">Enter Company code:</label>
						<input type="text"  id="cocode" placeholder="Company Code" name="cocode">
					</div>
					<button type="button" onclick="EmpDetails()" class="btn btn-info" >Edit</button>
					<button type="button" onclick="DeleteEmployee()" class="btn btn-danger">Delete</button>
				</form>
				
			</div>
			
			<div class="jumbotron">
				<div >
					<div class="col-lg-2"></div>
					<div class="col-lg-10" >
						<div class="col-lg-3">
							<div class="col mt-3">
								<input id="EmployeeCode" name="EmployeeCode" readonly="readonly">
								<input type="hidden" id="COMPCODE" name="COMPCODE" readonly="readonly">
								
							</div>
						</div>
						<div class="col-lg-3">
							<div class="col mt-3">
								<input type="text" id="Firstname" class="form-control" placeholder=" Firstname">
							</div>
						</div>
						<div class="col-lg-3">
							<div class="col mt-3">
								<input type="text" id="Middlename" class="form-control" placeholder=" Middlename">
							</div>
						</div>
						<div class="col-lg-3">
							<div class="col mt-3">
								<input type="text" id="Lastname" class="form-control" placeholder=" Lastname">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2">
					</div>
					<div class="col-lg-10">
						<div class="tab">
							<button class="tablinks" onclick="Employee(event, 'Official')">Official</button>
							<button class="tablinks" onclick="Employee(event, 'Personal')">Personal</button>
							<button class="tablinks" onclick="Employee(event, 'Family')">Family</button>
							<button class="tablinks" onclick="Employee(event, 'Qualification')">Qualification</button>
							<button class="tablinks" onclick="Employee(event, 'Experiance')">Experience</button>
							<button class="tablinks" onclick="Employee(event, 'Reference')">Reference</button>
						</div>
					</div>
					<!-- official details -->
					
					<div id="Official" class="tabcontent">
						<div class="row">
							<div class="col-lg-2">
							</div>
							<div class="col-lg-10">
								<div class="col-lg-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<div class="well well-sm ">
												<p><b>Joining Details</b></p></div>
												<div class="col "  >
													<label>Date of Aplication:</label>
													<input  class="appdate" type="text" placeholder="Pick the Date"  id="date1">
													
												</div>
												<div class="col"  >
													<label>Date of Confirm  :</label>
													<input  class="confrmdate" type="text" placeholder="Pick the Date"  id="date2">
												</div>
												<div class="col" >
													<label>Date of Joined  :</label>
													<input  class="joineddate" type="text" placeholder="Pick the Date"  id="date3">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="panel panel-default">
											<div class="panel-body">
												<div class="well well-sm ">
													<p><b>Termination Details</b></p></div>
													<div class="col ">
														<label>Date of left:</label>
														<input  class="leftdate" type="text" placeholder="Pick the Date"  id="date4">
													</div><br>
													<div class="input-group" >
														<div class="input-group-prepend">
														</div>
														<label>Reason of Termination:</label>
														<textarea class="form-control" name="reason" id="reason" aria-label="With textarea"></textarea>
													</div>
													
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="panel panel-default">
												<div class="panel-body">
													
													<div class="well well-sm">
														<p><b>Post</b></p></div>
														<div class="col-lg-3" >
															<div class="input-group-prepend">
																<label >Branch</label>
															</div>
															
															<select class="custom-select" id="branch">
																<?php
																// include("../dbconn.php");
																$qry = "SELECT * FROM branchmast";
																$result = mysqli_query($conn1,$qry);
																while($row = mysqli_fetch_array($result))
																{
																echo "<option value='".$row['BranchCode']."'>".$row['BranchName']."</option>";
																
																}
																?>
															</select>
														</div>
														<div class="col-lg-3" >
															<div class="input-group-prepend">
																<label >Department</label>
															</div>
															<select class="custom-select" id="dept">
																<?php
																// include("../dbconn.php");
																$qry = "SELECT * FROM deptmast";
																$result = mysqli_query($conn1,$qry);
																while($row = mysqli_fetch_array($result))
																{
																echo "<option value='".$row['DeptCode']."'>".$row['DeptName']."</option>";
																
																}
																?>
															</select>
														</div>
														<div class="col-lg-3" >
															<div class="input-group-prepend">
																<label>Category</label></div>
																<select class="custom-select" id="Category" size=1>
																	<?php
																	$qry = "SELECT * FROM `catgmast`";
																	$result = mysqli_query($conn1,$qry);
																	while($row = mysqli_fetch_array($result))
																	{
																	echo "<option value='".$row['CatgCode']."'>".$row['CatgName']."</option>";
																	}
																	?>
																</select>
															</div>
															<div class="col-lg-3" >
																<div class="input-group-prepend">
																	<label>Designation</label></div>
																	<select class="custom-select" id="Designation" size=1>
																		<?php
																		$qry = "SELECT * FROM `desimast`";
																		$result = mysqli_query($conn1,$qry);
																		while($row = mysqli_fetch_array($result))
																		{
																		
																		echo "<option value='".$row['DesigCode']."'>".$row['DesigName']."</option>";
																		}
																		?>
																	</select>
																	
																</div>
																<div class="col-lg-12">
																	<label>Grade </label>
																	<input type="text" id="Grade" class="form-control" >
																	
																</div>
																
															</div>
														</div>
														
													</div>
													<div class="col-lg-12">
														
														<div class="panel panel-default">
															<div class="panel-body">
																<div class="well well-sm">
																	<p><b>Other Details</b></p></div>
																	<div class="col-lg-6">
																		<input type="text" class="form-control" id="pf" placeholder="Enter PF Number">
																	</div>
																	<div class="col-lg-6">
																		<input type="text" class="form-control" id="lic" placeholder="Enter LIC Number">
																	</div><br>
																	
																	<div class="col-lg-6">
																		<input type="text" class="form-control" id="esic" placeholder="Enter ESIC Number">
																	</div>
																	
																	<div class="col-lg-6">
																		<input type="text" class="form-control"  id="pan" placeholder="Enter PAN Number">
																	</div>
																	<div class="col-lg-6">
																		<input type="text" class="form-control"  id="acc" placeholder="Enter A/C Number">
																	</div><br>
																	<div class="col-lg-6">
																		<div class="input-group-prepend">
																			<label>Bank name</label>
																		</div>
																		<select class="custom-select" id="bankname" size=1>
																			<?php
																			$qry = "SELECT * FROM `bankmast`";
																			$result = mysqli_query($conn1,$qry);
																			while($row = mysqli_fetch_array($result))
																			{
																			echo "<option value='".$row['BankCode']."'>".$row['BankName']."</option>";
																			
																			}
																			?>
																		</select>
																	</div>
																	<div class="col-lg-6">
																		<div class="input-group-prepend">
																			<label >Payment By</label>
																		</div>
																		<select class="custom-select"  name="Payment" id="Payment">
																			<option value="Cheque">Cheque</option>
																			<option value="Bank transfer">Bank transfer</option>
																		</select>
																	</div>
																</div>
															</div>
														</div>
													</div>
													
												</div>
												<div align="center">
													<button type="button" name="submit" onclick="UpdateEmpoffDetails()"  class="btn btn-success">Update</button>
												</div>
											</div>
										</div>
										<!-- personal details -->
										<div id="Personal" class="tabcontent">
											<div class="row">
												<div class="col-lg-2">
												</div>
												<div class="col-lg-10">
													<div class="col-lg-6">
														<div class="panel panel-default">
															<div class="panel-body">
																<div class="row">
																	<div class="col-lg-12 " >
																		<form>
																			<label>Present Address:</label>
																			<textarea class="form-control" id="presentaddrress" name="presentaddrress" aria-label="With textarea" placeholder="Enter Present Address"></textarea>
																		</div><br>
																		<div class="col-lg-6" >
																			<label>City:</label>
																			<input type="text" id="city1" name="city1" class="form-control" placeholder="Enter City">
																		</div><br>
																		
																		<div class="col-lg-6">
																			<label>PinCode:</label>
																			<input type="text" id="pincode1" name="pincode1" class="form-control" placeholder="Enter PinCode">
																		</div><br>
																		
																		
																		<div class="col-lg-6">
																			<label>Contact Number:</label>
																			<input type="text" id="contactnumber" class="form-control" placeholder="Enter Contact Number">
																		</div><br>
																		<div class="col-lg-6" >
																			<label>Mobile Number:</label>
																			<input type="text" id="mobilenumber"  class="form-control" placeholder="Enter Mobile Number">
																		</div><br>
																		<div class="col-lg-12" >
																			<label>E-Mail:</label>
																			<input type="text" id="email"  class="form-control" placeholder=" Enter E-Mail">
																		</div><br>
																		<div class="col-lg-6">
																			<label>Passport Number:</label>
																			<input type="text" id="passport" class="form-control" placeholder="Enter Passport Number">
																		</div><br>
																		
																		<div class="col-lg-6">
																			<label>Place of Issue:</label>
																			<input type="text" id="placeissue"class="form-control" placeholder="Enter Place of Issue">
																		</div><br>
																		
																		<div class="col-lg-6">
																			<label>Date of Issue:</label>
																			<input  class="issuedate" type="text" placeholder="Pick the Date"  id="date5">
																			
																			
																		</div><br>
																		<div class="col-lg-6" >
																			<label>Date of Expiry:</label>
																			<input  class="expirydate" type="text" placeholder="Pick the Date"  id="date6">
																			
																		</div><br>
																		<div class="col-lg-6" >
																			<label>Date of Birth:</label>
																			<input  class="bdate" type="text" placeholder="Pick the Date"  id="date7">
																			
																		</div><br>
																		<div class="col-lg-6" >
																			<label>Place of Birth:</label>
																			<input type="text" id="birthplace" class="form-control" placeholder=" Place of Birth">
																		</div><br>
																	</div>
																</div>
															</div>
														</div>
														<!-- half tab -->
														<div class="col-lg-6">
															<div class="panel panel-default">
																
																<div class="panel-body">
																	<div class="col-lg-12 " >
																		
																		<label>Permanent Address:</label>
																		
																		<input type="checkbox"  name="billingtoo" onclick="FillBilling(this.form)">
																		<label style="color:blue;">Check this box if Address is same.</label>
																		
																		<textarea class="form-control" id="PermenantAddres" name="PermenantAddres" aria-label="With textarea" placeholder="Enter Permanant Address"></textarea>
																		
																	</div><br>
																	<div class="col-lg-6" >
																		<label>City:</label>
																		<input type="text" id="city2" name="city2" class="dateissue" class="form-control" placeholder="Enter City">
																	</div><br>
																	
																	<div class="col-lg-6">
																		<label>PinCode:</label>
																		<input type="text" id="pincode2" name="pincode2"class="form-control" placeholder="Enter PinCode">
																	</div><br>
																	
																</form>
																
																<div class="col-lg-6">
																	<label>Contact Number:</label>
																	<input type="text" id="perContactNumber" class="form-control" placeholder="Enter Contact Number">
																</div><br>
																
																<div class="col-lg-6" >
																	<label>Nationality:</label>
																	<input type="text" id="Nationality" class="form-control" placeholder="Enter Nationality">
																</div><br>
																<div class="col-lg-12" >
																	<label>Language Known:</label>
																	<input type="text" id="LanguageKnown" class="form-control" placeholder="Enter Language Known">
																</div><br>
																<div class="col-lg-6">
																	<label>Blood Group:</label>  <br>
																	<select class="custom-select" id="BloodGroup" size=1>
																		<?php
																		$qry = "SELECT * FROM `bloodmast`";
																		$result = mysqli_query($conn1,$qry);
																		while($row = mysqli_fetch_array($result))
																		{
																		echo "<option value='".$row['BloodCode']."'>".$row['BloodGroup']."</option>";                                                                                                                                                             }
																		?>
																	</select>
																	
																</div><br>
																
																<div class="col-lg-6">
																	<label>Driving liecence Number:</label>
																	<input type="text" id="Drivingliecence" class="form-control" placeholder="Enter Driving liecence No">
																</div><br>
																
																
																<div class="col-lg-6" >
																	<label>Emergency Contact Name:</label>
																	<input type="text" id="Name" class="form-control" placeholder="Enter Emergency Name">
																</div><br>
																<div class="col-lg-6" >
																	<label>Emergency Contact Number:</label>
																	<input type="text" id="Contact" class="form-control" placeholder="Enter Emergency Contact">
																</div><br>
															</div>
														</div>
													</div>
													<!-- closing half tab person -->
												</div>
												<div class="col-lg-2"></div>
												<div class="col-lg-10">
													
													
													<div class="panel panel-default">
														
														<div class="panel-body">
															
															<div class="col-lg-4">
																<div class="col mt-4">
																	<label>Image File</label>
																	<input type="text" class="form-control" >
																</div>
															</div>
															
															<div class="col-lg-4">
																<div class="input-group-prepend">
																	<label >Gender</label>
																</div>
																<select class="custom-select" id="gender">
																	<option value="Male">Male</option>
																	<option value="Female">Female</option>
																	<option value="Transgender">Transgender</option>
																</select>
															</div>
															
															
															<div class="col-lg-4">
																<div class="input-group-prepend">
																	<label >Marital Status</label>
																</div>
																<select class="custom-select" id="MaritalStatus">
																	
																	<option value="Single">Single</option>
																	<option value="Married">Married</option>
																	<option value="Divorcee">Divorcee</option>
																</select>
															</div>
														</div>
													</div>
													<div align="center">
														<button class="btn btn-success" onclick="UpdateEmppersonalDetails()">Update</button>
													</div>
												</div>
												<!-- closing tab person -->
											</div>
										</div>
										<!-- family tab -->
										<div id="Family" class="tabcontent">
											<div class="col-lg-2"></div>
											<div class="col-lg-10">
												<div class="panel panel-default" align="center">
													<div class="panel-body">
														<div class="well well-sm ">
															<p><b>Family Background</b></p></div>
															<div class="col-lg-6">
																<div class="col mt-6">
																	<label>Father Name</label>
																	<input type="text" id="FatherName" class="form-control" placeholder="Enter Father Name"  align="center">
																</div>
															</div>
															<div class="col-lg-6">
																<div class="col mt-6">
																	<label>Mother Name</label>
																	<input type="text" id="MotherName" class="form-control" placeholder="Enter Mother Name"  align="center">
																</div>
															</div>
															<div class="col-lg-6">
																<div class="col mt-6">
																	<label>Spouse Name</label>
																	<input type="text"  id="SpouseName" class="form-control" placeholder="Enter Spouse Name"  align="center">
																</div>
															</div>
															
															<div class="col-lg-6">
																<div class="col mt-6">
																	<label>Number of Children</label>
																	<input type="text" id="NofChild" class="form-control" placeholder="Enter Number of Children"  align="center">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div align="center">
													<button class="btn btn-success" onclick="UpdateEmpFamilyDetails()" style="float: center;">Update</button>
												</div>
											</div>
											<!-- qualification detail -->
											<div id="Qualification" class="tabcontent">
												<div class="row">
													<div class="col-lg-2" ></div>
													<div class="col-lg-10" >
														<div class="panel panel-default" >
															<div class="panel-body">
																<div class="well well-sm" >
																	<p align="center"><b>Qualification Details</b></p></div>
																	<div class="col-lg-6">
																		<div class="col mt-6">
																			<label>Education</label>
																			<input type="text" id="edu" class="form-control" placeholder="Enter Education">
																		</div>
																	</div>
																	<div class="col-lg-6">
																		<div class="col mt-6">
																			<label>Education Qualification</label>
																			<textarea class="form-control" id="eduquali" aria-label="With textarea" placeholder="Enter Education Qualification"></textarea>
																		</div><br>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div align="center">
														<button class="btn btn-success" onclick="UpdateEmpQuali()" style="float: center;">Update</button>
													</div>
													
												</div>
												<!-- experience tab -->
												<div id="Experiance" class="tabcontent">
													<div class="row">
														<div class="col-lg-2" ></div>
														<div class="col-lg-10" >
															<form class="ajaxForm">
																<div class="panel panel-default" >
																	<div class="col-lg-6 m-auto" >
																		<label>Company Name</label>
																		<input type="text" name="compnyname"  id="compnyname"  class="form-control" placeholder="Enter Company Name" >
																	</div>
																	<div class="col-lg-6 m-auto" >
																		<label>From period</label>
																		<input type="text" name="fperi" id="fperi"  class="form-control" placeholder="Enter starting date" >
																	</div>
																	
																	<div class="col-lg-6 m-auto" >
																		<label>To period</label>
																		<input type="text" name="tperi" id="tperi" class="form-control" placeholder="Enter terminated date" >
																	</div>
																	<div class="col-lg-6 m-auto" >
																		<label>Designation</label>
																		<input type="text" id="Designation1" name="Designation1" class="form-control" placeholder="Enter designation" >
																	</div>
																	<div class="col-lg-6 m-auto" >
																		<label>Job Responsibilities</label>
																		<textarea class="form-control" name="jresp" id="jresp" aria-label="With textarea" placeholder="Enter Job responsibilities"></textarea>
																	</div>
																	<div class="col-lg-6 m-auto" >
																		<label>Sallary</label>
																		<input type="text" id="sallary" name="sallary" class="form-control" placeholder="Enter last sallary" >
																	</div>
																	
																	<div class="col-lg-12 m-auto" >
																		<label>Remark</label>
																		<textarea class="form-control" name="remark" id="remark" aria-label="With textarea" placeholder="Enter Job responsibilities"></textarea>
																	</div>
																	
																	<div  align="center">
																		<button type="button" name="add" onclick="addempexprecord()" id="empexp" style="margin-top: 2em; margin-bottom: 2em;" class="btn btn-primary">Add </button>
																		<button type="button" name="add" onclick="viewempexprecord()" id="empexp" style="margin-top: 2em; margin-bottom: 2em;" class="btn btn-info">View </button>
																	</div>
																	<div id="datatable">
																	</div>
																</div>
															</form>
														</div>
													</div>
													<!-- close exp tab -->
												</div>
												<!-- reference tab -->
												<div id="Reference" class="tabcontent">
													<div class="row">
														<div class="col-lg-2" ></div>
														<div class="col-lg-10">
															<form class="ajaxForm">
																<div class="panel panel-default" >
																	<div class="panel-body">
																		<div class="well well-sm" >
																			<p align="center"><b>Reference Details</b></p></div>
																			<div class="col-lg-6 m-auto" >
																				<label> Name of reference</label>
																				<input type="text"  id="reference" name="reference"  class="form-control" placeholder="Enter reference Name" >
																			</div>
																			<div class="col-lg-6 m-auto" >
																				<label>Relation </label>
																				<input type="text" id="Relation" name="Relation" class="form-control" placeholder="Enter Relation" >
																			</div>
																			<div class="col-lg-12 m-auto" >
																				<label>Contact</label>
																				<input type="text" id="contact"  name="contact" class="form-control" placeholder="Enter contact number" >
																			</div>
																		</div>
																	</div>
																	<div align="center">
																		<button type="button" onclick="UpdateEmpRef()" class="btn btn-success" >Update</button>
																	</div>
																</form>
															</div>
															
														</div>
													</div>
													
													
													<!-- container closing -->
												</div>
												<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
												<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
												<script type="text/javascript">
													function DeleteEmployee()
												{
												var empcode=$('#empcode').val();
												var compcode =$('#cocode').val();
												
												var conf = confirm("Are you sure?");
												
												if(empcode=='')
												{
												alert("Please Fill Employee code Fields !!");
												document.getElementById('empcode').style.borderColor = "red";
												return false;
												}
												if(compcode=='')
												{
												alert("Please Fill Company code Fields !!");
												document.getElementById('cocode').style.borderColor = "red";
												return false;
												}
												
												else{
												if(conf==true){
												$.ajax({
												url:"backend/DeleteEmpBackend.php",
												type:"POST",
												data:{
												empcode:empcode,
												compcode:compcode,
												},
												
												success:function(data,status){
												alert("Employee Details are Successfully Deleted!!")
												
												}
												});
												}
												}
												}
													
													// tabs
												function Employee(evt, cityName) {
												var i, tabcontent, tablinks;
												tabcontent = document.getElementsByClassName("tabcontent");
												for (i = 0; i < tabcontent.length; i++) {
												tabcontent[i].style.display = "none";
												}
												tablinks = document.getElementsByClassName("tablinks");
												for (i = 0; i < tablinks.length; i++) {
												tablinks[i].className = tablinks[i].className.replace(" active", "");
												}
												document.getElementById(cityName).style.display = "block";
												evt.currentTarget.className += " active";
												}
												// copy addfres
												function FillBilling(f) {
												if(f.billingtoo.checked == true) {
												f.PermenantAddres.value=f.presentaddrress.value ;
												f.city2.value=f.city1.value ;
												f.pincode2.value=f.pincode1.value ;
												
												}
												else
												{
												f.PermenantAddres.value = "";
												f.city2.value = "";
												f.pincode2.value = "";
												
												}
												}
												// When the document is ready
												$(document).ready(function () {
												
												$('#date1').datepicker({
												format: "yyyy-mm-dd"
												});
												});
												$(document).ready(function () {
												
												$('#date2').datepicker({
												format: "yyyy-mm-dd"
												});
												
												});
												$(document).ready(function () {
												
												$('#date3').datepicker({
												format: "yyyy-mm-dd"
												});
												
												});
												$(document).ready(function () {
												
												$('#date4').datepicker({
												format: "yyyy-mm-dd"
												});
												
												});
												$(document).ready(function () {
												
												$('#date5').datepicker({
												format: "yyyy-mm-dd"
												});
												
												});
												$(document).ready(function () {
												
												$('#date6').datepicker({
												format: "yyyy-mm-dd"
												});
												
												});
												$(document).ready(function () {
												
												$('#date7').datepicker({
												format: "yyyy-mm-dd"
												});
												
												});
												</script>
												<script>
													///////////////////////////////////////////////////////////////////////
													////////////////show details//////////////////////////////////////////
													////////////////////////////////////////////////////////////////////
													function EmpDetails()
												{
												var empcode=$('#empcode').val();
												var compcode =$('#cocode').val();
												
												if(empcode=='')
												{
												alert("Please Fill Employee code Fields !!");
												document.getElementById('empcode').style.borderColor = "red";
												return false;
												}
												if(compcode=='')
												{
												alert("Please Fill Company code Fields !!");
												document.getElementById('cocode').style.borderColor = "red";
												return false;
												}
												
												
												
												$.ajax({
												url:"backend/EditEmployeedetail.php",
												type:"POST",
												// dataType: 'json',
												data:{
												empcode:empcode,
												compcode:compcode,
												},
												
												success:function(data,status){
												var user =JSON.parse(data);
												// console.log(user);
												$('#EmployeeCode').val(user.EMPCODE);
												$('#COMPCODE').val(user.COMPCODE);
												$('#Firstname').val(user.FIRSTNAME);
												$('#Middlename').val(user.MIDDLENAME);
												$('#Lastname').val(user.LASTNAME);
												$('#branch').val(user.BRANCHCODE);
												$('#dept').val(user.DEPTCODE);
												$('#Designation').val(user.DESIGCODE);
												$('#Grade').val(user.GRADE);
												$('#cat').val(user.CATGCODE);
												$('.appdate').val(user.DATEOFAPP);
												$('.confrmdate').val(user.DATEOFCONF);
												$('.joineddate').val(user.DATEOFJOIN);
												$('.leftdate').val(user.DATEOFLEFT);
												$('#reason').val(user.TermReason);
												$('#pf').val(user.PFNO);
												$('#pan').val(user.PANNO);
												$('#esic').val(user.ESICNO);
												$('#acc').val(user.BANKACNO);
												$('#lic').val(user.LICNO);
												$('#bankname').val(user.BANKCODE);
												$('#BloodGroup').val(user.BLOODCODE);
												$('.bdate').val(user.DATEOFBIRTH);
												$('#birthplace').val(user.BIRTHPLACE);
												$('#payment').val(user.PAYBY);
												$('#Category').val(user.CATGCODE);
												$('#MaritalStatus').val(user.MARITALSTAT);
												$('#PermenantAddres').val(user.PERMADDR);
												$('#city2').val(user.PERMCITY);
												$('#pincode2').val(user.PERMPINCODE);
												$('#perContactNumber').val(user.PERMCONTACTNO);
												$('#presentaddrress').val(user.PRESADDR);
												$('#city1').val(user.PRESCITY);
												$('#pincode1').val(user.PRESPINCODE);
												$('#contactnumber').val(user.PRESCONTACTNO);
												$('#passport').val(user.PASSPORTNO);
												$('.issuedate').val(user.DATEOFISSUE);
												$('.expirydate').val(user.DATEOFEXPIRY);
												$('#placeissue').val(user.PLACEOFISSUE);
												$('#Nationality').val(user.NATIONALITY);
												$('#edu').val(user.EDUCATION);
												$('#eduquali').val(user.EDUQUAL);
												$('#gender').val(user.SEX);
												$('#mobilenumber').val(user.MobileNo);
												$('#LanguageKnown').val(user.LangKnown);
												$('#Drivingliecence').val(user.DrvLicense);
												$('#Name').val(user.EmgName);
												$('#Contact').val(user.EmgNo);
												$('#FatherName').val(user.FatherName);
												$('#MotherName').val(user.MotherName);
												$('#SpouseName').val(user.SpouseName);
												$('#NofChild').val(user.NoOfChildren);
												$('#reference').val(user.REFNAME);
												$('#Relation').val(user.RELATION);
												$('#contact').val(user.CONTACT);
												$('#email').val(user.EMAIL);
												
												
												}
												});
												
												}
												///////////////////////////////////////////////////////////////////////////
												//////////////////////////// // official details /////////////////////////
												//////////////////////////////////////////////////////////////////////////
												function UpdateEmpoffDetails()
												
												{
												var empcode=$('#EmployeeCode').val();
												var Firstname=$('#Firstname').val();
												var Middlename=$('#Middlename').val();
												var Lastname=$('#Lastname').val();
												var branch=$('#branch').val();
												var dept=$('#dept').val();
												var Designation=$('#Designation').val();
												var Grade=$('#Grade').val();
												var cat=$('#Category').val();
												var reason=$('#reason').val();
												var dapplication =$('#date1').val();
												var dconfirm =$('#date2').val();
												var djoin=$('#date3').val();
												var dleft=$('#date4').val();
												var reason=$('#reason').val();
												var pfnumber=$('#pf').val();
												var pan=$('#pan').val();
												var esic=$('#esic').val();
												var licnumber=$('#lic').val();
												var accnumber=$('#acc').val();
												var bankname=$('#bankname').val();
												var payment=$('#Payment').val();
												var COMPCODE=$('#COMPCODE').val();
												
												if(Grade == ''){
												$('#Grade').val('');}
												if(reason == ''){
												$('#reason').val('');}
												if(dleft == ''){
												$('#date4').val('');}
												if(pfnumber == ''){
												$('#pf').val('');}
												if(pan == ''){
												$('#pan').val('');}
												if(esic == ''){
												$('#esic').val('');}
												if(licnumber == ''){
												$('#lic').val('');}
												if(accnumber == ''){
												$('#acc').val('');}
												if(Firstname=='')
												{
												alert("Please Fill Firstname Field !!");
												document.getElementById('Firstname').style.borderColor = "red";
												return false;
												}
												else  if(Middlename=='')
												{
												alert("Please Fill Middlename Field !!");
												document.getElementById('Middlename').style.borderColor = "red";
												return false;
												}
												else  if(Lastname=='')
												{
												alert("Please Fill Lastname Field !!");
												document.getElementById('Lastname').style.borderColor = "red";
												return false;
												}
												else  if(dapplication=='')
												{
												alert("Please pick date of application !!");
												document.getElementById('date1').style.borderColor = "red";
												return false;
												}
												else  if(dconfirm=='')
												{
												alert("Please pick date of confirm !!");
												document.getElementById('date2').style.borderColor = "red";
												return false;
												}
												else  if(djoin=='')
												{
												alert("Please pick date of join !!");
												document.getElementById('date3').style.borderColor = "red";
												return false;
												}
												else  if(branch=='')
												{
												alert("Please Fill branch Field !!");
												document.getElementById('branch').style.borderColor = "red";
												return false;
												}
												else  if(dept=='')
												{
												alert("Please Fill Department Field !!");
												document.getElementById('dept').style.borderColor = "red";
												return false;
												}
												else  if(pfnumber=='')
												{
												alert("Please Fill PF Number Field !!");
												document.getElementById('pf').style.borderColor = "red";
												return false;
												}
												
												else
												{
												$.ajax({
												url:"backend/UpdateEmployeedetail.php",
												type:'POST',
												data:{
												
												empcode:empcode,
												Firstname:Firstname,
												Middlename:Middlename,
												Lastname:Lastname,
												branch:branch,
												dept:dept,
												Designation:Designation,
												Grade:Grade,
												cat:cat,
												dapplication:dapplication,
												dconfirm:dconfirm,
												djoin :djoin,
												dleft:dleft,
												reason:reason,
												pfnumber:pfnumber,
												pan:pan,
												esic:esic,
												licnumber :licnumber,
												accnumber:accnumber,
												bankname :bankname,
												COMPCODE:COMPCODE,
												payment:payment
												
												},
												success:function(data,status){
												
												alert("Official details have been Updated!!")
												
												}
												});
												}
												
												}
												
												
												////////////////////////////////////////////////////////////////////////////////////////////////////////
												//////////////// /////////////////// personal details/////////////////////////////////////////////////////
												////////////// /////////////////////////////////////////////////////////////////////////////////////////
												function UpdateEmppersonalDetails()
												
												{
												var empcode=$('#empcode').val();
												var presentaddrress=$('#presentaddrress').val();
												var city1=$('#city1').val();
												var pincode1=$('#pincode1').val();
												var contactnumber=$('#contactnumber').val();
												var mobilenumber=$('#mobilenumber').val();
												var email=$('#email').val();
												var passport=$('#passport').val();
												var placeissue=$('#placeissue').val();
												var dateissue =$('#date5').val();
												var dateexpiry =$('#date6').val();
												var dob=$('#date7').val();
												var birthplace=$('#birthplace').val();
												var PermenantAddres=$('#PermenantAddres').val();
												var city2=$('#city2').val();
												var pincode2=$('#pincode2').val();
												var perContactNumber=$('#perContactNumber').val();
												var Nationality=$('#Nationality').val();
												var LanguageKnown=$('#LanguageKnown').val();
												var BloodGroup=$('#BloodGroup').val();
												var Drivingliecence=$('#Drivingliecence').val();
												var Name=$('#Name').val();
												var Contact=$('#Contact').val();
												var gender=$('#gender').val();
												var MaritalStatus=$('#MaritalStatus').val();
												var COMPCODE=$('#COMPCODE').val();
												if(passport == ''){
												$('#passport').val('');}
												if(placeissue == ''){
												$('#placeissue').val('');}
												if(dateissue == ''){
												$('#date5').val('');}
												if(dateexpiry == ''){
												$('#date6').val('');}
												if(Drivingliecence == ''){
												$('#Drivingliecence').val('');}
												
												if(empcode=='')
												{
												alert("Please Fill Employee code Field !!");
												document.getElementById('empcode').style.borderColor = "red";
												return false;
												}
												else if(presentaddrress=='')
												{
												alert("Please Enter present addrress !!");
												document.getElementById('presentaddrress').style.borderColor = "red";
												return false;
												}
												else if(LanguageKnown=='')
												{
												alert("Please Enter Language Known !!");
												document.getElementById('LanguageKnown').style.borderColor = "red";
												return false;
												}
												else if(dob=='')
												{
												alert("Please Enter Birth Date !!");
												document.getElementById('date7').style.borderColor = "red";
												return false;
												}
												else if(city1=='')
												{
												alert("Please Enter City !!");
												document.getElementById('city1').style.borderColor = "red";
												return false;
												}
												else if(contactnumber=='')
												{
												alert("Please Enter contact number!!");
												document.getElementById('contactnumber').style.borderColor = "red";
												return false;
												}
												else if(email=='')
												{
												alert("Please Enter email Field !!");
												document.getElementById('email').style.borderColor = "red";
												return false;
												}
												else if(Name=='')
												{
												alert("Please Enter Emergency contact person details!!");
												document.getElementById('Name').style.borderColor = "red";
												return false;
												}
												else if(birthplace=='')
												{
												alert("Please Enter Birthplace!!");
												document.getElementById('birthplace').style.borderColor = "red";
												return false;
												}
												else
												{
												$.ajax({
												url:"backend/UpdateEmployeedetail.php",
												type:'POST',
												data:{
												empcode:empcode,
												presentaddrress:presentaddrress,
												city1:city1,
												pincode1:pincode1,
												contactnumber:contactnumber,
												mobilenumber:mobilenumber,
												email:email,
												passport:passport,
												placeissue:placeissue,
												dateissue:dateissue,
												dateexpiry:dateexpiry,
												dob:dob,
												birthplace:birthplace,
												PermenantAddres:PermenantAddres,
												city2:city2,
												pincode2:pincode2,
												perContactNumber:perContactNumber,
												Nationality:Nationality,
												LanguageKnown:LanguageKnown,
												BloodGroup:BloodGroup,
												Drivingliecence:Drivingliecence,
												Name:Name,
												Contact:Contact,
												gender:gender,
												MaritalStatus:MaritalStatus,
												COMPCODE:COMPCODE,
												
												},
												success:function(data,status){
												
												alert("Personal details have been Updated!!")
												}
												});
												
												
												}
												}
												
												/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
												// //////////////////////////////////////////////////////////Family details////////////////////////////////////////////////// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
												function UpdateEmpFamilyDetails()
												
												{
												var empcode=$('#empcode').val();
												var FatherName =$('#FatherName').val();
												var MotherName =$('#MotherName').val();
												var SpouseName=$('#SpouseName').val();
												var NofChild =$('#NofChild').val();
												var COMPCODE=$('#COMPCODE').val();
												
												// console.log(companyname);
												// console.log(jobresp);
												// console.log(sallary);
												if(SpouseName == ''){
												$('#SpouseName').val('');}
												if(NofChild == ''){
												$('#NofChild').val('');}
												
												if(empcode=='')
												{
												alert("Please Fill All Fields including Employee Code !!");
												document.getElementById('empcode').style.borderColor = "red";
												return false;
												}
												else if(FatherName=='')
												{
												alert("Please Fill Father name Field !!");
												document.getElementById('FatherName').style.borderColor = "red";
												return false;
												}
												else if(MotherName=='')
												{
												alert("Please Fill Mother name Field !!");
												document.getElementById('MotherName').style.borderColor = "red";
												return false;
												}
												
												else
												{
												$.ajax({
												url:"backend/UpdateEmployeedetail.php",
												type:"POST",
												data:{
												empcode:empcode,
												FatherName:FatherName,
												MotherName:MotherName,
												SpouseName:SpouseName,
												NofChild:NofChild,
												COMPCODE:COMPCODE,
												},
												success:function(data,status){
												
												// console.log(data);
												// console.log(status);
												
												
												alert("Family details have been Updated!!")
												
												
												
												
												}
												});
												}
												}
												
												////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// // //////////////////////////////////////qualification details/////////////////////////////////////////////////////////////
												///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
												function UpdateEmpQuali()
												{
												var COMPCODE=$('#COMPCODE').val();
												var empcode=$('#empcode').val();
												var edu =$('#edu').val();
												var eduquali =$('#eduquali').val();
												if(eduquali == ''){
												$('#eduquali').val('');}
												
												
												if(empcode=='')
												{
												alert("Please Fill Employee code Fields !!");
												document.getElementById('empcode').style.borderColor = "red";
												return false;
												}
												else if(edu=='')
												{
												alert("Please Fill Education Field !!");
												document.getElementById('edu').style.borderColor = "red";
												return false;
												}
												else{
												$.ajax({
												url:"backend/UpdateEmployeedetail.php",
												type:"POST",
												data:{
												empcode:empcode,
												edu:edu,
												eduquali:eduquali,
												COMPCODE:COMPCODE
												
												},
												
												success:function(data,status){
												
												// console.log(data);
												// console.log(status);
												
												
												alert("Qualification details have been Updated!!")
												
												}
												});
												}
												}
												
												function DeleteEmpExp(deleteid)
												{
												var DelId = deleteid ;
												
												var conf = confirm("Are you sure?");
												
												if(conf==true){
												$.ajax({
												url:"backend/Empbackend.php",
												type:"POST",
												data: { deleteid : deleteid },
												success:function(res){
												// readRecords()
												if(res == 'yes')
												{
												alert("Data Deleted");
												}
												
												}
												});
												}
												}
												
												////////////////////////////////////////////////////////////////////////////////////////////////////////
												/////////////////////////////////// Experience view/////////////////////////////////////////////////////
												////////////// /////////////////////////////////////////////////////////////////////////////////////////


												function viewempexprecord()
												{
													 var empcode=$('#empcode').val();
                                                var COMPCODE =$('#COMPCODE').val();
                                              
                                                // console.log(jobresp);
                                                // console.log(sallary);
                                                
                                                                                              
                                                $.ajax({
                                                url:"backend/ViewExperiance.php",
                                                type:"POST",
                                                data:{
                                                empcode:empcode,
                                                COMPCODE:COMPCODE
                                                
                                                },
                                                success:function(data,status){
                                                
                                                // console.log(data);
                                                // console.log(status);
                                                $("#datatable").html(data);
                                                // alert("Adedd ")
                                                
                                                }
                                                });
                                                
                                                }

												






												 ////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                //////////////// /////////////////// Experience details/////////////////////////////////////////////////////
                                                ////////////// /////////////////////////////////////////////////////////////////////////////////////////
                                                
                                                function addempexprecord()
                                                
                                                {
                                                var empcode=$('#empcode').val();
                                                var companyname =$('#compnyname').val();
                                                var fromperiod =$('#fperi').val();
                                                var toperiod=$('#tperi').val();
                                                var jobresp =$('#jresp').val();
                                                var sallary =$('#sallary').val();
                                                var Designation1 =$('#Designation1').val();
                                                var remark =$('#remark').val();
                                                // console.log(companyname);
                                                // console.log(jobresp);
                                                // console.log(sallary);
                                                
                                                if(empcode=='')
                                                {
                                                alert("Please Fill Employee code Fields !!");
                                                document.getElementById('empcode').style.borderColor = "red";
                                                
                                                }
                                                else if(companyname==''||sallary==''||Designation1=='')
                                                {
                                                alert("Please Fill All Fields");
                                                document.getElementById('compnyname').style.borderColor = "red";
                                                document.getElementById('sallary').style.borderColor = "red";
                                                
                                                }
                                                else
                                                {
                                                $.ajax({
                                                url:"backend/EmpExpBackend.php",
                                                type:"POST",
                                                data:{
                                                empcode:empcode,
                                                companyname:companyname,
                                                fromperiod:fromperiod,
                                                toperiod :toperiod,
                                                jobresp:jobresp,
                                                Designation1:Designation1,
                                                jobresp:jobresp,
                                                remark:remark,
                                                sallary:sallary
                                                },
                                                success:function(data,status){
                                                
                                                // console.log(data);
                                                // console.log(status);
                                                $("#datatable").html(data);
                                                // alert("Adedd ")
                                                
                                                }
                                                });
                                                }
                                                }
												
												
												/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
												////////////////////////////////////////////////// Add reference////////////////////////////////////////////////////////
												//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
												function UpdateEmpRef()
												{
												var COMPCODE=$('#COMPCODE').val();
												var empcode=$('#empcode').val();
												var reference =$('#reference').val();
												var Relation =$('#Relation').val();
												var contact =$('#contact').val();
												if(contact == ''){
												$('#contact').val('');
												}
												if(Relation == ''){
												$('#Relation').val('');
												}
												
												if(empcode=='')
												{
												alert("Please Fill Employee code Fields !!");
												document.getElementById('empcode').style.borderColor = "red";
												return false;
												}
												
												else{
												$.ajax({
												url:"backend/Empbackend.php",
												type:"POST",
												data:{
												empcode:empcode,
												reference:reference,
												Relation:Relation,
												contact:contact,
												COMPCODE:COMPCODE,
												
												},
												
												success:function(data,status){
												
												// console.log(data);
												// console.log(status);
												
												
												alert("Reference details have been Updated!!")
												
												}
												});
												}
												}
												</script>
											</body>
										</html>