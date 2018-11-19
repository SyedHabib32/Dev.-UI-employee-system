<?php 
	ob_start();
	include("../inc/db_connect.php");

	
		$record_id = mysqli_real_escape_string($db_connect, $_POST['record_id']);
		$employee_id = mysqli_real_escape_string($db_connect, $_POST['employee_id']);
		$firstname = mysqli_real_escape_string($db_connect, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($db_connect, $_POST['middlename']);
		$lastname = mysqli_real_escape_string($db_connect, $_POST['lastname']);
		$phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
		$jobtype = mysqli_real_escape_string($db_connect, $_POST['jobtype']);
		$dateemployed = mysqli_real_escape_string($db_connect, $_POST['dateemployed']);
		$resaddress = mysqli_real_escape_string($db_connect, $_POST['resaddress']);
		$reslocation = mysqli_real_escape_string($db_connect, $_POST['reslocation']);
		$passport_photo_name = mysqli_real_escape_string($db_connect, $_POST['passport_photo_name']);
		$idnumber = mysqli_real_escape_string($db_connect, $_POST['idnumber']);
		$nationalID_name = mysqli_real_escape_string($db_connect, $_POST['nationalID_name']);
		$fullname = mysqli_real_escape_string($db_connect, $_POST['fullname']);
		$relationship = mysqli_real_escape_string($db_connect, $_POST['relationship']);
		$kinphone = mysqli_real_escape_string($db_connect, $_POST['kinphone']);
		$kinresaddress = mysqli_real_escape_string($db_connect, $_POST['kinresaddress']);
		$empstatus = mysqli_real_escape_string($db_connect, $_POST['empstatus']);
	

		if($passport_photo_name != ""){
			$query = "UPDATE emp SET employee_image = '$passport_photo_name' WHERE id = '$record_id' ; ";
		}

		if($nationalID_name != ""){
			$query .= "UPDATE emp SET id_card_image = '$nationalID_name' WHERE id = '$record_id' ; ";
		}

		$query .= "UPDATE emp SET employee_id = '$employee_id', first_name = '$firstname', middle_name = '$middlename', last_name = '$lastname', phone = '$phone', id_number = '$idnumber', residence_address = '$resaddress', city = '$reslocation', ref_data = '$fullname', relationship = '$relationship', ref_phone = '$kinphone', ref_residence = '$kinresaddress', date_employed = '$dateemployed', job_type = '$jobtype', status = '$empstatus' WHERE id = '$record_id' ; ";

		ob_end_clean();			
		if(mysqli_multi_query($db_connect, $query)){

			echo json_encode(array("status" => "Success"));
			header("Location: ../dashboard");
			exit();			
		} else {
			echo json_encode(array("status" => "failed"));
			exit();
		}
		
?>