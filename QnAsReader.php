<?php
	$servername = "localhost";
	$username =  "root";
	$password = "root";
	$dbName = "SpeakStat";
	

	$gId = $_POST["IdPost"];


	//Make Connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	$sql =" SELECT `prob_id`, `question`, `choice1`, `choice2`, `choice3`, `answer`, `difficulty`, `Qorder`, `game_id1` FROM `QnA` WHERE game_id1 = '".$gId."' "; 
	$result = mysqli_query($conn ,$sql);
	
	
	if(mysqli_num_rows($result) > 0){
		//show data for each row
		while($row = mysqli_fetch_assoc($result)){
				 echo "ID:".$row['prob_id'] .
				 "|question:".$row['question']. 
				 "|c1:".$row['choice1']. 
				 "|c2:".$row['choice2'] . 
				 "|c3:".$row['choice3'] . 
				 "|answer:".$row['answer'] . 
				 "|level:".$row['difficulty'] . 
				 "|order:".$row['Qorder'] . 
				 "|gameID:".$row['game_id1'] . 
				 ";";
		}
	}
	else echo "empty";


	
	
	
	


?>