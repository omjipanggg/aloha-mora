<?php
require_once('actions.php');
require_once('credential.php');

$action = new Actions();
$credential = new Credential(); 
$msg = "";

if (isset($_REQUEST['submit'])) {
	if ($_REQUEST['method'] != 'E') { $method = 'decrypt'; }
	else { $method = 'encrypt'; }
	
	$val = $action->escape($_REQUEST['val']);
	$msg = $credential->crack($method, $_REQUEST['val']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="author" content="Aji, Maulana">
    <meta name="description" content="Restricted Area">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Config—Generator</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
	<link rel="icon" type="image/ico" href="../assets/img/tea.ico">
    <style>
    	img {
    		margin: auto;
    		padding: 10px 20px;
    		width: 300px;
	    }
	    button {
	    	float: right;
	    }
	    span.input-group-text {
	    	cursor: pointer;
	    }
    </style>
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="col-12">
			<div class="d-flex flex-column">
			<img src="../assets/img/incognito.png" alt="IMG" class="img-responsive" />
			<form action="generator.php" method="POST" class="d-flex flex-column gap-2" id="gen-3">
				<input type="text" class="form-control" placeholder="Input" name="val" autocomplete="off" required="required" autofocus="true /">
				<select name="method" id="method" class="form-control" onchange="handleChange();">
					<option value="E">Encrypt</option>
					<option value="D">Decrypt</option>
				</select>
				<div class="input-group">
					<input type="text" class="form-control" value="<?php echo $msg; ?>" disabled="disabled" id="textToCopy" placeholder="Result" />
					<span class="input-group-text" onclick="goCopy();"><i class="fas fa-copy"></i></span>
				</div>
				<button type="submit" class="btn btn-secondary" name="submit">Go</button>
			</form>
			</div>
		</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.bundle.min.js"></script>
	<script>
		const handleChange = () => {
			document.querySelector('#textToCopy').value = '';
		};
		const goCopy = () => {
			let copyText = document.querySelector('#textToCopy');
			copyText.select();
			copyText.setSelectionRange(0, 99999);
			navigator.clipboard.writeText(copyText.value);
		};
	</script>
</body>
</html>