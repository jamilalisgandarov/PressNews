@extends('layouts.app')

@section('content')

	<div class="container">

		<div class="">
			<form method="POST" action="/admin/news/insert" enctype="multipart/form-data" accept-charset="UTF-8">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row lang">
				  	<div class="form-group col-md-4">
				    	<label for="title">Title Az</label>
				    	<input name="title_az" id="title" type="text" class="form-control" placeholder="Title" value='{{old('title_az')}}'>
				  	</div>
				  	<div class="form-group col-md-4">
				    	<label for="title">Title En</label>
				    	<input name="title_en" id="title" type="text" class="form-control" placeholder="Title" value='{{old('title_en')}}'>
				  	</div>
				  	<div class="form-group col-md-4">
				    	<label for="title">Title Ru</label>
				    	<input name="title_ru" id="title" type="text" class="form-control" placeholder="Title" value='{{old('title_ru')}}'>
				  	</div>
				</div>

				<div class="row lang">
				  	<div class="form-group col-md-4">
				    	<label for="short_desc">Short Desc Az</label>
				    	<input name="short_desc_az" id="short_desc" type="text" class="form-control" placeholder="Short Description" value='{{old('short_desc_az')}}'>
				  	</div>
				  	<div class="form-group col-md-4">
				    	<label for="short_desc">Short Desc En</label>
				    	<input name="short_desc_en" id="short_desc" type="text" class="form-control" placeholder="Short Description" value='{{old('short_desc_en')}}'>
				  	</div>
				  	<div class="form-group col-md-4">
				    	<label for="short_desc">Short Desc Ru</label>
				    	<input name="short_desc_ru" id="short_desc" type="text" class="form-control" placeholder="Short Description" value='{{old('short_desc_ru')}}'>
				  	</div>
				</div>

			  	<div class="row lang">
				  	<div class="form-group col-md-4">
			    		<label for="full_desc">Full Description Az</label>
			    		<textarea name="desc_az" id="full_desc" type="text" class="form-control" placeholder="Full Description">{{old('desc_az')}}</textarea>
			  		</div>
			  		<div class="form-group col-md-4">
			    		<label for="full_desc">Full Description En</label>
			    		<textarea name="desc_en" id="full_desc" type="text" class="form-control" placeholder="Full Description">{{old('desc_en')}}</textarea>
			  		</div>
			  		<div class="form-group col-md-4">
			    		<label for="full_desc">Full Description Ru</label>
			    		<textarea name="desc_ru" id="full_desc" type="text" class="form-control" placeholder="Full Description">{{ old('desc_ru') }}</textarea>
			  		</div>
				</div>
			  	<hr>
				
				<div class="row category">
				  	
					<div class="col-md-3">
						<label for="category">Category</label>
						<select id="category" class="form-control selectpicker" name="category_id">

							@foreach($categories as $category)
								<optgroup label="{{$category->title_az}}">
									@foreach($category->subcategories->all() as $subcategory)
							    		<option>{{$subcategory->title_az}}</option>
							    	@endforeach
								</optgroup>
							@endforeach
						  	
						</select> 
				  	</div>
				  	<div class="col-md-3">
				  		<div class="form-group">
							<label for="keywords">Keywords</label>
							<input name="keywords" id="keywords" type="text" class="form-control" placeholder="keywords" value='{{old('keywords')}}'>
						</div>
				  	</div>
				  	<div class="col-md-3">
				  		<div class="form-group">
							<label for="photo">Photo</label>
							<input name='main_img' type="file" id="photo">
						</div>
				  	</div>
				  	
				  	<div class="col-md-3">
				  		<div class="checkbox">
							<label>
								<input name="visibility" type="checkbox">Visibility
							</label>
						</div>
				  	</div>
				</div>
				<div class="col-md-3 col-md-offset-4">
					<button type="submit" value="submit" class="btn btn-default btn-lg btn-block">Add News</button>
				</div>
			  	
			</form>


			@if(count($errors))
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			@endif
		</div>
	</div>
    <script>
        CKEDITOR.replace( 'desc_az' );
        CKEDITOR.replace( 'desc_en' );
        CKEDITOR.replace( 'desc_ru' );
    </script>
@endsection