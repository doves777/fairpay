<!DOCTYPE html>
<html>
<head>

<title>FairPay</title>
<link rel="stylesheet" href="styleLogin.css"> 

</head>

<body>

<h1 id="reset"> Remove Service </h1>

	Current List of Available Services:
	<br><br>

<form action="ManagerPageRemoveItemsConfirm.php" method="post" onsubmit="return confirm('Are you sure you want to remove this service?');">	
	
	<?php	
		// calls php file holding credentials to sql database on AWS
		require_once('database.php');
		
		// variable of connection to database on AWS
		$conn = mysqli_connect($db_hostname, $db_username, $db_password, $database);
		
		// sql statement to get usernames of all currently employed members; to populate dropdown menu
		$sql = "SELECT service_name FROM Services WHERE available = 'Y'";
		// store sql result into result variable
		$result = mysqli_query($conn, $sql);
		
		//drop down list of employee usernames from MySQL table on AWS
		echo '<select id="nameField" name="user">';
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo '<option value="'.$row['service_name'].'">'.$row['service_name'].'</option>';
		}
		echo '</select>';// Close your drop down box			
	?>
	
	<br>
	
	<input type="submit" value="Remove">
	
	<br><br>

</form>
	
	<form method="get" action="ManagerAccessPage.html"> 
		<input type="submit" value="Back" />
	</form> 

</body>
</html>