<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';

sec_session_start();
if (isset($_POST['profpic']) || isset($_POST['namein']) || isset($_POST['gradechoice']) || isset($_POST['school']) || isset($_POST['class0']) || isset($_POST['class1']) || isset($_POST['class2']) || isset($_POST['class3']) || isset($_POST['class4']) || isset($_POST['class5']) || isset($_POST['class6']) || isset($_POST['class7']) || isset($_POST['class8']) || isset($_POST['teacher0']) || isset($_POST['teacher1']) || isset($_POST['teacher2']) || isset($_POST['teacher3']) || isset($_POST['teacher4']) || isset($_POST['teacher5']) || isset($_POST['teacher6']) || isset($_POST['teacher7']) || isset($_POST['teacher8'])) {
	$class0 = filter_input(INPUT_POST, 'class0', FILTER_SANITIZE_STRING);
	$class1 = filter_input(INPUT_POST, 'class1', FILTER_SANITIZE_STRING);
	$class2 = filter_input(INPUT_POST, 'class2', FILTER_SANITIZE_STRING);
	$class3 = filter_input(INPUT_POST, 'class3', FILTER_SANITIZE_STRING);
	$class4 = filter_input(INPUT_POST, 'class4', FILTER_SANITIZE_STRING);
	$class5 = filter_input(INPUT_POST, 'class5', FILTER_SANITIZE_STRING);
	$class6 = filter_input(INPUT_POST, 'class6', FILTER_SANITIZE_STRING);
	$class7 = filter_input(INPUT_POST, 'class7', FILTER_SANITIZE_STRING);
	$class8 = filter_input(INPUT_POST, 'class8', FILTER_SANITIZE_STRING);
	$teacher0 = filter_input(INPUT_POST, 'teacher0', FILTER_SANITIZE_STRING);
	$teacher1 = filter_input(INPUT_POST, 'teacher1', FILTER_SANITIZE_STRING);
	$teacher2 = filter_input(INPUT_POST, 'teacher2', FILTER_SANITIZE_STRING);
	$teacher3 = filter_input(INPUT_POST, 'teacher3', FILTER_SANITIZE_STRING);
	$teacher4 = filter_input(INPUT_POST, 'teacher4', FILTER_SANITIZE_STRING);
	$teacher5 = filter_input(INPUT_POST, 'teacher5', FILTER_SANITIZE_STRING);
	$teacher6 = filter_input(INPUT_POST, 'teacher6', FILTER_SANITIZE_STRING);
	$teacher7 = filter_input(INPUT_POST, 'teacher7', FILTER_SANITIZE_STRING);
	$teacher8 = filter_input(INPUT_POST, 'teacher8', FILTER_SANITIZE_STRING);
	if (isset($_POST['profpic'])) {
		if (getimagesize($_FILES['profpic']['tmp_name']) == false) {
			header('Location: ../profile.php?error=1');
		} else {
			$filename = '../images/' . time() . $_SERVER['REMOTE_ADDR'] . $_FILE['profpic']['type']; 
 
			// Copy the file (if it is deemed safe) 
			move_uploaded_file($_FILES['profpic']['tmp_name'], $filename);
			$stmt1 = $mysqli->prepare("UPDATE member_details SET PROF_PIC_PATH='".$filename."' WHERE id='".$_SESSION['user_id']."'");
			$stmt1->execute();
		}
	}
	if (isset($_POST['namein']) && $_POST['namein'] != '') {
		$name = filter_input(INPUT_POST, 'namein', FILTER_SANITIZE_STRING);
		$stmt = $mysqli->prepare('UPDATE members SET fullname="'.$name.'" WHERE id="'.$_SESSION['user_id'].'"');
		$stmt->execute();
	}
	if (isset($_POST['gradechoice'])) {
		$grade = $_POST['gradechoice'];
		$stmt2 = $mysqli->prepare('UPDATE member_details SET GRADE_LEVEL="'.$grade.'" WHERE id="'.$_SESSION['user_id'].'"');
		$stmt2->execute();
	}
	if (isset($_POST['school'])) {
		$school = $_POST['school'];
		$stmt3 = $mysqli->prepare('UPDATE member_details SET SCHOOL="'.$school.'" WHERE id="'.$_SESSION['user_id'].'"');
		$stmt3->execute();
	}
	$clssstmt = $mysqli->prepare('UPDATE member_classes SET class0="'.$class0.'", class1="'.$class1.'", class2="'.$class2.'", class3="'.$class3.'", class4="'.$class4.'", class5="'.$class5.'", class6="'.$class6.'", class7="'.$class7.'", class8="'.$class8.'", teacher0="'.$teacher0.'", teacher1="'.$teacher1.'", teacher2="'.$teacher2.'", teacher3="'.$teacher3.'", teacher4="'.$teacher4.'", teacher5="'.$teacher5.'", teacher6="'.$teacher6.'", teacher7="'.$teacher7.'", teacher8="'.$teacher8.'" WHERE id="'.$_SESSION['user_id'].'"');
	$clssstmt->execute();
	header("Location: ../profile.php?update=success");
} else {
	header("Location: ../profile.php?update=failed");
}