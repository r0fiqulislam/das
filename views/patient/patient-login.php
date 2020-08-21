<?php  
require('config.php');
session_start();

if (isset($_POST['btn_login'])){
	
	// Assigning POST values to variables.
	$email = $_POST['email_patient'];
	$password = $_POST['password_patient'];

	$query = "SELECT * FROM `patient` WHERE email='$email' and password='$password'";
	 
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);

	if ($count == 1){
		$rows_patient = mysqli_fetch_array($result);
		
		$_SESSION['id']                 = $rows_patient['id'];
		$_SESSION['f_name']             = $rows_patient['f_name'];
		$_SESSION['l_name']             = $rows_patient['l_name'];
		$_SESSION['contact_number']     = $rows_patient['contact_number'];
		header('Location: patient-dashboard');
	}
	
	else{
	echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
	echo "Invalid Login Credentials";

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Login</title>
	<link rel="stylesheet" type="text/css" href="views/patient/style/patient-login.css">
</head>
<body>
  	<div class="container">
  		<div class="form">
    		<div class="sign-in-section">
		      	<h1>Log in</h1> 
      			<form action="" method="POST">
			        <div class="form-field">
			          	<label for="email">Email</label>
			          	<input id="email" type="text" name="email_patient" placeholder="Email" />
			        </div>
			        <div class="form-field">
			          	<label for="password">Password</label>
			          	<input id="password" type="password" name="password_patient" placeholder="Password" />
			        </div>
		        	<div class="form-options">
		          		<a href="#">Forgot Password?</a>
		        	</div>
		        	<div class="form-field">
		          		<input type="submit" class="btn btn-signin" name="btn_login" value="Submit" />
		        	</div>
		      	</form>
		      	<div class="links">
			        <a href="patient-signup">Create new account</a>
			        <a href="#">Terms & Conditions</a> 
		      	</div>
    		</div>
  		</div>
	</div>
</body>
</html>