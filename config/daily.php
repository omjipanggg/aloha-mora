<?php
require_once('actions.php');
require_once('functions.php');

$action = new Actions();

$subcount = 0;
$subtotal = 0;

$query = "SELECT p.name, od.quantity, p.price, u.username, o.count_sales, o.total_sales, o.created_at FROM orders o JOIN order_details od ON o.id = od.id_order JOIN products p ON od.id_product = p.id JOIN users u ON o.id_user = u.id WHERE o.created_at LIKE '". $_REQUEST['date'] ."%' ORDER BY p.name;";

if ($action->rows($query) !== 0) {
?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Item</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($action->execute($query) as $value) { ?>
	<tr>
		<td><?= $value['name']; ?></td>
		<td><?= $value['quantity'] ?></td>
		<td><?php echo $total = $value['quantity'] * $value['price']; ?></td>
	</tr>
<?php
$subcount = $subcount + $value['quantity'];
$subtotal = $subtotal + $total;
$username = $value['username'];
$elapsed = time_elapsed_string($value['created_at']);
} ?>
	</tbody>
	<tbody>
	<tr class="fw-bold">
		<td>Subtotal</td>
		<td><?= $subcount; ?></td>
		<td><?= $subtotal; ?></td>
	</tr>
	</tbody>
</table>
<div class="d-flex justify-content-between align-items-center lower mt-4">
	<div class="left">
		<p><strong>Logged in as: </strong>/<a href="?page=profile"><?= $username; ?></a></p>
		<p><strong>Last modified: </strong><?= $elapsed; ?></p>
	</div>
	<button type="button" class="btn btn-dark" onclick="print()">Print</button>
</div>
<?php
} else { ?>
<p>No records.</p>
<?php } ?>