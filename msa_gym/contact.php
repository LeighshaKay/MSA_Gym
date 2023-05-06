<?php
include('connect.php');
session_start();


if(isset($_POST["contact"]))
{
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	
	
	$sql = "INSERT INTO `contact`(`name`, `email`, `message`) VALUES ('$name','$email','$message') ";
	$result = $conn->query($sql) ;

		if ($result) 
		{			
				header("Refresh:5; url=inedx.html");
				echo "Thank you for contacting us...we will reply you shortly";
				
			
		} else {
			echo "Incorrect details";
			header("Refresh:3; url=index.html");
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

}
?>