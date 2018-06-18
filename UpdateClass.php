<?php
//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";
	
//Variable from the user	
	$updateclass = $_POST["classnameupPost"]; 
	$toupdateclass = $_POST["toclassnameupPost"]; 
	

	
	//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
		

	$sql = "SELECT * FROM Class WHERE  class_name =  '".$toupdateclass."' ";
	$results = mysqli_query($conn ,$sql);

	

	if(mysqli_num_rows($results)>0){

		$sqlr = "SELECT * FROM Class WHERE  class_name =  '".$updateclass."' ";
		$resultss = mysqli_query($conn ,$sqlr);

		if(mysqli_num_rows($resultss)>0)
		{

		
			echo "subject already existing". $updateclass .mysqli_connect_error();
		
		 
			
		}
		else
		{
			$sql = "UPDATE Class SET class_name =  '".$updateclass."' WHERE class_name =  '".$toupdateclass."'";
			$result = mysqli_query($conn ,$sql);
			echo "updated". $updateclass .mysqli_connect_error();
		
		}
		
	}
	else
	{
		
				echo "no subject like that". mysqli_connect_error();
		
		

		
	}

?>