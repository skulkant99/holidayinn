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
	.swal-modal {
				border: 3px solid white;
				border-color: #b7b8d7;
			}
	.swal-footer {
				text-align: center;
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
						{{-- <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li> --}}
							@foreach ($content_detail as $_content_detail)
								{{-- <li class="breadcrumb-item active" aria-current="page">{{$_content_detail->title}}</li> --}}
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
							@foreach ($content_detail as $_content_detail)
								<?php 
									$date_create = substr($_content_detail->updated_at,0,-8);
									// $date_create = explode('-', $date_create);
									// $month = $date_create[1];
									// $day   = $date_create[2];
									// $year  = $date_create[0] + 543;
								?>
								<?php echo '<p>'.$_content_detail->title.'</p>'; ?> <span class="dateinside">{{$date_create}}</span> </div>
							@endforeach
						</div>
						<div class="col-md-2 col-lg-3 col-xl-3">
							@foreach ($content_detail as $_content_detail)
								<div class="likebtn">
									<button class="likebefore" data-id="{{$_content_detail->id}}"></button>
								</div>
								<div class="like_text"> {{$_content_detail->like}} Likes </div>
							@endforeach
						</div>
					</div>
					<hr>
					@foreach ($content_detail as $_content_detail)
					<div class="row">
						<div class="col">
							@php
								 $photo = json_decode($_content_detail->photo, true)
							@endphp
							@if(isset($photo[1]) && $photo[1])
								<div class="offer_details_inside"> <img src="{{asset('uploads/Information/'.$photo[1])}}" class="img-fluid">
							@else
								<div class="offer_details_inside"> <img src="{{asset('uploads/Information/nophoto.png')}}" class="img-fluid">
							@endif
								<br>
								<br>
								<?php echo '<p>'.$_content_detail->detail.'</p>'; ?>
							</div>
						</div>
					</div>					
					@endforeach
					<hr>
					<div class="share_offer_inside">
						{{-- <li class="circle_pencil"><div class="sbutton"> <span><img src="{{asset('images/share.png')}}"></span>
							<ul class="smenu">
								<li class="facebook"><a href="" id="shareContent" ><i class="fab fa-facebook-f"></i> Facebook</a></li>
								<li class="twitter"><a href=""><i class="fab fa-twitter"></i> Twitter</a></li>
								<li class="googleplus"><a href=""><i class="fab fa-linkedin-in"></i> Linkedin</a></li>
							</ul>
						</div></li> --}}
						<li class="purplebg"><a href="mailto:?subject=Sharing Holiday Inn Phuket Microsite &amp;body=Check out this site http://holidayinnphuket.com/offer_inside/14" ><i class="fas fa-envelope"></i></a></li>
						<li class="purplebg"><a href="https://www.facebook.com/dialog/share?app_id=966242223397117&display=popup&href=http%3A%2F%2Fholidayinnphuket.com%2Foffer_inside%2F14" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
						<li class="purplebg"><a href="https://twitter.com/intent/tweet" data-size="large" data-text="Holidayinnphuket" data-url="http://holidayinnphuket.com/gallery" data-hashtags="holidayinnphuket" data-via="holidayinnphuket" data-related="twitterapi,twitter"><i class="fab fa-twitter"></i></a></li>
						<li class="purplebg"><a href="https://www.linkedin.com/shareArticle?mini=true&url=http://holidayinnphuket.com/offer_inside/14" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
					</div>
					
					<hr>
					
					<?php if(Auth::check()){ ?>
							<!--	Login แล้วโชว์อันนี้			-->
						<div class="commentbox">
							<form id="comment">
								<textarea class="form-control" id="comment" name="comment" rows="5" placeholder="Type here.."></textarea> <button type="submit" class="btn btn-primary">Send your message</button> 
								<input type="hidden" name="information_id" value="{{$id}}">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
							</form>
						</div>
					<?php }else { ?>
						<!--	สำหรับยังไม่ Loginค่ะ			   -->
						<div class="logincomment text-center">
							<a href="#" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModalCenter">Leave a comment</a>
							{{-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">Login 	</button> --}}
						</div>
					<?php } ?> 
					
		
					<div class="list_comment mt-5">
						{{-- <h2>RECENT COMMENT</h2> --}}
						<br>
						@foreach ($comment as $_comment)
							<div class="border_comment gallery">
							
								<p>{{$_comment->comment}}</p>
								@php
									$date_create = substr($_comment->created_at,0,-8);
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
								<div class="date_comment gallery"> 
									{{-- @if($days_until_appt == 0)
										today ago By 
									@else
										{{$days_until_appt}} day ago By 
									@endif
									{{$_comment->comment_by}} --}}
									{{$day.' '.$month.' '.$year}} By {{$_comment->comment_by}}
								 </div>
							</div>
							<br>
						@endforeach
						
						{{-- <div class="border_comment gallery">
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
						</div> --}}
						@php
							$comnent_count = count($comment);
							if($comnent_count > 2){
								echo '<div class="btnmore center-block text-center wow fadeInUp"> <a class="loadMore btnload" href="#">Show More comment</a> </div>';
							}else{

							}	
						@endphp
					</div>
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
							<li><a href="{{url('gallery')}}">{{$_gallery->gallery_name}} new photo <br>{{$day.' '.$month.' '.$year}}</a></li>
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
		<br>
		@include('inc_footer')
			<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
			
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
			<script>
					$('.sbutton').on('click', function (event) {
						event.preventDefault();
						
						$('.smenu').toggleClass('share');
					});
				</script>
			<script>
				$('body').on('submit','#comment',function(e){
					e.preventDefault();
					$.ajax({
						method: "POST",
						url: "{{url('/comment')}}",
						data: $(this).serialize()
					}).done(function( res ) {
						if(res==0){
							swal(res.title,res.content,'success');
						}else{
							swal('add comment','success');
							location.reload();
						}
					}).fail(function(){
						swal('เปลี่ยนรหัสผ่าน','เปลี่ยนรหัสผ่านไม่สำเร็จ','error');
						btn.button('reset');
					});
				});
			</script>
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
					window.fbAsyncInit = function() {
						FB.init({
							"appID": "966242223397117",
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
				$('.btnShare').click(function(){
					elem = $(this);
					postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));
					return false;
				});
			</script>
</body>

</html>