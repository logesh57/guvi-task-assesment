<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$age = $_POST['age'];
    $dob = $_POST['dob'];
    $designation = $_POST['designation'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(firstName, lastName,age,dob,designation, email, password, number) values(?, ?, ?, ?, ?, ?,?,?)");
		$stmt->bind_param("ssissssi", $firstName, $lastName,$age,$dob,$designation, $email, $password, $number );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>