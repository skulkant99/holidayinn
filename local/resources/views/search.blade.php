<head>
		@include('inc_header')
</head>
<style>
	
</style>
@include('inc_topmenu')

<div class="container mt-4">
		<div class="row">
			<div class="col-lg-9">
				
				@foreach ($info as $_info)
					<div class="row offer_box">
							
							<div class="col-12 col-lg-12">
								<div class="offer_details">
									<div class="row">
										<div class="col-12 col-md-9 col-lg-9">
											<h3><a href="{{url('offer_inside/'.$_info->id)}}">{{$_info->title}}</a></h3> </div>
									</div>
									<p>{{strip_tags($_info->detail)}}</p>
								</div>
							</div>
						</div>
				@endforeach
				{{$info->links()}}
				
				@foreach ($qu as $_qu)
					<div class="row offer_box">		
						<div class="col-12 col-lg-12">
							<div class="offer_details">
								<div class="row">
									<div class="col-12 col-md-9 col-lg-9">
										<h3><a href="{{url('faq/')}}">{{strip_tags($_qu->question)}}</a></h3> </div>
								</div>
								<p>{{strip_tags($_qu->answer_name)}}</p>
							</div>
						</div>
					</div>
				@endforeach
				{{$qu->links()}}
			</div>
		</div>
	</div>
@include('inc_footer')