<?php
include('connect.php');
session_start();


if(isset($_POST["aidtype"]))
{
	$expdate = $_POST["expdate"];
	$memtype = $_POST["memtype"];
	$aidno = $_POST["aidno"];
	$aidtype = $_POST["aidtype"];
	$id = $_SESSION["id"];
	
	$allegeries = $_POST["allegeries"];
	$disability = $_POST["disability"];
	$cName = $_POST["cName"];
	$cRelationship = $_POST["cRelationship"];
	$cNumber = $_POST["cNumber"];
	
	
	

	
	$sql = "INSERT INTO `medical`(`provider`, `number`, `type`, `expired_date`, `user_id`, `allegeries`, `disability`, `cName`, `cRelationship`, `cNumber`) 
	VALUES ('$aidtype', $aidno,'$memtype',CAST('". $expdate ."' AS DATE),$id,'$allegeries','$disability','$cName','$cRelationship',$cNumber)";

		if ($conn->query($sql) === TRUE) 
		{
			echo "You Have successfully added your medical aid you will be redirected shortly";
			header("Refresh:5; url=medical.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

}
?>