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
						<a href="profile.php">Profile</a>
						<a class="active" href="cbooking.php">Booking</a>
						<a href="logout.php">LOG Out</a>
						
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				<?php

					session_start();
					include('connect.php');
				$name = $_SESSION["name"];
				$id = $_SESSION["id"];
				
				echo("<div class='inner' style='margin-left:270px;background-color:#e5474b;color:white;height:100px;width:40%;'> welcome to your customer page : $name<br>  Membership Id : $id </div>");
							
							$sql = "SELECT * FROM `booking` WHERE `user_id` = $id";
							$result = $conn->query($sql);

								if ($result->num_rows > 0) 
								{									
									// output data of each row
									echo("<div style='color:red;padding-left:270px' > You have already added your booking</div>");
									$row = $result->fetch_assoc();
									echo("<section id='main' >
											<div class='inner'>
												<header>
													<h1><center>Booking details</center></h1>
												</header> 
												
												<div  class='form'>  
													<label for='Gender'>Booking ID</label>
													$row[booking_id]
													<label for='Gender'>Booking Date</label>
													$row[booking_date]
													<label for='Gender'>Booking Time</label>
													$row[booking_time]
													
													
												</div>      
											</div>
										</section>");
									
									
								} else {
									echo "<div style='color:red;padding-left:270px' > Please add your medical aid details</div>";
									
								
							echo("<section id='main' >
								<div class='inner'>
									<header>
										<h1><center>Fill in Booking details</center></h1>
									</header> 
									
									<div  class='form'>  
										<form action='booking_submit.php' method='post' id='contactform'> 
			
											
											<p class='contact'><label for='expiry date'>Booking Date</label> 
												<input type='date' id='date' name='date' required/></p>
												
											<p class='contact'><label for='expiry date'>Booking Time</label> 
												<input type='time' id='time' name='time' required/></p>
			
    			
											<button> Submit </button>
											
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