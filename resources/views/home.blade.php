@extends('layouts.app')
@section('content')
<ul>
	{{Session::get('message')}}
</ul>
<div class="container">
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Row</th>
				<th>Author</th>
				<th>Title</th>
				<th>Short description</th>
				<th>Catecory</th>
				<th>updated time</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php $count=1 ?>
			@if(count(App\News::all())>0)
			@foreach($newsAll as $news)
				<tr>
					<td><?php echo $count;$count=$count+1 ?></td>
					<td>{{$news->user->first_name}}</td>
					<td>{{$news->title_az}}</td>
					<td>{{$news->short_desc_az}}</td>
					<td>{{$news->subcategory->title_az}}</td>
					<td>{{$news->updated_at}}</td>
					<td>
						@if(\Auth::user()->status==0||\Auth::user()->id==$news->user_id)
						<a href="/admin/news/{{$news->id}}/edit">
							<button type="button" class="btn btn-default" id='#newsModal' aria-label="Left Align">
								<span class="" aria-hidden="true">Edit</span>
							</button>
						</a>
						@else
							<button type="button" class="btn btn-default" aria-label="Left Align" disabled>
								<span class="" aria-hidden="true">Edit</span>
							</button>
						@endif
					</td>
					<td>
						@if(\Auth::user()->status==0||\Auth::user()->id==$news->user_id)
							<button type="button" class="btn btn-default delete" data-toggle="modal" aria-label="Left Align" data-target="#gridSystemModal" value='{{$news->id}}'>
								<span class="" aria-hidden="true">Delete</span>
							</button>
						@else
							<button type="button" class="btn btn-default" aria-label="Left Align" disabled>
								<span class="" aria-hidden="true">Delete</span>
							</button>
						@endif
					</td>
				
				</tr>

				<!--modal-->

				
			@endforeach
			@endif
			</tbody>
			
		</table>
	</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p >Do you want to delete <span class='newsData'></span> </p>
      </div>
      <div class="modal-footer">
        <a type="button" id='delete' class="btn btn-danger"  >Delete</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="gridSystemModal" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="gridSystemModalLabel">Warning</h4>
            </div>
            <div class="modal-body">
              <span>     Do you want to delete: <span class="newsData"></span>  ? </span>
            </div>
            <div class="modal-footer">
            @if(count(App\News::all())>0)
              <a  href='/admin/news/{{$news->id}}/delete'>
                <button type="button" class="btn btn-danger">Delete</button>
              </a>
             @endif
              <button type="button" class="btn btn-primary"  data-dismiss="modal">Back</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

<script>    
        jQuery(document).ready(function($) {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete').click(function(event) {           
        $.ajax({
                url: '/newsData',
                type: 'POST',          
                dataType:'json',
                data: {id: $(this).attr('value')},
                success:function(newsData) {
                $('.newsData').empty();
                $('.newsData').html("<b>"+newsData.title_az+"</b>");
                $('#delete').attr('href', '/news/'+newsData.id+'/delete');
                },
            
            
        });
        });
            })
</script>
@endsection
