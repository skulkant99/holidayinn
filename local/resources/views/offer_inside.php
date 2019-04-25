<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php require('inc_header.php'); ?>
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
	<?php require('inc_topmenu.php'); ?>
		<div class="container mt-4">
			<div class="row">
				<div class="col">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Refurbishing the interior of The Elms hotel</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-md-10 col-lg-9 col-xl-9">
							<div class="title_offerinside">
								<h2>Refurbishing the interior of The Elms hotel</h2> <span class="dateinside">12/02/2562</span> </div>
						</div>
						<div class="col-md-2 col-lg-3 col-xl-3">
							<div class="likebtn">
								<button class="likebefore"></button>
							</div>
							<div class="like_text"> 34 Likes </div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col">
							<div class="offer_details_inside"> <img src="images/offer-inside_03.png" class="img-fluid">
								<br>
								<br>
								<p> The best experiences in the world start with Your Rate. It is our exclusive IHG®Rewards Club price and it is only available when you book directly with us.
									<br>
									<br> Your Rate is more than the best deal and great rewards. IHG® Rewards Club members also receive:
									<br>
									<br> Free Wi-Fi to keep you connected on all devices IHG Member priority check-in and late check-out for Elite member No blackout dates for IHG Reward Night
									<br>
									<br> Best price guarantee, when you Book directly with us, we promise you’ll always get the lowest price.
									<br>
									<br> Not a member yet? There’s a reason over 100 million people have enrolled in IHG®Rewards Club. Come to discover it for yourself and enjoy Your Rate promotion now!</p>
							</div>
						</div>
					</div>
					<hr>
					<div class="share_offer_inside">
						<li class="circle_pencil"> <img src="images/share.png"> </li>
						<li class="purplebg"><a href="#"><i class="fas fa-envelope"></i></a></li>
						<li class="purplebg"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="purplebg"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</div>
					<hr>
					<!--	สำหรับยังไม่ Loginค่ะ			   -->
					<div class="logincomment text-center">
						<a href="#" class="btn btn-primary">Leave a comment</a>
					</div>
		
								<!--	Login แล้วโชว์อันนี้			-->
<!--
					<div class="commentbox">
						<textarea class="form-control" id="textarea" name="textarea" rows="5" placeholder="Type here.."></textarea> <a href="#" class="btn btn-primary">Send your message</a> 
					</div>
-->
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
						<li><a href="fullcomment.php"><i class="far fa-sticky-note"></i> Full comment policy   </a> </li>
						<li><a href="ourcomment.php"> <i class="far fa-sticky-note"></i> Our policy on commenting</a></li>
					</div>
				</div>
			</div>
		</div>
		<br>
		<?php require('inc_footer.php'); ?>
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