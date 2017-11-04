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
	$gname1 = filter_input(INPUT_POST, 'gname1', FILTER_SANITIZE_STRING);
	$gd1 = $_POST['gd1'];
	$gm1 = $_POST['gm1'];
	$gy1 = $_POST['gy1'];
	$gname2 = filter_input(INPUT_POST, 'gname2', FILTER_SANITIZE_STRING);
	$gd2 = $_POST['gd2'];
	$gm2 = $_POST['gm2'];
	$gy2 = $_POST['gy2'];
	$gname3 = filter_input(INPUT_POST, 'gname3', FILTER_SANITIZE_STRING);
	$gd3 = $_POST['gd3'];
	$gm3 = $_POST['gm3'];
	$gy3 = $_POST['gy3'];
	$gname4 = filter_input(INPUT_POST, 'gname4', FILTER_SANITIZE_STRING);
	$gd4 = $_POST['gd4'];
	$gm4 = $_POST['gm4'];
	$gy4 = $_POST['gy4'];
	$gname5 = filter_input(INPUT_POST, 'gname5', FILTER_SANITIZE_STRING);
	$gd5 = $_POST['gd5'];
	$gm5 = $_POST['gm5'];
	$gy5 = $_POST['gy5'];
	$dueDate = $dy."//".$dm."//".$dd;
	$goalDate1 = $gy1."//".$gm1."//".$gd1;
	$goalDate2 = $gy2."//".$gm2."//".$gd2;
	$goalDate3 = $gy3."//".$gm3."//".$gd3;
	$goalDate4 = $gy4."//".$gm4."//".$gd4;
	$goalDate5 = $gy5."//".$gm5."//".$gd5;
	
	$assignstmt = $mysqli->prepare('INSERT INTO assignment_details(id, class, assignment, dueDate, goal1, goalDate1, goal2, goalDate2, goal3, goalDate3, goal4, goalDate4, goal5, goalDate5) VALUES ("'.$uid.'", "'.$class.'", "'.$assignname.'", "'.$dueDate.'", "'.$gname1.'", "'.$goalDate1.'", "'.$gname2.'", "'.$goalDate2.'", "'.$gname3.'", "'.$goalDate3.'", "'.$gname4.'", "'.$goalDate4.'", "'.$gname5.'", "'.$goalDate5.'")');
	$assignstmt->execute();
	if (!empty($rsrcarray[0])) {
	foreach ($rsrcarray[0] as $path) {
		$rsrcstmt = $mysqli->prepare('INSERT INTO assignments(id, class, assignment, rsrc_path) VALUES ("'.$uid.'", "'.$class.'", "'.$assignname.'", 	"'.$path.'")');
		$rsrcstmt->execute();
	}
	}
	header('Location: ../classes.php?new=true');
} else {
	header('Location: ../classes.php?new=false');
}