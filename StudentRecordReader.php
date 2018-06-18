<?php
	$servername = "localhost";
	$username =  "root";
	$password = "root";
	$dbName = "SpeakStat";
	

	$studID = $_POST["studIDPost"];
	//Make Connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	// $sql = "SELECT `stud_id`, `stud_username`, `stud_password`, `stud_email`, `stud_address`, `stud_parentEmail`, `stud_age`, `stud_gender`, `stud_levelNow`, `stud_lives`, `stud_stars`, `stud_hints`, `class_name1` FROM `Students` WHERE stud_username = '".$user."'";

	$sql="SELECT `rec_ID`, `rec_studentID`, `rec_gameID`, `rec_gameScore`, `rec_gameTotal`, `rec_gamePercentage`, `rec_levelCount` FROM `Records` WHERE rec_studentID = '".$studID."'ORDER BY `Records`.`rec_levelCount` ASC";
	$result = mysqli_query($conn ,$sql);
	
	
	if(mysqli_num_rows($result) > 0){
		//show data for each row
		while($row = mysqli_fetch_assoc($result)){


			echo "ID:".$row['rec_ID'] .
				 "|studID:".$row['rec_studentID']. 
				 "|gameID:".$row['rec_gameID']. 
				 "|gameScore:".$row['rec_gameScore'] . 
				 "|gameTotal:".$row['rec_gameTotal'] . 
				 "|percent:".$row['rec_gamePercentage'] . 
				 "|levelCount:".$row['rec_levelCount'] . 
				 ";";

				
		}
	}
	else
		echo"Special Code Wrong";
	
	
	
	


?>