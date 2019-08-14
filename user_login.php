<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		
		header('Content-Type: application/json; charset=utf-8'); 
		
		include 'Connection.php';

		$user_mobile = $_POST['mobile'];
		
		$check_mobile_query = "SELECT mobile FROM user WHERE mobile = '$user_mobile";

		//query execute and store resutl
		$isMobile = mysqli_fetch_array(mysqli_query($conn, $check_mobile_query));
		$result = $isMobile['mobile'];

		// Check MemberID exist or not
		if ($user_mobile == $result)) {
			echo "successfully";
		}else{
			echo "not_found";
		}
		mysqli_close($conn);
	}else{
		echo "Check Again";
	}

?>