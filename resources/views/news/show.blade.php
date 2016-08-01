@extends('layouts.app')

@section('content')

    <div class="container">

	    <div class="">
    		<table class="table table-striped">
	    		<thead>
	    			<tr>
		    			<th>Row</th>
		    			<th>Author</th>
		    			<th>Title</th>
		    			<th>Short description</th>
		    			<th>Catecory</th>
		    			<th>updated time</th>
		    			<th>Add to s</th>
		    			<th>Edit</th>
		    			<th>Delete</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@if(count(News::all())>0)
					@for($i=1;$i<count($news);$i++)
						<tr>
		    				<td>{{$i+1}}</td>
		    				<td>{{$news[$i]->author->first_name}}</td>
		    				<td>{{$news[$i]->title_az}}</td>
		    				<td>{{$news[$i]->short_desc_az}}</td>
		    				<td>{{$news[$i]->subcategory->title_az}}</td>
		    				<td>{{$news[$i]->updated_at}}</td>

		    				<td>
		    					<a href="/admin/news/{{$news[$i]->id}}/edit">
			    					<button type="button" class="btn btn-default" aria-label="Left Align">
			    						<span class="" aria-hidden="true">Edit</span>
			    					</button>
			    				</a>
		    				</td>
		    				<td>
		    					<a href="/admin/news/{{$news[$i]->id}}/delete">
		    						<button type="button" class="btn btn-default" aria-label="Left Align" >
		    							<span class="" aria-hidden="true">Delete</span>
		    						</button>
		    					</a>
		    				</td>
		    			</tr>
	    			@endfor
	    			@endif
	    		</tbody>
    			
			</table>
			<hr>
	    </div>
    </div>

@stop