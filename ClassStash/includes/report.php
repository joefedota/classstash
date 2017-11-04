<?php
	include_once 'db_connect.php';
	include_once 'psl-config.php';
	include_once 'functions.php';
	sec_session_start();
	
	if (isset($_POST['name']) && isset($_POST['descrip'])) {
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$descrip = filter_input(INPUT_POST, 'descrip', FILTER_SANITIZE_STRING);
		$stmt = $mysqli->prepare('INSERT INTO issue_forms(name, description) VALUES ("'.$name.'", "'.$descrip.'")');
		$stmt->execute();
		header('Location: ../help.php?success=true');
	} else {
		header('Location: ../help.php?error=1');
	}