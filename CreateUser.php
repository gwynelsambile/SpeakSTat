<?php
//Variables for the connection
	$servername = "localhost";
	$server_username =  "root";
	$server_password = "root";
	$dbName = "SpeakStat";
	
//Variable from the user	
	$username = $_POST["usernamePost"]; 
	$password = $_POST["passwordPost"];
	$email = $_POST["emailPost"];
	$address = $_POST["addressPost"];
	$age = $_POST["agePost"];
	$parentEmail = $_POST["parentEmailPost"];
	$classname = $_POST["classnamePost"];
	$gender = $_POST["genderPost"];
	$student =$_POST["studentPost"];

	
	//Make Connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
///check username if taken
			$sqlprof = "SELECT * FROM Professor WHERE prof_username = '".$username."'";
			$resultprof = mysqli_query($conn, $sqlprof);
			$sqlstud = "SELECT * FROM Students WHERE stud_username = '".$username."'";
			$resultstud = mysqli_query($conn, $sqlstud);
			$sqlclass = "SELECT * FROM Class WHERE class_name = '".$classname."'";
			$resultclass = mysqli_query($conn, $sqlclass);

	if(mysqli_num_rows($resultprof)>0 || mysqli_num_rows($resultstud)>0) echo "username taken";
	else if($username=="") echo "Username is not entered";
	else if ($password=="") echo "Password is not entered";
	else if ($email=="") echo "Email is not entered";
	else if ($address=="") echo "Address is not entered";
	else if ($age=="") echo "Age is not entered";
	else if ($parentEmail=="" && $student=="true") echo "Parent's email is not entered";
	else if ($classname=="" && $student=="true") echo "Classname is not entered";
	else if (mysqli_num_rows($resultclass)==0 && $student=="true") echo "Please enter valid classname";
	else if ($gender=="") echo "Please select your gender";
	else {
	
		if ($student=="true") 
		{
			$sqlcs = "INSERT INTO Students (stud_username, stud_password, stud_email,stud_address,stud_parentEmail,stud_age,stud_gender,stud_levelNow,stud_lives,class_name1)
					VALUES ('".$username."','".$password."','".$email."','".$address."','".$parentEmail."','".$age."','".$gender."',1,4,'".$classname."')";
			$result = mysqli_query($conn ,$sqlcs);
			echo "Welcome ".$username;
		}
		else
		{
			$sqlcp = "INSERT INTO Professor (prof_username, prof_password, prof_email,prof_address,prof_age,prof_gender)
			VALUES ('".$username."','".$password."','".$email."','".$address."','".$age."','".$gender."')";
			$result = mysqli_query($conn ,$sqlcp);
			echo "Welcome Prof. ".$username;
		}
			
			
		} 


?>