<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	@include('inc_header')
</head>
<style>
	.commentbox .form-control {
		background-color: #ebebeb;
		margin-bottom: 20px;
		height: inherit;
	}
	.like_text{
		position: absolute;
		right: 17px;
		top: 60px;
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
							@foreach ($content_detail as $_content_detail)
								<li class="breadcrumb-item active" aria-current="page">{{$_content_detail->title}}</li>
							@endforeach
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-md-10 col-lg-9 col-xl-9">
							<div class="title_offerinside">
							<?php 
								$date_create = substr($_content_detail->created_at,0,-8);
								$date_create = explode('-', $date_create);
								$month = $date_create[1];
								$day   = $date_create[2];
								$year  = $date_create[0] + 543;
							?>
							@foreach ($content_detail as $_content_detail)
								<h2>{{$_content_detail->title}}</h2> <span class="dateinside">{{$day."/".$month."/".$year}}</span> </div>
							@endforeach
						</div>
						<div class="col-md-2 col-lg-3 col-xl-3">
							<div class="likebtn">
								<button class="likebefore"></button>
							</div>
							<div class="like_text"> 34 Likes </div>
						</div>
					</div>
					<hr>
					@foreach ($content_detail as $_content_detail)
					<div class="row">
						<div class="col">
							<div class="offer_details_inside"> <img src="{{asset('images/offer-inside_03.png')}}" class="img-fluid">
								<br>
								<br>
								<p>{{strip_tags($_content_detail->detail)}}</p>
							</div>
						</div>
					</div>					
					@endforeach
					<hr>
					<div class="share_offer_inside">
						<li class="circle_pencil"> <img src="{{asset('images/share.png')}}"> </li>
						<li class="purplebg"><a href="#"><i class="fas fa-envelope"></i></a></li>
						<li class="purplebg"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="purplebg"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</div>
					<hr>
					
					<?php if(Auth::check()){ ?>
							<!--	Login แล้วโชว์อันนี้			-->
						<div class="commentbox">
							<textarea class="form-control" id="textarea" name="textarea" rows="5" placeholder="Type here.."></textarea> <a href="#" class="btn btn-primary">Send your message</a> 
						</div>
					<?php }else { ?>
						<!--	สำหรับยังไม่ Loginค่ะ			   -->
						<div class="logincomment text-center">
							<a href="#" class="btn btn-primary">Leave a comment</a>
						</div>
					<?php } ?> 
					
		
					<div class="list_comment mt-5">
						<h2>RECENT COMMENT</h2>
						<br>
						<div class="border_comment gallery">
							<h5>First Time Buyer</h5>
							<p>Quality fabric, well made and feather cushion insert...really classy cushion</p>
							<div class="date_comment gallery"> 1 month ago By Tina </div>
						</div>
						<br>
						<div class="border_comment gallery">
							<h5>First Time Buyer</h5>
							<p>Quality fabric, well made and feather cushion insert...really classy cushion</p>
							<div class="date_comment gallery"> 1 month ago By Tina </div>
						</div>
						<br>
						<div class="border_comment gallery">
							<h5>First Time Buyer</h5>
							<p>Quality fabric, well made and feather cushion insert...really classy cushion</p>
							<div class="date_comment"> 1 month ago By Tina </div>
						</div>
						<br>
						<div class="border_comment gallery">
							<h5>First Time Buyer</h5>
							<p>Quality fabric, well made and feather cushion insert...really classy cushion</p>
							<div class="date_comment"> 1 month ago By Tina </div>
						</div>
						<br>
						<div class="border_comment gallery">
							<h5>First Time Buyer</h5>
							<p>Quality fabric, well made and feather cushion insert...really classy cushion</p>
							<div class="date_comment"> 1 month ago By Tina </div>
						</div>
						<br>
						<div class="border_comment gallery">
							<h5>First Time Buyer</h5>
							<p>Quality fabric, well made and feather cushion insert...really classy cushion</p>
							<div class="date_comment"> 1 month ago By Tina </div>
						</div>
						<div class="btnmore center-block text-center wow fadeInUp"> <a class="loadMore btnload" href="#">Show More comment</a> </div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="sidmenu_recommend">
						<h3>Recommended</h3>
						<li><a href="#">Family Fun in Perth City 2019</a></li>
						<li><a href="#">Top 8 Date Experiences this Valentine’s Day 2019</a></li>
						<li><a href="#">The Best Free Things to See and Do in Perth</a></li>
					</div>
					<div class="sidmenu_recent">
						<h3>Recommended</h3>
						<li><a href="#">Family Fun in Perth City 2019</a></li>
						<li><a href="#">Top 8 Date Experiences this Valentine’s Day 2019</a></li>
						<li><a href="#">The Best Free Things to See and Do in Perth</a></li>
						<li><a href="#">THE BEST FRINGE WORLD FESTIVAL SHOWS IN PERTH 2019</a></li>
						<li><a href="#">Christmas in Perth City 2018</a></li>
					</div>
					<div class="side_privacy">
						<li><a href="{{url('fullcomment')}}"><i class="far fa-sticky-note"></i> Full comment policy   </a> </li>
						<li><a href="{{url('ourcomment')}}"> <i class="far fa-sticky-note"></i> Our policy on commenting</a></li>
					</div>
				</div>
			</div>
		</div>
		<br>
		@include('inc_footer')
			<script>
				$(function () {
					var numItems = $('.photo-container').length;
					console.log(numItems);
					$(".gallery").slice(0, 5).show();
					$(".loadMore").on('click', function (e) {
						e.preventDefault();
						$(".gallery:hidden").slice(0, 6).slideDown();
						if ($(".gallery:hidden").length == 0) {
							$(".load").fadeOut('slow');
						}
					});
				});
			</script>
			<script>
				$(() => {
					'use strict';
					$('.likebefore').click(function () {
						$(this).toggleClass('pressed');
					});
				});
			</script>
</body>

</html>