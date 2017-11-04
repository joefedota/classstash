<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';

sec_session_start();
	$uid = $_SESSION['user_id'];
	if (isset($_POST['goal1'])) {
		$stmt = $mysqli->prepare('UPDATE assignment_details SET status1="Complete" WHERE id="'.$uid.'" AND assignment="'.$_POST['assignment'].'"');
		$stmt->execute();
		header('Location: ../classes.php?comp=true');
	}
	if (isset($_POST['goal2'])) {
		$stmt = $mysqli->prepare('UPDATE assignment_details SET status2="Complete" WHERE id="'.$uid.'" AND assignment="'.$_POST['assignment'].'"');
		$stmt->execute();
		header('Location: ../classes.php?comp=true');
	}
	if (isset($_POST['goal3'])) {
		$stmt = $mysqli->prepare('UPDATE assignment_details SET status3="Complete" WHERE id="'.$uid.'" AND assignment="'.$_POST['assignment'].'"');
		$stmt->execute();
		header('Location: ../classes.php?comp=true');
	}
	if (isset($_POST['goal4'])) {
		$stmt = $mysqli->prepare('UPDATE assignment_details SET status4="Complete" WHERE id="'.$uid.'" AND assignment="'.$_POST['assignment'].'"');
		$stmt->execute();
		header('Location: ../classes.php?comp=true');
	}
	if (isset($_POST['goal5'])) {
		$stmt = $mysqli->prepare('UPDATE assignment_details SET status5="Complete" WHERE id="'.$uid.'" AND assignment="'.$_POST['assignment'].'"');
		$stmt->execute();
		header('Location: ../classes.php?comp=true');
	}
	