<?php

	function OpenCon()
	 {
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "receptiondeskqueue";

	 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
	 
	 return $conn;
	 }
	 


	$conn = OpenCon();

	//var_dump($_POST);

	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$organization = $_POST["organization"];
	$type = $_POST["type"];
	$service = $_POST["service"];

	$sql = "INSERT INTO queue (`firstName`, `lastName`, `organization`, `type`, `service`, `queuedDate`)VALUES ('".$firstName."','".$lastName."','".$organization."','".$type."','".$service."',(SELECT CURRENT_TIMESTAMP()))";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();





?>