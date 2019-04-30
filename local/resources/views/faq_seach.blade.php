<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	@include('inc_header')
</head>

<body>
<style>
		.accordion {
			max-width: 100%;
			margin: 0 auto 40px;
			border-botton: 1px solid #ebebeb;
		}
		
		.accordion li {
			border-bottom: 1px solid #ebebeb;
			position: relative;
			list-style: none;
			background-color: white;
				box-shadow: 0 5px 14px -1px rgba(55, 65, 67, .2);
			border-radius: 5px;

		}
		
		.accordion li p {
			display: none;
			padding: 10px 25px 30px;
			font-size: 1.1em;
			color: black;
		}
		
		.accordion a {
			width: 100%;
			display: block;
			cursor: pointer;
			line-height: 55px;
			font-size: 1.2em !important;
			user-select: none;
			color: black !important;
			text-decoration: none;
			margin-top: 10px;
			font-weight: 700;
			padding-left: 20px;
		}
		
		.accordion a:after {
			width: 8px;
			height: 8px;
			border-right: 1px solid black;
			border-bottom: 1px solid black;
			position: absolute;
			right: 10px;
			content: " ";
			top: 17px;
			transform: rotate(-45deg);
			-webkit-transition: all 0.2s ease-in-out;
			-moz-transition: all 0.2s ease-in-out;
			transition: all 0.2s ease-in-out;
		}
		
		.accordion p {
			font-size: 1.5em;
			line-height: 2;
			padding: 10px;
		}
		
		.accordion  a.active:after {
			transform: rotate(45deg);
			-webkit-transition: all 0.2s ease-in-out;
			-moz-transition: all 0.2s ease-in-out;
			transition: all 0.2s ease-in-out;
		}
		
</style>
	@include('inc_topmenu')
	<div class="container mt-4">
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">FAQ</li>
						</ol>
					</nav>
		</div>
	</div>
		<div class="row">
			<div class="col">
				<div class="head_title">
					<h1>Hotel Frequently Asked Questions</h1>
					<p>Need immediate assistance? Please call +66 (0) 76 370 200</p>
				</div>
				
				<div class="search-container">
					<form id="seach">
						<input type="text" id="search-bar" name="seach" placeholder="Search by brand or keyword"> <a href="#" class="submit" ><img src="images/search.png" class="search-icon"></a> 
					</form>		
				</div>
					
				
			</div>
		</div>
	</div>
	<div class="footerbottom_bg">
	<br>
		<div class="container">
			<div class="row">
				<div class="col">
					<ul class="accordion">
						@foreach ($ask as $_ask)
								<li> <a>{{strip_tags($_ask->question_name)}}</a>
								<p>	{{strip_tags($_ask->answer)}}</p>
							</li>
						@endforeach					
						</ul>
				</div>
			</div>
		</div>
		<br><br>
	</div>
		@include('inc_footer')
		
		<script>
			(function ($) {
				$('.accordion > li:eq(0) a').addClass('active').next().slideDown();
				$('.accordion a').click(function (j) {
					var dropDown = $(this).closest('li').find('p');
					$(this).closest('.accordion').find('p').not(dropDown).slideUp();
					if ($(this).hasClass('active')) {
						$(this).removeClass('active');
					}
					else {
						$(this).closest('.accordion').find('a.active').removeClass('active');
						$(this).addClass('active');
					}
					dropDown.stop(false, true).slideToggle();
					j.preventDefault();
				});
			})(jQuery);
		</script>
		<script>
			$(document).ready(function(){
				$("a.submit").click(function(e){		
					e.preventDefault();
					var name = $('#search-bar').val();
					$.ajax({
						method: "GET",
						url: "{{url('seach/')}}",
						data: {name:name},
					}).done(function( res ) {
						// location.reload();
					}).fail(function(){
						swal('เปลี่ยนรหัสผ่าน','เปลี่ยนรหัสผ่านไม่สำเร็จ','error');
						btn.button('reset');
					});
				}); 
			});
			// $('body').on('submit','#seach',function(e){
				
			// 	// e.preventDefault();
			// 	// $.ajax({
			// 	// 	method: "POST",
			// 	// 	url: "{{url('/updatepassword')}}",
			// 	// 	data: $(this).serialize()
			// 	// }).done(function( res ) {
			// 	// 	if(res==0){
			// 	// 		swal(res.title,res.content,'success');
			// 	// 	}else{
			// 	// 		// window.location = "{{url('/mycourse')}}";
			// 	// 		swal('เปลี่ยนรหัสผ่าน','คุณได้ทำการเปลี่ยนรหัสผ่าน','success');
			// 	// 	}
			// 	// }).fail(function(){
			// 	// 	swal('เปลี่ยนรหัสผ่าน','เปลี่ยนรหัสผ่านไม่สำเร็จ','error');
			// 	// 	btn.button('reset');
			// 	// });
			// 	});
		</script>
			
</body>

</html>