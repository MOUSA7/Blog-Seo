
@extends('layouts.app')

@section('content')

    @include('partials.meta_static')
    <button  href="{{route('blogs.trash')}}" class="btn btn-info ">Trash</button>

@foreach($blogs as $blog)

<h1><a href="{{route('blogs.show',$blog->id)}}">{{$blog->id}}=>{{$blog->title}}</a></h1>
    {!! $blog->body !!}

@endforeach
@stop
