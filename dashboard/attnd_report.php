<?php
	include("../inc/header.php");

    include('../phpclasses/pagination.php');
    $limit = 10;
	    
	//get number of rows
	$queryNum = $db_connect->query("SELECT COUNT(*) as postNum FROM emp LIMIT $limit");
	$resultNum = $queryNum->fetch_assoc();
	$rowCount = $resultNum['postNum'];
										    
	//initialize pagination class
	$pagConfig = array(
		'totalRows' => $rowCount,
		'perPage' => $limit,
		'link_func' => 'searchFilter'
	);
	$pagination =  new Pagination($pagConfig);						    
	//get rows
	// $_SESSION['emp_id']="";
	// $_SESSION['first_name']="";
	// $_SESSION['last_name']="";
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
            <li class="nav-item current"><a href="../dashboard/attnd_report.php"><span class="nav-icon"><i class="fa fa-book"></i></span>Attendance Report</a></li>
            <li class="nav-item"><a href="../dashboard/salry_report.php"><span class="nav-icon"><i class="fa fa-money"></i></span>Salary Report</a></li>
			<?php if($usertype == "Admin"){ ?>
				<li class="nav-item"><a href="../dashboard/add_employee.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>Add Employee</a></li>
				<li class="nav-item"><a href="../dashboard/add_user.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>Add User</a></li>
			<?php		} ?>
			<li class="nav-item"><a href="../dashboard/settings.php"><span class="nav-icon"><i class="fa fa-cog"></i></span>Change password</a></li>
			<li class="nav-item"><a href="../dashboard/logout.php"><span class="nav-icon"><i class="fa fa-sign-out"></i></span>Sign out</a></li>
		</ul>
	</section>
	<section class="contentSection right clearfix">
		<div class="container">
			<div class="wrapper employee_list clearfix">
				<div class="section_title">Enter Employee ID</div>
				<div class="top-bar">
					<div class="top-item">
						<form id="empFilter" method="post" >
							<input class="filterField filterVal" type="text" name="id" placeholder="Enter ID">
							<button type="submit" name="submit1" class="btn btn-lg btn-success btn-block" style="font-size:14px; padding:7px;"> Search </button> 
						</form>
					</div>               
				</div>
					
						<?php
						 if(isset($_POST['submit1'])){
							$id=$_POST['id'];
					   
						$sql1 = "SELECT * FROM emp WHERE employee_id = '$id'";
						// mysqli_error($conn.$sql1);
						// die("working");
						if ($result=mysqli_query($db_connect, $sql1)) {
							// echo "<div class='alert alert-success col-lg-6' id='inv'>Data Searched Successfully</div>";
							echo '<ul class="emp_list">
							<li class="emp_list_head">
								<div class="emp_item_head emp_id">Employee ID</div>
								<div class="emp_item_head emp_name">Name</div>
								<div class="emp_item_head">Job Type</div>
								<div class="emp_item_head emp_status">Dept.</div>
								<div class="emp_item_head">Attendance Report</div>
							</li>
							<div id="displayempList">';   

								if(mysqli_num_rows($result)==0 ){
									echo "<tr><td colspan='4'>No result found</td></tr>";
									$_SESSION['emp_id']="";
									$_SESSION['first_name']="";
									$_SESSION['last_name']="";
								}else{
									while($row = mysqli_fetch_assoc($result)){
										$id = $row['id'];
										$_SESSION['emp_id'] = $row['employee_id'];
										$_SESSION['first_name'] = $row['first_name'];
										$middle_name = $row['middle_name'];
										$_SESSION['last_name'] = $row['last_name'];
										$job_type = $row['job_type'];
										$status = $row['status'];
										$emp_id =$_SESSION['emp_id'];
										$last_name=$_SESSION['last_name'];
										$first_name =$_SESSION['first_name'];
										if($usertype == "Admin" || $usertype == "employee" ){
											echo '										
												<li class="emp_item">
													<div class="emp_column emp_id">'.$emp_id.'</div>
													<div class="emp_column emp_name">'.$first_name." ".$last_name.'</div>
													<div class="emp_column">'.$job_type.'</div>
													<div class="emp_column emp_status ">'.$status.'</div>
													<div class="emp_column">
														<ul class="action_list">
															<li class="action_item" onclick="enterattn()" style="margin-left:100px;" title="Get Report">
															<i class="fa fa-book"></i></li>
														</ul>
													</div>
													</div>
												</li>
												</ul>
												</div>
												</div>
												</section>';
									}
								}

						}	
					}	
				}	
				if(isset($_POST['submit1'])){
				echo '
				<section class="contentSection right clearfix" style="display:none;" id="showattn">
				<div class="container" style="margin-top: 16%;">
					<div class="wrapper clearfix">
						<form  method="POST" autocomplete="off">
							<div class="section_subtitle">Report of Employee Attendance</div>
							<div class="input-box input-small">
								<label for="employee_id">Employee ID</label><br>
								<input type="text" class="inputField emp_id" name="employeeid" value="'.$_SESSION['emp_id'].'" disabled="disabled" />
								<div class="gap"></div>
								<label for="flname">Name</label><br>
								<input type="text" class="inputField firstname" name="flname" value="'.$_SESSION['first_name']." ".$_SESSION['last_name'].'" disabled="disabled" />
								<div class="gap"> </div>
								<label for="date"> Start Date</label><br>
								<input type="date" id="datepicker" class="inputField dateemployed" name="date" />
								<div class="gap"> </div>
                                <label for="date"> End Date</label><br>
								<input type="date" id="datepicker" class="inputField dateemployed" name="date1" />
								<div class="gap"> </div>
								<button type="submit" name="submit2" class="btn btn-lg btn-success btn-block" style="font-size: 17px;padding: 9px;width: 100%;margin: 19px;">Enter </button>    
							</div>
							</form>	
							</div>
							</div>
							</section>
							';
				}
		
							if(isset($_POST['submit2'])){
								$emp_id= $_SESSION['emp_id'];
								$name=$_SESSION['first_name']." ".$_SESSION['last_name'];
								$date=$_POST['date'];
								$date1=$_POST['date1'];
						// 		echo $emp_id.$name.$date.$timein.$timeout.$status;
					    //  die("working");
							$sql = mysqli_query($db_connect, "SELECT * from emp_attendance where employee_id = '$emp_id' AND date_enter BETWEEN '$date' AND '$date1'");
							$early=mysqli_query($db_connect,"SELECT time_in,time_out FROM emp_attendance where employee_id = '$emp_id' AND date_enter BETWEEN '$date' AND '$date1'");
                            $present = mysqli_query($db_connect, "SELECT status_att from emp_attendance where employee_id = '$emp_id' AND status_att='P' AND date_enter BETWEEN '$date' AND '$date1'");
                            $absent = mysqli_query($db_connect, "SELECT status_att from emp_attendance where employee_id = '$emp_id' AND status_att='A' AND date_enter BETWEEN '$date' AND '$date1'");
                            $leave = mysqli_query($db_connect, "SELECT status_att from emp_attendance where employee_id = '$emp_id' AND status_att='L' AND date_enter BETWEEN '$date' AND '$date1'");
                            $present_result = mysqli_num_rows($present);
                            $absent_result = mysqli_num_rows($absent);
							$leave_result = mysqli_num_rows($leave);
							$leave_early = mysqli_num_rows($early);
							$getempcount = mysqli_num_rows($sql);
							$a=0;
							if($leave_early>=1){
								while($le = mysqli_fetch_assoc($early)){
									$timein = $le['time_in'];
									// echo date('H:i', $timein)."<br>";
									$timeout = $le['time_out'];
									// echo date('H:i', $timeout)."<br>";
									$time1 = new DateTime($timein);
									$time2 = new DateTime($timeout);
									$interval = $time1->diff($time2);
									// echo $interval->format('%H Hour(s)')."<br>";
									// echo DateTime('H:i',$interval);
									// $diff = $timein-$timeout;
									  if($interval->format('%H')<'05' && $interval->format('%H')>'00'){
										$a++;
									 }
								}
								// echo "result: " .$a."<br>";

							}
                            if($getempcount >= 1 ){
                                echo '
                                <li class="emp_list_head">
                                <div class="emp_item_head emp_id">Employee ID</div>
                                <div class="emp_item_head emp_name">Name</div>
                                <div class="emp_item_head">Dates</div>
                                <div class="emp_item_head">Time in</div>
                                <div class="emp_item_head emp_status">Time Out</div>
                                <div class="emp_item_head">Status</div>
                                </li>';
                                while($fetch = mysqli_fetch_assoc($sql)){
                                    $employee_id = $fetch['employee_id'];
                                    $flname = $fetch['f_l_name'];
                                    $date_enter = $fetch['date_enter'];
                                    $timein = $fetch['time_in'];
                                    $timeout = $fetch['time_out'];
                                    $status_att = $fetch['status_att'];
                                    echo '										
												<li class="emp_item">
													<div class="emp_column emp_id">'.$employee_id.'</div>
													<div class="emp_column emp_name">'.$flname.'</div>
													<div class="emp_column">'.$date_enter.'</div>
													<div class="emp_column">'.$timein.'</div>
                                                    <div class="emp_column emp_status">'.$timeout.'</div>
                                                    <div class="emp_column emp_status">'.$status_att.'</div>
												</li>
											';
                                }
                                echo "<br><b> Total Present:</b> ".$present_result."&nbsp; &nbsp; &nbsp;"."<b>Total Absent:</b> ".$absent_result."&nbsp; &nbsp; &nbsp;"."<b>Total Leave :</b> ".$leave_result."&nbsp; &nbsp; &nbsp;"."<b>Total Leave early:</b> ".$a;
                        
                        } else {
                            echo "No record Found";
                            
                            // exit();
                        }
                    }
				
										
						?>

			
		<div class="modal">
			<span class="close-modal">
				<img src="../images/times.png">
			</span>
			<div class="inner_section">
				<div id="record_container" class="record_container">
					<span class="print-modal">
						<img src="../images/print.png">
					</span>
					<div id="table">
					</div>
					<div class="printbtn_wrapper">
						<span class="printbtn"> Print</span>
					</div>
				</div>
			</div>
		</div>
		<div class="del_modal">
			<div class"inner_section">
				<div class="delcontainer">
					<div class="del_title">Delete Record</div>
					<div class="del_warning"></div>
					<div class="btnwrapper">
						<span class="delbtn yesbtn" data-id="">Yes</span>
						<span class="delbtn nobtn">No</span>
					</div>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
<script>
                function enterattn(){
                    document.getElementById("showattn").style.display="block";

                }
</script>
</body>
</html>