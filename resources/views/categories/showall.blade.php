@extends('layouts.app')
@section('content')
<div style="padding-left:40px; padding-right:40px; min-height:500px">
	<div class="container">
		
		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center">Number</th>
					<th class="text-center">Title Az</th>
					<th class="text-center">Title En</th>
					<th class="text-center">Title Ru</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
			@if(count($datas)>0)
				<?php $count=0;?>
				@foreach($datas as $data)
				
				
				<tr>
					<td class="text-center"><?php $count=$count+1 ;echo $count ?></td>
					<td class="text-center"><a href="/admin/category/{{$data->id}}">{{$data->title_az}} </a></td>
					<td class="text-center"><a href="/admin/category/{{$data->id}}">{{$data->title_en}} </a></td>
					<td class="text-center"><a href="/admin/category/{{$data->id}}">{{$data->title_ru}} </a></td>
					<td class="text-center">
						<a href="/admin/edit/{{$data->id}}/category"><button class="btn btn-success">Edit</button></a>	&nbsp
						<button data-toggle="modal" data-target="#gridSystemModal" class="btn btn-danger">Delete</button>
					</td>
				</tr>
				
			<!--modal-->
				
				<div class="modal fade" tabindex="-1" role="dialog" id="gridSystemModal" aria-labelledby="  gridSystemModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel">Warning</h4>
                            </div>
                            <div class="modal-body">
                                <span> Do you want to delete : <b> {{$data->title_az}} </b></span>
                            </div>
                            <div class="modal-footer">
                                <a href="/admin/delete/{{$data->id}}/category">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">Back</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

				@endforeach
				
				
			</tbody>
		</table>
		
		@endif
		{{--  <button class="btn btn-default"> <a href="/add/category">Create Category</a></button> --}}
	</div>
	
</div>

@endsection