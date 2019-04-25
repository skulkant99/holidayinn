<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php require('inc_header.php'); ?>
</head>
<style>
	#textarea {
		border: none;
	}
	
	.box_white input {
		height: 55px;
		margin-bottom: 10px;
		border: none;
	}
	
	.form-control::-webkit-input-placeholder {
		color: #000000;
		opacity: 1;
	}
	
	.form-control::-moz-placeholder {
		color: #000000;
		opacity: 1;
	}
	
	.form-control:-ms-input-placeholder {
		color: #000000;
		opacity: 1;
	}
	
	.form-control::-ms-input-placeholder {
		color: #000000;
		opacity: 1;
	}
	
	.form-control::placeholder {
		color: #000000;
		opacity: 1;
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
							<li class="breadcrumb-item active" aria-current="page">Ask Question</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="head_title">
						<h1>Ask Question</h1> </div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5"> <img src="images/question_02.png" class="img-fluid"> </div>
				<div class="col-lg-7">
					<div class="box_white">
					<form method="get">
						    <div class="row">
								<div class="col-lg-6">
									<label>First Name <span class="redsb">*</span></label>
									<input id="textinput" name="textinput" type="text" class="form-control input-md"> </div>
								<div class="col-lg-6">
									<label>Last Name <span class="redsb">*</span></label>
									<input id="textinput" name="textinput" type="text" class="form-control input-md"> </div>
							</div>
							<label>Email Address</label>
							<input id="textinput" name="textinput" type="text" class="form-control input-md">
							<label>What is your Question ? <span class="redsb">*</span></label>
							<textarea class="form-control" id="textarea" name="textarea" rows="5" placeholder="Type your question here.."></textarea>
							<br> 
							<button type="submit" class="btn btn-primary">Add question</button>
							<button type="reset" class="btn btn-success">Clear</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<?php require('inc_footer.php'); ?>
</body>

</html>