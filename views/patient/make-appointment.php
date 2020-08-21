<?php 
session_start();

$user_id      = $_SESSION['id'];
$user_lname   = $_SESSION['l_name'];
$user_fname   = $_SESSION['f_name'];
$user_contact = $_SESSION['contact_number'];



?>

<!DOCTYPE html>
<html>
<head>
	<title>Make Appointment</title>

	<!--Jquery-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--Bootstap JS-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!--Date Time Picker JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<!--Custom JS-->
	<script src="views/patient/scripts/make-appointment.js"></script>

	<!--Bootstrap CSS CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="views/patient/style/make-appointment.css">


</head>
<body>
	
	<div class="container" id="appointment-by">
		<div class="row">
		    <div class="col align-self-start">
		     	<h4>Appointment By</h4>
		     	<span><?php echo "ID: ".$user_id; ?></span>
		     	<br>
		     	<span><?php echo "Name: ".$user_fname." ".$user_lname; ?></span>
		     	<br>
		     	<span><?php echo "Contact Number: ".$user_contact;?></span>
		     	<br>
				<span><?php echo "Selected Date: "; ?></span>
				<div class="form-check">
				    <input type="checkbox" class="form-check-input" id="book-for-me" onclick="disable_if_me();">
				    <label class="form-check-label">Appointment for me</label>
				</div>
				<div class="form-check">
				    <input type="checkbox" class="form-check-input" id="book-for-other" onclick="enable_if_other();">
				    <label class="form-check-label">Appointment for someone else</label>
				</div>
		    </div>
		</div>
	</div>

	<div class="container" id="appointment-for">
		
		<form action="appointment.php" method="POST">
			<h4>Patient Detials</h4>
			<div class="form-row">
			    <div class="col">
			    	<label>First Name</label>
			      	<input type="text" class="form-control" id="for_patient_fname" placeholder="First name">
			    </div>
			    <div class="col">
			    	<label>Last Name</label>
			      	<input type="text" class="form-control" id="for_patient_lname" placeholder="Last name">
			    </div>
			    <div class="col">
			    	<label>Age</label>
			      	<input type="text" class="form-control" id="for_patient_age" placeholder="Age">
			    </div>
			    <div class="col">
			    	<label>Gender</label>
			   		<select class="custom-select" id="for_patient_gender">
			          	<option value="1">Male</option>
			          	<option value="2">Female</option>
			          	<option value="3">Other</option>
			        </select> 
			   	</div>
			</div>

			<div class="form-row" style="margin-top: 35px;">
				<div class="col col-md-4">
					<label>Blood Group</label>
			   		<select class="custom-select" id="for_patient_blood_type">
			          	<option value="1">A+</option>
			          	<option value="2">A-</option>
			          	<option value="3">B+</option>
			          	<option value="3">B-</option>
			          	<option value="3">O+</option>
			          	<option value="3">O-</option>
			          	<option value="3">AB+</option>
			          	<option value="3">AB-</option>
			        </select> 
			   	</div>
			   	<div class="col col-md-4">
			   		<label>Contact Number</label>
			   		<input type="text" class="form-control" placeholder="Contact Number" id="for_patient_number">
			   	</div>
			</div>

			<!--Doctor Information-->
			<h4 style="margin-top: 35px;">Doctor's Details</h4>
			<div class="form-row">
				<div class="col col-md-4">
			   		<label>Doctor's Name</label>
			   		<input type="text" class="form-control" placeholder="Dr. <?php echo $user_fname." ".$user_lname; ?>" disabled>
			   	</div>
			   	<div class="col col-md-4">
			   		<label>Location</label>
			   		<input type="text" class="form-control" placeholder="Dhaka, Apollo Hospital" disabled>
			   	</div>
			</div>

			<div class="form-row" style="margin-top: 35px;">
				<div class="col col-md-4">
			   		<label>Qualifications</label>
			   		<input type="text" class="form-control" placeholder="MBBS, MCPS, FCPS, MD" disabled>
			   	</div>
			   	<div class="col col-md-4">
			   		<label>Contact Number</label>
			   		<input type="text" class="form-control" placeholder="Contact Number">
			   	</div>
			   	<div class="col col-md-4">
			   		<label>Contact Number</label>
			   		<input type="text" class="form-control" placeholder="Contact Number">
			   	</div>
			</div>

			<div class="form-row" style="margin-top: 35px;">
				<div class="col col-md-4">
			   		<label>Contact Number</label>
			   		<input type="text" class="form-control" placeholder="Contact Number">
			   	</div>
			   	<div class="col col-md-4">
			   		<label>Contact Number</label>
			   		<input type="text" class="form-control" placeholder="Contact Number">
			   	</div>
			   	<div class="col col-md-4">
			   		<label class="control-label" for="date">Change Date</label>
        			<div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
					    <input class="form-control" type="text" readonly />
					    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
			   	</div>
			</div>
			<!--Submit Button-->
			<div class="border border-light p-3 mb-3">        
		         <div class="text-center">
		            <input type="submit" class="btn btn-primary" name="submit_btn">
		         </div>
	        </div>
			
		</form>
	</div>
	
</body>
</html>