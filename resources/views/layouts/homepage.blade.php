<?php         
$newsAll    =\App\News::where('visibility',1)->whereHas('subcategory', function($query){
            $query->where('visibility', 1)->whereHas('category', function ($query){
                 $query->where('visibility', 1);
            });
        })->get();
     $subcategory=\App\Subcategory::where('visibility',1)->whereHas('category',function ($query){
            $query->where('visibility', 1);
            })->get();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iPress News Portal</title>
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://use.fontawesome.com/5d33201c90.js"></script> -->
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">


    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="/assets/css/custom/style.css">

    <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.min.css">
      
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/assets/js/jquery-1.12.4.js"></script>
</head>

<body>
    <!-- This section for Jamil -->
    <section id="header-wrap">
        <div class="container-fluid">
            <!-- Hot news , date and language selection section -->
            <div class="row topHeader">
                <div class="container">
                    <div class="row">
                        <div class=" col-md-6 height hotNewsMain col-xs-12 overflow flex ">
                        @if(count($newsAll)>0)
                            <a href="/news/{{$newsAll->last()->id}}">
                                <div class="live-cta">
                                    <div class="live-icon">
                                        <div class="live-pulse-min"></div>
                                        <div class="live-pulse-max"></div>
                                    </div>
                                </div>
                                <div class="hotNewsTextMain">

                                    <div class="newsOverlay"></div>
                                    <p class="hotNewsText">{{str_limit($newsAll->last()->title_az,60)}}</p>
                                </div>
                            </a>
                        @endif
                        </div>
                        <div class="col-md-6">
                        <div class="col-md-5  col-md-offset-1  push height flex col-xs-4">
                            <div class="date flex">
                                <p class="todaysDate"> </p>
                            </div>
                        </div>
                        <div class="col-md-5 height  col-xs-4">
                            <div class="socialNetworks ">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-github" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus " aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-md-1 height languageSelector  col-xs-4 ">
                            <div class="langSelector">
                                <ul>
                                    <li>
                                        <div>
                                            <img src="/assets/images/header/fr.png">
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href=""><img src="/assets/images/header/fr.png"> </a>
                                        <div>
                                    </li>
                                </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!--  Logo and Adv -->
                    <div class="row topLogo">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2 col-xs-12 row mainLogo flexDisplay"><a href="/"><img src="/assets/images/header/logo.png"></a></div>
                                <div class="col-md-offset-2 flexDisplay advMain row col-md-8 ">
                                    <div class="adv hidden-xs">
                                        <img src="/assets/images/header/adv.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--   Navbar row -->
                    <div class="row topNav col-xs-12">
                        <div class="container">
                            <div class="row">
                                <nav class="navbar navbar-inverse " role="navigation">
                                    <div class="container">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                            <a class="navbar-brand" href="/">
                                                <i class="fa fa-home" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="nav mainul dropdown navbar-nav">
                                            @if(count(App\Category::all()->where('visibility',1))>0)
                                                @foreach((App\Category::all()->where('visibility',1)) as $category)
                                                    <li class="dropdown">
                                                         <a class="dropdown-toggle" data-toggle="dropdown" role="button">{{$category->title_az}}</a><span class="hover"></span>
                                                         <ul class="dropdown-menu" >
                                                         @foreach($category->subcategories->all() as $subcategory)
                                                            <li><a href="/news/category/{{$subcategory->id}}">{{ $subcategory->title_az}}</a></li>
                                                          
                                                            @endforeach
                                                         </ul>
                                                    </li>
                                                @endforeach
                                            @endif
                                                <ul class="nav navbar-nav navbar-right" style="margin:0px;">
                                                    <li>
                                                        <div class="mainSearch col-xs-12">
                                                            <form action="/news/search" method="post">
                                                                <div class="searchMain">
                                                                   
                                                                    <div class="overlayInput"></div>
                                                                    {{csrf_field()}}
                                                                    <input type="search" placeholder="Search " name="search">
                                                                       
                                                                
                                                                </div>
                                                                <div class="searchButton">
                                                                    <a>
                                                                        <button class="fa fa-search" type="submit" name="submit" value=""></button>
                                                                       
                                                                    </a>
                                                                </div>    
                                                            </form>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
    </section>
    <!-- This section for content -->
            
      @yield('header')
  
  <section id="space"></section>

<div class="container">
  <div class="row">
    <section id="content-wrap" class="col-md-9 col-xs-12">

      @yield('content')
    
    </section>
    <!-- This section for Sabina -->
    <!-- This section for Sabina -->
