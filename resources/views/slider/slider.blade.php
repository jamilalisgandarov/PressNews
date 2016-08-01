@extends('layouts.app')

@section('content')

    <div class="container">

	    <div class="">
    		<table class="table table-striped">
	    		<thead>
	    			<tr>
		    			<th>Number</th>
		    			<th>Author</th>
		    			<th>Title</th>
		    			<th>Short description</th>
		    			<th>Category</th>
		    			<th>Slider News</th>
		    			<th>Take from slider</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    		<?php $count=0 ?>
	    			@foreach($newsAll as $news)
						<tr>
							<td>{{$count=$count+1}}</td>
		    				<td>{{$news->user->first_name}}</td>
		    				<td>{{$news->title_az}}</td>
		    				<td>{{$news->short_desc_az}}</td>
		    				<td>{{$news->subcategory->title_az}}</td>
		    				<td>Yes</td>
		    				<td>
		    					<a href="/admin/slider/remove/{{$news->id}}">
		    						<button type="button" class="btn btn-default" aria-label="Left Align" >
		    							<span class="" aria-hidden="true">Delete</span>
		    						</button>
		    					</a>
		    				</td>
		    			</tr>
	    			@endforeach
	    		</tbody>
    			
			</table>
			<hr>
	    </div>
    </div>

@stop