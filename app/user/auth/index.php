<?php
if( $_POST["username"] && $_POST["password"] ) 
{
	// Inser into DB
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "passwd"; 
	$conn = new mysqli($servername, $username, $password, $dbname);
	$query = " select userid from users where username= '{$_POST["username"]}'  and password='{$_POST["password"]}' ";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	$response = array(
		'status'=> 'success',
		'userId'=> $row["userid"]
		);
}
else
{
	$response = array(
		'status' => "Invalid Credentials"
	);
}
echo json_encode($response);