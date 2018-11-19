<?php
	include("../inc/header.php");
										    
	if($usertype != "Admin"){
        header("Location: ../dashboard");
    }

    if(isset($_GET['id'])){
    	$record_id = mysqli_real_escape_string($db_connect, $_GET['id']);

    	$getinfo = mysqli_query($db_connect, "SELECT * FROM emp WHERE id = '$record_id' ");
        $getinfocount = mysqli_num_rows($getinfo);

        if($getinfocount == 1){
            if($fetch = mysqli_fetch_assoc($getinfo)){
                $employee_id = $fetch['employee_id'];
                $firstname = $fetch['first_name'];
                $middlename = $fetch['middle_name'];
                $lastname = $fetch['last_name'];
                $phone = $fetch['phone'];
                $employee_image = $fetch['employee_image'];
                $id_number = $fetch['id_number'];
                $residence_address = $fetch['residence_address'];
				$residence_location = $fetch['city'];
				$salry = $fetch['salry'];
                $next_of_kin = $fetch['ref_data'];
                $relationship = $fetch['relationship'];
                $phone_of_kin = $fetch['ref_phone'];
                $kin_residence = $fetch['ref_residence'];
                $date_employed = $fetch['date_employed'];
                $job_type = $fetch['job_type'];
                $status = $fetch['status'];
            }
        }
    } else {
    	echo "Invalid Approach";
    	exit();
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
				<div class="section_title">Update Employee Records</div>
				<form id="" class="clearfix" method="POST" action="editemployee.php">
					<div class="section_subtitle">Personal Data</div>
					<input type="hidden" name="record_id" value="<?php echo $record_id ?>">
					<div class="input-box input-small left">
						<label for="employee_id">Employee ID</label><br>
						<input type="text" class="inputField emp_id" placeholder="Optional" name="employee_id" value="<?php echo $employee_id ?>">
						<div class="error empiderror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="firstname">First Name</label><br>
						<input type="text" class="inputField firstname" name="firstname" value="<?php echo $firstname ?>">
						<div class="error firstnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="middlename">Middle Name</label><br>
						<input type="text" class="inputField middlename" placeholder="Optional" name="middlename" value="<?php echo $middlename ?>">
						<div class="error middlenameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="lastname">Last Name</label><br>
						<input type="text" class="inputField lastname" name="lastname" value="<?php echo $lastname ?>">
						<div class="error lastnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="phone">Phone number</label><br>
						<input type="text" class="inputField phone" name="phone" value="<?php echo $phone ?>">
						<div class="error phoneerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="jobtype">Job Type</label><br>
						<input type="text" class="inputField jobtype" name="jobtype" value="<?php echo $job_type ?>">
						<div class="error jobtypeerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="dateemployed">Date employed</label><br>
						<input type="text" id="datepicker" class="inputField dateemployed" name="dateemployed" value="<?php echo $date_employed ?>">
						<div class="error dateemployederror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="empstatus">Employment status</label><br>
						<select class="inputField empstatus" name="empstatus">
							<option hidden><?php echo $status ?></option>
							<option value="Dev">Dev.</option>
							<option value="UI">UI</option>
							<!-- <option value="<?//php echo $status ?>"><?//php echo $status ?></option>
							<option value="former">Former employee</option>
							<option value="employee">Employee</option> -->
						</select>
						<div class="error empstatuserror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="resaddress">Residential Address</label><br>
						<input type="text" class="inputField resaddress" name="resaddress" value="<?php echo $residence_address?>">
						<div class="error resaddresserror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="reslocation">City</label><br>
						<input type="text" class="inputField reslocation" name="reslocation" value="<?php echo $residence_location ?>">
						<div class="error reslocationerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="reslocation">Set Salry</label><br>
						<input type="number" class="inputField reslocation" name="salry" value="<?php echo $salry ?>">
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
						<input type="text" class="inputField idnumber" name="idnumber" value="<?php echo $id_number ?>">
						<div class="error IDnumbererror"></div>
					</div>
					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="nationalID" class="uploadField nationalID">
								<div class="uploadfile nationalID_file">Upload CNIC</div>
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
						<input type="text" class="inputField fullname" name="fullname" value="<?php echo $next_of_kin ?>">
						<div class="error fullnameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="relationship">Relationship to employee</label><br>
						<input type="text" class="inputField relationship" name="relationship" value="<?php echo $relationship ?>">
						<div class="error relationshiperror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="kinphone">Phone number</label><br>
						<input type="text" class="inputField kinphone" name="kinphone" value="<?php echo $phone_of_kin ?>">
						<div class="error kinphoneerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="kinresaddress">Residential Address</label><br>
						<input type="text" class="inputField kinresaddress" name="kinresaddress" value="<?php echo $kin_residence ?>">
						<div class="error kinresaddresserror"></div>
					</div>
					<div class="input-box">
						<button type="submit" class="submitField">Update record</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>