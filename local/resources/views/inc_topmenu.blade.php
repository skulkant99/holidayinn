<head>
		<meta name="csrf-token" content="<?php csrf_token() ?>">
</head>

<style>

.mainmenu{
  position: absolute;
  width: 100%;
  heigh: 100%;
  text-align: center;
  top: 30%;
  left: 0;
  margin: 0 auto;
}

.mainmenu a {
  display: inline-block;
  position: relative;
  text-align: center;
  color: #1abc9c;
  text-decoration: none;
  font-size: 20px;
  overflow: hidden;
  top: 5px;
}
.mainmenu a:after {
  content: '';
  position: absolute;
  background: #1abc9c;
  height: 2px;
  width: 0%;
  transform: translateX(-50%);
  left: 50%;
  bottom: 0;
  transition: .35s ease;
}
.mainmenu a:hover:after, .mainmenu a:focus:after, .mainmenu a:active:after {
  width: 100%;
}


.button_container {
  position: relative;
  top: 5%;
  right: 2%;
  height: 27px;
  width: 35px;
  cursor: pointer;
  z-index: 100;
  transition: opacity .25s ease;
}
.button_container:hover {
  opacity: .7;
}
.button_container.active .top {
  transform: translateY(11px) translateX(0) rotate(45deg);
  background: #FFF;
}
.button_container.active .middle {
  opacity: 0;
  background: #FFF;
}
.button_container.active .bottom {
  transform: translateY(-11px) translateX(0) rotate(-45deg);
  background: #FFF;
}
.button_container span {
  background:white;
  border: none;
  height: 2px;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  transition: all .35s ease;
  cursor: pointer;
}
.button_container span:nth-of-type(2) {
  top: 11px;
}
.button_container span:nth-of-type(3) {
  top: 22px;
}

.overlay {
  position: fixed;
  background: #999acc;
  top: 0;
  left: 0;
  width: 100%;
  height: 0%;
  opacity: 0;
  visibility: hidden;
  transition: opacity .35s, visibility .35s, height .35s;
  overflow: hidden;
}
.overlay.open {
	z-index: 9;
  opacity: .9;
  visibility: visible;
  height: 100%;
}
.overlay.open li {
  animation: fadeInRight .5s ease forwards;
  animation-delay: .35s;
}
.overlay.open li:nth-of-type(2) {
  animation-delay: .4s;
}
.overlay.open li:nth-of-type(3) {
  animation-delay: .45s;
}
.overlay.open li:nth-of-type(4) {
  animation-delay: .50s;
}
.overlay nav {
  position: relative;
  height: 40%;
  top: 50%;
  transform: translateY(-50%);
  font-size: 60px;
  font-weight: 400;
  text-align: center;
	left: -30%;
}
.overlay ul {
  list-style: none;
  padding: 0;
  margin: 0 auto;
  display: inline-block;
  position: relative;
  height: 100%;
}
.overlay ul li {
  display: block;
  height: 25%;
  height: calc(100% / 6);
  min-height: 10px;
  position: relative;
  opacity: 0;
}
.overlay ul li a {
  display: block;
  position: relative;
  color: #FFF;
  text-decoration: none;
  overflow: hidden;
}
.overlay ul li a:hover:after, .overlay ul li a:focus:after, .overlay ul li a:active:after {
  width: 100%;
}
.overlay ul li a:after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  width: 0%;
  transform: translateX(-50%);
  height: 3px;
  background: #FFF;
  transition: .35s;
}

