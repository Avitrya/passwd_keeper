<?php
if( $_GET["user"] ) 
{
	// Inser into DB
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "passwd"; 
	$conn = new mysqli($servername, $username, $password, $dbname);
	$query = "select website,password from website where userid = '{$_GET["user"]}'";
	$result = $conn->query($query);
	$cypherMethod = 'AES-256-CBC';
	$key = 345;
	while($row = $result->fetch_assoc())
	{
		echo "Website: ".$row["website"]." Password: ".openssl_decrypt($row["password"], $cypherMethod, $key)."\n";
	}
}
else
{
	$response = array(
		'status' => "Invalid userid"
	);
	echo json_encode($response);
}