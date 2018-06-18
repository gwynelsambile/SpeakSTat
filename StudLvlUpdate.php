<?php
//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";
	
//Variable from the user	
	$ID = $_POST["IDPost"]; 
	$level = $_POST["levelPost"]; 
	

	
	//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
		// $sql = "SELECT `stud_id`, `stud_username`, `stud_password`, `stud_email`, `stud_address`, `stud_parentEmail`, `stud_age`, `stud_gender`, `stud_levelNow`, `stud_lives`, `class_name1`, `prof_id2` FROM Students WHERE stud_id = '".$ID."'";

	$sql = "SELECT * FROM Students WHERE stud_id = '".$ID."'";
	$results = mysqli_query($conn ,$sql);

	

	if(mysqli_num_rows($results)>0){


			$sql = "UPDATE Students SET stud_levelNow =  '".$level."' WHERE stud_id =  '".$ID."'";
			$result = mysqli_query($conn ,$sql);
			echo "updated". $level .mysqli_connect_error();
		
	}
	else
	{
		
				echo "no student like that". mysqli_connect_error();
		
	}

?>