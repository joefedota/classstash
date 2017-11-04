<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';

sec_session_start();

if (isset($_POST['title'], $_POST['upldtype'])) {
	$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$type = $_POST['upldtype'];
	$descrip = filter_input(INPUT_POST, 'descrip', FILTER_SANITIZE_STRING);
	$baserate = 5.0;
	if (filesize($_POST['rsrcfile'])>1000000000) {
		header('Location: ../resources.php?error=1');
	} else {
		if ($type == 'Link') {
			$link = $_POST['rsrclink'];
			$insertstmt = $mysqli->prepare('INSERT INTO resources(rsrc_path, title, description, type, rating) VALUES (?, ?, ?, ?, ?)');
			$insertstmt->bind_param('sssss', $link, $title, $descrip, $type, $baserate);
			$insertstmt->execute();
			header('Location: ../resources.php');
		} else {
		$filename = '../resources/' . time() . basename($_FILES["rsrcfile"]["name"]);
		move_uploaded_file($_FILES['rsrcfile']['tmp_name'], $filename);
		$insertstmt = $mysqli->prepare('INSERT INTO resources(rsrc_path, title, description, type, rating) VALUES (?, ?, ?, ?, ?)');
		$insertstmt->bind_param('sssss', $filename, $title, $descrip, $type, $baserate);
		$insertstmt->execute();
		if (!$insertstmt->error) {
			header('Location: ../resources.php');
		} else {
			echo $insertstmt->error;
		}
		}
	}
} else {
	echo "variables not set";
}