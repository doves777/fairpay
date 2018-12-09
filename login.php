<!DOCTYPE html>
<html>
<head>
	<title>FairPay</title>
	<link rel="stylesheet" href="styleLogin.css"> 
</head>
<body>
	<div class="container">
		<section id="content">
			<form action="process.php" method="POST">
				<h1 class="slideDown">FairPay</h1>
				
				<!-- <p>
					<label>Username:</label>
					<input type="text" id="user" name="user" />
				</p> -->
				<!-- Above commented code replaced with below code -->
				
				 
				
				<?php
				
				// calls php file holding credentials to sql database on AWS
				require_once('database.php');
				
				// variable of connection to database on AWS
				$conn = mysqli_connect($db_hostname, $db_username, $db_password, $database);
				
				// sql statement to get usernames of all currently employed members; to populate dropdown menu
				$sql = "SELECT * FROM Employees";
				// store sql result into result variable
				$result = mysqli_query($conn, $sql);
				
				//drop down list of employee usernames from MySQL table on AWS
				echo '<select id="nameField" class="slideDown" name="user">';
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
				}
				echo '</select>';// Close your drop down box
			
				?>
				
				
				
				<!-- Sai's Code 
				
				<div id="nameField" class="slideDown">
					 <input list="employees" name="user" id="user" required>
					 <datalist id="employees">
						<option value="Manager">
						<option value="Joe">
						<option value="Dan">
						<option value="Bob">
						<option value="Alex">
						<option value="Chris">
					</datalist>
				</div>
				->
				
				
				
				<!-- <p>
					<label>Password:</label>
					<input type="password" id="pass" name="pass" />
				</p> -->
				<!-- Above commented code replaced with below code -->
				<div id="passwordField" class="slideDown">
					<input type="password" placeholder="Password" name="pass" id="pass" required />
				</div>			
				
				<!-- <p>
					<input type="submit" id="btn" value="Login" />
				</p> -->
				<!-- Above commented code replaced with below code -->
				<div>
					<input type="submit" value="Log in" id="myButton" class="slideDown"/>
				</div>
			</form>
		</section>
	</div>
</body>
</html>