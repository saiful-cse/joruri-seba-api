<?php
	
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		header('Content-Type: application/json; charset=utf-8');  

		include 'Connection.php';
		
		
		$title = mysqli_real_escape_string($conn,$_POST['news_title']);
		$desc = mysqli_real_escape_string($conn,$_POST['news_desc']);
		$photo = $_POST['photo'];
		$time = $_POST['date_time'];

		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date_time  = $dt->format('d_m_Y-h_i_s');

		$folder = "photo/$time.png";
		
		$photoServerPath = "http://creativesaif.com/joruri_seba/$folder";

		$insertQuery = "UPDATE news SET news_title = '$title', news_desc = '$desc', photo = '$photoServerPath' WHERE date_time = '$time' ";

		mysqli_query($conn,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', 
		        character_set_database = 'utf8', character_set_server = 'utf8'");

		$result = mysqli_query($conn, $insertQuery);

		if ($result) {
			file_put_contents($folder,base64_decode($photo));
				echo "yes";
		}else{
			echo "error";
		}


	}else{
		echo "Check Again.";
	}

?>