<?php
session_start();

require_once("actions.php");
require_once("credential.php");

$action = new Actions();
$credential = new Credential();

$username = $action->escape($_POST['username']);
$password = $action->escape($_POST['password']);

$avail = $action->rows("select * FROM users WHERE username='" . $username . "' AND password='" . $credential->crack('encrypt', $password) . "';");

if ($avail != 0) {
	$_SESSION['valid'] = true;
	$_SESSION['username'] = $username;
	$_SESSION['toast'] = 'Welcome back, @' . $username . '!';
	echo "<script>window.location.href='./?page=dashboard';</script>";
	exit();
} else {
	$_SESSION['valid'] = 'Invalid.';
	$_SESSION['toast'] = 'Incorrect login information.';
	echo "<script>window.location.href='./?page=auth';</script>";
	exit();
}
?>