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
						<a class="active" href="payment.php">Payments</a>
						<a href="profile.php">Profile</a>
						<a href="cbooking.php">Booking</a>
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
				$type = $_SESSION["type"];
				
				echo("<div class='inner' style='margin-left:270px;background-color:#e5474b;color:white;height:100px;width:40%;'> welcome to your customer page : $name<br>  Membership Id : $id </div>");
							
							$sql = "SELECT * FROM `payment` WHERE `user_id` = $id and `active`=1 ";
							$result = $conn->query($sql);

								if ($result->num_rows > 0) 
								{									
									// output data of each row
									echo("<div style='color:red;padding-left:270px' > You have already added a Payment</div>");
									$row = $result->fetch_assoc();
									echo("<section id='main' >
											<div class='inner'>
												<header>
													<h1><center>Payment details</center></h1>
												</header> 
												
												<div  class='form'>  
													<label for='Gender'>Medical Aid ID</label>
													$row[medical_id]
													<label for='Gender'>Medical Aid Provider</label>
													$row[provider]
													<label for='Gender'>Medical Aid Number</label>
													$row[number]
													<label for='Gender'>Medical Aid Type</label>
													$row[type]
													<label for='Gender'>Medical Aid Expiring Date</label>
													$row[expired_date]
													
												</div>      
											</div>
										</section>");
									
									
								} else {
									
									
									echo "<div style='color:red;padding-left:270px' > Please add your payment details</div>";
									
										$sqls = "SELECT * FROM `membership_type` WHERE `id` = $type";
									
										$results = $conn->query($sqls);
										if ($results->num_rows > 0) 
										{
											
											$rows = $results->fetch_assoc();
									echo("<section id='main' >
											<div class='inner'>
												<header>
													<h1><center>Payment details</center></h1>
												</header> 
												
												<div  class='form'>  
													<label for='Gender'>Membership Type</label>
													$rows[type]
													<label for='Gender'>Amount Due</label>
													$rows[monthly]
												<br>
													
													
				
	
											
						<form action='card.html'>  
  <label for='Gender'>Upload Reference</label>
  <input type='text'  id='Payment Reference' name='Payment Reference' name='Payment Reference' maxlength='5' pattern='.{5,}'  required>
  <br>
  
   <button>Submit</button> 	
</form> 
												<br>
													OR
													<br>
													<form action='https://www.msa.ac.za/fees/payment-dates-procedures/online-payment/' target='_blank' method='post' target='_top' style='width:300px'>
														<input type='hidden' name='cmd' value='_s-xclick'>
														<input type='hidden' name='hosted_button_id' value='XUWCZRQZ3QBFY'>
														<input type='image' src='images/online .PNG' align='center' name='submit'  alt='PayPal - The safer, easier way to pay online!'>
														<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
														
														
														
													</form>
												</div>      
											</div>
										</section>");
									
							
				
										}
								}
								$conn->close();

				?>			
			
			<script>
				jQuery(document).ready(function($){
						$cf = $('#Payment Reference');
					$cf.blur(function(e){
						phone = $(this).val();
						phone = phone.replace(/[^0-9]/g,'');
						if (phone.length != 5)
						{						
							alert('Wrong Reference Number');							
						}
						
					});
				});

				
			</script>
			
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