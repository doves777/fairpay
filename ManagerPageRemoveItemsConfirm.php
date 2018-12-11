<!DOCTYPE html>
<html>
<head>

<title>FairPay</title>
<link rel="stylesheet" href="styleLogin.css"> 

</head>

<body>

<h1 id="reset"> Remove Confirmation </h1>

Service has been removed from list of available services offered.

<br><br>

<?php
		//get value from dropdown menu of service to remove from ManagerPageRemoveItems.php
		$servname = $_POST['user'];
				
		// calls php file holding credentials to sql database on AWS
		require_once('database.php');
		
		// variable of connection to database on AWS
		$conn = mysqli_connect($db_hostname, $db_username, $db_password, $database);
		
		//executes the sql statement and switches removed item's availability to 'N' for Not available	
		$sql = "UPDATE Services SET available = 'N' WHERE service_name = '$servname'";
		$result = mysqli_query($conn, $sql);			
	?>

<form method="post" action="ManagerPageRemoveItems.php"> 
	<input type="submit" value="Remove Another Service" />
</form> 

<br>

<form method="post" action="ManagerAccessPage.html"> 
	<input type="submit" value="Back to Manager Access Page" />
</form> 

<br>

</body>
</html>