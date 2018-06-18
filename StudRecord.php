<?php
//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";
	
//Variable from the user	
	$studID = $_POST["studIDPost"]; 
	$gameID = $_POST["gameIDPost"]; 
	$score = $_POST["scorePost"]; 
	$total = $_POST["totalPost"]; 
	$percent = $_POST["percentPost"]; 
	$level = $_POST["levelNumberPost"]; 

	

	
	//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}

	$sql = "SELECT `rec_ID`, `rec_studentID`, `rec_gameID`, `rec_gameScore`, `rec_gameTotal`, `rec_gamePercentage`, `rec_levelCount` FROM `Records` WHERE rec_studentID = '".$studID."' AND rec_gameID =  '".$gameID."'";
	$results = mysqli_query($conn ,$sql);

	

	if(mysqli_num_rows($results)>0){

		 
				echo "Level Finished BUT BKA RETAKE SO GO LANG SIGURO?";

				$sqlcs = "UPDATE Records SET rec_gameScore =  '".$score."',rec_gameTotal =  '".$total."',rec_gamePercentage =  '".$percent."' WHERE rec_studentID = '".$studID."' AND rec_gameID =  '".$gameID."'";
				$result = mysqli_query($conn ,$sqlcs);
				echo "added record". mysqli_connect_error();
		
	}
	else
	{
		
				$sqlcs = "INSERT INTO Records (`rec_studentID`, `rec_gameID`, `rec_gameScore`, `rec_gameTotal`, `rec_gamePercentage`, `rec_levelCount`)
						VALUES ('".$studID."','".$gameID."','".$score."','".$total."','".$percent."','".$level."')";
				$result = mysqli_query($conn ,$sqlcs);
				echo "added record". mysqli_connect_error();
		
		

		
	}


	


?>