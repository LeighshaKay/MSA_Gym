<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Monash SA Gym</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
				<style>
		.icon-bar {
  position: fixed;
  top: 40%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
 

}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px; z-index:1;
  
}

.icon-bar a:hover {
    background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}

</style>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"></a>
					<img src="images/logo.png" alt="logo" style="width:160px;height:85px;" align="left">
					<nav id="nav">
						<a class="active" href="customer.php">Home</a>
						<a href="medical.php">Medical Aid</a>
						<a href="payment.php">Payments</a>
						<a href="profile.php">Profile</a>
						<a href="cbooking.php">Booking</a>
						<a href="logout.php">LOG Out</a>
						
					</nav>
				</div>
				
				
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
			
		<!-- Main -->
			<section id="banner">
				<div class="inner" style="background-color:#e5474b;color:white;height:100px;width:40%;text-align:center;">
				
				<?php

					session_start();

				$name = $_SESSION["name"];
				$id = $_SESSION["id"];
				
				echo("<div > Welcome to your MSA Gym Account <br> Member Name: $name<br>  Membership ID : $id </div>");
			
				?>	
					
					
				</div>
			</section>

		<!-- One -->
			<section id="one">
				<div class="inner">
					<header>
						
					</header>
					<h1>Transactions </h1>
					<?php
					include('connect.php');
				$name = $_SESSION["name"];
				$id = $_SESSION["id"];
				$type = $_SESSION["type"];
				
					
									
										$sql = "SELECT * FROM `membership_type` WHERE `id` = $type";
									
										$results = $conn->query($sql);
										if ($results->num_rows > 0) 
										{
											
											$rows = $results->fetch_assoc();
									echo("<section id='main' >
											<div class='inner'>
												
												<div  class='form'>  
													<label for='Gender'>Membership Type</label>
													$rows[type]
													<label for='Gender'>Amount Due</label>
													$rows[monthly]
													
													<label>Payment Status</label>
													Pending
													<br>
													
												</div>      
											</div>
										</section>");
									
							
				
										}
								
								$conn->close();
					?>
					<h1> Current Bookings </h1>
					
					<?php
					include('connect.php');
				$name = $_SESSION["name"];
				$id = $_SESSION["id"];
				$type = $_SESSION["type"];
				
					
									
										$sqls = "SELECT * FROM `booking` WHERE `user_id` = $id";
									
										$results = $conn->query($sqls);
										if ($results->num_rows > 0) 
										{
											
											$rows = $results->fetch_assoc();
									echo("<section id='main' >
											<div class='inner'>
												
												
												<div  class='form'>  
													<label for='Gender'>Booking ID</label>
													$rows[booking_id]
													<label for='Gender'>Booking Date</label>
													$rows[booking_date]
													<label for='Gender'>Booking Time</label>
													$rows[booking_time]
													
													
												</div>      
											</div>
										</section>");
									
							
				
										}
										
										else
										{
											
											echo("<section id='main' >
											<div class='inner'>
												
												<div  class='form'>  
													No bookings Available
													
												</div>      
											</div>
										</section>");
											
										}
								
								$conn->close();
					?>
					<ul class="actions">
					</ul>
				</div>
			</section>

			
						<section id="footer" style="border-top:2px solid white;">
			<div class="icon-bar">
					  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
					  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
					  <a href="#" class="google"><i class="fa fa-google"></i></a> 
					  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
					  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
					</div>

				<div class="inner" style="text-align:center">
				<img src="images/logo.png" alt="logo" style="width:160px;height:85px;" ><br>
				
					<div class="copyright">
					Copyright &copy; Monash Gym:2018.

					</div>
				</div>
			</section>
		
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script>
			
			$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
}); </script>

	</body>
</html>