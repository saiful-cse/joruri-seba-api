<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		include 'Connection.php';

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";

	
		$check = mysqli_fetch_array(mysqli_query($conn,$query));

		if (isset($check)) {
			echo 'ok';
		}else{
			echo 'E-mail or Password wrong!!';
		}

		mysqli_close($conn);

	}else{
		echo "Check Again.";
	}

?>