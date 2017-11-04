<?php
	include_once 'db_connect.php';
	include_once 'psl-config.php';
	include_once 'functions.php';
	
	sec_session_start();
	
	$uid = $_SESSION['user_id'];
	$path = $_POST['path'];
	$title = $_POST['title'];
	$descrip = $_POST['descrip'];
	$rating = $_POST['rating'];
	$search = $_POST['search'];
	$check = $mysqli->prepare('SELECT title FROM mem_favorites WHERE id="'.$uid.'" AND path="'.$path.'"');
	$check->execute();
	$check->store_result();
	if ($check->num_rows == 0){
		$stmt = $mysqli->prepare('INSERT INTO mem_favorites(id, path, title, description, rating) VALUES (?, ?, ?, ?, ?)');
		$stmt->bind_param('sssss', $uid, $path, $title, $descrip, $rating);
		$stmt->execute();
	
		header('Location: ../srchlanding.php?search='.$search.'&update=success');
	} else {
		header('Location: ../srchlanding.php?search='.$search.'&update=failed');
	}
	