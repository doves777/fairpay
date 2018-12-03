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
				<div id="nameField" class="slideDown">
					 <input list="employees" placeholder="Username" name="user" id="user" required>
					 <datalist id="employees">
						<option value="Joe">
						<option value="Dan">
						<option value="Bob">
						<option value="Alex">
						<option value="Chris">
					</datalist>
				</div>
				
				
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
