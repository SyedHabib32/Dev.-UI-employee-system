<?php
	include("../inc/header.php");
										    
	if($usertype != "Admin"){
        header("Location: ../dashboard");
    }

?>
	<section class="side-menu fixed left">
		<div class="top-sec">
			<div class="dash_logo">
		</div>			
			<p>UI & Dev Employee Records</p>
		</div>
		<ul class="nav">
			<li class="nav-item"><a href="../dashboard"><span class="nav-icon"><i class="fa fa-users"></i></span>All Employees</a></li>
			<li class="nav-item"><a href="../dashboard/ui_employees.php"><span class="nav-icon"><i class="fa fa-user"></i></span>UI Employees</a></li>
			<li class="nav-item"><a href="../dashboard/dev_employees.php"><span class="nav-icon"><i class="fa fa-user"></i></span>Dev. Employees</a></li>
			<li class="nav-item"><a href="../dashboard/attnd_employees.php"><span class="nav-icon"><i class="fa fa-edit"></i></span>Attendance</a></li>
			<li class="nav-item"><a href="../dashboard/attnd_report.php"><span class="nav-icon"><i class="fa fa-book"></i></span>Attendance Report</a></li>
			<li class="nav-item"><a href="../dashboard/salry_report.php"><span class="nav-icon"><i class="fa fa-money"></i></span>Salary Report</a></li>
			<?php if($usertype == "Admin"){ ?>
				<li class="nav-item current"><a href="../dashboard/add_employee.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>Add Employee</a></li>
				<li class="nav-item"><a href="../dashboard/add_user.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>Add User</a></li>
			<?php		} ?>
			<li class="nav-item"><a href="../dashboard/settings.php"><span class="nav-icon"><i class="fa fa-cog"></i></span>Change password</a></li>
			<li class="nav-item"><a href="../dashboard/logout.php"><span class="nav-icon"><i class="fa fa-sign-out"></i></span>Sign out</a></li>
		</ul>
	</section>
	<section class="contentSection right clearfix">
		<div class="displaySuccess"></div>
		<div class="container">
			<div class="wrapper add_employee clearfix">
				<div class="section_title">Add Employee</div>
				<form id="addemployee" class="clearfix" method="" action="" autocomplete="off">
					<div class="section_subtitle">Personal Data</div>
					<div class="input-box input-small left">
						<label for="employee_id">Employee ID</label><br>
						<input type="text" class="inputField emp_id" placeholder="" name="employee_id">
						<div class="error empiderror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="firstname">First Name</label><br>
						<input type="text" class="inputField firstname" name="firstname">
						<div class="error firstnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="middlename">Middle Name</label><br>
						<input type="text" class="inputField middlename" placeholder="Optional" name="middlename">
						<div class="error middlenameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="lastname">Last Name</label><br>
						<input type="text" class="inputField lastname" name="lastname">
						<div class="error lastnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="phone">Phone number</label><br>
						<input type="text" class="inputField phone" name="phone">
						<div class="error phoneerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="jobtype">Position</label><br>
						<input type="text" class="inputField jobtype" name="jobtype">
						<div class="error jobtypeerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="dateemployed">Date employed</label><br>
						<input type="text" id="datepicker" class="inputField dateemployed" name="dateemployed">
						<div class="error dateemployederror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="empstatus">Employment status</label><br>
						<select class="inputField empstatus" name="empstatus">
							<option value="">-- Select status --</option>
							<option value="Dev">Dev.</option>
							<option value="UI">UI</option>
						</select>
						<div class="error empstatuserror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="resaddress">Residential Address</label><br>
						<input type="text" class="inputField resaddress" name="resaddress">
						<div class="error resaddresserror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="reslocation">City</label><br>
						<input type="text" class="inputField reslocation" name="reslocation">
						<div class="error reslocationerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="salry">Set Salary</label><br>
						<input type="number" class="inputField reslocation" name="salry">
						<div class=""></div>
					</div>
					<div class="section_subtitle left">Upload Employee Photo</div>
					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="passport_photo" class="uploadField passport_photo">
								<div class="uploadfile passportPhoto_file">Upload Employee Photo</div>
								<div class="filebtn passport-btn">Upload</div>
								<div class="filebtn passport-disbtn">Upload</div>
							</div>
						</div>
						<div class="error photoerror"></div>
						<div class="passport_file"></div>
					</div>
					<div class="section_subtitle left">Upload Employee ID</div>
					<div class="input-box input-small left">
						<label for="idnumber">Employee CNIC</label><br>
						<input type="text" class="inputField idnumber" name="idnumber">
						<div class="error IDnumbererror"></div>
					</div>
					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="nationalID" class="uploadField nationalID">
								<div class="uploadfile nationalID_file">Upload Selected CNIC</div>
								<div class="filebtn nationID-btn">Upload</div>
								<div class="filebtn nationID-disbtn">Upload</div>
							</div>
						</div>
						<div class="error nationalIDerror"></div>
						<div class="selected_nationalID_file"></div>
					</div>
					<div class="section_subtitle left">Reference Data</div>
					<div class="input-box input-small left">
						<label for="fullname">Full Name</label><br>
						<input type="text" class="inputField fullname" name="fullname">
						<div class="error fullnameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="relationship">Relationship to employee</label><br>
						<input type="text" class="inputField relationship" name="relationship">
						<div class="error relationshiperror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="kinphone">Phone number</label><br>
						<input type="text" class="inputField kinphone" name="kinphone">
						<div class="error kinphoneerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="kinresaddress">Residential Address</label><br>
						<input type="text" class="inputField kinresaddress" name="kinresaddress">
						<div class="error kinresaddresserror"></div>
					</div>
					<div class="input-box">
						<button type="submit" class="submitField">Add record</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>