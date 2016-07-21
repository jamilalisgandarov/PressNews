
$(document).ready(function(){
	$bodyTop=$("html body");
	$(".take_me_top").click(function(){
			$bodyTop.animate({scrollTop:0},1000);
	})
})
