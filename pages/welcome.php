<?php include_once('./components/carousel.php'); ?>
<section class="placement bot-4" id="products">
<div class="container">
	<div class="row">
		<div class="col">
			<p class="section-subtitle">Products</p>
			<h3 class="section-title">
				<a href="#products">All Variants</a>
			</h3>
			<ul class="filter-list">
				<li class="filter-item active" data-filter="all" data-sort="random">All</li>
				<li class="filter-item" data-filter=".mix-1" data-sort="random">Tea</li>
				<li class="filter-item" data-filter=".mix-2" data-sort="random">Macchiato</li>
				<li class="filter-item" data-filter=".mix-3" data-sort="random">Milk Tea</li>
			</ul>
			<div class="card-container">
				<?php foreach ($action->fetch('SELECT p.id, p.name, p.image, p.price, p.id_category, c.name AS category_name FROM products p JOIN categories c ON p.id_category = c.id ORDER BY p.name;') as $data) { ?>
				<div class="<?= 'card mix mix-' . $data['id_category']; ?>">
				  <img class="card-img-top" src="<?php echo './assets/img/variants/'. $data['image']; ?>" alt="<?php echo $data['name']; ?>"/>
				  <div class="card-body d-flex flex-column align-items-center justify-content-center">
				    <h5 class="card-title"><?= $data['name']; ?></h5>
				    <p class="card-text">IDR <?= number_format($data['price'], 2); ?></p>
				  </div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
</section>