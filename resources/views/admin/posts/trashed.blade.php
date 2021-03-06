@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<div class="panel panel-default">
    <div class="panel-body">
    <table class="table table-hover">
    <thead>
        <th>
            Image 
        </th>
        <th>
            title
        </th>
        <th>
            edit
        </th>
        <th>
           restore
        </th>
        <th>
           delete
        </th>
    </thead>
    <tbody>
        @if($posts->count() > 0)
        @foreach($posts as $post)
            <tr>
                <td>
                    <img src="{{$post->featured}}" widtd="50px" height="50px"alt="">
                </td>
                <td>
                    {{$post->title}}
                </td>
                <td>
                    edit
                </td>
                <td>
                    <a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-xs btn-success">restore</a>
                </td>
                <td>
                    <a href="{{route('post.kill',['id'=>$post->id])}}" class="btn btn-xs btn-danger">delete</a>
                </td>
            </tr>
        @endforeach
        @else
                <tr>
                        <th colspan="5" class="text-center">
                        no trashed post
                        </th>
                </tr>
        @endif
    </tbody>
    
</table>
    </div>
</div>
@stop