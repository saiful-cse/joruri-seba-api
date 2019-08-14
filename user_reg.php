<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		include 'connection.php';

		
		$user_name = $_POST['name'];
		$area = $_POST['area'];
		$user_mobile = $_POST['mobile'];
		
		$check_mobile_query = "SELECT mobile FROM user WHERE mobile = '$user_mobile'";

		$registratin_query = "INSERT INTO user (name, area, mobile) VALUES ('$user_name', '$area', '$user_mobile')";


		//query execute and store resutl
		$isMobile = mysqli_fetch_array(mysqli_query($conn, $check_mobile_query));

		// Check MemberID exist or not
		if (isset($isMobile)) {
			echo "exist";
		}else{

			$registratin_result = mysqli_query($conn, $registratin_query);
			if ($registratin_result) {
				echo "successfully";
			}else{
				echo "error";
			}
		}

			
	}else{
		echo "Check Again";
	}

?>