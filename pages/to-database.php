<?php 
	file_put_contents('./config/jason/order.json', json_decode(json_encode($_POST), true));
	$content = file_get_contents('./config/jason/order.json');
	$result = json_decode($content, true);
	$id = $result['id'];
	$user = $result['user'];
	$created_at = $result['datetime'];
	$count = $result['count'];
	$subtotal = $result['subtotal'];
	$query = "INSERT into orders(`id`, `id_user`, `count_sales`, `total_sales`, `created_at`) VALUES('". $id ."', (SELECT `id` FROM users WHERE `username` = '". $user ."'), '". $count ."', '". $subtotal ."', '". $created_at ."') ON DUPLICATE KEY UPDATE `count_sales` = '". $count ."', `total_sales` = '". $subtotal ."', `created_at` = '". $created_at ."';";
	$safe = $action->execute($query);

	if ($action->rows("SELECT * FROM `order_details` WHERE `id_order` = ". $id) > 0) {
		$action->delete('order_details', 'id_order', $id);
	}

	foreach ($result['item'] as $key => $value) {
		$query_details = "INSERT into order_details(`id_order`, `id_product`, `quantity`) VALUES('". $id ."', '". $result['item'][$key]['id'] ."', '". $result['item'][$key]['count'] ."');";
		$action->execute($query_details);
	}

	if ($safe) {
		$_SESSION['toast'] = 'Saved to database successfully.';
		echo "<script>window.location.href='./?page=dashboard';</script>";
		exit();
	}
?>