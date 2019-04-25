<?php
	if(empty($_title)) 			$_title ='';
	if(empty($_keywords)) 		$_keywords ='';
	if(empty($_description)) 	$_description ='';
?>
	<title>
		Holidayinn Phuket
	</title>
	<meta name="keywords" content="<?php echo $_keywords;?>" />
	<meta name="description" content="<?php echo $_description;?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robot" content="index, follow" />
	<meta name="generator" content="Brackets">
	<meta name='copyright' content='Orange Technology Solution co.,ltd.'>
	<meta name='designer' content='Netthakan O.'>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="css/layout.css" media="screen,projection" />
	<link type="image/ico" rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="woocommerce-FlexSlider-0690ec2/flexslider.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="woocommerce-FlexSlider-0690ec2/jquery.flexslider.js"></script>
	<script src="woocommerce-FlexSlider-0690ec2/demo/js/modernizr.js"></script>
	
	<script>
		$(document).ready(function() {
			// Show or hide the sticky footer button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 300) {
					$('.go-top').fadeIn(300);
				} else {
					$('.go-top').fadeOut(300);
				}
			});

			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();

				$('html, body').animate({
					scrollTop: 0
				}, 800);
			})
		});

	</script>
	<a href="#" class="go-top"> <i class="fa fa-chevron-up"></i></a>
	




<script type="text/javascript" src="WOW-master/dist/wow.js"></script>
	<link rel="stylesheet" type="text/css" href="WOW-master/css/libs/animate.css" />
	<link rel="stylesheet" type="text/css" href="WOW-master/css/site.css" />

	<script>
		wow = new WOW({
			animateClass: 'animated',
			offset: 100,
			callback: function(box) {
				console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
			}
		});
		wow.init();
		document.getElementById('moar').onclick = function() {
			var section = document.createElement('section');
			section.className = 'section--purple wow fadeInDown';
			this.parentNode.insertBefore(section, this);
		};

	</script>
