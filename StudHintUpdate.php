<?php
//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";
	
//Variable from the user	
	$ID = $_POST["IDPost"]; 
	$hint = $_POST["hintPost"]; 
	

	
	//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
		// SELECT `stud_id`, `stud_username`, `stud_password`, `stud_email`, `stud_address`, `stud_parentEmail`, `stud_age`, `stud_gender`, `stud_levelNow`, `stud_lives`, `stud_stars`, `stud_hints`, `class_name1` FROM `Students`;

	$sql = "SELECT * FROM Students WHERE stud_id = '".$ID."'";
	$results = mysqli_query($conn ,$sql);

	

	if(mysqli_num_rows($results)>0){


			$sql = "UPDATE Students SET stud_hints =  '".$hint."' WHERE stud_id =  '".$ID."'";
			$result = mysqli_query($conn ,$sql);
			echo "updated ". $hint .mysqli_connect_error();
		
	}
	else
	{
		
				echo "no student like that". mysqli_connect_error();
		
	}

?>