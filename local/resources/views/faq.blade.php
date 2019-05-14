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
							{{-- <li class="breadcrumb-item active" aria-current="page">FAQ</li> --}}
						</ol>
					</nav>
		</div>
	</div>
		<div class="row">
			<div class="col">
				<div class="head_title">
					<h1>Frequently Asked Questions</h1>
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
								<li> <a>{{strip_tags($_ask->question)}}</a>
								<p>	{{strip_tags($_ask->answer_name)}}</p>
							</li>
						@endforeach
							
							{{-- <li> <a>Can I  change or cancel the order I have already made?</a>
								<p>We begin processing the orders immediately For this reason we are unable to change or cancel the orders , If you have any question about your order , please  contact Huskies Online Shopping within 1 hour after placing an order tel. 662-4532201  Monday-Saturday 10.00 a.m.-18.00 p.m.. Sorry for cannot accept e-mail request for  changes or cancellation.</p>
							</li>
							<li> <a>How can I check my order status after placing an order?</a>
								<p>You can check your order status by click at "View Cart" (on top right of page)</p>
							</li>
							<li> <a>How can I return any merchandise I have purchased from Huskies Online Shopping?</a>
								<p>	
									Customers can return the intact purchased merchandise(s) by 2 ways: <br>

									Return the purchased merchandise(s) by sending to postal address below: <br>
									Customer Service  -Huskies International Corporation Co.,Ltd. <br>

									31,33,35 Rama II -52 Samae-Dam, <br>

									Bangkhuntien, Bangkok 10150, Thailand <br>

									Return the purchased merchandise(s) yourself at Huskies Office. (Return Policy).</p>
							</li>
							<li>
							<a>When sending merchandise(s) back to "postal address", do I have to responsible for any delivery charges?

							</a>
								<p>	
								If customers would like to return purchased merchandise(s), customers have to responsible for the delivery charge returned according to Thailand Post Office . Every product featured on this website can be returned within 30 days from the date of delivery (discounted items are not refundable and returnable)</p>
							</li>
							<li>
							<a>What should I do if I forgot my username or password I have created?

							</a>
								<p>	
	
								If you forgot your username or password, please click here and fill out your e-mail to receive your username and password.</p>
							</li>
							<li>
							<a>Would it be possible to place an order with Huskies Online Shopping and have them delivered to international receiver?

							</a>
								<p>	
	
							Providing the best service to our customers is the priority of Huskies Online Shopping. Although, we cannot accept international orders at this time, we will inform you in immediately if there are changes in the future.</p>
							</li>
							<li>
							<a>	
							Can  in-store promotion of Huskies  be adopted to use with an online promotion of Huskies Online Shopping?

							</a>
								<p>	
	
							In-store promotion of Huskies  cannot be adopted to use with on-line promotion of Huskies Online Shopping. Please see promotion details  on Huskies Online Shopping website during the promotional periods. If you have any questions, please e-mail us  info@huskiesbags.com</p>
							</li> --}}
						</ul>
				</div>
							
			</div>
		</div>
		<br><br>
	</div>
		@include('inc_footer')
		
		<script>
			function strip(html)
			{
				var tmp = document.createElement("DIV");
				tmp.innerHTML = html;
				return tmp.textContent || tmp.innerText || "";
			}
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
						console.log(res);
						$('.accordion').html('');
						$.each(res,function(k,v){
							var text = `<li> <a>`+strip(v.question)+`</a> 
											 <p>`+strip(v.answer_name)+`</p>
										</li>
										`;
							$('.accordion').append(text);
							var s = document.createElement("script");
								s.type = "text/javascript";
								s.src = "{{asset('js/dropdown.js')}}";
								$("head").append(s);
						})
						
					}).fail(function(){
						swal('เปลี่ยนรหัสผ่าน','เปลี่ยนรหัสผ่านไม่สำเร็จ','error');
						btn.button('reset');
					});
				}); 
			});
			
		</script>
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
			
</body>

</html>