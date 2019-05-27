<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	@include('inc_header')
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
							{{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
							{{-- <li class="breadcrumb-item active" aria-current="page">Contact us</li> --}}
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="head_title">
						<h1>Get in touch</h1>
						<p>We Want To Hear From You What’s on your mind? <br>Tell us a little bit about yourself and your question, and someone will be in touch with you shortly.</p>
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
								<?php $service = \App\Models\Contact::where('id',1)->select('name')->get(); ?>
								<br>
								@foreach ($service as $_service)
									{{$_service->name}}</a>
								@endforeach
						</li>
						</div>
						<div class="col-lg-6">
						<li><i class="fas fa-envelope"></i> Reservation assistance:
							<a href="mailto:reservation@holidayinn-phuket.com">
								<?php $reservation = \App\Models\Contact::where('id',2)->select('name')->get(); ?>
								<br> @foreach ($reservation as $_reservation)
										{{$_reservation->name}}</a>
									@endforeach
						</li>
						</div>
						<div class="col-lg-6">
						<li><i class="fas fa-envelope"></i> Marketing assistance:
							<a href="mailto:pimporn.tongpua@ihg.com">
								<?php $marketing = \App\Models\Contact::where('id',3)->select('name')->get(); ?>
								<br> @foreach ($marketing as $_marketing)
										{{$_marketing->name}}</a>
									@endforeach
						</li>
						</div>
						<div class="col-lg-6">
						<li><i class="fas fa-envelope"></i> Sales assistance:
							<a href="mailto:Rapeepit.Thawornwisit@ihg.com">
								<?php $sales = \App\Models\Contact::where('id',4)->select('name')->get(); ?>
								<br>@foreach ($sales as $_sales)
										{{$_sales->name}}</a>
									@endforeach
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
					<form id="add_question">
						<div class="row">
							<div class="col-lg-6">
								<label>First Name <span class="redsb">*</span></label>
								<input id="textinput" name="first_name" type="text" class="form-control input-md"> </div>
							<div class="col-lg-6">
								<label>Last Name <span class="redsb">*</span></label>
								<input id="textinput" name="last_name" type="text" class="form-control input-md"> </div>
						</div>
							<label>Email Address <span class="redsb">*</span></label>
							<input id="textinput" name="email" type="text" class="form-control input-md">
							<label>How can we help you? </label>
							<select id="selectbasic" name="help_id" class="form-control">
								<option value="0" disabled selected>Select Subject </option>
								@foreach($HelpTypes as $HelpType)
								<option value="{{$HelpType->id}}">{{$HelpType->name}}</option>
								@endforeach
							</select>
							<label>Details: <span class="redsb">*</span></label>
							<textarea class="form-control" id="textarea" name="detail" rows="5"></textarea>
							<br> 
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-success">Clear</button>
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
						</form>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="address_contact">
					<div class="row">
						<div class="col-12 col-lg-6 border_right">
								<img src="images/pin-icon.png"> 52 Thaweewong Road Patong, Kathu, Phuket 83150
					<br>
					<img src="images/tel-icon.png"> +66 (0) 76 370 200
						</div>
						<div class="col-12 col-lg-6">
							The Holiday Inn Resort Phuket is located just opposite Patong Beach, just steps away from golden sands and within a short walk of Patong shopping, dining and entertainment. 
						</div>
					</div>
					
					</div>
					<br>
					<?php $location = \App\Models\Contact::where('id',5)->select('name')->get(); ?>
					@foreach ($location as $_location)
						<iframe src="{{$_location->name}}" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>						
					@endforeach
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
				first_name: {
						required: true,
					},
				last_name: {
						required: true,
				},
				email: {
						required: true,
				},
				detail: {
						required: true,
					},
			
			
			},
			messages: {
				first_name: {
							required: "Please enter your first name",
					},
				last_name: {
							required: "Please enter your last name",
					},
				email : {
							required: "Please enter your email",
				},
				detail: {
							required: "Please enter detail",
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
							url : "{{url('/AddContact')}}",
							dataType : 'json',
							data : $(form).serialize()
					}).done(function(rec){
							btn.attr('disabled',false);
							if(rec.status==1){
								// window.location = "{{url('profile')}}";
									resetFormCustom(form);
									swal('Add Contact',"success");

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