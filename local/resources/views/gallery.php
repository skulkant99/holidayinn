<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php require('inc_header.php'); ?>
		<!-- Add mousewheel plugin (this is optional) -->
		<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
		<!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
		<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
		<!-- Add Button helper (this is optional) -->
		<link rel="stylesheet" type="text/css" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
		<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
		<!-- Add Thumbnail helper (this is optional) -->
		<link rel="stylesheet" type="text/css" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
		<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
		<!-- Add Media helper (this is optional) -->
		<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
		<link rel="stylesheet" type="text/css" href="GridGallery/css/component.css" />
		<script src="GridGallery/js/modernizr.custom.js"></script>
</head>
<style>
	.display-slide {
		display: none;
	}

	.toggle-slide-container input {
		display: none;
	}
	
	.toggle-slide-container label {
		cursor: pointer;
		display: inline-block;
		padding: 5px 10px;
		border: 1px solid dimgray;
		border-radius: 4px;
		background-color: transparent;
		color: black;
		font-size: 0.9em;
		-webkit-transition: background-color 0.1s, color 0.1s;
		user-select: none;
	}
	
	.toggle-slide-container label:hover {
		background-color: transparent;
		color: #000;
	}
	
	.toggle-slide-container .wrapper {
		overflow: hidden;
		height: 100%;
	}
	
	.toggle-slide-container .hidden {
		position: relative;
		overflow: hidden;
		width: 100%;
		padding: 5px 15px;
		color: black;
		transform: translateY(-100%);
		margin-top: -100%;
		transition: all 0.5s;
		z-index: 99;
	}
	
	.toggle-slide-container .hidden a i {
		color: #999acc;
	}
	
	.toggle-slide-container .hidden a {
		border-radius: 50px;
		margin-right: 10px;
		border: 1px solid #999acc;
		display: inline-block;
		line-height: 28px;
		width: 30px;
		height: 30px;
		display: inline-block;
		background-color: white;
	}
	
	input:checked + .wrapper .hidden {
		transform: translateY(0);
		margin-top: 0;
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
							<li class="breadcrumb-item active" aria-current="page">Gallery</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="head_title">
						<h1>Photos and Videos</h1>
						<p>200 Photos and 2 Videos</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="row">
						<div class="col">
							<div class="gallery-tabset select-display-slide hidden-mobile wow fadeInDown">
								<li class="active" rel="1"> <a href="javascript:void(0)">View all (33) </a> </li>
								<li rel="2"> <a href="javascript:void(0)"> Videos </a> </li>
								<li rel="3"> <a href="javascript:void(0)"> Guest rooms</a> </li>
								<li rel="4"> <a href="javascript:void(0)"> Dining</a> </li>
								<li rel="5"> <a href="javascript:void(0)"> Spa</a> </li>
								<li rel="6"> <a href="javascript:void(0)"> Resort views</a> </li>
								<li rel="7"> <a href="javascript:void(0)"> Kids Club</a> </li>
								<li rel="8"> <a href="javascript:void(0)"> Activities</a> </li>
								<li rel="9"> <a href="javascript:void(0)"> Fitness</a> </li>
								<li rel="10"> <a href="javascript:void(0)"> Meetings and Events</a> </li>
								<li rel="11"> <a href="javascript:void(0)"> Weddings</a> </li>
								<li rel="12"> <a href="javascript:void(0)"> Attractions</a> </li>
							</div>
						</div>
					</div>
					<div class="gallery-news mt-5">
						<div class="display-slide" rel="1" style="display:block;">
							<div class="row">
								<div class="col">
									<h1 class="text-center">Guest Rooms </h1>
									<div id="grid-gallery" class="grid-gallery spacetopbig">
										<div class="grid-wrap">
											<ul class="grid">
												<li>
													<a class="fancybox" href="images/gallery_03.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_03.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3>
														<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle1">Share</label>
															<input id="slidetoggle1" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
													</div>
												</li>
												<li>
													<a class="fancybox" href="images/gallery_05.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_05.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3>
																				<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle2">Share</label>
															<input id="slidetoggle2" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
														 </div>
												</li>
												<li>
													<a class="fancybox" href="images/gallery_07.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_07.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3> 
																				<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle3">Share</label>
															<input id="slidetoggle3" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
														</div>
												</li>
												<li>
													<a class="fancybox" href="images/gallery_12.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_12.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3>
																				<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle4">Share</label>
															<input id="slidetoggle4" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
														  </div>
												</li>
												<li>
													<a class="fancybox" href="images/gallery_15.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_15.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3>
																				<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle5">Share</label>
															<input id="slidetoggle5" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
														  </div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="display-slide" rel="2">
							<div class="row">
								<div class="col">
									<h1 class="text-center">Videos </h1>
									<div id="grid-gallery" class="grid-gallery spacetopbig">
										<div class="grid-wrap">
											<ul class="grid">
												<li>
													<a class="fancybox" href="images/gallery_03.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_03.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3> 
																				<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle10">Share</label>
															<input id="slidetoggle10" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
														</div>
												</li>
												<li>
													<a href="#">
														<div class="pic_allevent">
															<iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/eWTbSVbaH_A?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
														</div>
													</a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3>
														
														 						<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle9">Share</label>
															<input id="slidetoggle9" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
														   </div>
												</li>
												<li>
													<a href="#">
														<div class="pic_allevent">
															<iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/eWTbSVbaH_A?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
														</div>
													</a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3>
																				<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle11">Share</label>
															<input id="slidetoggle11" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div> </div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="display-slide" rel="3">
							<div class="row">
								<div class="col">
									<div id="grid-gallery" class="grid-gallery spacetopbig">
										<div class="grid-wrap">
											<ul class="grid">
												<li>
													<a class="fancybox" href="images/gallery_03.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_03.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3>
														
														 						<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle6">Share</label>
															<input id="slidetoggle6" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
														   </div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="display-slide" rel="4">
							<div class="row">
								<div class="col">
									<div id="grid-gallery" class="grid-gallery spacetopbig">
										<div class="grid-wrap">
											<ul class="grid">
												<li>
													<a class="fancybox" href="images/gallery_03.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_03.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3>
																				<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle7">Share</label>
															<input id="slidetoggle7" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
														  </div>
												</li>
												<li>
													<a class="fancybox" href="images/gallery_03.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_03.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3> 
																				<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle8">Share</label>
															<input id="slidetoggle8" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
														</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="display-slide" rel="5">
							<div class="row">
								<div class="col">
									<div id="grid-gallery" class="grid-gallery spacetopbig">
										<div class="grid-wrap">
											<ul class="grid">
												<li>
													<a class="fancybox" href="images/gallery_03.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_03.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3>
																				<br>
														<div class="toggle-slide-container">
															<label for="slidetoggle1">Share</label>
															<input id="slidetoggle1" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div> </div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<script src="GridGallery/js/imagesloaded.pkgd.min.js"></script>
		<script src="GridGallery/js/masonry.pkgd.min.js"></script>
		<script src="GridGallery/js/classie.js"></script>
		<script src="GridGallery/js/cbpGridGallery.js"></script>
		<script>
			new CBPGridGallery(document.getElementById('grid-gallery'));
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$(".select-display-slide > li").click(function () {
					var rel = $(this).attr("rel");
					console.log(rel);
					$('.display-slide').hide();
					$('.display-slide[rel=' + rel + ']').fadeIn();
					$(".select-display-slide > li").removeClass("active");
					$(this).addClass("active");
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				/*
				 *  Simple image gallery. Uses default settings
				 */
				$('.fancybox').fancybox();
				/*
				 *  Different effects
				 */
				$('.fancybox-thumbs').fancybox({
					prevEffect: 'none'
					, nextEffect: 'none'
					, closeBtn: false
					, arrows: false
					, nextClick: true
					, helpers: {
						thumbs: {
							width: 50
							, height: 50
						}
					}
				});
				/*
				 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
				 */
				$('.fancybox-media').attr('rel', 'media-gallery').fancybox({
					openEffect: 'none'
					, closeEffect: 'none'
					, prevEffect: 'none'
					, nextEffect: 'none'
					, arrows: false
					, helpers: {
						media: {}
						, buttons: {}
					}
				});
			});
		</script>
		<?php require('inc_footer.php'); ?>
</body>

</html>