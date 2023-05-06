<?php
include('connect.php');
session_start();


if(isset($_POST["name"]))
{
	$membership = $_POST["membership"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$BirthYear = $_POST["BirthYear"];
	
	$email = $_POST["email"];
	$phonenumber = $_POST["phonenumber"];
	$gender = $_POST["gender"];
	

	
	$sql = " INSERT INTO `members`(`name`, `surname`, `username`, `password`, `email`, `phone`, `gender`, `dob`, `type`) VALUES ('$name','$surname','$username','$password','$email',$phonenumber,'$gender',CAST('". $BirthYear ."' AS DATE),'$membership')";

		if ($conn->query($sql) === TRUE) 
		{
			echo "Registered successfully, use username and password to login";
			header("Refresh:2;url=login.html");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

}
?>