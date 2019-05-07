<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	@include('inc_header')
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
	@include('inc_topmenu')
		<div class="container-fluid nopad">
			<div class="row">
				<div class="col">
				<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
					<section class="slideshow wow fadeInUp">
						<div class="flexslider">
							<ul class="slides">
				
								<?php 
									foreach ($banner as $_banner) {
										if(isset($_banner->photo) && $_banner->banner_type == "F"){
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
										if(isset($_banner->photo) && $_banner->banner_type == "M"){
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
				<div class="col-lg-9" id="contant">
					@foreach($content as $_content)
						<div class="row offer_box">
						<div class="col-12 col-lg-6 photo">
							<?php $photo = json_decode($_content->photo, true)  ?>
								@if(isset($photo) && $photo)
								<div class="img_offer"> <img src="{{asset('uploads/Information/'.$photo[0])}}" class="img-fluid"> </div>
								@else
								@endif
					
						</div>
						<div class="col-12 col-lg-6">
							<div class="offer_details">
								<div class="row">
									<div class="col-12 col-md-9 col-lg-9">
										<h3>{{$_content->title}}</h3> </div>
									<div class="col-12 col-md-3 col-lg-3">
										<div class="likebtn">
											<button class="likebefore"></button>
										</div>
										<div class="like_text"> 34 Likes </div>
									</div>
								</div>
								<?php echo '<p>'.$_content->detail.'</p>';?>
							</div>
							<div class="row mt-5">
								<div class="col-12 col-md-6 col-lg-5 col-xl-6"> <a href="{{url('offer_inside/'.$_content->id)}}" class="btn btn-primary">Read more</a> </div>
								<div class="col-12 col-md-6 col-lg-7 col-xl-6">
									<div class="list_share">
										<li class="circle_pencil">
										<a href="{{url('offer_inside/'.$_content->id)}}"><img src="{{asset('images/write.png')}}"></a>
										</li>
										<li>
											<div class="sbutton"> <span><img src="images/share.png"></span>
												<ul class="smenu">
													<li class="facebook"><a href="" id="shareContent_{{$_content->id}}" ><i class="fab fa-facebook-f"></i> Facebook</a></li>
													<li class="twitter"><a href=""><i class="fab fa-twitter"></i> Twitter</a></li>
													<li class="googleplus"><a href=""><i class="fab fa-google-plus-g"></i> Google+</a></li>
												</ul>
											</div>
										</li>
									<li class="circle_view"><img src="{{asset('images/view.png')}}">{{$_content->view}}</li>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				
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
							<h3>Most recent</h3>
							@foreach ($content as  $_content)
						<li><a href="{{asset('offer_inside/'.$_content->id)}}">{{$_content->title}}</a></li>					
							@endforeach
						
							{{-- <li><a href="#">Family Fun in Perth City 2019</a></li>
							<li><a href="#">Top 8 Date Experiences this Valentine’s Day 2019</a></li>
							<li><a href="#">The Best Free Things to See and Do in Perth</a></li> --}}
						</div>
						<div class="sidmenu_recent">
							<h3>Recommended</h3>
							@foreach ($comment_all as $_comment_all)
								<li><a href="{{asset('offer_inside/'.$_comment_all->information_id)}}">{{$_comment_all->comment}}</a></li>
							@endforeach
							{{-- <li><a href="#">Top 8 Date Experiences this Valentine’s Day 2019</a></li>
							<li><a href="#">The Best Free Things to See and Do in Perth</a></li>
							<li><a href="#">THE BEST FRINGE WORLD FESTIVAL SHOWS IN PERTH 2019</a></li>
							<li><a href="#">Christmas in Perth City 2018</a></li> --}}
						</div>
						<div class="side_privacy">
							<li><a href="{{url('fullcomment')}}"><i class="far fa-sticky-note"></i> Full comment policy   </a> </li>
							<li><a href="{{url('ourcomment')}}"> <i class="far fa-sticky-note"></i> Our policy on commenting</a></li>
						</div>
					</div>
			</div>
		</div>
		@include('inc_footer')
			<script>
				/*---Slideshow-----*/
				function slideshow() {
					if ($('.slideshow .flexslider').size()) {
						$('.slideshow .flexslider').flexslider({
							animation: 'fade'
							, slideshowSpeed: 500
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
			<script>
					window.fbAsyncInit = function() {
						FB.init({
							"appID": "2098708527096052",
							"frictionlessRequests": true,
							"init": true,
							"level": "debug",
							"signedRequest": null,
							"status": true,
							"version": "v3.2",
							"viewMode": "website",
							"autoRun": false
						});
					};
					</script>
				<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
				<script>
					@foreach ($content as  $_content)
						document.getElementById('shareContent_{{$_content->id}}').onclick = function() {
						FB.ui({
							method: 'share',
							display: 'popup',
							href: 'https://developers.facebook.com/docs/',
						}, function(response){});
						}
					@endforeach
				
				
				</script>
			
	
</body>

</html>