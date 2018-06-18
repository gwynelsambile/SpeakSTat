<?php
//include 'db_connect.php';

	//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";


	//variables from Unity
	$username = $_POST["usernameLogin_Post"];
	$password = $_POST["passwordLogin_Post"];

//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
		echo "NoConnection";
	}


$sqlprof = "SELECT * FROM Professor WHERE prof_username = '".$username."'";
$resultprof = mysqli_query($conn, $sqlprof);

$sqlstud = "SELECT * FROM Students WHERE stud_username = '".$username."'";
$resultstud = mysqli_query($conn, $sqlstud);

//get result and confirm login
if(mysqli_num_rows($resultprof)>0){
	//show data for each row
	while($rowprof= mysqli_fetch_assoc($resultprof))
	{
		if($rowprof['prof_password']==$password)
		{
			
			echo "Welcome Prof. ".$username;
			
		
		}
		else
		{
			echo "password incorrect";
			
			
		}
		break;
		
	}
}
else if(mysqli_num_rows($resultstud)>0)
{ 

	//show data for each row
		while($rowstud= mysqli_fetch_assoc($resultstud))
		{
			if($rowstud['stud_password']==$password)
			{
				
				echo "Welcome ".$username;
						

			}else
			{
				echo "password incorrect";
				
			}
			break;
		}
	
}
else
echo"User not found";


$mysqli->close();



?>