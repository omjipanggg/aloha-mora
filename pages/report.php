<section class="report pad-4 bot-4" id="report">
<div class="container">
	<div class="row">
		<div class="col-12">
			<input type="date" class="form-control mb-3" onchange="fetchAjax(event)" min="2012-01-01" max="2032-12-31" name="date"/>
			<div id="fetchData">
				<div class="alert alert-secondary alert-dismissible fade show" role="alert">
					<p>Please choose a date to display data.</p>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	</div>
</div>
</section>