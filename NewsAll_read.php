<?php
		header('Content-Type: application/json; charset=utf-8');  

		include 'Connection.php';
 
		$query = "SELECT * FROM news ORDER BY id DESC";

		mysqli_query($conn,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', 
		        character_set_database = 'utf8', character_set_server = 'utf8'");

		$result_read = mysqli_query($conn, $query);
		
		while(($row = mysqli_fetch_assoc($result_read)))
		{
			$data[]=$row;
		}
		
		
		echo json_encode($data,JSON_UNESCAPED_UNICODE);

?>
