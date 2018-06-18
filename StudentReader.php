<?php
	$servername = "localhost";
	$username =  "root";
	$password = "root";
	$dbName = "SpeakStat";
	

	$user = $_POST["userPost"];
	//Make Connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	$sql = "SELECT `stud_id`, `stud_username`, `stud_password`, `stud_email`, `stud_address`, `stud_parentEmail`, `stud_age`, `stud_gender`, `stud_levelNow`, `stud_lives`, `stud_stars`, `stud_hints`, `class_name1` FROM `Students` WHERE stud_username = '".$user."'";
	$result = mysqli_query($conn ,$sql);
	
	
	if(mysqli_num_rows($result) > 0){
		//show data for each row
		while($row = mysqli_fetch_assoc($result)){
			echo "ID:".$row['stud_id'] .
				 "|username:".$row['stud_username']. 
				 "|password:".$row['stud_password']. 
				 "|email:".$row['stud_email'] . 
				 "|address:".$row['stud_address'] . 
				 "|parentsemail:".$row['stud_parentEmail'] . 
				 "|age:".$row['stud_age'] . 
				 "|gender:".$row['stud_gender'] . 
				 "|levelnow:".$row['stud_levelNow'] . 
				 "|lives:".$row['stud_lives'] . 
				 "|stars:".$row['stud_stars'] .
				 "|hints:".$row['stud_hints'] .
				 "|classname1:".$row['class_name1'] .  
				 ";";

				 //echo $row['class_name1'];
		}
	}
	else
		echo"Walye";
	
	
	
	


?>