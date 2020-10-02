<?php
print_r ($_POST);
if( $_POST["username"] && $_POST["password"] )
{
	$response = array(
		'status' => "account created"
	);
	// Insert into DB
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "passwd"; 
	$conn = new mysqli($servername, $username, $password, $dbname);
	$query = "insert into users (username,password) values ('{$_POST["username"]}','{$_POST["password"]}')";
	$result = $conn->query($query);
}
else
{
	$response = array(
		'status' => "account creation unsuccessful"
	);
}
echo json_encode($response);