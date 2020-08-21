<?php
	require('config.php');
	if (isset($_POST['btn_signup'])){
		$fname = $_POST['firstname_user'];
		$lname = $_POST['lastname_user'];
		$email = $_POST['email_user'];
		$contact_number = $_POST['contact_user'];
		$gender = $_POST['gender'];
		$password = $_POST['password_user'];
		$confirm_password = $_POST['confirm_password_user'];


		$sql = "INSERT INTO user (f_name, l_name, email, contact_number,gender, password) 
			VALUES ('$fname','$lname','$email','$contact_number','$gender','$password')";
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			header("location: user-account-created");
		}
		else{
			echo "Error: ".$sql;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Signup</title>
	<link rel="stylesheet" type="text/css" href="user-signup.css">
</head>
<body>
  	<div class="container">
  		<div class="form">
    		<div class="sign-in-section">
		      	<h1>SignUp</h1> 
      			<form action="" method="POST">
			        <div class="form-field">
			          	<label>Fist Name</label>
			          	<input type="text" name="firstname_user" placeholder="Fist Name" />
			        </div>
			        <div class="form-field">
			          	<label>Last Name</label>
			          	<input type="text" name="lastname_user" placeholder="Last Name" />
			        </div>
			        <div class="form-field">
			          	<label>Email</label>
			          	<input type="text" name="email_user" placeholder="Email" />
			        </div>
			        <div class="form-field">
			          	<label>Contact Number</label>
			          	<input type="text" name="contact_user" placeholder="Phone Number" />
			        </div>

			    
			        <div class="form-field">
			          	<label>Password</label>
			          	<input type="password" name="password_user" placeholder="Password" />
			        </div>
			        <div class="form-field">
			          	<label>Confirm Password</label>
			          	<input type="password" name="confirm_password_user" placeholder="Confirm Password" />
			        </div>		  
		        	<div class="form-field">
		          		<input type="submit" class="btn btn-signin" name="btn_signup" value="Submit" />
		        	</div>
		      	</form>
		      	<div class="links">
			        <a href="userlogin">Login here!</a>
			        <a href="#">Terms & Conditions</a> 
		      	</div>
    		</div>
  		</div>
	</div>
</body>
</html>
