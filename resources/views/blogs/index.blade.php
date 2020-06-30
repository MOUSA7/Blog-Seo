
@extends('layouts.app')
@include('partials.meta_static')
@section('content')



    @if(Session::has('CreateBlog'))
        <div class="alert alert-success">
            {{Session::get('CreateBlog')}}
            <button type="button" class="close" aria-hidden="true" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <a  href="{{route('blogs.trash')}}" class="btn btn-info ">Trash</a>
@foreach($blogs as $blog)

    <div class="col-md-8 offset-2 text-center">
    <h1><a href="{{route('blogs.show', $blog->slug)}}">{{$blog->title}}</a></h1>
   <div class="lead"> {!! $blog->body !!} </div>

    @if($blog->image)
        <img src="/images/blog/{{$blog->image ? $blog->image : 'Not Found Image'}}" alt="{{Str::limit($blog->title)}}"
             class="img-responsive image" style="width: 300px;height: auto">
        <br/>
    @endif

    <div>
@if($blog->user)
    Author: <a href="{{route('users.show',[$blog->user->name, rand(90,100)])}}">{{$blog->user->name}}</a> | Posted: <a href="">{{$blog->created_at->diffForHumans()}}</a>
@endif
    </div>
        <br/>
        <hr>
        <br/>
    </div>
@endforeach
@stop
