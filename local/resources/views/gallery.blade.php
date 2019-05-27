<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	@include('inc_header')
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
		<meta property="og:url"           content="http://holidayinnphuket.com/gallery" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Holiday Inn Resort Phuket" />
		<meta property="og:description"   content="Holiday Inn Resort Phuket" />
		<meta property="og:image"         content="http://holidayinnphuket.com/uploads/Galleries/1556188096-wSqvY.png" />
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
	
	.toggle-slide-container .wrapper a i {
		color: #999acc;
	}
	
	.toggle-slide-container .wrapper a {
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
	
	/* input:checked + .wrapper .hidden {
		transform: translateY(0);
		margin-top: 0;
	} */
	.head_title h1 {
		font-size: 2em;
		/* text-transform: uppercase; */
		letter-spacing: 2px;
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
</style>

<body>
	@include('inc_topmenu')
		<div class="container mt-4">
			<div class="row">
				<div class="col">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							{{-- <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li> --}}
							{{-- <li class="breadcrumb-item active" aria-current="page">Gallery</li> --}}
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="head_title">
						<h1>Photos and Videos</h1>
						<?php $photo = $gallery->where('type','=','P'); 
						$video = $gallery->where('type','=','V');
						echo '<p>'.count($photo).' Photos and '.count($video).' Videos</p>'; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="row">
						<div class="col">
							<div class="gallery-tabset select-display-slide hidden-mobile wow fadeInDown">
								<li class="active" rel="1"> <a href="javascript:void(0)">View all <?php echo '('.(count($photo) + count($video)).')'?> </a> </li>
								<?php foreach ($gallery_type as $_gallery_type) {
									echo '<li rel="'.$_gallery_type->sort_id.'"> <a href="javascript:void(0)"> '.$_gallery_type->name.' </a> </li>';
								} ?>
								<!-- <li rel="2"> <a href="javascript:void(0)"> Videos </a> </li>
								<li rel="3"> <a href="javascript:void(0)"> Guest rooms</a> </li>
								<li rel="4"> <a href="javascript:void(0)"> Dining</a> </li>
								<li rel="5"> <a href="javascript:void(0)"> Spa</a> </li>
								<li rel="6"> <a href="javascript:void(0)"> Resort views</a> </li>
								<li rel="7"> <a href="javascript:void(0)"> Kids Club</a> </li>
								<li rel="8"> <a href="javascript:void(0)"> Activities</a> </li>
								<li rel="9"> <a href="javascript:void(0)"> Fitness</a> </li>
								<li rel="10"> <a href="javascript:void(0)"> Meetings and Events</a> </li>
								<li rel="11"> <a href="javascript:void(0)"> Weddings</a> </li>
								<li rel="12"> <a href="javascript:void(0)"> Attractions</a> </li> -->
							</div>
						</div>
					</div>
					
					<div class="gallery-news mt-5">
						<div class="display-slide" id="view_all" rel="1" style="display:block;">
									<div class="row">
										<div class="col">
											<h1 class="text-center"></h1>
											<div id="grid-gallery" class="grid-gallery spacetopbig">
												<div class="grid-wrap">
													<ul class="grid">
													<?php
														foreach ($gallery as $_gallery_all) {
														echo '<li>';
														if($_gallery_all->type == 'V'){
															echo '<iframe width="100%" height="315" src="'.$_gallery_all->link_video.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
														}else{
															echo '<a class="fancybox" href="'.asset('uploads/Galleries/'.$_gallery_all->photo).'" data-fancybox-group="gallery" title="'.$_gallery_all->name.'"><img src="'.asset('uploads/Galleries/'.$_gallery_all->photo).'" alt="" class="img-fluid" /></a>';
														}
														echo '<div class="topic-blog2 text-center">
																<h3>'.$_gallery_all->name.'</h3>
																<br>
																<div class="toggle-slide-container">
																	
																	<input id="slidetoggle1" type="checkbox">
																		<div class="wrapper">
																			
																				<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																				<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																				<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																				<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																			
																	</div>
																</div>
															</div>
														</li>'; 
														} ?>
													</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								
								<div class="display-slide" rel="2" style="display:none;">
									<div class="row">
										<div class="col">
											<?php $video_name = $gallery_type->where('id','=','1'); ?>
											@foreach ($video_name as $_video_name)
												<h1 class="text-center">{{$_video_name->name}}</h1>	
											@endforeach
										<div id="grid-gallery" class="grid-gallery spacetopbig">
											<div class="grid-wrap">
												<ul class="grid">
												<?php $video = $gallery->where('type','=','V'); 
													foreach ($video as $_video) {
													echo '<li>
													<iframe width="100%" height="315" src="'.$_video->link_video.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
														<div class="topic-blog2 text-center">
															<h3>'.$_video->name.'</h3>
															<br>
															<div class="toggle-slide-container">
																
																<input id="slidetoggle2" type="checkbox">
																<div class="wrapper">
																	
																		<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																		<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																		<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																		<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																	
																</div>
															</div>
														</div>
													</li>'; } ?>
												</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="display-slide" rel="3" style="display:none;">
								<div class="row">
									<div class="col">
										<?php $Guest_name = $gallery_type->where('id','=','2'); ?>
										@foreach ($Guest_name as $_Guest_name)
											<h1 class="text-center">{{$_Guest_name->name}}</h1>	
										@endforeach
										<div id="grid-gallery" class="grid-gallery spacetopbig">
											<div class="grid-wrap">
												<ul class="grid">
												<?php $Guest_Rooms = $gallery->where('gallery_type_id','=','2')->where('type','=','P'); 
													foreach ($Guest_Rooms as $_Guest_Rooms) {
													echo '<li>
														<a class="fancybox" href="'.asset('uploads/Galleries/'.$_Guest_Rooms->photo).'" data-fancybox-group="gallery" title="'.$_Guest_Rooms->name.'"><img src="'.asset('uploads/Galleries/'.$_Guest_Rooms->photo).'" alt="" class="img-fluid" /></a>
														<div class="topic-blog2 text-center">
															<h3>'.$_Guest_Rooms->name.'</h3>
															<br>
															<div class="toggle-slide-container">
															
																<input id="slidetoggle3" type="checkbox">
																<div class="wrapper">
																		
																				<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																				<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																				<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																				<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																		
																</div>
															</div>
														</div>
													</li>'; } ?>
												</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
						
							<div class="display-slide" rel="4" style="display:none;">
								<div class="row">
									<div class="col">
										<?php $Dining_name = $gallery_type->where('id','=','3'); ?>
										@foreach ($Dining_name as $_Dining_name)
											<h1 class="text-center">{{$_Dining_name->name}}</h1>	
										@endforeach
										<div id="grid-gallery" class="grid-gallery spacetopbig">
											<div class="grid-wrap">
												<ul class="grid">
												<?php $Dining = $gallery->where('gallery_type_id','=','3')->where('type','=','P'); 
													foreach ($Dining as $_Dining) {
													echo'<li>
														<a class="fancybox" href="'.asset('uploads/Galleries/'.$_Dining->photo).'" data-fancybox-group="gallery" title="'.$_Dining->name.'"><img src="'.asset('uploads/Galleries/'.$_Dining->photo).'" alt="" class="img-fluid" /></a>
														<div class="topic-blog2 text-center">
															<h3>'.$_Dining->name.'</h3>
															<br>
															<div class="toggle-slide-container">
															
																<input id="slidetoggle4" type="checkbox">
																<div class="wrapper">
																
																			<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																			<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																	
																</div>
															</div>
														</div>
													</li>'; } ?>
												</ul>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="display-slide" rel="5" style="display:none;">
									<div class="row">
										<div class="col">
											<?php $Spa_name = $gallery_type->where('id','=','4'); ?>
											@foreach ($Spa_name as $_Spa_name)
												<h1 class="text-center">{{$_Spa_name->name}}</h1>	
											@endforeach
											<div id="grid-gallery" class="grid-gallery spacetopbig">
												<div class="grid-wrap">
													<ul class="grid">
													<?php $Spa = $gallery->where('gallery_type_id','=','4')->where('type','=','P'); 
														foreach ($Spa as $_Spa) {
														echo'<li>
															<a class="fancybox" href="'.asset('uploads/Galleries/'.$_Spa->photo).'" data-fancybox-group="gallery" title="'.$_Spa->name.'"><img src="'.asset('uploads/Galleries/'.$_Spa->photo).'" alt="" class="img-fluid" /></a>
															<div class="topic-blog2 text-center">
																<h3>'.$_Spa->name.'</h3>
																<br>
																<div class="toggle-slide-container">
																	
																	<input id="slidetoggle5" type="checkbox">
																	<div class="wrapper">
																		
																			<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																			<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																		
																	</div>
																</div>
															</div>
														</li>'; } ?>
													</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="display-slide" rel="6" style="display:none;">
									<div class="row">
										<div class="col">
											<?php $Resort_name = $gallery_type->where('id','=','5'); ?>
											@foreach ($Resort_name as $_Resort_name)
												<h1 class="text-center">{{$_Resort_name->name}}</h1>	
											@endforeach
											<div id="grid-gallery" class="grid-gallery spacetopbig">
												<div class="grid-wrap">
													<ul class="grid">
													<?php $Resort_views = $gallery->where('gallery_type_id','=','5')->where('type','=','P'); 
														foreach ($Resort_views as $_Resort_views) {
														echo'<li>
															<a class="fancybox" href="'.asset('uploads/Galleries/'.$_Resort_views->photo).'" data-fancybox-group="gallery" title="'.$_Resort_views->name.'"><img src="'.asset('uploads/Galleries/'.$_Resort_views->photo).'" alt="" class="img-fluid" /></a>
															<div class="topic-blog2 text-center">
																<h3>'.$_Resort_views->name.'</h3>
																<br>
																<div class="toggle-slide-container">
																	
																	<input id="slidetoggle6" type="checkbox">
																	<div class="wrapper">
																		
																			<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																			<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																		
																	</div>
																</div>
															</div>
														</li>'; } ?>
													</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="display-slide" rel="7" style="display:none;">
									<div class="row">
										<div class="col">
											<?php $Kids_name = $gallery_type->where('id','=','6'); ?>
											@foreach ($Kids_name as $_Kids_name)
												<h1 class="text-center">{{$_Kids_name->name}}</h1>	
											@endforeach
											<div id="grid-gallery" class="grid-gallery spacetopbig">
												<div class="grid-wrap">
													<ul class="grid">
													<?php $Kids_Club = $gallery->where('gallery_type_id','=','6')->where('type','=','P'); 
														foreach ($Kids_Club as $_Kids_Club) {
														echo'<li>
															<a class="fancybox" href="'.asset('uploads/Galleries/'.$_Kids_Club->photo).'" data-fancybox-group="gallery" title="'.$_Kids_Club->name.'"><img src="'.asset('uploads/Galleries/'.$_Kids_Club->photo).'" alt="" class="img-fluid" /></a>
															<div class="topic-blog2 text-center">
																<h3>'.$_Kids_Club->name.'</h3>
																<br>
																<div class="toggle-slide-container">
																	
																	<input id="slidetoggle7" type="checkbox">
																	<div class="wrapper">
																		
																			<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																			<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																		
																	</div>
																</div>
															</div>
														</li>'; } ?>
													</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="display-slide" rel="8" style="display:none;">
									<div class="row">
										<div class="col">
											<?php $Activities_name = $gallery_type->where('id','=','7'); ?>
											@foreach ($Activities_name as $_Activities_name)
												<h1 class="text-center">{{$_Activities_name->name}}</h1>	
											@endforeach
											<div id="grid-gallery" class="grid-gallery spacetopbig">
												<div class="grid-wrap">
													<ul class="grid">
													<?php $Activities = $gallery->where('gallery_type_id','=','7')->where('type','=','P'); 
														foreach ($Activities as $_Activities) {
														echo'<li>
															<a class="fancybox" href="'.asset('uploads/Galleries/'.$_Activities->photo).'" data-fancybox-group="gallery" title="'.$_Activities->name.'"><img src="'.asset('uploads/Galleries/'.$_Activities->photo).'" alt="" class="img-fluid" /></a>
															<div class="topic-blog2 text-center">
																<h3>'.$_Activities->name.'</h3>
																<br>
																<div class="toggle-slide-container">
																	
																	<input id="slidetoggle8" type="checkbox">
																	<div class="wrapper">
																		
																			<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																			<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																		
																	</div>
																</div>
															</div>
														</li>'; } ?>
													</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="display-slide" rel="9" style="display:none;">
									<div class="row">
										<div class="col">
											<?php $Fitness_name = $gallery_type->where('id','=','8'); ?>
											@foreach ($Fitness_name as $_Fitness_name)
												<h1 class="text-center">{{$_Fitness_name->name}}</h1>	
											@endforeach
										
											<div id="grid-gallery" class="grid-gallery spacetopbig">
												<div class="grid-wrap">
													<ul class="grid">
													<?php $Fitness = $gallery->where('gallery_type_id','=','8')->where('type','=','P'); 
														foreach ($Fitness as $_Fitness) {
														echo'<li>
															<a class="fancybox" href="'.asset('uploads/Galleries/'.$_Fitness->photo).'" data-fancybox-group="gallery" title="'.$_Fitness->name.'"><img src="'.asset('uploads/Galleries/'.$_Fitness->photo).'" alt="" class="img-fluid" /></a>
															<div class="topic-blog2 text-center">
																<h3>'.$_Fitness->name.'</h3>
																<br>
																<div class="toggle-slide-container">
																	
																	<input id="slidetoggle9" type="checkbox">
																	<div class="wrapper">
																		
																			<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																			<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																		
																	</div>
																</div>
															</div>
														</li>'; } ?>
													</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="display-slide" rel="10" style="display:none;">
									<div class="row">
										<div class="col">
											<?php $Meetings_name = $gallery_type->where('id','=','9'); ?>
											@foreach ($Meetings_name as $_Meetings_name)
												<h1 class="text-center">{{$_Meetings_name->name}}</h1>	
											@endforeach
											<div id="grid-gallery" class="grid-gallery spacetopbig">
												<div class="grid-wrap">
													<ul class="grid">
													<?php $Events = $gallery->where('gallery_type_id','=','9')->where('type','=','P'); 
														foreach ($Events as $_Events) {
														echo'<li>
															<a class="fancybox" href="'.asset('uploads/Galleries/'.$_Events->photo).'" data-fancybox-group="gallery" title="'.$_Events->name.'"><img src="'.asset('uploads/Galleries/'.$_Events->photo).'" alt="" class="img-fluid" /></a>
															<div class="topic-blog2 text-center">
																<h3>'.$_Events->name.'</h3>
																<br>
																<div class="toggle-slide-container">
																	
																	<input id="slidetoggle10" type="checkbox">
																	<div class="wrapper">
																		
																			<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																			<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																		
																	</div>
																</div>
															</div>
														</li>'; } ?>
													</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="display-slide" rel="11" style="display:none;">
									<div class="row">
										<div class="col">
											<?php $Weddings_name = $gallery_type->where('id','=','10'); ?>
											@foreach ($Weddings_name as $_Weddings_name)
												<h1 class="text-center">{{$_Weddings_name->name}}</h1>	
											@endforeach
											<div id="grid-gallery" class="grid-gallery spacetopbig">
												<div class="grid-wrap">
													<ul class="grid">
													<?php $Weddings = $gallery->where('gallery_type_id','=','10')->where('type','=','P'); 
														foreach ($Weddings as $_Weddings) {
														echo'<li>
															<a class="fancybox" href="'.asset('uploads/Galleries/'.$_Weddings->photo).'" data-fancybox-group="gallery" title="'.$_Weddings->name.'"><img src="'.asset('uploads/Galleries/'.$_Weddings->photo).'" alt="" class="img-fluid" /></a>
															<div class="topic-blog2 text-center">
																<h3>'.$_Weddings->name.'</h3>
																<br>
																<div class="toggle-slide-container">
																	
																	<input id="slidetoggle11" type="checkbox">
																	<div class="wrapper">
																		
																			<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																			<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																			
																	</div>
																</div>
															</div>
														</li>'; } ?>
													</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="display-slide" rel="12" style="display:none;">
									<div class="row">
										<div class="col">
											<?php $Attractions_name = $gallery_type->where('id','=','11'); ?>
											@foreach ($Attractions_name as $_Attractions_name)
												<h1 class="text-center">{{$_Attractions_name->name}}</h1>	
											@endforeach
											<div id="grid-gallery" class="grid-gallery spacetopbig">
												<div class="grid-wrap">
													<ul class="grid">
													<?php $Attractions = $gallery->where('gallery_type_id','=','11')->where('type','=','P'); 
														foreach ($Attractions as $_Attractions) {
														echo'<li>
															<a class="fancybox" href="'.asset('uploads/Galleries/'.$_Attractions->photo).'" data-fancybox-group="gallery" title="'.$_Attractions->name.'"><img src="'.asset('uploads/Galleries/'.$_Attractions->photo).'" alt="" class="img-fluid" /></a>
															<div class="topic-blog2 text-center">
																<h3>'.$_Attractions->name.'</h3>
																<br>
																<div class="toggle-slide-container">
																	
																	<input id="slidetoggle12" type="checkbox">
																	<div class="wrapper">
																	
																			<a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://holidayinnphuket.com/gallery"><i class="fas fa-envelope"></i></a> 
																			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fholidayinnphuket.com%2Fgallery&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a> 
																			<a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url=""http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
																			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/gallery" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
																		
																	</div>
																</div>
															</div>
														</li>'; } ?>
													</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
						<!-- <div class="display-slide" rel="1" style="display:block;">
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
												</li> -->
												
												<!-- <li>
													<a class="fancybox" href="images/gallery_05.png" data-fancybox-group="gallery" title="The Outerwear Edit"><img src="images/gallery_05.png" alt="" class="img-fluid" /></a>
													<div class="topic-blog2 text-center">
														<h3>The Outerwear Edit</h3>
																				<br>
														<div class="toggle-slide-container">
															
															<input id="slidetoggle2" type="checkbox">
															<div class="wrapper">
																<div class="hidden"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fas fa-envelope"></i></a> </div>
															</div>
														</div>
														 </div>
												</li> -->
												<!-- <li>
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
												</li> -->
												<!-- <li>
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
												</li> -->
												<!-- <li>
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
												</li> -->
											<!-- </ul>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!-- <div class="display-slide" rel="2">
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
						</div> -->
						<!-- <div class="display-slide" rel="3">
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
						</div> -->
						<!-- <div class="display-slide" rel="5">
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
						</div> -->
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
				// $(".select-display-slide > li").trigger('click',function(){
				// 	var rel = $(this).attr("rel");
				// 	console.log(rel);
				// 	if(rel != 1){
				// 		$('.display-slide').hide();
				// 		$('.display-slide[rel=' + rel + ']').hide();
				// 		$(".select-display-slide > li").removeClass("active");
				// 		$(this).addClass("active");
				// 	}
				// });
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
	
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.3&appId=2098708527096052&autoLogAppEvents=1"></script>
		<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
				fjs.parentNode.insertBefore(js, fjs);
			  }(document, 'script', 'facebook-jssdk'));</script>
			
		{{-- <script>
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
			document.getElementById('shareBtn').onclick = function() {
			FB.ui({
				method: 'share',
				display: 'popup',
				href: 'http://holidayinnphuket.com/gallery',
			}, function(response){});
			}
			document.getElementById('shareBtn2').onclick = function() {
			FB.ui({
				method: 'share',
				display: 'popup',
				href: 'http://holidayinnphuket.com/gallery',
			}, function(response){});
			}
		</script> --}}
		@include('inc_footer')
</body>

</html>