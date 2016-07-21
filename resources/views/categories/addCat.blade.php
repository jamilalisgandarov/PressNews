@extends('layouts.app')


@section('content')
<div style="padding-left:40px; padding-right:40px; min-height:500px">
  <form method="post" action="/admin/add/store">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="category_az">Az Category</label>
    <input type="text" class="form-control" id="category_az" name="title_az"  placeholder="Category">    
  </div>
  <div class="form-group">
    <label for="category_en">En Category</label>
    <input type="text" class="form-control" id="category_en" name="title_en" placeholder="Category">    
  </div>
  <div class="form-group">
    <label for="category_ru">Ru Category</label>
    <input type="text" class="form-control" id="category_ru" name="title_ru" placeholder="Category">    
  </div>
   <div class="checkbox">
    <label>
      <input type="checkbox"  value="1" name="visibility">Show
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
@if(count($errors)>0)
<ul>
@foreach($errors->all() as $error)

  <li>{{$error}}</li>

@endforeach
@endif
</ul>
</div>

@endsection


