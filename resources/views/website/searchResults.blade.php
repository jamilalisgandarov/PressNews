@extends('layouts.homepage')

@section('content')



                    <div class="col-md-12 col-xs-12 high" style="padding-right: 8px;">
    <!-- post of the day  -->
                        <div class="row">
                        @foreach($result as $news)
                        <div class="category_news col-md-12">
                            <div class="">
                                <div class="col-md-12 regtangle">
                                    <p>{{$news->subcategory->title_az}}</p>
                                </div>
                            </div>
                            <div class="col-md-12 padding-right-0">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 padding-right-0">
                                        <div class="row category_news_img">
                                            <a href="/news/{{$news->id}}">
                                                <img src="<?php echo '/images/news_img/'.$news->main_img ?>" >
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 day_post_text padding-left-0">
                                        <div class="">
                                            <h3>
                                                <a href="/news/{{$news->id}}">{{str_limit($news->title_az,50)}}
                                                </a>
                                            </h3>
                                            <p><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($news->updated_at))->diffForHumans() ?> / <a href="">0 comments</a></p>
                                            <p>{!! str_limit($news->short_desc_az ,200) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
    <!--     lifestyle -->
                 </div>
                 </div>

@endsection