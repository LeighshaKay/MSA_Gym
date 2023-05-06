<?php
include('connect.php');
session_start();


if(isset($_POST["date"]))
{
	$date = $_POST["date"];
	$time = $_POST["time"];
	
	$id = $_SESSION["id"];
	
	
	

	
	$sql = "INSERT INTO `booking`(`user_id`, `booking_date`, `booking_time`, `status`) VALUES ($id,CAST('". $date ."' AS DATE),CAST('". $time ."' AS TIME),1)";

		if ($conn->query($sql) === TRUE) 
		{
			echo "You Have successfully added your booking you will be redirected shortly";
			header("Refresh:5; url=cbooking.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			header("Refresh:5; url=cbooking.php");
		}
		$conn->close();

}
?>