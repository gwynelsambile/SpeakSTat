<?php
//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";
	
//Variable from the user	
	$dellevel = $_POST["classnamedelPost"]; 
	$cn = $_POST["subPost"]; 
	

	
	//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
		

	$sql = "SELECT * FROM Game WHERE  title =  '".$dellevel."' AND class_name2 =  '".$cn."' ";
	$results = mysqli_query($conn ,$sql);

	

	if(mysqli_num_rows($results)>0){


			$sql = "DELETE FROM Game WHERE title =  '".$dellevel."' AND class_name2 =  '".$cn."'";
			$result = mysqli_query($conn ,$sql);
			echo "deleted". $delclass .mysqli_connect_error();
		
		 
			
		
		
	}
	else
	{
		
				echo "no Level like that". mysqli_connect_error();
		
		

		
	}

?>