@keyframes fadeInRight {
  0% {
    opacity: 0;
    left: 20%;
  }
  100% {
    opacity: 1;
    left: 0;
  }
}
	.modal-footer,
	.modal-header{
		border:none;
	}
	.modal-content{
		padding: 20px;
	}
	.modal-header h1{
		color:  #999acc;
	}

		/*subscribe*/
	
	.search_top {
		overflow: hidden;
		height: 40px;
		width: 80%;
		position: relative;
		margin-top: 5px;
		font-size: 13px;
		margin-left: 0px;
	}
	
	.search_top   input {
		width: 100%;
		height: 40px;
		padding: 10px 0 10px 15px;
		background-color:white;
		border: none;
		border-radius: 0px;
	}
	
	.search_top   input:focus+button {
		background-color:  #84bd37;	
		color: white;
	}
	
	.search_top   button {
		position: absolute;
		z-index: 1;
		right: 0px;
		top: 0px;
		height: 40px;
		border-top-right-radius: 0px;
		border-bottom-right-radius: 0px;
		border: none;
		background-color: #84bd37;		
		-moz-transition: background-color 0.3s ease, width 0.3s ease;
		-o-transition: background-color 0.3s ease, width 0.3s ease;
		-webkit-transition: background-color 0.3s ease, width 0.3s ease;
		transition: background-color 0.3s ease, width 0.3s ease;
		color: white;
		padding: 0;
		margin: 0;
		font-weight: bold;
		width: 120px;
		font-size: 1em;
		text-align: center;
		cursor: pointer;
		@inlude transform(translateZ(0));
	}
	
	.search_top   button:hover {
		width: 100px;
		color: white;
	}
		@media (max-width: 991px) {
		.search_top input{
			width: 80%;
			height: 38px;
		}
		.search_top button{

			height: 38px;
		}
	}
	
	@media (max-width: 767px) {
		.search_top input{
			width: 80%;
			height: 38px;
		}
		.search_top button{
			width: 50px;
			right: 40px;
			height: 38px;
		}
		.button_container{
			position: absolute;
		}
		.button_container span{
			background-color: black;
		}
		.mainmenu{
			top: 20px;
			right: 20px;
			left: inherit;
		}
	}
</style>

<div class="container">
<div class="row">
	<div class="col">
		<div class="d-block d-sm-block d-md-none d-lg-none d-xl-none">
		<div class="mainmenu">
			<div class="button_container" id="toggle"><span class="top"></span><span class="middle"></span><span class="bottom"></span></div> 
			<div class="overlay" id="overlay">
			  <nav class="overlay-menu">
				<ul>
				<li><a href="{{url('/')}}">Home</a></li>
				  <li><a href="{{url('/')}}">Special Offer</a></li>
				  <li><a href="{{url('gallery')}}">Photos</a></li>
				  <li><a href="{{url('question')}}">Ask Question</a></li>
				  <li><a href="{{url('faq')}}">FAQ</a></li>
				  <li><a href="{{url('contact')}}">Contact Us</a></li>
				</ul>
			  </nav>
			</div>
		</div>
			</div>
	</div>
</div>
	<div class="row topmenu_bar">
		<div class="col-md-3 col-lg-2">
			<div class="mainlogo">
			<a href="{{url('/')}}"><img src="{{asset('images/home2-edit_03.png')}}" class="img-fluid"></a>
			</div>
		</div>
		<div class="col-md-9 col-lg-10 nopad">
				<div class="sidetop_right">
				<img src="{{asset('images/home2-edit_05.png')}}" class="img-fluid kidslogo">
					<li>
					
					<!-- Button trigger modal -->
					<?php if(Auth::check()){ ?>
						<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#"> wellcome <?php echo (Auth::user()->name) ?></button>
					<?php	} else { ?>
						<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">Login 	</button>

					<?php	}?>
					/ 
					<?php if(Auth::check()){ ?>
						<a class="btn btn-dark" href="{{url('logout')}}"  data-target="#logout"> logout</a>
					<?php	} else { ?>
						<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter2">	Register 	</button>

					<?php	}?>
					
								
				

					</li>

				
				<br>
				<div class="social_top_main">
				<li><a href="#"><img src="{{asset('images/social_top_03.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_05.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_06.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_08.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_10.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_11.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_12.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_14.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_16.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_18.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_19.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_20.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_21.png')}}"></a></li>
				<li><a href="#"><img src="{{asset('images/social_top_22.png')}}"></a></li>
				</div>	
			</div>
		</div>
	</div>
