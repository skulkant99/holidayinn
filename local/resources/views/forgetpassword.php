<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php require('inc_header.php'); ?>
</head>
<style>
	.btn-warning {
		width: 100%;
	}
	
	@media (max-width: 767px) {
		.offset-2 {
			margin-left: 0px;
		}
		.btn-secondary {
			width: 100%;
		}
		.borderred {
			margin-bottom: 30px;
		}
	}
</style>

<body>
	<?php require('inc_topmenu.php'); ?>
		<div class="container mt-4">
			<div class="row">
				<div class="col">
						<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Forget Password</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-2">
					<div class="border_comment text-center">
						<h2 class="mb-3">Forget Password</h2>
						
						<br>
						
						<input id="textinput" name="textinput" type="text" placeholder="อีเมล" class="form-control input-md">
						
						<br> <a href="#" class="btn btn-primary">Send new password</a>
						<br>
						<br> </div>
				</div>
			</div>
		</div>
		<br><br>
		<?php require('inc_footer.php'); ?>
</body>

</html>