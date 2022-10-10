<?php 
session_start();

require_once("./config/actions.php");

$action = new Actions();

if (isset($_REQUEST['query'])) { header('location: ?search=' . $_REQUEST['query']); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- META -->
	<meta charset="UTF-8">
	<meta name="author" content="Pmgks">
	<meta name="description" content="Es Teh Nusantara">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- TITLE -->
	<title>Es Teh Nusantara&mdash;Home</title>

	<!-- STYLE -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/media.css">
	<link rel="stylesheet" href="./assets/css/animation.css">
	
	<!-- FAVICON -->
	<link rel="icon" href="./assets/img/tea.ico" type="image/ico">
</head>
<body>
	<!-- NAVBAR -->
	<?php include('./components/navbar.php'); ?>

	<!-- TOAST -->
	<?php include('./components/toast.php'); ?>

	<!-- CONTENT -->
    <?php if (isset($_REQUEST['page'])) { $p = $_REQUEST['page']; }
    	if (empty($p) || $p == "") { $p = "welcome"; }
	  if (file_exists("./pages/".$p.".php")) { include("./pages/".$p.".php"); }
	  else { include("./pages/welcome.php"); }
    ?>

	<!-- FOOTER -->
	<?php include('./components/footer.php'); ?>

	<!-- SCRIPT -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
	<script src="./assets/js/script.js"></script>
</body>
</html>