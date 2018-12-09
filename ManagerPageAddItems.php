<!DOCTYPE html>
<html>
<head>

<title>FairPay</title>
<link rel="stylesheet" href="styleLogin.css"> 
	
<script>
// function to validate user input to match sql database datatypes for each value
function validateForm() {
	
	//values that user inputs in form
	var service_type = document.forms["addItemForm"]["type_of_service"].value;
	var service_name = document.forms["addItemForm"]["service_name"].value;
	var service_price = document.forms["addItemForm"]["service_price"].value;
	
	//alert if no service type
	if (service_type == "") {
		alert("Service type must be typed out.");
		return false;
	}
	//alert if no service name
	else if (service_name ==  "") {
		alert("Service name must be filled out.");
		return false;
	}
	//alert if no service price
	else if (service_price == "") {
		alert("Service price must be filled out.");
		return false;
	}
	
	//regex pattern of service type (either 1 for Nail or 2 for Waxing)
	var service_type_pattern = /\b[1]\b|\b[2]\b/;
	//service name can be any entered characters, so no regex pattern and test for it.
	//regex pattern for service price (any number following by 2 decimal points)
	var service_price_pattern = /^[0-9]*\.[0-9]{2}$/;
	
	//alert if service type value doesn't match format
	if (!service_type_pattern.test(service_type)) {
		alert("Service Type is not of correct format. Choose 1 for Nail or 2 for Waxing.");
		return false;
	}
	
	//alert if service price value doesn't match format
	if (!service_price_pattern.test(service_price)) {
		alert("Service price is not of correct format. Must be any number followed by two decimal places e.g. 40.00.");
		return false;
	}
	
}

</script>

</head>
<body>

<h1 id="reset"> Add New Service </h1>

<form name="addItemForm" method="post" action="ManagerPageAddItems.php" onsubmit="return validateForm()">

	<div>
		<label>Type of Service (1 for Nail, 2 for Waxing):</label>
		<input name="type_of_service" id="type_of_service" type="text"/>
	</div>

	<br>

	<div>
		<label>Service Name:</label>
		<input name="service_name" id="service_name" type="text"/>
	</div>

	<br>

	<div>
		<label>Service Price:</label>
		<input name="service_price" id="service_price" type="text"/>
	</div>
	
	<br>
	
	<button>Add Service to Database</button>
	
	<br><br>

</form>

<button onclick="goBack()">Back</button>

<script>
	function goBack() {
	window.history.back();
	}
</script>

<?php

$type = $_POST['type_of_service'];
$name = $_POST['service_name'];
$price = $_POST['service_price'];

require_once('database.php');

//variable to database on AWS
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $database);

//tests if connection to database is working; error message should not pop up if working properly
if ($conn->connect_errno) {
  die('ERROR NO DATABSE');
}

//assign variable to max id count query from above
$result = mysqli_query($conn, "SELECT MAX(service_id) FROM Services");
//row is an array of all values from sql query
$row = mysqli_fetch_row($result);

//sql query to get all rows where user and pass match what was entered from POST data
$sql = "INSERT INTO Services (service_id, type_of_service_id, service_name, service_price, available) VALUES ('$row[0]' + 1, '$type', '$name', '$price', 'Y');";

//this command makes the sql query above execute
$result = mysqli_query($conn, $sql);

//prints out message saying item added to database when all user values are valid
if (mysqli_affected_rows($conn) > 0) {
	echo '<script type="text/javascript">';
	echo 'alert("Item has been added to services table in database!")';
	echo '</script>';
}

?>


</body>
</html>
