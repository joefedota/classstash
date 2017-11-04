<?php
	include_once 'db_connect.php';
	include_once 'psl-config.php';
	include_once 'functions.php';
	sec_session_start();
	
	$uid = $_SESSION['user_id'];
	if (isset($_POST['assign'])) {
		$stmt = $mysqli->prepare('DELETE FROM assignments WHERE id="'.$uid.'" AND assignment="'.$_POST['assign'].'"');
		$stmt->execute();
		$dstmt = $mysqli->prepare('DELETE FROM assignment_details WHERE id="'.$uid.'" AND assignment="'.$_POST['assign'].'"');
		$dstmt->execute();
		header('Location: ../classes.php?deleted=true');
	}
	if (isset($_POST['test'])) {
		$stmt = $mysqli->prepare('DELETE FROM tests WHERE id="'.$uid.'" AND assignment="'.$_POST['test'].'"');
		$stmt->execute();
		$dstmt = $mysqli->prepare('DELETE FROM test_details WHERE id="'.$uid.'" AND assignment="'.$_POST['assign'].'"');
		$dstmt->execute();
		header('Location: ../classes.php?deleted=true');
	}