</div>
<div class="nav_bg">
<div class="container">
	<div class="row">
		<div class="col-md-3 col-lg-6">
		<div class="d-none d-sm-none d-md-block d-lg-block d-xl-block">
		<div class="mainmenu">
			<div class="button_container" id="toggle2"><span class="top"></span><span class="middle"></span><span class="bottom"></span></div> 
			<div class="overlay" id="overlay2">
			  <nav class="overlay-menu">
				<ul>
				  <li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('/')}}">Special Offer</a></li>
				  <li><a href="{{url('gallery')}}">Photos</a></li>
				  <li><a href="{{url('question')}}">Ask Question</a></li>
				  <li><a href="{{url('faq')}}">FAQ</a></li>
				  <li><a href="{{url('contact')}}">Contact Us</a></li>
				</ul>
			  </nav>
			</div>
		</div>
			<span class="menutxt">Menu</span>
			</div>
		</div>
		<div class="col-12 col-md-9 col-lg-6">
		<li><div class="search_top wow fadeInUp">
				<form  action="{{url('search')}}" method="POST" id="search_all" >
						<input type='text' name="search" id="search" placeholder="Search here">
						<button type="submit" class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Search</button>
						<button class="icon-sub-m d-block d-sm-none d-md-none d-lg-none d-xl-none"><i class="fa fa-angle-right"></i></button>
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
				</form>
			</div></li>
					<li>
						
					<a href="#" class="btn btn-secondary">Book now</a>
					
					</li>
			
		</div>
	
	</div>
</div>
</div>




<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
		  <h1>Welcome to Holiday inn </h1> <br>
		 

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col">
      			<h3>Sign in to your account</h3>
      			<div class="login_form">
						<form id="FormLogin">
      						<label>Email or Member Number</label>
										<input id="email" name="email" type="text" class="form-control input-md">
									
									<label>Password</label>
										<input id="password" name="password" type="password" class="form-control input-md">
									<br>
									<button type="submit" class="btn btn-info">Sign in</button>
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
					 </form>		

									<div class="checkbox">
										<label for="checkboxes-0">
											<input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
											Remember me
										</label>
									</div>
										<div class="row">
											<div class="col-lg-6">
												<a href="{{url('cf-password')}}" class="forgotpass">Forget password ?</a>
											</div>
											<div class="col-lg-6 text-right">
												New Customer? <a href="#" class="signupnow" data-toggle="modal" data-target="#exampleModalCenter2">Sign up now</a>
										  </div>
									</div>
								
      			</div>
      		</div>
<!--
      		<div class="col-12 col-lg-6">
      			<h3 class="joinmember">Join Holiday inn</h3>
      			
      			
      			<div class="login_form">
      				<label>Name</label>
					<input id="textinput" name="textinput" type="text" class="form-control input-md">
      				<label>Email</label>
					<input id="textinput" name="textinput" type="text" class="form-control input-md">
     				<label>Password</label>
     				
					<input id="textinput" name="textinput" type="password" class="form-control input-md">
   			        <label>Confirm Password</label>
     				
					<input id="textinput" name="textinput" type="password" class="form-control input-md">
    			        <br>
      					<a href="#" class="btn btn-warning">Join now</a>

     			        

      			</div>
      			
      		</div>
      	
-->
     </div>
      </div>
     
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
		  <h1>Welcome to Holiday inn </h1> <br>
		 

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col">
      			<h3 class="joinmember">Join Holiday inn</h3>
      			<form id="FormAdd">
							<div class="login_form">
								<label>Name</label>
										<input id="name" name="name" type="text" class="form-control input-md">
								<label>Email</label>
										<input id="email" name="email" type="text" class="form-control input-md">
								<label>Password</label>		
										<input id="password" name="password" type="password" class="form-control input-md">
								<label>Confirm Password</label>				
										<input id="confirm_password" name="confirm_password" type="password" class="form-control input-md">
										<br>
								<button type="submit"  class="btn btn-warning">Join now</button>
							</div> 
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
						</form>   			
      		</div>
        </div>
      </div> 
    </div>
  </div>
