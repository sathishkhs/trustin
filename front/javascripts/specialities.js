$(document).ready(function(){

	$('.mhn-slide').owlCarousel({
				nav:false,
				margin:30,
				//loop:true,
				slideBy:'page',
				rewind:false,
				responsive:{
					0:{items:1},
					480:{items:2},
					600:{items:3},
					1000:{items:4}
				},
				smartSpeed:70,
			});
   
 });
