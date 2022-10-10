<?php
if (isset($_POST['submit'])) {
	if ($action->execute("INSERT into products(name, image, price, description, id_category) values('" . $_POST['name'] . "', '" . $_FILES['image']['name'] . "', '" . $_POST['price'] . "', '" . $_POST['description'] . "', '" . $_POST['id_category'] . "');")) {
		// if (file_exists($filename)) { $valid = false; } else { $valid = true; }
		// $filename = './assets/img/uploads/' . basename($_FILES['image']['name']);
		// if (move_uploaded_file($_FILES['image']['tmp_name'], $filename)) {
		// 	echo "<script> alert('Uploaded.'); </script>";
		$_SESSION['toast'] = 'New product added.';
		echo "<script>window.location.href='./?page=dashboard';</script>";
		exit();
	} else {
		$_SESSION['toast'] = 'Failed to upload.';
		echo "<script>window.location.href='./?page=new-product';</script>";
		exit();
	}
}
?>
<section class="pad-4 bot-4 insert" id="insert">
<div class="container">
	<div class="row">
		<div class="col-12">
			<form action="?page=new-product" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-2">
				<input class="form-control" type="text" name="name" placeholder="Name" required="true" autocomplete="off" autofocus="true" />
				<select name="id_category" id="category" class="form-control">
					<option value="0" selected="true" disabled="true">Choose One</option>
					<option value="1">Tea</option>
					<option value="2">Macchiato</option>
					<option value="3">Milk Tea</option>
				</select>
				<input class="form-control" type="file" name="image" />
				<textarea class="form-control" id="description" cols="30" rows="3" name="description" placeholder="Description" autocomplete="off"></textarea>
				<div class="form-group d-flex gap-2">
					<input class="form-control" type="number" name="price" placeholder="Price" required="true" autocomplete="off" />
					<button type="submit" class="btn btn-secondary" name="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
</section>