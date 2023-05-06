<?php
include('connect.php');
session_start();


if(isset($_POST["usrname"]))
{
	$username = $_POST["usrname"];
	$password = $_POST["psw"];
	
	
	$sql = "SELECT * FROM `members` WHERE `username` = '$username' ";
	$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			echo("You have successfully logged in");
			while($row = $result->fetch_assoc()) 
			{
				
				$_SESSION["name"] = $row["name"];
				$_SESSION["id"] = $row["user_id"];
				$_SESSION["type"] = $row["type"];
				
				header("Refresh:2; url=customer.php");
			}
		} else {
			echo "Incorrect username or password";
			header("Refresh:2; url=login.html");
		}
		$conn->close();

}
?>