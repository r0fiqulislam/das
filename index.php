<?php

$path = trim($_SERVER['REQUEST_URI'], '/');
parse_url($path, PHP_URL_PATH);

//print_r($path);


$routes = [
	'das'=>                           'views/index.php',
	'das/find-blood' =>               'views/blood/find-blood.php',
    'das/profile'  =>                 'views/profile/profile.php',

	//all admin related routes
	'das/admin-login' => 		      'views/admin/admin-login.php',
	'das/admin-dashboard' => 	      'views/admin/admin-dashboard.php',
	'das/admin-logout' =>             'views/admin/admin-logout.php',
	//'das/fetch-doctor-details' =>      'views/admin/fetch-doctor-details.php',


	//all patient related routes
	'das/patient-login' =>             'views/patient/patient-login.php',
	'das/patient-signup' =>            'views/patient/patient-signup.php',
	'das/patient-account-created' =>   'views/patient/patient-account-created.php',
	'das/patient-dashboard' =>         'views/patient/patient-dashboard.php',
	'das/make-appointment' =>          'views/patient/make-appointment.php',
	'das/find-doctor' =>               'views/patient/find-doctor.php',
    'das/find-blood' =>                'views/blood/find-blood.php',
	
	//all doctor related routes
	'das/doctor-login' =>              'views/doctor/doctor-login.php',
	'das/doctor-signup' =>             'views/doctor/doctor-signup.html',
	'das/doctor-dashboard' =>          'views/doctor/doctor-dashboard.php',
	'das/doctor-profile' =>            'views/doctor/doctor-profile.php',
	'das/doctor/support' =>            'views/doctor/support.php',
    


];
if (array_key_exists($path,$routes)) {
	require $routes[$path];
}else {

	require 'views/404-Not-Found.php';
}

