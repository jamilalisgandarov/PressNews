jQuery(document).ready(function($) {
    //JS for date topHead
    $date = new Date();
    $month = $date.getMonth();
    $day = $date.getDay();
    $monthDay = $date.getDate();
    switch ($day) {
        case 0:
            $day = "Bazar";
            break;
        case 1:
            $day = "Bazar ertəsi";
            break;
        case 2:
            $day = "Çərşənbə axşamı";
            break;
        case 3:
            $day = "Çərşənbə";
            break;
        case 4:
            $day = "Cümə axşamı";
            break;
        case 5:
            $day = "Cümə";
            break;
        case 6:
            $day = "Şənbə";
    }
    switch ($month) {
        case 0:
            $month = "Yanvar";
            break;
        case 1:
            $month = "Fevral";
            break;
        case 2:
            $month = "Mart";
            break;
        case 3:
            $month = "Aprel";
            break;
        case 4:
            $month = "May";
            break;
        case 5:
            $month = "İyun";
            break;
        case 6:
            $month = "İyul";
        case 7:
            $month = "Avqust";
        case 8:
            $month = "Sentyabr";
        case 9:
            $month = "Oktyabr";
        case 10:
            $month = "Noyabr";
        case 11:
            $month = "Dekabr";
    }
    $(".todaysDate").text($day + "," + " " + $monthDay + " " + $month);
    $("li").hover(
        function() {
            $(this).find("span").stop().animate({
                width: "100%",
                opacity: "1",
            }, 400, function() {})
        },
        function() {
            $(this).find("span").stop().animate({
                width: "0%",
                opacity: "0",
            }, 400, function() {})
        }
    );

    //HotNews letterbyLetter writing effect
    function newsOverlay() {
        $('.newsOverlay').css('width', '0%');
    };

    //slider draggable effect
    newsOverlay();
    $clickedX = 0;
    $movedX = 0;
    $marginOut = 0;
    $margin = 0;
    $difference = 0;
    $posTop = 0;
    $scroll = 0;
    $scrolling=0;
    $maxScroll=parseInt($('.sliderMainTrack').height(),10)-parseInt($('.sliderMain').height(),10);
    function carouselInterval() {
        if ($scrolling+116>$maxScroll) {
            $('.sliderMain').animate({scrollTop:$maxScroll}, 2000) 
            $scrolling=0; 
        } else if ($('.sliderMain').scrollTop() < $maxScroll) {
           $scrolling=$scrolling+116;
             $('.sliderMain').animate({scrollTop:$scrolling},2000)        
        } else if($('.sliderMain').scrollTop() == $maxScroll){
            $('.sliderMain').animate({scrollTop:0},2000);
        }        
    }  
    $interval = setInterval(function() { carouselInterval() }, 7000);

    $('.sliderNews').click(function(event) {
     clearInterval($interval);
     clearInterval($interval2);
    });
    function activated() {
        $('.sliderNews').css('background-color', '#1d1e20');
        $('.sliderNewsTitle').css('color', 'white');
        $('.sliderNews:first-child').children('.sliderNewsTitle').css('color', '#d54646');
        $('.sliderNews').removeClass('triangle');
        $('.sliderNews h4').removeClass('sliderNewsTitleColored')
        $('.sliderNews').removeClass('activeSlider');
        $('.sliderNews:first-child').addClass('triangle');
        $('sliderNews:first-child').css('background', '#242527');
    }
    activated();
    $activatedslider = 0;
        $('.category').empty();
    $('.mainImg').attr('src', $('.triangle').children('.sliderNewsTitle').attr('data-img'));
    $('.mainImg ').parent('div').parent('a').attr('href', $('.triangle').children('.sliderNewsTitle').attr('data-url'));
    $('.category').append($('.triangle').children('.sliderNewsTitle').attr('data-cat'));

    function activeSlider() {
        $activatedslider++;
        $('.sliderNews').css('background-color', '#1d1e20');
        $('.sliderNewsTitle').css('color', 'white');
        $('.sliderNews').eq($activatedslider).children('.sliderNewsTitle').css('color', '#d54646');
        $('.sliderNews').removeClass('triangle');
        $('.sliderNews h4').removeClass('sliderNewsTitleColored')
        $('.sliderNews').removeClass('activeSlider');
        $('.sliderNews').eq($activatedslider).addClass('triangle');
        $('.sliderNews').eq($activatedslider).css('background', '#242527');
        $('.mainImg').attr('src', $('.triangle').children('.sliderNewsTitle').attr('data-img'));
        $('.category').empty();
        $('.category').append($('.triangle').children('.sliderNewsTitle').attr('data-cat'));
        $('.mainImg ').parent('div').parent('a').attr('href', $('.triangle').children('.sliderNewsTitle').attr('data-url'));
        if ($('.sliderNews').length - 1 == $activatedslider) {
            $activatedslider = 0;
        }
    }
    $interval2 = setInterval(function() { activeSlider() }, 5100);
    $('.sliderNews').on('click', function() {
        $('.sliderNews').css('background-color', '#1d1e20');
        $('.sliderNewsTitle').css('color', 'white');
        $(this).children('.sliderNewsTitle').css('color', '#d54646');
        $('.sliderNews').removeClass('triangle');
        $('.sliderNews h4').removeClass('sliderNewsTitleColored')
        $('.sliderNews').removeClass('activeSlider');
        $(this).addClass('triangle');
        $('.category').empty();
        $('.mainImg').attr('src', $('.triangle').children('.sliderNewsTitle').attr('data-img'));
        $('.mainImg ').parent('div').parent('a').attr('href', $('.triangle').children('.sliderNewsTitle').attr('data-url'));
        $(this).css('background', '#242527');
        $('.category').append($('.triangle').children('.sliderNewsTitle').attr('data-cat'));
    });

    //Search input hover effect
    $(".searchButton a").mouseover(function(event) {
        $('.overlayInput').css('width', '0');
    });

    $('.searchMain input').focus(function(event) {
        $('.overlayInput').css('width', '0');
    });
    $('.searchMain input').focusout(function(event) {
        $('.overlayInput').css('width', '100%');
    });


    //language selector 
    $langOn = 0;
    $(".langSelector li:first-child img").click(function(event) {
        if ($langOn % 2 == 0) {
            $('.langSelector li').css('display', 'block');
        } else {

            $('.langSelector li').css('display', 'none');
        }
        $langOn++;
    });
    $(window).resize(function(event) {
        if($(this).width()>1000){       
    $('.dropdown').hover(function() {
       $(this).children('ul.dropdown-menu').css('display', 'block');
    }, function() {
     $(this).children('ul.dropdown-menu').css('display', 'none');
    });
        }
        else{
        $('.dropdown').off('hover','**');
    }
       
    });
    if($(this).width()>1000){       
    $('.dropdown').hover(function() {
       $(this).children('ul.dropdown-menu').css('display', 'block');
    }, function() {
     $(this).children('ul.dropdown-menu').css('display', 'none');
    });
        }
    else{
        $('.dropdown').off('hover');
    }
 });

