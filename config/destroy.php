<?php
session_start();
session_destroy();
session_start();
$_SESSION['toast'] = 'Logged out sucessfully.';
echo "<script>window.location.href='/index.php';</script>";
exit();
?>