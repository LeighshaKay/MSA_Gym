<?php
include('connect.php');
session_start();

if(isset($_POST["aidno"]))
	
{
	echo("update found");
	
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
	
	
	

	
	$sql = "UPDATE `medical` SET `provider`= '$memtype',`number`=$aidno,`type`='$aidtype',`expired_date`=CAST('". $expdate ."' AS DATE),`user_id`=$id,`allegeries`='$allegeries',`disability`='$disability',`cName`='$cName',`cRelationship`='$cRelationship',`cNumber`= $cNumber WHERE user_id = $id";

		if ($conn->query($sql) === TRUE) 
		{
			echo "Medical Details Updated";
			header("Refresh:3; url=medical.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

}
?>