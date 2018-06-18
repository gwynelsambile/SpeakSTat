<?php
	$servername = "localhost";
	$username =  "root";
	$password = "root";
	$dbName = "SpeakStat";


	//Make Connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	$sql = "SELECT `drill_ID`, `drill_word`, `drill_description` FROM `Drills`";
	$result = mysqli_query($conn ,$sql);
	
	
	if(mysqli_num_rows($result) > 0){
		//show data for each row
		while($row = mysqli_fetch_assoc($result)){
				 echo "ID:".$row['drill_ID'] .
				 "|word:".$row['drill_word']. 
				 "|description:".$row['drill_description']. 
				 ";";
		}
	}
	else echo "empty";


	
	
	
	


?>