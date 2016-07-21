$(document).ready(function() {
if ($('.high').width()<'500') {
	$('.day_post_img,.high_img_div').css({"min-width": "100%"});
}else {
	$('.day_post_img,.high_img_div').css({'min-width':'270px'});
}

// width height resize
	$(window).resize(function() {
		if ($('.high').width()<'500') {
			$('.day_post_img,.high_img_div').css({"min-width": "100%"});
		}else {
			$('.day_post_img,.high_img_div').css({'min-width':'270px'});
		}
});
});
