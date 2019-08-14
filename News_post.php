<?php
	
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		header('Content-Type: application/json; charset=utf-8');  

		include 'Connection.php';

		$title = mysqli_real_escape_string($conn,$_POST['news_title']);
		$desc = mysqli_real_escape_string($conn,$_POST['news_desc']);
		$photo = $_POST['photo'];
		$editor = mysqli_real_escape_string($conn,$_POST['editor']);

		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date_time  = $dt->format('d_m_Y-h_i_s');

		$folder = "photo/$date_time.png";
		
		$photoServerPath = "http://creativesaif.com/joruri_seba/$folder";

		$insertQuery = "INSERT INTO news (news_title, news_desc, photo, editor, date_time) VALUES ('$title', '$desc', '$photoServerPath', '$editor', '$date_time')";

		mysqli_query($conn,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', 
		        character_set_database = 'utf8', character_set_server = 'utf8'");


		
		$result = mysqli_query($conn, $insertQuery);

		if ($result) {
			file_put_contents($folder,base64_decode($photo));
				echo "yes";
		}else{
			echo "error";
		}
		mysqli_close($conn);


	}else{
		echo "Check Again.";
	}

?>