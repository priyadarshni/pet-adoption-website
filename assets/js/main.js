jQuery(document).ready(function($) {

	$('#menu-img').on('click', function(event) {
		$('.collapse-menu').toggle();
	});

	$(".logo-img").on('mouseover', function(event) {
		$(this).attr("src","./assets/image/logo2.png");
	}).on('mouseout', function(event) {
		$(this).attr("src","./assets/image/logo.png");
	});

});
