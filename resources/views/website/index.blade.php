@extends('layouts.homepage')

@section('header')

<section id="slider-wrap" class="hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="container-fluid padding sliderFrame">
                        <div class="sliderImageFrame  padding ">
                        <a>
                            <div class="sliderImgFull">
                            
                                <img src="" class="mainImg">
                                <div class="category"></div>
                        
                            
                            </div>
                            </a>
                        </div>
                        <div class=" sliderMain padding ">
                            <div class="sliderMainTrack">
                                <div class="sliderTrack">
                                @foreach(($newsAll->where('slider',1)->take(6)) as $slider)
                                <div class="sliderNews noselect activeSlider triangle ">
                                    <div class="col-md-12 sliderNewsTitle" data-img="/images/news_img/{{$slider->main_img}}" data-url='/news/{{$slider->id}}' data-cat='{{$slider->subcategory->title_az}}'>
                                        <h4 class="sliderNewsTitleColored">{{$slider->title_az}}</h4>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('content')


<!-- This section for Etibar -->

               <div class="main row">
                    <div class="col-md-8 col-xs-12 high" style="padding-right: 8px;">
    <!-- post of the day  -->
                        <div class=" row">

                        <div class="day_post col-md-12">
                            <div class="col-md-12 regtangle">
                          
                                <p>{{$subcategory->first()->title_az}}</p>
                  
                            </div>
                            <div class="col-md-12 padding-right-0">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 padding-right-0">
                                        <div class="row day_post_img ">
                                         
                                            <a href="/news/{{$subcategory->first()->news->last()->id}}">
                                                <img src="<?php echo '/images/news_img/'.$subcategory->first()->news->last()->main_img ?>">
                                            </a>
                                      
                                           <!--  <div class="society"><p>Society</p></div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 day_post_text">
                                        <div>
                                       
                                            <h3><a href="/news/{{$subcategory->first()->news->last()->id}}">{{str_limit($subcategory->first()->news->last()->title_az,50)}}</a></h3>
                                            <p><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($subcategory->first()->news->last()->updated_at))->diffForHumans() ?> / 0 comments</p>
                                            <p>{!! str_limit($subcategory->first()->news->last()->short_desc_az ,200) !!}
                                            </p>
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    <!--     lifestyle -->
                        <div class="lifestyle col-md-12">
                            <div class="col-md-12 regtangle">
                         
                                <p>{{$subcategory->take(2)->last()->title_az}}</p>
                          
                            </div>
                            <div class="col-md-12 padding-right-0">
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12 padding-right-0">
                                        <div class="row high_img_div">
                                            
                                            <a href="/news/{{$subcategory->take(2)->last()->news->last()->id}}">
                                                <img src="<?php echo '/images/news_img/'.$subcategory->take(2)->last()->news->last()->main_img?>">
                                             </a>
                                       
                                        </div>
                                        
                                        <div class="row text">
                                     
                                            <h3>
                                            
                                                <a href="/news/{{$subcategory->take(2)->last()->news->last()->id}}">{{str_limit($subcategory->take(2)->last()->news->last()->title_az,40)}}
                                                </a>

                                            </h3>
                                            <p><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($subcategory->take(2)->last()->news->last()->updated_at))->diffForHumans() ?> / 0 comments</p>
                                            <p>{{str_limit($subcategory->take(2)->last()->news->last()->short_desc_az,100)}}</p>
                                       
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12 small">
                                        @foreach($subcategory->take(2)->last()->news->take(4) as $news)
                                            <div class="row">
                                                <div class="col-md-4 col-xs-4 small_img">
                                                    <a href="/news/{{$news->id}}">
                                                        <img src="<?php echo '/images/news_img/'.$news->main_img;?>">
                                                    </a>
                                                </div>
                                                <div class="col-md-8 col-xs-8 small_text">
                                                    <a href="#"> 
                                                    <h5>{{str_limit($news->title_az,40)}}</h5></a>
                                                    <p><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($news->updated_at))->diffForHumans() ?> /<a href=""> 0 comments</a></p>
                                                </div>
                                            </div>
                                        @endforeach
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
    <!-- caorusel posts -->
                        <div class="carousel_posts col-md-12">
                            <div class="col-md-12 regtangle">
                                <p>Yeni Xəbərlər</p>
                                    <div class="controller">
                                        
                                    </div>
                            </div>
                            <div class="col-md-12 carousel_main">
                                <div class="over">
                                    <div class="carousel_move" id="carousel_move" draggable="true">
                                   
                                    @foreach(($newsAll->take(10)) as $slider)
                                        <div class="carousel_item">
                                            <a href="/news/{{$slider->id}}">
                                                <img src="<?php echo '/images/news_img/'.$slider->main_img ?>">
                                            </a>
                                        </div>
                                    @endforeach
                             
                                    </div>
                                    <div class="right"><i class="fa fa-3x fa-chevron-right" aria-hidden="true"></i></div>
                                    <div class="left"><i class="fa fa-3x fa-chevron-left" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12 ad">
                                <div class="ads hidden-xs ">
                                    
                                </div>
                            </div>
                        </div>
    <!-- the music -->
                        <div class="music col-md-12">
                            <div class="col-md-12 regtangle">
                                <p>{{$subcategory->take(3)->last()->title_az}}</p>
                        
                            </div>
                            <div class="col-md-12 padding-right-0">
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12 padding-right-0">
                                        <div class="row high_img_div">
                                        
                                            <a href="/news/{{$subcategory->take(3)->last()->news->last()->id}}">
                                                <img src="<?php echo '/images/news_img/'.$subcategory->take(2)->last()->news->last()->main_img?>">
                                             </a>
                                    
                                        </div>
                                        
                                        <div class="row text">
                                        
                                            <h3>
                                             
                                                <a href="/news/{{$subcategory->take(3)->last()->news->last()->id}}">{{str_limit($subcategory->take(3)->last()->news->last()->title_az,40)}}
                                                </a>
                                            </h3>
                                            <p><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($subcategory->take(3)->last()->news->last()->updated_at))->diffForHumans() ?> / 0 comments</p>
                                            <p>{{str_limit($subcategory->take(3)->last()->news->last()->short_desc_az,100)}}
                                            </p>
                                    
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12 small">
                                 
                                        @foreach($subcategory->take(3)->last()->news->take(4) as $news)
                                            <div class="row">
                                                <div class="col-md-4 col-xs-4 small_img">
                                                    <a href="/news/{{$news->id}}">
                                                        <img src="<?php echo '/images/news_img/'.$news->main_img;?>">
                                                    </a>
                                                </div>
                                                <div class="col-md-8 col-xs-8 small_text">
                                                    <a href="#"> 
                                                        <h5>{{str_limit($news->title_az,40)}}</h5>
                                                    </a>
                                                    <p><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($news->updated_at))->diffForHumans() ?> /<a href=""> 0 comments</a></p>
                                                </div>
                                            </div>
                                        @endforeach
                     
                                    </div>
                                </div>
                            </div>
                        </div>
    <!-- the world news -->
                        <div class="world_news col-md-12">
                            <div class="col-md-12 regtangle">
                           
                                <p>{{$subcategory->take(2)->last()->title_az}}</p>
                        
                            </div>
                            <div class="col-md-12 padding-right-0">
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12 padding-right-0">
                                        <div class="row high_img_div">
                                            <a href="/news/{{$subcategory->take(1)->last()->news->last()->id}}">
                                                <img src="<?php echo '/images/news_img/'.$subcategory->take(1)->last()->news->last()->main_img?>">
                                             </a>
                                        </div>
                                        
                                        <div class="row text">
                                            <h3>
                                                <a href="/news/{{$subcategory->take(1)->last()->news->last()->id}}">{{str_limit($subcategory->take(1)->last()->news->last()->title_az,40)}}
                                                </a>
                                            </h3>
                                            <p><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($subcategory->take(1)->last()->news->last()->updated_at))->diffForHumans() ?> / 0 comments</p>
                                            <p>{{str_limit($subcategory->take(1)->last()->news->last()->short_desc_az,100)}}
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12 small">
                                        @foreach($subcategory->take(1)->last()->news->take(4) as $news)
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
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
    <!-- next slide -->
                    <div class="col-md-4 col-xs-12 small_slide">
                        <div class="video_widget">
                            <div class="col-md-12 regtangle">
                                <p>Video</p>
                            </div>
                            <div class="col-md-12 video_widget_iframe">
                                <div class="row">
                                    <div class="">
                                       <iframe width="100%" height="165px" src="https://www.youtube.com/embed/XlTxzElSJ7I?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="calendar col-md-12">
                            
                        </div>
    <!-- random posts -->
                        <div class="random_posts col-md-12">
                            <div class="row">
                                <div class="col-md-12 regtangle">
                                    <p>Ümumi xəbərlər</p>
                                </div>
                                @for($i=0;$i<4;$i++)
                                <?php $rand=mt_rand(1,count($newsAll)-1);?>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="news_img_text">
                                            <img src="/images/news_img/{{$newsAll->get($rand)->main_img}}">
                                            <div class="news">
                                                <a href="/news/{{$newsAll->get($rand)->id}}"><p>
                                                    {{$newsAll->get($rand)->title_az}}
                                                </p></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endfor       
                            </div>
                        </div>
    <!-- popular tags    -->
                        <div class="popular_tags col-md-12">
                            <div class="row">
                                <div class="col-md-12 regtangle">
                                    <p>Ən çox baxılanlar</p>
                                </div>
                                <div class="col-md-12 popular_tags_item">
                                    <div class="row">
                                    @foreach($newsAll->all() as $newsTag)
                                        <div class="tag">
                                            <p>{{$newsTag->keywords}}</p>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
    <!-- fb widget -->
                    <div class="fb_vidget col-md-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 regtangle">
                                    <p>Bizi izləyin</p>
                            </div>
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLanguage-Camp-462197510643034%2F&tabs=timeline&width=340&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                        </div>
                    </div>
                </div>
            </div>


@endsection