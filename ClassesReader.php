<?php
	$servername = "localhost";
	$username =  "root";
	$password = "root";
	$dbName = "SpeakStat";
	
	$user = $_POST["userPost"];
	$stat = $_POST["statPost"]; 
	//$password = $_POST["passwordLogin_Post"];
	//Make Connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	//echo $username;
	
	//$sql = "SELECT `class_id`, `class_name`, `prof_id1`, `stud_id` FROM `Class` NATURAL JOIN Students where";
	if($stat=="stud")
	{
	$sql = "SELECT * FROM Class NATURAL JOIN Students WHERE  stud_username =  '".$user."' AND stud_id = stud_id1";
	$result = mysqli_query($conn ,$sql);
	}
	else if($stat=="prof")
	{
	$sql = "SELECT * FROM Class NATURAL JOIN Professor WHERE  prof_username =  '".$user."' AND prof_id = prof_id1";
	$result = mysqli_query($conn ,$sql);
	}

	
	if(mysqli_num_rows($result) > 0){
		//show data for each row
		while($row = mysqli_fetch_assoc($result)){
			echo "ID:".$row['class_id'] .
				 "|classname:".$row['class_name']. 
				 "|profid:".$row['prof_id1']. 
				 "|studid:".$row['stud_id1'] . 
				 ";";
		}
	}
	else
	{
		if($stat=="stud")
		{
		$sql = "SELECT * FROM Students WHERE  stud_username =  '".$user."' ";
		$result = mysqli_query($conn ,$sql);
		while($row = mysqli_fetch_assoc($result)){
			echo "studid:".$row['stud_id'] . 
				 "|bura?:yes" .
				 ";";
		}
		}
		
		else if($stat=="prof")
		{
		$sql = "SELECT * FROM Professor WHERE  prof_username =  '".$user."' ";
		$result = mysqli_query($conn ,$sql);
		while($row = mysqli_fetch_assoc($result)){
			echo "profid:".$row['prof_id'] . 
			     "|bura?:yes" . 
				 ";";
		}
		
		}
	}
	
	
	
	
	


?>