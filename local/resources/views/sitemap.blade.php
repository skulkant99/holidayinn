<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	@include('inc_header')
</head>
<style>
	.content_detail li ul li{
		padding-left: 50px;
	}
	.content_detail li{
		list-style: circle;
	}
	.content_detail li ul li{
		list-style: none;
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
							{{-- <li class="breadcrumb-item active" aria-current="page">Sitemap</li> --}}
						</ol>
					</nav>
		</div>
	</div>
		<div class="row">
			<div class="col">
				<div class="head_title">
					<h1>Sitemap </h1>
					
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="content_detail">
					@foreach ($category as $key => $_category)
							@if($key == 0)
								<li><a href="{{url($_category->link)}}">{{$_category->name}}</a></li>
							@elseif($key == 1)								
								<li><a href="{{url($_category->link)}}">{{$_category->name}}</a></li>
							@elseif($key == 2)	
								<li><a href="{{url('gallery')}}">{{$_category->name}}</a>
							@endif	
					@endforeach
							<ul>
								@foreach ($GalleryType as $_GalleryType)
									<li><a href="{{url('gallery')}}">{{$_GalleryType->name}}</a></li>
								@endforeach
								
								{{-- <li><a href="#">Videos</a></li>
								<li><a href="#">Charm Thai</a></li>
								<li><a href="#">Busakorn Main Pool</a></li>
								<li><a href="#">Busakorn Reception</a></li>
								<li><a href="#">Busakorn Lobby</a></li>
								<li><a href="#">Studio Rooms</a></li>
								<li><a href="#">Activities</a></li> --}}
							</ul>
						</li>
					@foreach ($category as $key => $_category)
						@if($key > 2)
							<li><a href="{{$_category->link}}">{{$_category->name}}</a></li>
						@endif
					@endforeach
				
					{{-- <li><a href="#">FAQ</a></li>
					<li><a href="#">Contact Us</a></li> --}}
				</div>
			</div>
		</div>
	</div>

 







		@include('inc_footer')
			
</body>

</html>