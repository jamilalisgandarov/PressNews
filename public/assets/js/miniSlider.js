$(document).ready(function() {
	$left=0;
	// carousel controller creator
	$divLength			=$('.carousel_item').length;
	$mathLength 		=Math.floor($divLength/3);
	console.log($divLength);

// slider buttons creator
	if($divLength%3==0){
		for (var i =0;i<$mathLength; i++) {
			$('.controller').append('<div class="controll" id="controll'+(i+1)+'"></div>');
		}
	}else{
		for (var i =0;i<=$mathLength; i++) {
			$('.controller').append('<div class="controll" id="controll'+(i+1)+'"></div>');
		}
	}
	$('.controll').removeClass('active');
	$('.controll:first-child').addClass('active');
	
//slider buttons hide and show
	if($(window).width()>'576'){
		$('.right,.left,.fa-chevron-right,.fa-chevron-left').css('visibility','hidden');
		$('.controller').css('visibility','visible');
	}else{
		$('.right,.left,.fa-chevron-right,.fa-chevron-left').css('visibility','visible');
		$('.controller').css('visibility','hidden');
	}
	
	$(window).resize(function() {
		if($(window).width()<'576'){
			$('.right,.left,.fa-chevron-right,.fa-chevron-left').css('visibility','visible');
			$('.controller').css('visibility','hidden');
		}
		else {
			$('.right,.left,.fa-chevron-right,.fa-chevron-left').css('visibility','hidden');
			$('.controller').css('visibility','visible');
		}
	});

// slider move 
	$('.controll').click(function() {
		$lastControll	=$('.controll').length;
		$id 			=$(this).attr('id');
		$('.controll').removeClass('active');
		$(this).addClass('active');
		if ($(window).width()>'576') {
			if ($id!='controll1'&&$id!='controll'+$lastControll+'') {
				$a=$id.charAt($id.length-1)-1;
				$x=(3*($('.carousel_item').width()+20));
				$left=(0-($a*$x));
				$('.carousel_move').css('margin-left', $left);
			}
		}
	});

	$('.controll:last-child').click(function() {
		
			$left=((-$('.carousel_move').width())+(3*($('.carousel_item').width()+20)));
			$('.carousel_move').css('margin-left', $left);
			return $left;
	});
	$('.controll:first-child').click(function() {
		$left=0;
		$('.carousel_move').css('margin-left', 0);
		return $left;

	});
	$('.right').click(function() {
		if ($left>-($('.carousel_move').width()-2*$('.carousel_item').width()+20)) {
			$left=$left-($('.carousel_item').width()+20);
			$('.carousel_move').css('margin-left', $left);
			return $left;
		};
	});
	$('.left').click(function() {
		if ($left<=-$('.carousel_item').width()) {
			$left=$left+($('.carousel_item').width()+20);
			$('.carousel_move').css('margin-left', $left);
			return $left;
		};
	});


// carousel resize

	if ($(window).width()<'576') {
			$('.carousel_item').width($('.carousel_main').width());
		}else {
			$('.carousel_item').width(($('.carousel_main').width()-40)/3);
		}
		$('.carousel_move').width(($('.carousel_item').width()+20)*$divLength);

		$(window).resize(function() {
			if ($(window).width()<'576') {
			$('.carousel_item').width($('.carousel_main').width());
			}else {
			$('.carousel_item').width(($('.carousel_main').width()-40)/3);
			}
			$('.carousel_move').width(($('.carousel_item').width()+20)*$divLength);
			$('.carousel_move').css('margin-left', 0);
			$('.controll').removeClass('active');
			$('.controll:first-child').addClass('active');
			$left=0;
});

});