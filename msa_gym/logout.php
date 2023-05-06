<?php

				session_start();
				unset($_SESSION["name"]);
				unset($_SESSION["id"]);
				header("Refresh:2; url=index.html");
				echo("You have successfully Logged Out ");
			
?>