<?php
	$to = $_POST['email'];
	$subject = rand(0, 999999) . ' is your Nusantara verification code';
	$message = `<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		*, *::before, *::after {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		.container {
			margin: auto;
			width: 100%;
			max-width: 480px;
			background-color: white;
			border: 1px solid crimson;
			padding: 2rem;
			font-family: 'Arial';
		}
		h2.muted { color: #6c757d; text-align: center; margin-bottom: 4px; }
		p.muted { color: #6c757d; font-size: 12px; text-align: center; }
		h1 { font-family: monospace; font-size: 38px; margin: 1rem 0; }
		.bottom { margin-top: 2rem; }
		.mid { margin: 1rem 0; }
		.medium { font-size: 14px; }
	</style>
</head>
<body>
	<div class="container">
		<h2>Confirm your email address</h2>
		<div class="medium">
			<p class="mid">There is one more step you need to complete in order to confirm your email address at Nusantara.</p>
			<p>Please enter this verification code when prompted:</p>
		</div>
		<h1>671290</h1>
		<div class="medium">
			<p><strong>Note: </strong>This verification code expires after two hours.</p>
			<div class="bottom">
				<p>Much thanks,</p>
				<p>Nusantara</p>
			</div>
		</div>
		<div class="bottom">
			<h2 class="muted">Nusantara</h2>
			<p class="muted">Jalan K.M. Idris, Benggala, Neglasari</p>
		</div>
	</div>
	<script>
		document.querySelector("h1").innerHTML = `. rand(0, 999999) .`;
	</script>
</body>
</html>`;
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
	$headers .= 'From: omjipanggg@gmail.com' . "\r\n";
	$headers .= 'X-Mailer: PHP/' . phpversion();
	mail($to, $subject, $message, $headers);
?>