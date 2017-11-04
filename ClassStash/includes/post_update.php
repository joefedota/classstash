<?php
	include_once 'db_connect.php';
	include_once 'psl-config.php';
	include_once 'functions.php';
	sec_session_start();

	if (isset($_POST['update'])) {
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$time = time();
		$uid = $_SESSION['user_id'];
		$update = filter_input(INPUT_POST, 'update', FILTER_SANITIZE_STRING);
		$class = $_POST['class'];
		$teacher = $_POST['teacher'];
		$uid = $_SESSION['user_id'];
		$get = $mysqli->prepare('SELECT fullname FROM members WHERE id="'.$uid.'"');
		$get->execute();
		$get->store_result();
		$get->bind_result($name);
		$get->fetch();
		$stmt = $mysqli->prepare('INSERT INTO `class_updates`(`id`, `class`, `teacher`, `user`, `update`, `time`) VALUES ("'.$uid.'", "'.$class.'", "'.$teacher.'", "'.$name.'", "'.$update.'", "'.$time.'")');
		$stmt->execute();
		header('Location: ../classes.php?update=success');
	} else {
		header('Location: ../classes.php');
	}