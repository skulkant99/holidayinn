<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	@include('inc_header')
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
	@include('inc_topmenu')
		<div class="container mt-4">
			<div class="row">
				<div class="col">
						<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
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
						<form id="resetpassword">
						<input id="email" name="email" type="text" placeholder="email" class="form-control input-md">
						
						<br> <button type="submit" class="btn btn-primary">Send new password</button>
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						</form>
						<br>
						<br> </div>
				</div>
			</div>
		</div>
		<br><br>
		@include('inc_footer')
</body>

</html>
<script>
	$('#resetpassword').validate({
		errorElement: 'div',
		errorClass: 'invalid-feedback',
		focusInvalid: false,
		rules: {
		  email: {
				required: true,
			}
		},
		messages: {
		  email: {
				required: "Please enter",
			}
		},
		highlight: function (e) {
			// validate_highlight(e);
		},
		success: function (e) {
			validate_success(e);
		},
		errorPlacement: function (error, element) {
			validate_errorplacement(error, element);
		},
		submitHandler: function (form) {
			var btn = $(form).find('[type="submit"]');
			btn.attr('disabled',true);
			$.ajax({
				method : "POST",
				url : "{{url('FormRespassword')}}",
				dataType : 'json',
				data : $(form).serialize()
			}).done(function(rec){
				btn.attr('disabled',false);
				if(rec.status==1){
					resetFormCustom(form);
					swal('Forgot your password','Has sent a new password via email','success');
				}else{
					swal(rec.title,rec.content,"error");
					btn.attr('disabled',false)
				}
			}).fail(function(){
				swal('Forgot your password','Invalid email','error');
				btn.attr('disabled',false)
			});
		},
		invalidHandler: function (form) {
		}
		});
</script>
