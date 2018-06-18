<?php
//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";
	
//Variable from the user	
	$addclass = $_POST["classnamePost"]; 
	$id = $_POST["idPost"]; 
	


	$profidtemp="";
	
	//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}

	$sql = "SELECT * FROM Class WHERE  class_name =  '".$addclass."' ";
	$results = mysqli_query($conn ,$sql);

	

	if(mysqli_num_rows($results)>0){

		while($row = mysqli_fetch_assoc($results)){
			/*echo "ID:".$row['class_id'] .
				 "|classname:".$row['class_name']. 
				 "|profid:".$row['prof_id1']. 
				 "|studid:".$row['stud_id1'] . 
				 ";";*/

				 if($row['stud_id1']===NULL)
				 {
				 	$isNULL="true";
				 	
					echo "added".$isNULL.$profidtemp;
				 }else
				 $profidtemp=$row['prof_id1'];
				
		}
		
		 
				echo "EXISTING CLASS FOUND";
		
		
	}
	else
	{
		
				$sqlcs = "INSERT INTO Class (class_name,prof_id1)
						VALUES ('".$addclass."','".$id."')";
				$result = mysqli_query($conn ,$sqlcs);
				echo "added class prof". mysqli_connect_error();
		
		

		
	}


	


?>