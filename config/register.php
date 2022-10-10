<?php
// Session
session_start();

// Import
require_once("actions.php");
require_once("credential.php");

// Construcor
$action = new Actions();
$credential = new Credential();

// Serialize
$username = strtolower($action->escape($_POST['username']));
$password = $credential->crack('encrypt', $action->escape($_POST['password']));
$phone = $_POST['phone'];
$email = $_POST['email'];

// Check
$avail = $action->rows("SELECT * FROM `users` WHERE `username`='" . $username . "';");
if ($avail != 0) {
	$_SESSION['toast'] = 'Username: <strong>@'. $username .'</strong> exists.';
	echo "<script>window.location.href='./?page=auth';</script>";
	exit();
} else {
	$_SESSION['username'] = $username;
	$_SESSION['toast'] = 'Have a great day, @'. $username .'!';
	$action->execute("INSERT INTO `users`(`username`, `password`, `phone`, `email`) VALUES('". $username ."', '". $password ."', '". $phone ."', '". $email ."');");
	echo "<script>window.location.href='./?page=dashboard';</script>";
	exit();
}
?>