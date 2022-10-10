<?php
if (isset($_SESSION['username'])) {
	$_SESSION['toast'] = 'You have been logged in.';
	echo "<script>window.location.href='./?page=dashboard';</script>";
	exit();
} 
?>
<section class="auth pad-4 bot-4" id="auth">
<div class="container">
	<div class="row">
		<div class="col-12">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item" role="presentation">
			    <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
			  </li>
			  <li class="nav-item" role="presentation">
			    <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
			  </li>
			  <li class="nav-item ms-auto" role="presentation">
			    <button class="nav-link" id="help-tab" data-bs-toggle="tab" data-bs-target="#help" type="button" role="tab" aria-controls="help" aria-selected="false">Help</button>
			  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
			  	<form action="./config/check.php" method="POST" class="d-flex flex-column gap-2">
			  		<input type="text" class="form-control" autocomplete="off" autofocus="true" placeholder="Username" name="username" required="true" />
			  		<div class="form-group d-flex gap-2">
					<div class="input-group">
			  			<input type="password" name="password" class="form-control password" id="password" autocomplete="off" placeholder="Password" aria-label="Password" aria-describedby="eyeToggle" required="true" />
					 	<span class="input-group-text">
					 		<label for="eyeToggle"><i class="iconToggle fa-solid fa-eye"></i></label>
					 		<input class="d-none" id="eyeToggle" type="checkbox" onchange="changeType(event)"/>
					 	</span>
					</div>
			  		<button type="submit" class="btn btn-dark">Login</button>
			  		</div>
			  	</form>
			  </div>
			  <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
			  	<form action="./config/register.php" method="POST" class="d-flex flex-column gap-2">
			  		<input type="text" class="form-control" autocomplete="off" placeholder="Username" name="username" required="true"/>
					<div class="input-group">
			  			<input type="password" name="password" class="form-control password" id="password-2" autocomplete="off" placeholder="Password" aria-label="Password" aria-describedby="eyeToggle-2" required="true" />
					 	<span class="input-group-text">
					 		<label for="eyeToggle-2"><i class="iconToggle fa-solid fa-eye"></i></label>
					 		<input class="d-none" id="eyeToggle-2" type="checkbox" onchange="changeType(event)"/>
					 	</span>
					</div>
					<input type="email" class="form-control" placeholder="Email" name="email" required="true"/>
			  		<div class="form-group d-flex gap-2">
						<input type="text" onkeypress='return /[0-9]/i.test(event.key)' onkeyup='return /[0-9]/i.test(event.key)' class="form-control" placeholder="Phone" name="phone" maxlength="14" />
				  		<button type="submit" class="btn btn-dark">Register</button>
			  		</div>
			  	</form>
			  </div>
			  <div class="tab-pane fade" id="help" role="tabpanel" aria-labelledby="help-tab">
			  	<p>Please contact your system administrator.</p>
			  </div>
			</div>
		</div>
	</div>
</div>
</section>