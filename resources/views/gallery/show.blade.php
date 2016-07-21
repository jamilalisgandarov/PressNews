@extends('layouts.app')

@section('content')


<div class="container">
			@if(count(App\Gallery::all())>0&&count(App\News::all())>0)
			@foreach($newsAll as $news)
				@foreach($news->gallery->all() as $gallery)
					<div class="col-md-3">
						<div class="card" style="margin-bottom: 20px;">
						  <img class="card-img-top" style="max-width: 100%; height: 200px;" src="<?php echo "/images/gallery_img/lg_img/$gallery->path_large"; ?>" alt="Card image cap">
						  <div class="card-block">
						    <a href="/admin/{{$news->id}}/gallery">
						    	<h4 class="card-title">{{str_limit($news->title_az,30)}}</h4>
						    </a>
						    @if(\Auth::user()->status==0||\Auth::user()->id==$news->user_id)
								<a href="/admin/gallery/{{$gallery->id}}/edit">
									<button type="button" class="btn btn-default" aria-label="Left Align">
										<span class="" aria-hidden="true">Edit</span>
									</button>
								</a>
								@else
									<button type="button" class="btn btn-default" aria-label="Left Align" disabled>
										<span class="" aria-hidden="true">Edit</span>
									</button>
								@endif
								@if(\Auth::user()->status==0||\Auth::user()->id==$news->user_id)
									<a href="/admin/gallery/{{$gallery->id}}/delete">
										<button type="button" class="btn btn-default pull-right" data-toggle="modal" aria-label="Left Align" data-target="#gridSystemModal">
											<span class="" aria-hidden="true">Delete</span>
										</button>
									</a>
								@else
									<button type="button" class="btn btn-default pull-right" aria-label="Left Align" disabled>
										<span class="" aria-hidden="true">Delete</span>
									</button>
								@endif
						  </div>
						</div>
					</div>
					
		@endforeach
 	@endforeach
 	@endif
 @endsection


				
