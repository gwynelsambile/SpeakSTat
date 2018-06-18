<?php
//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";
	
//Variable from the user	
	$delclass = $_POST["classnamedelPost"]; 
	

	
	//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
		

	$sql = "SELECT * FROM Class WHERE  class_name =  '".$delclass."' ";
	$results = mysqli_query($conn ,$sql);

	

	if(mysqli_num_rows($results)>0){


			$sql = "DELETE FROM Class Where class_name =  '".$delclass."' ";
			$result = mysqli_query($conn ,$sql);
			echo "deleted". $delclass .mysqli_connect_error();
		
		 
			
		
		
	}
	else
	{
		
				echo "no subject like that". mysqli_connect_error();
		
		

		
	}

?>