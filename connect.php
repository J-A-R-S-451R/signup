<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into signup(firstName, lastName, username, password) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $lastName, $username, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration was sucessful...";
		$stmt->close();
		$conn->close();
	}
?>