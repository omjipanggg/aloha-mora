<?php
if (empty($_SESSION['username'])) {
	$_SESSION['toast'] = 'Please kindly do login first.';
	echo "<script>window.location.href='./?page=auth';</script>";
	exit();
}
?>
<section class="dashboard" id="dashboard">
<div class="container pad-4 bot-4">
	<div class="row g-3">
		<div class="col-12 menu-hide">
		<div class="box d-grid">
		<?php foreach ($action->fetch('SELECT p.id, p.name, p.image, p.price, p.id_category, c.name as category_name from products p JOIN categories c ON p.id_category = c.id order by p.name;') as $data) { ?>
			<div class="<?php if ($data['id_category'] == 1) { echo "card item-carted tea"; } else if ($data['id_category'] == 2) { echo "card item-carted macchiato"; } else { echo "card item-carted milk-tea"; } ?>" data-id="<?= $data['id']; ?>" data-name="<?= $data['name']; ?>" data-price="<?= $data['price']; ?>">
				<img src="<?= './assets/img/variants/' . $data['image']; ?>" alt="<?= $data['name']; ?>" class="card-img-top">
				<div class="card-body card-base">
					<p class="card-text"><?= $data['name']; ?></p>
				</div>
			</div>
		<?php } ?>
		</div>
		</div>
		<div class="col-12">
			<div class="d-flex align-items-center justify-content-between mb-3">
				<p>Signed in as @<a href="?page=profile" class="link-profile"><?= $_SESSION['username']; ?></a></p>
				<p id="clock">01 January 2022 01:01:01</p>
			</div>
			<div class="d-flex justify-content-between align-items-center btn-header">
				<div class="group">
					<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
						<div class="btn-group" role="group">
							<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Save&nbsp;</button>
							<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
							  <li><button class="dropdown-item" id="saveToDB" name="btn-clone">Save to database</button></li>
							  <li><a href="#" class="dropdown-item" id="saveToLocal">Save to local</a></li>
							</ul>
						</div>
					</div>
					<button class="btn btn-primary btn-print" onclick="print()" data-user="<?= $_SESSION['username']; ?>" id="checkout">Print</button>
					<a href="?page=report" class="btn btn-primary" id="goReport">Report</a></li>
				</div>
				<button class="btn btn-danger clear-cart" type="button">Clear</button>
			</div>
			<form action="?page=to-database" method="POST">
				<input id="context" name="data" type="hidden" />
				<button class="d-none" type="submit" id="fireThis">Submit</button>
			</form>
			<table class="table table-hover mt-3" id="thisTable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Quantity</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody class="show-cart align-middle"></tbody>
				<tbody>
					<tr class="fw-bold">
						<td>Subtotal</td>
						<td class="total-count"></td>
						<td class="total-cart"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</section>