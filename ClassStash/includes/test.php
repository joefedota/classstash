<?php

include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';

sec_session_start();

if (isset($_POST['assignname'], $_POST['dd'], $_POST['dm'], $_POST['dy'])) {
	$uid = $_SESSION['user_id'];
	$class = $_POST['class'];
	$assignname = filter_input(INPUT_POST, 'assignname', FILTER_SANITIZE_STRING);
	$dd = $_POST['dd'];
	$dm = $_POST['dm'];
	$dy = $_POST['dy'];
	$rsrcarray[] = $_POST['names'];
	$dueDate = $dy."//".$dm."//".$dd;
	
	$assignstmt = $mysqli->prepare('INSERT INTO test_details(id, class, test, dueDate) VALUES ("'.$uid.'", "'.$class.'", "'.$assignname.'", "'.$dueDate.'")');
	$assignstmt->execute();
	if (!empty($rsrcarray[0])) {
	foreach ($rsrcarray[0] as $path) {
		$rsrcstmt = $mysqli->prepare('INSERT INTO tests(id, class, test, rsrc_path) VALUES ("'.$uid.'", "'.$class.'", "'.$assignname.'", 	"'.$path.'")');
		$rsrcstmt->execute();
	}
	}
	header('Location: ../classes.php?new=true');
} else {
	header('Location: ../classes.php?new=false');
}