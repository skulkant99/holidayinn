<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	@include('inc_header')
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
	.swal-button {
			padding: 7px 19px;
			border-radius: 2px;
			border: 4px solid #b7b8d7;
			background-color: #b7b8d7;
			font-size: 12px;
			border: 1px solid #b7b8d7;
			text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
		}
		.swal-modal {
				border: 3px solid white;
				border-color: #b7b8d7;
			}
			.swal-footer {
				text-align: center;
			}
</style>

<body>
	@include('inc_topmenu')
		<div class="container mt-4">
			<div class="row">
				<div class="col">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							{{-- <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li> --}}
							{{-- <li class="breadcrumb-item active" aria-current="page">Ask Question</li> --}}
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
				<div class="col-lg-5"> <img src="{{asset('images/question_02.png')}}" class="img-fluid"> </div>
				<div class="col-lg-7">
					<div class="box_white">
						<form id="add_question">
							<input type="hidden" name="status" value="1">
							<input type="hidden" name="type" value="Q">
						    <div class="row">
								<div class="col-lg-6">
									<label>First Name <span class="redsb">*</span></label>
									<input id="firstname" name="firstname" type="text" class="form-control input-md"> </div>
								<div class="col-lg-6">
									<label>Last Name <span class="redsb">*</span></label>
									<input id="lastname" name="lastname" type="text" class="form-control input-md"> </div>
								
							</div>
							<label>Email Address<span class="redsb">*</span></label> 
							<input id="email_qu" name="email" type="text" class="form-control input-md">
							<span id='result'></span><br>
							<label>What is your Question ? <span class="redsb">*</span></label>
							<textarea class="form-control" id="question" name="question" rows="5" placeholder="Type your question here.."></textarea>
							<br> 
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-success">Clear</button>
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
						</form>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		@include('inc_footer')
</body>

</html>
<script>
		
		$('#add_question').validate({
			errorElement: 'div',
			errorClass: 'invalid-feedback',
			focusInvalid: false,
			rules: {
				firstname: {
							required: true,
					},
				lastname: {
							required: true,
				},
				email: {
							required: true,
				},
				question: {
							required: true,
					},
			
			},
			messages: {
				firstname: {
							required: "Please enter your first name",
					},
				lastname: {
							required: "Please enter your last name",
					},
				email :{
							required: "Please enter your email",
					},
				question: {
							required: "Please enter question",
					},
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
							url : "{{url('/AddQuestion')}}",
							dataType : 'json',
							data : $(form).serialize()
					}).done(function(rec){
							btn.attr('disabled',false);
							if(rec.status==1){
								// window.location = "{{url('profile')}}";
									resetFormCustom(form);
								
									swal("Thank you for your question. \n We will get back to you shortly.", {
											buttons: "Close",
										});

							}else{
								swal(rec.title,rec.content,"error");
									btn.attr('disabled',false)
							}
					}).fail(function(){
							swal("สมัครสมาชิกผิดผลาด","อีเมล์มีการใช้งานแล้ว กรุณาตรวจสอบอีกครั้ง","error");
							btn.attr('disabled',false)
					});
			},
			invalidHandler: function (form) {
			}
      });
</script>