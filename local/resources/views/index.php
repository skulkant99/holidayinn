<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php require('inc_header.php'); ?>
</head>

<body>
	<style>
		/*----Slideshow----------*/
		
		.slideshow .flexslider {
			margin: 0;
			padding: 0;
			border: none;
			box-shadow: none;
			background: none;
			z-index: 0;
		}
		
		.slideshow .flex-direction-nav {
			display: block;
		}
		
		.flex-control-nav {
			bottom: 10px;
			z-index: 9;
		}
		
		.flex-control-nav li {
			display: none;
		}
		
		.flex-control-paging li a.flex-active {
			background-color: white;
		}
		
		.flex-control-paging li a {
			background-color: transparent;
			width: 16px;
			height: 16px;
			border: 3px solid white;
			box-shadow: none;
		}
		
		.flex-control-paging li a:hover {
			background: white;
			transition: ease .5s;
		}
		.page-item.active .page-link {
			z-index: 1;
			color: #fff;
			background-color: #999acc;
			border-color: #999acc;
		}
		.page-link {
			color: #999acc;			
		}
	</style>
	<?php require('inc_topmenu.php'); ?>
		<div class="container-fluid nopad">
			<div class="row">
				<div class="col">
				<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
					<section class="slideshow wow fadeInUp">
						<div class="flexslider">
							<ul class="slides">
				
								<?php 
									foreach ($banner as $_banner) {
										if($_banner->banner_type == "F"){
											echo '<li>
												<a href="#"><img src="'.asset('uploads/Banner/'.$_banner->photo).'" class="img-fluid"> </a>
											</li>';
										} 
								}?>
							</ul>
						</div>
					</section>
				</div>
				<div class="d-block d-sm-block d-md-block d-md-none d-lg-none">
					<section class="slideshow wow fadeInUp">
						<div class="flexslider">
							<ul class="slides">
								<?php 
									foreach ($banner as $_banner) {
										if($_banner->banner_type == "M"){
											echo '<li>
													<a href="#"><img src="'.asset('uploads/Banner/'.$_banner->photo).'" class="img-fluid"> </a>
												 </li>';
										}
									}
								?>
								
								<!-- <li>
									<a href="#"><img src="images/bannermobile4.png" class="img-fluid"> </a>
								</li> -->
							</ul>
						</div>
					</section>
				</div>
				</div>
			</div>
		</div>
		<div class="container mt-4">
			<div class="row">
				<div class="col-lg-9">
					<?php foreach ($content as $_content) {
						echo '	<div class="row offer_box">
						<div class="col-12 col-lg-6">
							<div class="img_offer"> <img src="'.asset('uploads/Information/'.$_content->photo).'" class="img-fluid"> </div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="offer_details">
								<div class="row">
									<div class="col-12 col-md-9 col-lg-9">
										<h3>'.$_content->title.'</h3> </div>
									<div class="col-12 col-md-3 col-lg-3">
										<div class="likebtn">
											<button class="likebefore"></button>
										</div>
										<div class="like_text"> 34 Likes </div>
									</div>
								</div>
								<p>'.$_content->detail.'</p>
							</div>
							<div class="row mt-5">
								<div class="col-12 col-md-6 col-lg-5 col-xl-6"> <a href="offer_inside/'.$_content->id.'" class="btn btn-primary">Read more</a> </div>
								<div class="col-12 col-md-6 col-lg-7 col-xl-6">
									<div class="list_share">
										<li class="circle_pencil">
											<a href="#"><img src="images/write.png"></a>
										</li>
										<li>
											<div class="sbutton"> <span><img src="images/share.png"></span>
												<ul class="smenu">
													<li class="facebook"><a href=""><i class="fab fa-facebook-f"></i> Facebook</a></li>
													<li class="twitter"><a href=""><i class="fab fa-twitter"></i> Twitter</a></li>
													<li class="googleplus"><a href=""><i class="fab fa-google-plus-g"></i> Google+</a></li>
												</ul>
											</div>
										</li>
										<li class="circle_view"><img src="images/view.png"> 32</li>
									</div>
								</div>
							</div>
						</div>
					</div>';
					} ?>
				
					<!-- <div class="row offer_box">
						<div class="col-12 col-lg-6">
							<div class="img_offer"> <img src="images/home2-edit_29.png" class="img-fluid"> </div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="offer_details">
								<div class="row">
									<div class="col-12 col-md-9 col-lg-9">
										<h3>Refurbishing the interior of The Elms hotel</h3> </div>
									<div class="col-12 col-md-3 col-lg-3">
										<div class="likebtn">
											<button class="likebefore"></button>
										</div>
										<div class="like_text"> 34 Likes </div>
									</div>
								</div>
								<p>Taking the decision to refresh the décor and interior of a Queen Anne manor house is no small task. And yet, this is exactly what is underway at The Elms hotel – with fabulous results being unveiled!</p>
							</div>
							<div class="row mt-5">
								<div class="col-12 col-md-6 col-lg-5 col-xl-6"> <a href="<?php echo('offer_inside') ?>" class="btn btn-primary">Read more</a> </div>
								<div class="col-12 col-md-6 col-lg-7 col-xl-6">
									<div class="list_share">
										<li class="circle_pencil">
											<a href="#"><img src="images/write.png"></a>
										</li>
										<li>
											<div class='sbutton'> <span><img src="images/share.png"></span>
												<ul class='smenu'>
													<li class="facebook"><a href=""><i class="fab fa-facebook-f"></i> Facebook</a></li>
													<li class="twitter"><a href=""><i class="fab fa-twitter"></i> Twitter</a></li>
													<li class="googleplus"><a href=""><i class="fab fa-google-plus-g"></i> Google+</a></li>
												</ul>
											</div>
										</li>
										<li class="circle_view"><img src="images/view.png"> 32</li>
									</div>
								</div>
							</div>
						</div>
					</div> -->
		
					<!-- <div class="row offer_box">
						<div class="col-12 col-lg-6">
							<div class="img_offer"> <img src="images/home2-edit_29.png" class="img-fluid"> </div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="offer_details">
								<div class="row">
									<div class="col-12 col-md-9 col-lg-9">
										<h3>Refurbishing the interior of The Elms hotel</h3> </div>
									<div class="col-12 col-md-3 col-lg-3">
										<div class="likebtn">
											<button class="likebefore"></button>
										</div>
										<div class="like_text"> 34 Likes </div>
									</div>
								</div>
								<p>Taking the decision to refresh the décor and interior of a Queen Anne manor house is no small task. And yet, this is exactly what is underway at The Elms hotel – with fabulous results being unveiled!</p>
							</div>
							<div class="row mt-5">
								<div class="col-12 col-md-6 col-lg-5 col-xl-6"> <a href="<?php echo('offer_inside') ?>" class="btn btn-primary">Read more</a> </div>
								<div class="col-12 col-md-6 col-lg-7 col-xl-6">
									<div class="list_share">
										<li class="circle_pencil">
											<a href="#"><img src="images/write.png"></a>
										</li>
										<li>
											<div class='sbutton'> <span><img src="images/share.png"></span>
												<ul class='smenu'>
													<li class="facebook"><a href=""><i class="fab fa-facebook-f"></i> Facebook</a></li>
													<li class="twitter"><a href=""><i class="fab fa-twitter"></i> Twitter</a></li>
													<li class="googleplus"><a href=""><i class="fab fa-google-plus-g"></i> Google+</a></li>
												</ul>
											</div>
										</li>
										<li class="circle_view"><img src="images/view.png"> 32</li>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<?php echo($content->links()) ?>
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
				</div>
			</div>
		</div>
		<?php require('inc_footer.php'); ?>
			<script>
				/*---Slideshow-----*/
				function slideshow() {
					if ($('.slideshow .flexslider').size()) {
						$('.slideshow .flexslider').flexslider({
							animation: 'fade'
							, slideshowSpeed: 5000
							, animationDuration: 1000
						});
					}
				}
				$(window).load(function () {
					slideshow();
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
			<script>
				$('.sbutton').on('click', function (event) {
					event.preventDefault();
					$('.smenu').toggleClass('share');
				});
			</script>
</body>

</html>