<section id="sidebar-wrap" class="col-md-3 col-xs-12">
    <div class="col-md-12 ">
        <div class="row">
            <div class="doublePort regtangle">
                @if(count(App\Subcategory::all()->where('visibility',1))>0)
                <p>{{App\Subcategory::all()->where('visibility',1)->take(1)->last()->title_az}}</p>
                @endif
            </div>
            @if(count(App\Subcategory::all()->where('visibility',1))>0&&count(App\News::all())>0)
                @foreach(App\Subcategory::all()->take(1)->last()->news->where('visibility',1)->take(5) as $news)
                    <div class="row">
                        <div class="col-md-4 col-xs-4 small_img">
                            <a href="/news/{{$news->id}}">
                                <img src="<?php echo '/images/news_img/'.$news->main_img;?>">
                            </a>
                        </div>
                        <div class="col-md-8 col-xs-8 small_text">
                            <a href="/news/{{$news->id}}"> 
                                <h5>{{str_limit($news->title_az,35)}}</h5>
                            </a>
                            <p><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($news->updated_at))->diffForHumans() ?> /<a href=""> 0 comments</a></p>
                        </div>
                    </div>
                    <div class="line"></div>
                @endforeach
            @endif
                
                <div class="" >
                    <br>
                    <br>
                    <div class="iPressSlide">
                        <!-- slider bootstrap -->
                        
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators" >
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div id="newsOne"><span>iPress Tweets @iPress<hr>iPress Tweets @iPressjhgfjsdf jdhb djhdg jdhg djhg ajdhg jdhfv jdhfb djhcbg djhg jdhfg djhffg djahg jdh gjahdg jhdghdugh aoidhg ;adkhgadjhfadfh gldjgLorem ipsum dolor sit</span></div>
                                </div>
                                <div class="item">
                                    <div id="newsOne"><span>iPress Tweets @iPress<hr>iPress Tweets @iPressjhgfjsdf jdhb djhdg jdhg djhg ajdhg jdhfv jdhfb djhcbg djhg jdhfg djhffg djahg jdh gjahdg jhdghdugh aoidhg ;adkhgadjhfadfh gldjgLorem ipsum dolor sit</span></div>
                                </div>
                                
                                <div class="item">
                                    <div id="newsOne"><span>iPress Tweets @iPress<hr>iPress Tweets @iPressjhgfjsdf jdhb djhdg jdhg djhg ajdhg jdhfv jdhfb djhcbg djhg jdhfg djhffg djahg jdh gjahdg jhdghdugh aoidhg ;adkhgadjhfadfh gldjgLorem ipsum dolor sit</span></div>
                                </div>
                                <div class="item">
                                    <div id="newsOne"><span>iPress Tweets @iPress<hr>iPress Tweets @iPressjhgfjsdf jdhb djhdg jdhg djhg ajdhg jdhfv jdhfb djhcbg djhg jdhfg djhffg djahg jdh gjahdg jhdghdugh aoidhg ;adkhgadjhfadfh gldjgLorem ipsum dolor sit</span></div>
                                </div>
                                
                            </div>
                            
                        </div>
                                        <!-- slider bootstrap -->
                    </div>
                </div>
                <div class="">
                    <br>
                    <div class="doublePort regtangle"><p>Polls</p></div>
                    <div class="radiusBtns">
                        <h4 style="text-align: center"><p>How is my site</p></h4>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                Amazing
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                Good
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                Can be inproved
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                Not comments
                            </label>
                            <br>
                            <br>
                            <button  type="button" class="btnHover btn btn-vote btn-sm">Vote</button>
                            <button  type="button" class="btnHover btn btn-result btn-sm">View Result</button>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="">
                    <br>
                    <div class="doublePort regtangle">
                    @if(count(App\Subcategory::all()->where('visibility',1))>0)
                        <p>{{App\Subcategory::all()->where('visibility',1)->take(1)->last()->title_az}}</p>
                    @endif
                    </div>
                    @if(count(App\Subcategory::all()->where('visibility',1))>0&&count(App\News::all())>0)
                    @foreach(App\Subcategory::all()->where('visibility',1)->take(1)->last()->news->take(4) as $news)
                    <div class="row">
                        <div class="col-md-4 col-xs-4 small_img">
                            <a href="/news/{{$news->id}}">
                                <img src="<?php echo '/images/news_img/'.$news->main_img;?>">
                            </a>
                        </div>
                        <div class="col-md-8 col-xs-8 small_text">
                            <a href="/news/{{$news->id}}"> 
                                <h5>{{str_limit($news->title_az,35)}}</h5>
                            </a>
                            <p><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($news->updated_at))->diffForHumans() ?> /<a href=""> 0 comments</a></p>
                        </div>
                    </div>
                    <div class="line"></div>
                    @endforeach
                    @endif 
                </div>
            </div>
        </section>
    </div>
