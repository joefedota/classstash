<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';

sec_session_start();
$error = "";

if (isset($_POST['fullname'], $_POST['email'], $_POST['p'])) {
	$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	$firstTime = 1;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error .= '<p style="color: red;">Please enter a valid email.</p>';
	}
	
	$password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
	
	if(strlen($password) != 128) {
		$error .= '<p style="color: red;">Incorrect password configuration.</p>'.$password;
	}
	
	$prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
	$stmt = $mysqli->prepare($prep_stmt);
	
	if($stmt) {
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();
		
		if($stmt->num_rows == 1) {
			$error .= '<p style="color: red;">A user with this email already exists.</p>';
			$stmt->close();
		}
	}
	if(empty($error)) {
		$password = password_hash($password, PASSWORD_BCRYPT);
		
	
	//Inserting new user into database
	if ($insert_stmt = $mysqli->prepare("INSERT INTO members(fullname, email, password, firstTime) VALUES (?, ?, ?, ?)")) {
		$insert_stmt->bind_param('ssss', $fullname, $email, $password, $firstTime);
		
		if (! $insert_stmt->execute()) {
			header("Location: error.php");
		} else {
			mail($email, "Welcome to ClassStash ".$fullname."!", "Congratulations! This email has just been registered with a Class Stash, an online school management tool which students use to access academic resouces such as study guides, as well as increase their overall productivity as students. We hope you enjoy an entirely new approach to conquering your classes.
			
			Cordially,
			Joe Fedota, CEO and Founder
			
			P.S. if this was not you, please contact help@classstash.com and report it.", "From: welcome@classstash.com");
		}
	}
	header('Location: ../success.html');
	}
}
?>