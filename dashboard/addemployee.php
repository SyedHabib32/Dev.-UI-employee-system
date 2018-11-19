<?php 
	ob_start();
	include("../inc/db_connect.php");

	


		$employee_id = mysqli_real_escape_string($db_connect, $_POST['employee_id']);
		$firstname = mysqli_real_escape_string($db_connect, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($db_connect, $_POST['middlename']);
		$lastname = mysqli_real_escape_string($db_connect, $_POST['lastname']);
		$phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
		$jobtype = mysqli_real_escape_string($db_connect, $_POST['jobtype']);
		$dateemployed = mysqli_real_escape_string($db_connect, $_POST['dateemployed']);
		$resaddress = mysqli_real_escape_string($db_connect, $_POST['resaddress']);
		$reslocation = mysqli_real_escape_string($db_connect, $_POST['reslocation']);
		$salry = mysqli_real_escape_string($db_connect, $_POST['salry']);
		$gpsreslocation = mysqli_real_escape_string($db_connect, $_POST['gpsreslocation']);
		$resdirection = mysqli_real_escape_string($db_connect, $_POST['resdirection']);
		$passport_photo_name = mysqli_real_escape_string($db_connect, $_POST['passport_photo_name']);
		$idnumber = mysqli_real_escape_string($db_connect, $_POST['idnumber']);
		$idtype = mysqli_real_escape_string($db_connect, $_POST['idtype']);
		$nationalID_name = mysqli_real_escape_string($db_connect, $_POST['nationalID_name']);
		$fullname = mysqli_real_escape_string($db_connect, $_POST['fullname']);
		$relationship = mysqli_real_escape_string($db_connect, $_POST['relationship']);
		$kinphone = mysqli_real_escape_string($db_connect, $_POST['kinphone']);
		$kinresaddress = mysqli_real_escape_string($db_connect, $_POST['kinresaddress']);
		$kinresdirection = mysqli_real_escape_string($db_connect, $_POST['kinresdirection']);
		$empstatus = mysqli_real_escape_string($db_connect, $_POST['empstatus']);
	
										
		//Check if user already exists
		$id_check =  mysqli_query($db_connect, "SELECT employee_id FROM emp WHERE employee_id = '$employee_id' ");
								
		//Count the amount of rows where username = $username
		$check_id = mysqli_num_rows($id_check);
		ob_end_clean();	
		if ($check_id == 0) {

			$query = mysqli_query($db_connect, "INSERT INTO `emp` (`id`, `employee_id`, `first_name`, `middle_name`, `last_name`, `phone`, `employee_image`, `id_number`, `id_card_image`, `residence_address`, `city`, `salry`, `ref_data`, `relationship`, `ref_phone`, `ref_residence`, `date_employed`, `job_type`, `status`) VALUES (NULL, '$employee_id', '$firstname', '$middlename', '$lastname', '$phone', '$passport_photo_name', '$idnumber', '$nationalID_name', '$resaddress', '$reslocation', '$salry', '$fullname', '$relationship', '$kinphone', '$kinresaddress', '$dateemployed', '$jobtype', '$empstatus')");
			$querycount = mysqli_num_rows($query);

			ob_end_clean();			
			if($query){

				echo json_encode(array("status" => "Success"));
				exit();			
			} else {
				echo json_encode(array("status" => "failed"));
				exit();
			}

		} else {
			echo json_encode(array("status" => "exists"));
			exit();
		}
	

?>