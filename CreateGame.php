<?php
//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";
	
//Variable from the user	
	$environment =  $_POST["envPost"]; 
	$npc = $_POST["npcPost"];
	$type = $_POST["typPost"];
	$title = $_POST["titlePost"];
	$prob = $_POST["mainprobPost"];
	$link = $_POST["linkPost"];
	$cn = $_POST["classnamePost"];
	
	$order;
	$gameid;
	
	//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
///check username if taken
		
			$sqlmax = "SELECT MAX(`order`) as MAX FROM Game WHERE class_name2 = '".$cn."' ";
			$resultmax = mysqli_query($conn, $sqlmax);

			if(mysqli_num_rows($resultmax) > 0){
		//show data for each row
				while($row = mysqli_fetch_assoc($resultmax))
				{
			
				$order = $row['MAX'];

				//echo $order;
				}
			}//else echo "gg";


	$sqlprof = "SELECT * FROM Game WHERE class_name2 = '".$cn."' AND title = '".$title."'";
	$resultprof = mysqli_query($conn, $sqlprof);		

	if(mysqli_num_rows($resultprof)>0 ) echo "title taken";
	else if($environment=="") echo "environment not chosen";
	else if ($npc=="") echo "Character in Need not chosen";
	else if ($type=="") echo "Type not chosen";
	else if ($title=="") echo "Title is not entered";
	else if ($prob=="") echo "Problem is not entered";
	else if ($link=="") echo "Link is not entered";
	else if ($cn=="") echo "Classname is not entered";
	else {
			$order=$order+1;
	
			$sqlcs = "INSERT INTO Game (title,problem,character_inNeed,environment,`order`,type,link,class_name2)VALUES ('".$title."','".$prob."','".$npc."','".$environment."','".$order."','".$type."','".$link."','".$cn."')";
			$result = mysqli_query($conn ,$sqlcs);
			//echo "added ".$title. mysqli_connect_error();
			
			$sqlid = "SELECT * FROM Game WHERE class_name2 = '".$cn."' AND title= '".$title."'";
			$resultid = mysqli_query($conn, $sqlid);

			if(mysqli_num_rows($resultid) > 0){
		//show data for each row
				while($row = mysqli_fetch_assoc($resultid))
				{
			
				$gameid = $row['game_id'];

				echo $gameid;
				}
			}else echo "waley";
		} 

//do not echo anything else, kinukuha sya ni QnA
?>