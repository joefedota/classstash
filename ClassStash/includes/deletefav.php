<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';
sec_session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$uid = $_SESSION['user_id'];
$path = $_POST['path'];

$stmt = $mysqli->prepare('DELETE FROM mem_favorites WHERE id="'.$uid.'" AND path="'.$path.'"');
$stmt->execute();

header('Location: ../dashboard.php');