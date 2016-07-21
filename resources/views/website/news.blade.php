@extends('layouts.homepage')

@section('content')

<div class="col-md-12 col-xs-12 news">
	<div class="row">
	@if(count($news)>0)
		<div class="card col-md-12 col-xs-12">
			<div class="card-block">
				<h4 class="card-title">
					{{$news->title_az}}
				</h4>
				<hr>
				<div class="col-md-12">
					<div class="row">
						<p class="pull-left">Yazar : <b>{{$news->user->first_name." ".$news->user->last_name }}</b></p>
						<p class="pull-right">Tarix : {{$news->updated_at}}</p>
					</div>
				</div>
			</div>
			<img src="<?php echo "/images/news_img/".$news->main_img ?>">
			<hr>
			<div class="card-block">
				<p class="card-text">{!! $news->desc_az !!}</p>
			</div>

		</div>
	@endif
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12 gallery">
			<div class="row">
			@if(count($news->gallery)>0)
				<div class="carousel_posts col-md-12">
					<div class="col-md-12 regtangle">
						<p>Gallery</p>
						<div class="controller">
							
						</div>
					</div>
					<div class="col-md-12 carousel_main">
						<div class="over">
							<div class="carousel_move" id="carousel_move" draggable="true">
								@foreach($news->gallery->all() as $gallery)
								<div class="carousel_item popup-gallery">
									<a href="#">
										<img src="<?php echo "/images/gallery_img/lg_img/".$gallery->path_large ?>">
									</a>
								</div>
								@endforeach
							</div>
							<div class="right"><i class="fa fa-3x fa-chevron-right" aria-hidden="true"></i></div>
							<div class="left"><i class="fa fa-3x fa-chevron-left" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
	<hr>
</div>

@endsection
