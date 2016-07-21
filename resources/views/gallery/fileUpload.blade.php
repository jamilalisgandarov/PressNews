@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <h1>Upload Gallery Photo</h1>
        <form method="POST" action="/admin/gallery/{{$news->id}}/upload" enctype="multipart/form-data" accept-charset="UTF-8">
             <input type="hidden" value="{{csrf_token() }}" name="_token"></input>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input name='file' type="file" id="photo">
            </div>
            <button type="submit" value="submit" class="btn btn-default btn-lg btn-block">Upload Photo</button>
        </form>
    </div>
</div>
 @endsection