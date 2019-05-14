<style>
	.footerbg {
		background-color: #ebebeb;
		padding: 30px;
	}
	.subscribe h3,
	.left_footer h4 a,
	.left_footer h4 {
		color: #7e80bd;
		font-weight: normal;
		font-size: 0.9em;
	}
	.left_footer h4 a{
		text-decoration: underline;
	}
	.left_footer p {
		font-size: 0.8em;
		color: #737373;
	}
	.footerbottom_bg {
		background-color: #7e80bd;
		color: white;
		font-size: 0.9em;
	}
	.footerbottom_bg a {
		font-size: 0.8em;
		color: white;
	}
	.form-control_sub {
		border: none;
		margin-top: 10px;
		height: 40px;
		background-color: white;
		display: block;
		width: 100%;
		padding: 0.375rem 0.75rem;
		font-size: 1rem;
		line-height: 1.5;
		color: #495057;
		background-clip: padding-box;
		transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
	}
	@media (max-width: 767px) {
		.footerbg{
			padding: 10px;
		}
	}
</style>
<div class="footerbg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 left_footer">
				<h4>Book online : +66 (0) 76 370 200 or call toll free : 001 800 656 888 <br>
				Email :<a href="mailto:reservation@holidayinn-phuket.com">reservation@holidayinn-phuket.com</a></h4>
				<div class="sitemap">
					<li><a href="#">Sitemap |  </a></li>
					<li><a href="privacy.php">Privacy</a></li>
				</div>
				<p>© 2019 Holiday Inn Resort Phuket Patong. This resort is independently Owned and operated by HIRP (Thailand) Limited.</p>
			</div>
			<div class="col-lg-4">
				<div class="subscribe">
					<h3>SUBSCRIBE THE HIRP NEWSLETTER</h3>
					<form id="subscribe">
						<input id="email" name="email" type="text" placeholder="Your email" class="form-control_sub input-md email"><br>
						<input id="firstname" name="firstname" type="text" placeholder="First name" class="form-control_sub input-md"><br>
						<input id="lastname" name="lastname" type="text" placeholder="Last name" class="form-control_sub input-md">
						<br> <button type="submit" class="btn btn-primary">Subscribe</button> </div>
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
					</form>
				
			</div>
		</div>
		<div class="hover_box">
		<div class="border_ihg">
			@foreach ($logo as $_logo)
				@switch($_logo->sort_id)
					@case(1)
						<div class="logo_ihg">
							<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}"></a>
						</div>
						@break
					@default		
				@endswitch	
			@endforeach
			<div class="d-none d-sm-none d-md-block d-lg-block d-xl-block">
				<div class="box_item_logo">
				@foreach ($logo as $_logo)
				@switch($_logo->sort_id)
					@case(2)
						<div class="each_ihg">
							<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
						</div>
						@break
					@case(3)
						<div class="each_ihg">
							<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
						</div>
						@break
					@case(4)
						<div class="each_ihg">
							<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
						</div>
						@break
					@case(5)
						<div class="each_ihg">
							<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
						</div>
						@break
					@case(6)
						<div class="each_ihg">
							<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
						</div>
						@break
					@case(7)
						<div class="each_ihg">
							<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
						</div>
						@break
					@case(8)
						<div class="each_ihg">
							<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
						</div>
						@break
					@default
						
					@endswitch
				@endforeach
			</div>
				<div class="box_item_logo2">
					@foreach ($logo as $_logo)
					@switch($_logo->sort_id)
						@case(9)
							<div class="each_ihg">
								<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
							</div>
							@break
						@case(10)
							<div class="each_ihg">
								<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
							</div>
							@break
						@case(11)
							<div class="each_ihg">
								<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
							</div>
							@break
						@case(12)
							<div class="each_ihg">
								<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
							</div>
							@break
						@case(13)
							<div class="each_ihg">
								<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
							</div>
							@break
						@case(14)
							<div class="each_ihg">
								<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
							</div>
							@break
						@case(15)
							<div class="each_ihg">
								<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
							</div>
							@break
						@case(16)
							<div class="each_ihg">
								<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
							</div>
							@break
						@default
							
					@endswitch
					@endforeach
				</div>
				<div class="border_right_side"></div>
				<div class="box_right_box">
					<div class="each_ihg2">
					<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_19.png')}}" class="img-fluid"></a>
					</div>
				</div>
			</div>
		
			<div class="d-block d-sm-block d-md-none d-lg-none d-xl-none">
				<div class="row">
					@foreach ($logo as $_logo)
						@switch($_logo->sort_id)
							@case(2)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(3)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(4)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(5)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(6)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(7)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(8)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(9)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(10)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(11)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(12)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(13)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(14)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(15)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@case(16)
								<div class="col-6 boxmobile">
									<a href="{{$_logo->link}}" target="_blank"><img src="{{asset('uploads/Social/'.$_logo->photo)}}" class="img-fluid"></a>
								</div>
								@break
							@default
								
						@endswitch
					@endforeach
				
					{{-- <div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_05.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_07.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_09.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_11.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_14.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_16.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_19.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_32.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_34.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_35.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_36.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_28.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-6 boxmobile">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_29.png')}}" class="img-fluid"></a>
					</div>
					<div class="col-12 boxmobile box_borde">
						<a href=""><img src="{{asset('images/ihg/New-BrandBar2019-(1)_19.png')}}" class="img-fluid"></a>
					</div> --}}
				</div>
			</div>
			
		</div>
	</div>
	</div>
</div>
<div class="footerbottom_bg">
	<div class="container">
		<div class="row">
			<div class="col"> © 2019. All rights reserved. Most hotels are independently owned and operated. Not an official site of IHG or one of its Brands. </div>
		</div>
	</div>
</div>
<script src="{{asset('assets/admin/vendors/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/global/js/validate.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	    $('#subscribe').validate({
				errorElement: 'div',
				errorClass: 'invalid-feedback',
				focusInvalid: false,
				rules: {
					email: {
								required: true,
						},
					firstname: {
								required: true,
						},
					lastname: {
								required: true,
						},
					remember_token: {
								required: true,
						}
				},
				messages: {
					email: {
								required: "please enter",
						},
					firstname: {
								required: "please enter",
						},
					lastname: {
								required: "please enter",
						},
					remember_token: {
								required: "please enter",
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
								url : "{{url('/Subscrice')}}",
								dataType : 'json',
								data : $(form).serialize()
						}).done(function(rec){
								console.log(rec);
								
								btn.attr('disabled',false);
								if(rec.status==1){
									// window.location = "{{url('profile')}}";
										resetFormCustom(form);
										// swal('Successfully subscribed','Thank you for signing up for our newsletter. You can verify your email address after signing up for our newsletter. If an email address is undelivered or bouncing, it will be unverified.',"success");
										swal("Successfully subscribed", "Thank you for signing up for our newsletter. You can verify your email address after signing up for our newsletter. If an email address is undelivered or bouncing, it will be unverified.");

								}else{
									swal(rec.title,rec.content,"error").then(function() {
										location.reload();
									});
										btn.attr('disabled',false)
								}
						}).fail(function(){
								swal("Subscribe to error information ","Invalid email format","error").then(function() {
										location.reload();
									});
								btn.attr('disabled',false)
						});
				},
				invalidHandler: function (form) {
				}
      });
</script>