</div>

<section id="space"></section>
    <!-- This section for Aslan -->
    <section id="footer-wrap">

        <div class="footer_top_line">
            <div class="container">
                <div class="row">
                    <div class="logo_bottom col-md-3">
                        <div class="row">
                            <div class=" logo col-md-12">
                                <a href="index.html"><img src="/assets/images/footer/ipress_logo.png"></a>
                            </div>
                            <div class=" info col-md-12">
                                <p>iPress is a  magazine Wordpress Theme. Nunc montes odio phasellus dignissim, aenean, nec augue velit integer elementum ut montes quis integer cursus, est purus, lectus duis, scelerisque tincidunt ultricies phasellus elementum turpis tristique.
                                <br><br>
                                Email:<span class="info_email">codeacademy@gmail.com</span></p>
                            </div>                         
                        </div>
                    </div>
                    <div class="recent_post same col-md-3">
                        <div class="row">
                            <div class="same_top regtangle col-md-12">
                                <h4>Recent Posts</h4>
                            </div>
                            @if(count($newsAll)>0)
                                @foreach($newsAll->take(3) as $news)
                            
                            <div class="small_div col-md-12">
                                <div class="small_img col-md-4">
                                    <div class="imgM pull-left"><a href="/news/{{$news->id}}"><img src="<?php echo '/images/news_img/'.$news->main_img ?>"></a></div>
                                </div>
                                <div class="col-xs-6 col-md-8">
                                    <p class="small_text"><a href="/news/{{$news->id}}">{{str_limit($news->title_az,30)}}</a></p>
                                    <p class="last_update">{{Carbon\Carbon::createFromTimeStamp(strtotime($news->created_at))->diffForHumans()}}</p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <!---->
                    <div class="best_reviews same col-md-3">
                       <div class="row">
                            <div class="same_top regtangle col-md-12">
                                <h4>Best Reviews</h4>
                            </div>
                            @if(count($newsAll)>0)
                             @foreach(($newsAll->take(3)) as $news)
                            <div class="small_div col-md-12">
                                <div class="small_img col-md-4">
                                    <div class="imgM pull-left"><a href="/news/{{$news->id}}"> <img src="<?php echo '/images/news_img/'.$news->main_img ?>"></a></div>
                                </div>
                                <div class="col-xs-8 col-md-8">
                                    <p class="small_text"><a href="/news/{{$news->id}}">{{$news->title_az}}</a></p>
                                    <div class="info_reviews row">
                                        <div class="reviews_rate pull-left col-md-1">
                                            <i class="fa fa-star-o" aria-hidden="true"><p>9.25</p></i>
                                        </div> 
                                        <div class="reviews_category pull-left lightblue_bg"><p>{{$news->category->title_az}}</p></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="newsletters same  one1 col-md-3">
                        <div class="row">
                            <div class=" same_top regtangle col-md-12">
                                 <h4>Newsletters</h4>
                            </div>
                            <div class="col-md-12">
                                <p class="t_latest">To receive the latest updates and Latest Posts enter your email.</p>
                            </div>
                            <div class="latest_mail_info_main col-md-12">
                                <div class="latest_mail_info">
                                    <input type="text" name="latest_mail" placeholder="type your email">
                                    <a href="#"><div class="done"><i class="fa fa-check" aria-hidden="true"></i></div></a>
                                </div>
                                <!--  <div class="latest_mail_info_done"></div> -->
                            </div>
                            <div class=" same_top regtangle col-md-12">
                                 <h4>Bizimlə əlaqə</h4>
                            </div>
                            <div class="social_n col-md-12">
                                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-github" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        </div>
                        <!-- newlest div end -->
                        <div class="copyright col-md-12">
                            <p class="copyrightText">© Powered By CodeAcademy team.</p>
                            <h5 class="take_me_top">Əvvələ qayıt<i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></h5>
                        </div>
                    </div>
                   
                </div> 
            </div>
    </section>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/main.min.js"></script>
    {{-- <script src="/assets/js/main.js"></script>   
    <script type="text/javascript" src="/assets/js/footer.js"></script> --}}{{-- 
    <script type="text/javascript" src="/assets/js/miniSlider.js"></script> --}}
</body>

</html>

