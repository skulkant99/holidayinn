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
						<form id="updatepassword">
							<div class="form-group">
								<input type="password" class="form-control form-cf-password mx-auto" id="pwd" name="password" placeholder="รหัสผ่าน">
							</div>
							<div class="form-group">
								<input type="password" class="form-control form-cf-password mx-auto" id="pwd" name="password_confirmation" placeholder="เปลี่ยนแปลงรหัสผ่าน">
							</div>
							<div class="text-center">
								<button type="submit" class="btn  btn-link-pay-1 my-2">CHANGE PASSWORD</button>
							</div>
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<input type="hidden" name="user_id" value="{{ $id }}">
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
	$('body').on('submit','#updatepassword',function(e){
	  e.preventDefault();
	  $.ajax({
	    method: "POST",
	    url: "{{url('updatepassword')}}",
	    data: $(this).serialize()
	  }).done(function( res ) {
	      if(res==0){
	          swal(res.title,res.content,'success');
	      }else{
	          // window.location = "{{url('/mycourse')}}";
	          swal('เปลี่ยนรหัสผ่าน','คุณได้ทำการเปลี่ยนรหัสผ่าน','success');
						window.location = "{{url('/')}}";
	      }
	  }).fail(function(){
	      swal('เปลี่ยนรหัสผ่าน','เปลี่ยนรหัสผ่านไม่สำเร็จ','error');
	      btn.button('reset');
	  });
	});
	</script>
