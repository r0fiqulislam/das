<?php  
require('config.php');

if (isset($_POST['btn_submit'])){
	
	// Assigning POST values to variables.
	$username = $_POST['username_admin'];
	$password = $_POST['password_admin'];

	// CHECK FOR THE RECORD FROM TABLE
	$query = "SELECT * FROM `admin` WHERE username='$username' and password='$password'";
	 
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);

	if ($count == 0){
		echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
	}
	
	else{
		$row = mysqli_fetch_array($result);
		session_start();
		$_SESSION['loggedin'] = true;
    	$_SESSION['admin_id'] = $row['id'];
    	$_SESSION['admin_username'] = $row['username'];

		header('Location: admin-dashboard');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="views/admin/style/admin-login.css">
</head>
<body>

	<form action="" method="POST">
		<h1>
			Admin
		</h1>
		<p>
			<span>Username: </span>
			<input type="text" name="username_admin">
		</p>
		<p>
			<span>Password: </span>
			<input type="password" name="password_admin">
		</p>
		<p>
			<input type="submit" name="btn_submit" value="Login">
		</p>
	</form>

</body>
</html>