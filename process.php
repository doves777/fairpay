<?php 
$username = $_POST['user'];
$password = $_POST['pass'];

require_once('database.php');

// variable to database on AWS
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $database);

// tests if connection to database is working; error message should not pop up if working properly
if ($conn->connect_errno) {
  die('ERROR NO DATABSE');
}

// sql query to get all rows where user and pass match what was entered from POST data
$sql = "Select * FROM Employees WHERE username = '$username' AND password = '$password'";
// store sql result into result variable
$result = mysqli_query($conn, $sql);
// throw error if query failed

// if true, then correct user and pass was entered
if (mysqli_num_rows($result) > 0) {
	echo "yes";
	
	// if user is manager, goes to manager page; otherwise, goes to checkout page
	if($username == 'Manager') {
		header("location: ManagerAccessPage.html");
	} 
	else {
		header("location: blankOrderPage.html");
	}
}
// case where user or pass not correct 
else {
	
	//prompts user entered wrong password and redirects back to login page
	echo "<script type='text/javascript'>alert('Wrong password. Please try again.');
	window.location='login.php';
	</script>";
}

?> 