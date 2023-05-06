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
						<a class="active" href="medical.php">Medical Aid</a>
						<a href="payment.php">Payments</a>
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
				
				echo("<div class='inner' style='margin-left:270px;background-color:#e5474b;color:white;height:100px;width:40%;'> Welcome to your MSA Gym Account: $name<br>  Membership ID : $id </div>");
							
							$sql = "SELECT * FROM `medical` WHERE `user_id` = $id ";
							$result = $conn->query($sql);

								if ($result->num_rows > 0) 
								{									
									// output data of each row
									echo("<div style='color:red;padding-left:270px' > You have already added your medical aid</div>");
									$row = $result->fetch_assoc();
									echo("<section id='main' >
											<div class='inner'>
												<header>
													<h1><center>Medical aid details</center></h1>
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
													<label for='Gender'>ALLEGERIES OR CHRONIC MEDICATION</label>
													$row[allegeries]
													<label for='Gender'>DO YOU DECALRE DISABILITY</label>
													$row[disability]
													<label for='Gender'>NAME</label>
													$row[cName]
													<label for='Gender'>RELATIONSHIP</label>
													$row[cRelationship]
													<label for='Gender'>CONTACT NUMBER</label>
													$row[cNumber]
													
													<a href='editmedical.php'><button id='medicaledit' name='medicaledit'> Edit Medical Details </button>
												</div>      
											</div>
										</section>");
									
									
								} else {
									echo "<div style='color:red;padding-left:270px' > </div>";
									
								
							echo("<section id='main' >
								<div class='inner'>
									<header>
										<h1><center>Fill in medical aid details</center></h1>
									</header> 
									
									<div  class='form'>  
										<form action='medical_submit.php' method='post' id='contactform'> 
			
											<label for='Gender'>Medical Aid Company</label>
												<select class='item-type-1' id='aidtype' name='aidtype' required>
													 <option value>Select your medical add provider</option>
													 <option value='Bonitas Medical Fund'>Bonitas Medical Fund</option>
													<option value='Discovery Health Medical Scheme'>Discovery Health Medical Scheme</option>
													<option value='Genesis Medical Scheme'>Genesis Medical Scheme</option>
													<option value='Liberty Medical Scheme'>Liberty Medical Scheme</option>
													<option value='Medshield Medical Scheme'>Medshield Medical Scheme</option>
													<option value='Momentum Health'>Momentum Health</option>
													<option value='Pharous Medical Plan'>Pharous Medical Plan</option>
													<option value='Resolution Health Medical Scheme'> Resolution Health Medical Scheme</option>
													<option value='Selfmed Medical Scheme'>Selfmed Medical Scheme</option>
													<option value='Sizwe Medical Fund'>Sizwe Medical Fund</option>
													<option value='Suremed Health'>Suremed Health</option>
													<option value='Thebemed'>Thebemed</option>
													<option value='Topmed Medical Scheme'>Topmed Medical Scheme</option>
												</select>
											<br>
											<label for='medical number'>Medical Aid Number</label>
												<input type='text' id='aidno' name='aidno'  required/>
											<br>
											<label for='membership'>Medical Aid Plan </label>
												<select class='item-type-1'id='memtype' name='memtype' required>
													<option value>Select member type</option>
													<option value='Ingwe Option'>Ingwe Option</option>
													<option value='Impact Option'>Impact Option</option>
													<option value='Custom Option'>Custom Option</option>
													<option value='Incentive Option'>Incentive Option</option>
													<option value='Extender Option'>Extender Option</option>
													<option value='Summit Option'>Summit Option</option>
												</select>
	
											<p class='contact'><label for='expiry date'>Expiry Date</label> 
												<input type='date' id='expdate' name='expdate' required/></p>
												
												<p class='contact'> <label for='name'>Allegeries or chronic medication </label> 
    			                                  <input type='text' name='allegeries' id='allegeries' > 
			                                          </p>
													  
													  <p class='contact'> <label for='name'> Do you decalre disability</label> 
    			                                  <input type='text' name='disability' id='disability' > 
			                                          </p>
			
			
												<header>
										        <h1><center>In case of emergency contact </center></h1>
									             </header> 
												 
												 
													   
													   <p class='contact'><label for='name'>Name</label> 
    			                                        <input type='text' name='cName' id='cName'  required> 
				                                             </p>
													 
													  
													  <p class='contact'><label for='name'>Relationship</label> 
    			                                        <input type='text' name='cRelationship' id='cRelationship' minlength='2' pattern='^[a-zA-Z]+' required> 
				                                             </p>
													
			
						                           <p class='contact'><label for='phone'>Contact Number</label> 
				                                    <input type='number' id='cNumber' name='cNumber' placeholder='061-345-6789' maxlength='10' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' required>
				                                      </p>
			
			
			
    			
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