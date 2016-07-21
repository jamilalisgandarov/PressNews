@extends('layouts.app')
@section('content')
<div style="padding-left:40px; padding-right:40px; min-height:500px">
  <form method="post" action="/admin/update/{{$catId->id}}/subcategory">
    {{ method_field('PATCH') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label for="category_az">Az Category</label>
      <input type="text" class="form-control" id="category_az" name="title_az"  placeholder="Category" value="{{$catId->title_az}}">
    </div>
    <div class="form-group">
      <label for="category_en">En Category</label>
      <input type="text" class="form-control" id="category_en" name="title_en" placeholder="Category"  value="{{$catId->title_en}}">
    </div>
    <div class="form-group">
      <label for="category_ru">Ru Category</label>
      <input type="text" class="form-control" id="category_ru" name="title_ru" placeholder="Category"  value="{{$catId->title_ru}}">
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" {{($catId->visibility==1 ? 'checked' : '')}} name="visibility">Show
      </label>
    </div>
    <button type="submit" class="btn btn-success">Edit</button>
  </form>
</div>
@endsection