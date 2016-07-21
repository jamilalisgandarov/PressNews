@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <h1>Edit Photo</h1>
        <div class="col-md-12">
            <img style='max-width:100%;max-height: 400px;'  src="<?php echo "/images/gallery_img/lg_img/$gallery->path_large" ?>">
        </div>
        <form method="POST" action="/admin/gallery/{{$gallery->news_id}}/{{$gallery->id}}/update" enctype="multipart/form-data" accept-charset="UTF-8">
             {{ method_field('patch') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="photo">Photo</label>
                <input name='file' type="file" id="photo">
            </div>
            <button type="submit" value="submit" class="btn btn-default btn-lg btn-block">Upload Photo</button>
        </form>
    </div>
</div>
 @endsection