<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php require('inc_header.php'); ?>
</head>
<style>
	#textarea {
		border: none;
	}

	
	.form-contact input {
		height: 55px;
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
							<li class="breadcrumb-item active" aria-current="page">Contact us</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="head_title">
						<h1>Get in touch</h1>
						<p>To contact us, please submit the online form. </p>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					<div class="maillist">
					<div class="row">
						<div class="col-lg-6">
							<li><i class="fas fa-envelope"></i> Guest Service assistance :
							<a href="mailto:duty_mw@holidayinn-phuket.com">
								<br> duty_mw@holidayinn-phuket.com</a>
						</li>
						</div>
						<div class="col-lg-6">
						<li><i class="fas fa-envelope"></i> Reservation assistance:
							<a href="mailto:reservation@holidayinn-phuket.com">
								<br> reservation@holidayinn-phuket.com</a>
						</li>
						</div>
						<div class="col-lg-6">
						<li><i class="fas fa-envelope"></i> Marketing assistance:
							<a href="mailto:pimporn.tongpua@ihg.com">
								<br> pimporn.tongpua@ihg.com</a>
						</li>
						</div>
						<div class="col-lg-6">
						<li><i class="fas fa-envelope"></i> Sales assistance:
							<a href="mailto:Rapeepit.Thawornwisit@ihg.com">
								<br> Rapeepit.Thawornwisit@ihg.com</a>
						</li>
						</div>
					</div>
						
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-contact">
					<form method="post">
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
							<label>How can we help you? <span class="redsb">*</span></label>
							<select id="selectbasic" name="selectbasic" class="form-control">
								<option value="0" disabled selected>Select Subject </option>
								<option value="2">Service</option>
							</select>
							<label>Details: <span class="redsb">*</span></label>
							<textarea class="form-control" id="textarea" name="textarea" rows="5"></textarea>
							<br> 
							<button type="submit" class="btn btn-primary">Add question</button>
							<button type="reset" class="btn btn-success">Clear</button>
						</form>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="address_contact">
					<div class="row">
						<div class="col-12 col-lg-6 border_right">
								<img src="images/pin-icon.png"> 52 Thaweewong Road
Patong, Kathu,
Phuket 83150
					<br>
					<img src="images/tel-icon.png"> +66 (0) 76 370 200
						</div>
						<div class="col-12 col-lg-6">
							The Holiday Inn Resort Phuket is located just opposite Patong Beach, just steps away from golden sands and within a short walk of Patong shopping, dining and entertainment. 
						</div>
					</div>
					
					</div>
					<br>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.06532294002!2d98.29350171137511!3d7.888234962144287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30503aba1d666555%3A0x71dc0e336463a8da!2sHoliday+Inn+Resort+Phuket!5e0!3m2!1sth!2sth!4v1554362998296!5m2!1sth!2sth" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<br>
		<br>
		<?php require('inc_footer.php'); ?>
</body>

</html>