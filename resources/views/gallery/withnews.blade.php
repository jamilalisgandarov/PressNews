@extends('layouts.app')

@section('content')

   <div class="container">
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Row</th>
				<th>Author</th>
				<th>News</th>
				<th>Add New Photo</th>
				<th>Wiev All Photo</th>
			</tr>
		</thead>
		<tbody>
			<?php $count=1 ?>
			@if(count(App\Gallery::all())>0&&count(App\News::all())>0)
			@foreach($newsAll as $news)
				<tr>
					<td><?php echo $count;$count=$count+1 ?></td>
					<td>{{$news->user->first_name}}</td>
					<td>{{$news->title_az}}</td>
					<td>
						@if(\Auth::user()->status==0||\Auth::user()->id==$news->user_id)
							<a href="/admin/{{$news->id}}/add/photo">
								<button type="button" class="btn btn-default" aria-label="Left Align">
									<span class="" aria-hidden="true">Add New Photo</span>
								</button>
							</a>
						@else
							<button type="button" class="btn btn-default" aria-label="Left Align" disabled>
								<span class="" aria-hidden="true">Add New Photo</span>
							</button>
						@endif
					</td>
					<td>
						<a href="/admin/{{$news->id}}/gallery">
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="" aria-hidden="true">All Photos</span>
							</button>
						</a>
					</td>
					
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>


@endsection