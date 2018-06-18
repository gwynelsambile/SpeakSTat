<?php
	$servername = "localhost";
	$username =  "root";
	$password = "root";
	$dbName = "SpeakStat";
	

	$cn = $_POST["cnPost"];


	//Make Connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	$sql = "SELECT `game_id`, `title`, `problem`, `character_inNeed`, `environment`, `order`, `type`, `link`, `class_name2` FROM `Game` WHERE class_name2 = '".$cn."' ORDER BY `Game`.`order` ASC";
	
	$result = mysqli_query($conn ,$sql);
	
	
	if(mysqli_num_rows($result) > 0){
		//show data for each row
		while($row = mysqli_fetch_assoc($result)){
				 echo "ID:".$row['game_id'] .
				 "|title:".$row['title']. 
				 "|problem:".$row['problem']. 
				 "|npc:".$row['character_inNeed'] . 
				 "|environment:".$row['environment'] . 
				 "|order:".$row['order'] . 
				 "|type:".$row['type'] . 
				 "|link:".$row['link'] . 
				 "|classname:".$row['class_name2'] . 
				 ";";
		}
	}
	else echo "empty";


	
	
	
	


?>