@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
   <div class="panel-default">
   <div class="panel-heading">
    Edit  post{{$post->title}}
   </div>
   <div class="panel-body">
   <form action="{{route('post.update',['id'=>$post->id])}}"  method="post" enctype="multipart/form-data">
   {{csrf_field()}}
   <div class="form-group">
   <label for="title"></label>
   <input type="text" name="title" class="form-control"value="{{$post->title}}">
   </div>
   <div class="form-group">
   <label for="featured">Featured image</label>
   <input type="file" name="featured" class="form-control">
   </div>
   <div class="form-group">
      <label for="category">Select a Category</label>
      <select name="category_id" id="category" class="form-control">
        @foreach($categories as $category)
          <option value="{{ $category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
   </div>
   <div class="form-group">
   <label for="price">Product Price</label>
   <input type="text" name="price"value="{{$post->price}}" class="form-control">
   </div>
   <div class="form-group">
   <label for="availability">Availability</label>
   <input type="text" name="availability"value="$post->availability" class="form-control">
   </div>
   
   <div class="form-group">
   <label for="content" >Content</label>
   <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
   </div>
   <div class="form-group">
   <div class="text-center">
   <button class="btn btn-success" type="submit">
    Update  Post
   </button>
   </div>
   </div>
   </form>
   </div>
   </div>
@endsection