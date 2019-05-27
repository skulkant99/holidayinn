<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	@include('inc_header')
</head>

<body>
	 @include('inc_topmenu')
	<div class="container mt-4">
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							{{-- <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Our policy on commenting</li> --}}
						</ol>
					</nav>
		</div>
	</div>
		<div class="row">
			<div class="col">
				<div class="head_title">
					<h1>Our policy on commenting   </h1>
					
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="content_detail">
					<?php echo '<p>'.$out_policy->detail.'</p>' ?>
					{{-- <h3>HOW WE PROTECT YOUR PRIVACY </h3>
The privacy and security of your personal information is very important to us. We do not share your personal information in ways not disclosed in our privacy statement or without your informed permission. We value your trust very highly, and we strive to protect the confidentiality and appropriate use of any personal information you provide to us. Details are described in our Updated Privacy Policy. 
<br><br>
InterContinental Hotels Group is a Participant in the TRUSTe Privacy Seal Program. TRUSTe is an independent organization whose mission is to advance privacy and trust in the networked world. As this Web site wants to demonstrate its commitment to your privacy, it has agreed to disclose its information practices and have its privacy practices monitored for compliance by TRUSTe. To view a complete list of these validated InterContinental Hotel Group sites please click on the TRUSTe seal.
<br><br>
Phone: 1-770-604-8347
<br>
Fax: 1-770-604-5275
<br>
Email: <a href="mailto:privacyoffice@ihg.com">privacyoffice@ihg.com</a> --}}
				</div>
			</div>
		</div>
	</div>

		@include('inc_footer')
			
</body>

</html>