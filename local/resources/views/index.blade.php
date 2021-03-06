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
		.smenu .linkedin {
			background-color: #007da8;
			color: #FFF ;
		}
		.smenu .linkedin a{
				color: white;
			}
		.listshare i {
			color: white;
		}
		.listshare {
			background-color: #999acc;
			display: inline-block;
			border-radius: 50px;
			width: 30px;
			height: 30px;
			text-align: center;
			line-height: 30px;
			/* margin-left: 10px; */
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
		.img-update{
			width: 20%;
			height: 20%;
			float: left;
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
									<a href="{{url('offer_inside/'.$_content->id)}}"><div class="img_offer"> <img src="{{asset('uploads/Information/'.$photo[0])}}" class="img-fluid"> </div></a>
								@else
								@endif
					
						</div>
						<div class="col-12 col-lg-6">
							<div class="offer_details">
								<div class="row">
									<div class="col-12 col-md-9 col-lg-9">
										<?php echo ($_content->title); ?> </div>
									<div class="col-12 col-md-3 col-lg-3">
										<div class="likebtn">
											<button class="likebefore" data-id="{{$_content->id}}"></button>
										</div>
										<div class="like_text" id="re_like">{{$_content->like}} Likes </div>
									</div>
								</div>
								<?php echo (substr_replace($_content->detail,'...',220)); ?>
							</div>
							<div class="row mt-5">
								<div class="col-12 col-md-6 col-lg-5 col-xl-6"> <a href="{{url('offer_inside/'.$_content->id)}}" class="btn btn-primary">Read more</a> </div>
								<div class="col-12 col-md-6 col-lg-7 col-xl-6">
									<div class="list_share">
										<li class="circle_pencil">
										<a href="{{url('offer_inside/'.$_content->id)}}"><img src="{{asset('images/write.png')}}"></a>
										</li>
										<li class="listshare"><a href="https://www.facebook.com/dialog/share?app_id=966242223397117&display=popup&href=http%3A%2F%2Fholidayinnphuket.com%2F" target="_blank"><i class="fab fa-facebook-f"></i></a></li>	
										<li class="listshare"><a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url="http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i> </a></li>
										<li class="listshare"><a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/" target="_blank"><i class="fab fa-linkedin-in"></i> </a></li>

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
						<li><a href="{{asset('offer_inside/'.$_content->id)}}">{{strip_tags(html_entity_decode($_content->title))}}</a></li>					
							@endforeach
						
							{{-- <li><a href="#">Family Fun in Perth City 2019</a></li>
							<li><a href="#">Top 8 Date Experiences this Valentine’s Day 2019</a></li>
							<li><a href="#">The Best Free Things to See and Do in Perth</a></li> --}}
						</div>
						<div class="sidmenu_recent">
							<h3>Updated photos</h3>
							@foreach ($gallery as $_gallery)
								@php
									$date_create = substr($_gallery->updated_at,0,-8);
									// $today = new DateTime(date("Y-m-d H:i:s"));
									// $date_comment  = $_comment->created_at;
									// $days_until_appt = $date_comment->diff($today)->d; 
									$date_create_edit = explode('-', $date_create);
									$month = $date_create_edit[1];
									$day   = $date_create_edit[2];
									$year  = $date_create_edit[0]; 
									switch ($month) {
										case '01':
											$month = "Jan";
											break;
										case '02':
											$month = "Fab";
											break;
										case '03':
											$month = "Mar";
											break;
										case '04':
											$month = "Apr";
											break;
										case '05':
											$month = "May";
											break;
										case '06':
											$month = "June";
											break;
										case '07':
											$month = "July";
											break;
										case '08':
											$month = "Aug";
											break;
										case '09':
											$month = "Sept";
											break;
										case '10':
											$month = "Oct";
											break;
										case '11':
											$month = "Nov";
											break;
										case '12':
											$month = "Dev";
											break;
										default:
											# code...
											break;
									}
								@endphp
								<li><a href="{{url('gallery')}}">{{$_gallery->gallery_name}} new photo <br> {{$day.' '.$month.' '.$year}}</a></li>
							@endforeach
							{{-- <li><a href="#">Top 8 Date Experiences this Valentine’s Day 2019</a></li>
							<li><a href="#">The Best Free Things to See and Do in Perth</a></li>
							<li><a href="#">THE BEST FRINGE WORLD FESTIVAL SHOWS IN PERTH 2019</a></li>
							<li><a href="#">Christmas in Perth City 2018</a></li> --}}
						</div>
						{{-- <div class="side_privacy">
							<li><a href="{{url('fullcomment')}}"><i class="far fa-sticky-note"></i> Full comment policy   </a> </li>
							<li><a href="{{url('ourcomment')}}"> <i class="far fa-sticky-note"></i> Our policy on commenting</a></li>
						</div> --}}
					</div>
			</div>
		</div>
		@include('inc_footer')
			<script>
				$(document).ready(function(){
					$('.likebefore').on('click',function(){
						var postid = $(this).data('id');
						console.log(postid);
						
						$content = $(this);
						$.ajax({
							method : "POST",
							url : "{{url('/Addlike')}}",
							data : {
								'liked': 1,
								'postid': postid
							},
						}).done(function(like){
							console.log(like);
							location.reload();
							// $post.parent().find('span.likes_count').text(response + " likes");
							// $post.addClass('hide');
							// $post.siblings().removeClass('hide');
						});
					});
				});
			</script>
			<script>
				/*---Slideshow-----*/
				function slideshow() {
					if ($('.slideshow .flexslider').size()) {
						$('.slideshow .flexslider').flexslider({
							animation: 'fade'
							, slideshowSpeed: 4000
							, animationDuration: 100
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
				@foreach($content as  $_content)
					$('.btnshare{{$_content->id}}').on('click', function (event) {
						event.preventDefault();
						
						$('.btnsub{{$_content->id}}').toggleClass('share');
					});
				@endforeach
			
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
			<script>
					(function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
						if(d.getElementById(id)) {return;}
							js = d.createElement('script'); js.id = id; 
							js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
							ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
						function postToFeed(title, desc, url, image){
						var obj = {method: 'feed',link: url, picture: 'http://www.url.com/images/'+image,name: title,description: desc};
						function callback(response){}
						FB.ui(obj, callback);
					}
			</script>
				
			<script>
				$('.shareContent').click(function(){
					elem = $(this);
					postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));
					return false;
				});
			</script>
			
	
</body>

</html>