<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
$error = "";
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
     // The hashed password.
    $password = $_POST['p'];
    login($email, $password, $mysqli);
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}