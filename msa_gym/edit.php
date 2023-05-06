<?php
include('connect.php');
session_start();

if(isset($_POST["name"]))
{
	echo("update found");

	$username = $_POST["username"];
	
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$BirthYear = $_POST["BirthYear"];
	
	$email = $_POST["email"];
	$phonenumber = $_POST["phonenumber"];
	$id = $_SESSION["id"];
	
	
	$sql = "UPDATE `members` SET `name`='$name',`surname`='$surname',`username`='$username',`email`='$email',`phone`=$phonenumber,`dob`=CAST('". $BirthYear ."' AS DATE) WHERE user_id = $id";
		if ($conn->query($sql) === TRUE) 
		{
			echo "update was successfully";
			header("Refresh:3;url=profile.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

}
	
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>MSA Gym</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"></a>
					<img src="images/logo.png" alt="logo" style="width:160px;height:85px;" align="left">
					<nav id="nav">
						<a href="customer.php">Home</a>
						<a href="medical.php">Medical Aid</a>
						<a href="payment.php">Payments</a>
						<a class="active" href="profile.php">Profile</a>
						<a href="cbooking.php">Booking</a>
						<a href="logout.php">LOG Out</a>
						
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				<?php

					
					include('connect.php');
				$name = $_SESSION["name"];
				$id = $_SESSION["id"];
				
				echo("<div class='inner' style='margin-left:270px;background-color:#e5474b;color:white;height:100px;width:40%;'> welcome to your customer page : $name<br>  Membership Id : $id </div>");
							
							$sql = "SELECT * FROM `members` WHERE `user_id` = $id ";
							$result = $conn->query($sql);

								if ($result->num_rows > 0) 
								{									
									// output data of each row
									$row = $result->fetch_assoc();
									echo("<section id='main' >
											<div class='inner'>
												<header>
													<h1><center>Membership details</center></h1>
												</header> 
												<form action='edit.php' method='post' id='contactform'> 
												
												<div  class='form'>  
													<label for='Gender'>Member ID</label>
													$row[user_id]
													
													<label for='Gender'>First Name</label>
													<input type='text' name='name' value='$row[name]' id='name' minlength='2' pattern='^[a-zA-Z]+'> 
													
													<label for='Gender'>Last Name</label>
													<input type='text' name='surname' value='$row[surname]' id='surname' minlength='2' pattern='^[a-zA-Z]+'> 
													
													<label for='Gender'>Member Username</label>
													<input type='text' name='username' value='$row[username]' id='username' '> 
																										
													<label for='Gender'>Member Email Address</label>
													<input type='email' name='email' value='$row[email]' id='email' > 
																										
													<label for='Gender'>Phone Number</label>
													<input type='text' name='phonenumber' value='$row[phone]' id='phonenumber' > 
																									
													<label for='Gender'>Gender</label>
													$row[gender]
													
													<label for='Gender'>Date of Birth</label>
													<input type='date' name='BirthYear' value='$row[dob]' id='BirthYear'> 
																										
													<a href='edit.php'> <button id='update'> Update Profile </button> 
													</form>
												</div>      
											</div>
										</section>");
									
									
								} 
								$conn->close();

				?>			
			
			<section id="footer">
				<div class="inner">
					
					<div class="copyright">
						&copy; SA014:2018.
					</div>
				</div>
			</section>


		<!-- Footer -->
			
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>