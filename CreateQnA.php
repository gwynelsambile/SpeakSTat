<?php
//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";
	
//Variable from the user	
	$quest =$_POST["questPost"]; 
	$c1 =$_POST["choice1Post"];
	$c2 =$_POST["choice2Post"];
	$c3 =$_POST["choice3Post"];
	$ans = $_POST["ansPost"];
	$level = $_POST["diffPost"];
	$order = $_POST["orderPost"];
	$game_id1=$_POST["gameIDPost"];

	$type;
	
	//echo $quest;
	//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
///check username if taken
		
		$sqlmax = "SELECT * FROM Game WHERE  game_id= '".$game_id1."'";
			$resultmax = mysqli_query($conn, $sqlmax);

			if(mysqli_num_rows($resultmax) > 0){
		//show data for each row
				while($row = mysqli_fetch_assoc($resultmax))
				{

				$type= $row['type'];

				//echo $game_id;
				}
			}else echo "gg";


	$sqlprof = "SELECT * FROM QnA WHERE game_id1 = '".$game_id1."' AND question = '".$quest."'";
	$resultprof = mysqli_query($conn, $sqlprof);		

	if(mysqli_num_rows($resultprof)>0 ) echo "Question already posted";
	else if($quest=="") echo "Question not Entered";
	else if($c1=="") echo "Choice 1 not Entered";
	else if ($c2=="") echo "Choice 2 not Entered";
	else if ($c3=="") echo "Choice 3 not Entered";
	else if ($ans=="") echo "Answer is not entered";
	else if (($level!="easy" || $level!="hard")  && $type=="Levels") echo "Difficulty is not entered";
	else {
			//$order=$order+1;
			
				$sqlcs = "INSERT INTO QnA (question,choice1,choice2,choice3,answer,difficulty,Qorder,game_id1)VALUES ('".$quest."','".$c1."','".$c2."','".$c3."','".$ans."','".$level."','".$order."','".$game_id1."')";
			$result = mysqli_query($conn ,$sqlcs);
			echo "level added on ".$game_id1. mysqli_connect_error();
		
			
		} 


?>