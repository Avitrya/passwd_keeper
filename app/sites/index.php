<?php
if( $_GET["user"] && $_POST["website"] && $_POST["password"] && $_POST["username"]) 
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "passwd"; 
	$conn = new mysqli($servername, $username, $password, $dbname);
	$cypherMethod = 'AES-256-CBC';
	$key = 345;
	$password=openssl_encrypt($_POST["password"], $cypherMethod, $key);
	$query = "insert into website (website,username,password,userid) values ('{$_POST["website"]}','{$_POST["username"]}','{$password}', {$_GET['user']})";
	$conn->query($query);
	$response = array(
		'status' => "success"
	);
}
else
{
	$response = array(
		'status' => "fail"
	);
}
echo json_encode($response);