</div>

<script>
	$('#toggle').click(function() {
   $(this).toggleClass('active');
   $('#overlay').toggleClass('open');
  });
</script>
<script>
	$('#toggle2').click(function() {
   $(this).toggleClass('active');
   $('#overlay2').toggleClass('open');
  });
</script>
<script src="{{asset('assets/admin/vendors/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/global/js/validate.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	var url_gb = '<?php url('') ?>';
	var asset_gb = '<?php asset('') ?>';
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
</script>

<script>
      $('#FormAdd').validate({
				errorElement: 'div',
				errorClass: 'invalid-feedback',
				focusInvalid: false,
				rules: {
					name: {
								required: true,
						},
					email: {
								required: true,
						},
					password: {
								required: true,
						},
				
					remember_token: {
								required: true,
						}
				},
				messages: {
					name: {
								required: "please enter",
						},
					email: {
								required: "please enter",
						},
					password: {
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
								url : "{{url('/Createuser')}}",
								dataType : 'json',
								data : $(form).serialize()
						}).done(function(rec){
								btn.attr('disabled',false);
								if(rec.status==1){
									// window.location = "{{url('profile')}}";
										resetFormCustom(form);
										swal('Successfully subscribed','Please check the email to verify your identity.',"success");

								}else{
									swal(rec.title,rec.content,"error");
										btn.attr('disabled',false)
								}
						}).fail(function(){
								swal("Register for membership wrong","Email is already in use Please check again","error");
								btn.attr('disabled',false)
						});
				},
				invalidHandler: function (form) {
				}
      });

</script>
<script>
      $('#FormLogin').validate({
				errorElement: 'div',
				errorClass: 'invalid-feedback',
				focusInvalid: false,
				rules: {
					email: {
								required: true,
						},
					password: {
								required: true,
						}
				},
				messages: {
					email: {
								required: "please enter",
						},
					password: {
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
								url : "{{url('/CheckLogin')}}",
								dataType : 'json',
								data : $(form).serialize()
						}).done(function(rec){
							if(rec==0){
								swal('Login','Username or password is incorrect','error');
							}else{
									window.location.href =  "{{url('/')}}";
									
									// swal('เข้าสู่ระบบ','คุณได้ทำการเข้าสู่ระบบเรียบร้อยแล้ว','success');
							}
						}).fail(function(){
								swal('Login','Username or password is incorrect','error');                   
								btn.button('reset');
						});
				},
				invalidHandler: function (form) {
				}
      });

</script>
{{-- <script>
	$('body').on('submit','#search_all',function(e){
				e.preventDefault();
				var name = $('#search').val();
				$.ajax({
						method: "GET",
						url: "{{url('SearchAll/')}}",
						data: {name:name},
				}).done(function( rec ) {				
						$('#contant').html('');
						$.each(rec,function(k,v){
								var photo = jQuery.parseJSON('{"photo":"'+v.photo+'"}');
						                 
								var text = ``;
								$('#photo').append(text);
						})
				}).fail(function(){
						swal('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');                   
						btn.button('reset');
				});
		});
</script> --}}
<!-- <script>
	
	$('body').on('submit','#FormLogin',function(e){
				e.preventDefault();
				$.ajax({
						method: "POST",
						url: "CheckLogin",
						data: $(this).serialize()
				}).done(function( rec ) {
						if(rec==0){
								alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');
						}else{
								window.location = "/";
								// swal('เข้าสู่ระบบ','คุณได้ทำการเข้าสู่ระบบเรียบร้อยแล้ว','success');
						}
				}).fail(function(){
						alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');                   
						btn.button('reset');
				});
		});
</script> -->