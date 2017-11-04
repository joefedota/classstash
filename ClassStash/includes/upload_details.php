<?php

include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';

sec_session_start();

if (isset($_POST['school'], $_POST['gradechoice'], $_POST['bm'], $_POST['bd'], $_POST['by'])) {
	$school = filter_input(INPUT_POST, 'school', FILTER_SANITIZE_STRING);
	$schlstmt = $mysqli->prepare("SELECT school FROM schools WHERE school = '".$school."'");
	$schlstmt->execute();
	$schlstmt->store_result();
	if ($schlstmt->num_rows == 0) {
		$insert_stmt = $mysqli->prepare("INSERT INTO schools (school) VALUES ('".$school."')");
		$insert_stmt->execute();
	}
	$by = $_POST['by'];
	$bm = $_POST['bm'];
	$bd = $_POST['bd'];
	$grade = $_POST['gradechoice'];
	$birthday = $by."//".$bm."//".$bd;
	$uid = $_SESSION['user_id'];
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
	if (empty($_FILES['profpic']['tmp_name'])) {
		$updatestmt = $mysqli->prepare("UPDATE members SET firstTime = 0 WHERE id = ?");
		$updatestmt->bind_param('i', $uid);
		$updatestmt->execute();
		$clsscheck = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class0."' AND school = '".$school."' AND teacher = '".$teacher0."'");
		$clsscheck->execute();
		$clsscheck->store_result();
		if ($clsscheck->num_rows == 0) {
			if ($class0 != 'Select your class' || $class0 != 'None') {
				$clssinsert = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class0."', '".$teacher0."')");
				$clssinsert->execute();
			}
		}
		$clsscheck2 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class1."' AND school = '".$school."' AND teacher = '".$teacher1."'");
		$clsscheck2->execute();
		$clsscheck2->store_result();
		if ($clsscheck2->num_rows == 0) {
			$clssinsert2 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class1."', '".$teacher1."')");
			$clssinsert2->execute();
		}
		$clsscheck3 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class2."' AND school = '".$school."' AND teacher = '".$teacher2."'");
		$clsscheck3->execute();
		$clsscheck3->store_result();
		if ($clsscheck3->num_rows == 0) {
			$clssinsert3 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class2."', '".$teacher2."')");
			$clssinsert3->execute();
		}
		$clsscheck4 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class3."' AND school = '".$school."' AND teacher = '".$teacher3."'");
		$clsscheck4->execute();
		$clsscheck4->store_result();
		if ($clsscheck4->num_rows == 0) {
			$clssinsert4 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class3."', '".$teacher3."')");
			$clssinsert4->execute();
		}
		$clsscheck5 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class4."' AND school = '".$school."' AND teacher = '".$teacher4."'");
		$clsscheck5->execute();
		$clsscheck5->store_result();
		if ($clsscheck5->num_rows == 0) {
			$clssinsert5 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class4."', '".$teacher4."')");
			$clssinsert5->execute();
		}
		$clsscheck6 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class5."' AND school = '".$school."' AND teacher = '".$teacher5."'");
		$clsscheck6->execute();
		$clsscheck6->store_result();
		if ($clsscheck6->num_rows == 0) {
			$clssinsert6 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class5."', '".$teacher5."')");
			$clssinsert6->execute();
		}
		$clsscheck7 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class6."' AND school = '".$school."' AND teacher = '".$teacher6."'");
		$clsscheck7->execute();
		$clsscheck7->store_result();
		if ($clsscheck7->num_rows == 0) {
			$clssinsert7 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class6."', '".$teacher6."')");
			$clssinsert7->execute();
		}
		$clsscheck8 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class7."' AND school = '".$school."' AND teacher = '".$teacher7."'");
		$clsscheck8->execute();
		$clsscheck8->store_result();
		if ($clsscheck8->num_rows == 0) {
			$clssinsert8 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class7."', '".$teacher7."')");
			$clssinsert8->execute();
		}
		$clsscheck9 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class8."' AND school = '".$school."' AND teacher = '".$teacher8."'");
		$clsscheck9->execute();
		$clsscheck9->store_result();
		if ($clsscheck9->num_rows == 0) {
			$clssinsert9 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class8."', '".$teacher8."')");
			$clssinsert9->execute();
		}
		$clssstmt = $mysqli->prepare("INSERT INTO member_classes(id, class0, teacher0, class1, teacher1, class2, teacher2, class3, teacher3, class4, teacher4, class5, teacher5, class6, teacher6, class7, teacher7, class8, teacher8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$clssstmt->bind_param('sssssssssssssssssss', $uid, $class0, $teacher0, $class1, $teacher1, $class2, $teacher2, $class3, $teacher3, $class4, $teacher4, $class5, $teacher5, $class6, $teacher6, $class7, $teacher7, $class8, $teacher8);
		$clssstmt->execute();
		// The complete path/filename 
		$filename = '../images/iu.png';
 
		// Copy the file (if it is deemed safe) 
		$stmt = $mysqli->prepare("INSERT INTO member_details(id, PROF_PIC_PATH, SCHOOL, GRADE_LEVEL, BIRTHDAY) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param('sssss', $uid, $filename, $school, $grade, $birthday);
		$stmt->execute();
		header('Location: ../dashboard.php');
	} else {
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$updatestmt = $mysqli->prepare("UPDATE members SET firstTime = 0 WHERE id = ?");
		$updatestmt->bind_param('i', $uid);
		$updatestmt->execute();
		$clsscheck = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class0."' AND school = '".$school."' AND teacher = '".$teacher0."'");
		$clsscheck->execute();
		$clsscheck->store_result();
		if ($clsscheck->num_rows == 0) {
			if ($class0 != 'Select your class' || $class0 != 'None') {
				$clssinsert = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class0."', '".$teacher0."')");
				$clssinsert->execute();
			}
		}
		$clsscheck2 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class1."' AND school = '".$school."' AND teacher = '".$teacher1."'");
		$clsscheck2->execute();
		$clsscheck2->store_result();
		if ($clsscheck2->num_rows == 0) {
			$clssinsert2 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class1."', '".$teacher1."')");
			$clssinsert2->execute();
		}
		$clsscheck3 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class2."' AND school = '".$school."' AND teacher = '".$teacher2."'");
		$clsscheck3->execute();
		$clsscheck3->store_result();
		if ($clsscheck3->num_rows == 0) {
			$clssinsert3 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class2."', '".$teacher2."')");
			$clssinsert3->execute();
		}
		$clsscheck4 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class3."' AND school = '".$school."' AND teacher = '".$teacher3."'");
		$clsscheck4->execute();
		$clsscheck4->store_result();
		if ($clsscheck4->num_rows == 0) {
			$clssinsert4 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class3."', '".$teacher3."')");
			$clssinsert4->execute();
		}
		$clsscheck5 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class4."' AND school = '".$school."' AND teacher = '".$teacher4."'");
		$clsscheck5->execute();
		$clsscheck5->store_result();
		if ($clsscheck5->num_rows == 0) {
			$clssinsert5 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class4."', '".$teacher4."')");
			$clssinsert5->execute();
		}
		$clsscheck6 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class5."' AND school = '".$school."' AND teacher = '".$teacher5."'");
		$clsscheck6->execute();
		$clsscheck6->store_result();
		if ($clsscheck6->num_rows == 0) {
			$clssinsert6 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class5."', '".$teacher5."')");
			$clssinsert6->execute();
		}
		$clsscheck7 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class6."' AND school = '".$school."' AND teacher = '".$teacher6."'");
		$clsscheck7->execute();
		$clsscheck7->store_result();
		if ($clsscheck7->num_rows == 0) {
			$clssinsert7 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class6."', '".$teacher6."')");
			$clssinsert7->execute();
		}
		$clsscheck8 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class7."' AND school = '".$school."' AND teacher = '".$teacher7."'");
		$clsscheck8->execute();
		$clsscheck8->store_result();
		if ($clsscheck8->num_rows == 0) {
			$clssinsert8 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class7."', '".$teacher7."')");
			$clssinsert8->execute();
		}
		$clsscheck9 = $mysqli->prepare("SELECT classes FROM classes WHERE classes = '".$class8."' AND school = '".$school."' AND teacher = '".$teacher8."'");
		$clsscheck9->execute();
		$clsscheck9->store_result();
		if ($clsscheck9->num_rows == 0) {
			$clssinsert9 = $mysqli->prepare("INSERT INTO classes(school, classes, teacher) VALUES ('".$school."', '".$class8."', '".$teacher8."')");
			$clssinsert9->execute();
		}
		$clssstmt = $mysqli->prepare("INSERT INTO member_classes(id, class0, teacher0, class1, teacher1, class2, teacher2, class3, teacher3, class4, teacher4, class5, teacher5, class6, teacher6, class7, teacher7, class8, teacher8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$clssstmt->bind_param('sssssssssssssssssss', $uid, $class0, $teacher0, $class1, $teacher1, $class2, $teacher2, $class3, $teacher3, $class4, $teacher4, $class5, $teacher5, $class6, $teacher6, $class7, $teacher7, $class8, $teacher8);
		$clssstmt->execute();
		// The complete path/filename 
		$filename = '../images/' . time() . $_SERVER['REMOTE_ADDR'] . $_FILE['profpic']['type']; 
 
		// Copy the file (if it is deemed safe) 
		move_uploaded_file($_FILES['profpic']['tmp_name'], $filename);
		$stmt = $mysqli->prepare("INSERT INTO member_details(id, PROF_PIC_PATH, SCHOOL, GRADE_LEVEL, BIRTHDAY) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param('sssss', $uid, $filename, $school, $grade, $birthday);
		$stmt->execute();
		header('Location: ../dashboard.php');
		
	}
		
} else {
	header('Location: ../config.php?error=1');
}