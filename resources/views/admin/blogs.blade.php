@extends('layouts.app')

@section('content')

    @include('partials.meta_static')

    <div class="container-fluid">
        <div class="jumbotron">
            <h2>Manage Blog</h2>
        </div>

        <div class="row">

            <div class="col-md-6">
                <h3>Publish Blog</h3>
                <hr>
                @foreach($publishBlog as $blog)
                    <h1><a href="{{route('blogs.show',$blog->id)}}">{{$blog->id}}=>{{$blog->title}}</a></h1>
                    {!! $blog->body!!}

                    <form action="{{route('blogs.update',$blog->id)}}" method="post">
                        {{method_field('patch')}}
                        <input type="checkbox" name="status" value="0" checked style="display: none">
                        <button type="submit" class="btn btn-warning btn-xs">Save Draft</button>
                   @csrf
                    </form>
                @endforeach



            </div>

            <div class="col-md-6">
                <h3>Draft Blog</h3>
                <hr>
                @foreach($draftBlog as $blog)
                    <h1><a href="{{route('blogs.show',$blog->id)}}">{{$blog->id}}=>{{$blog->title}}</a></h1>
                    {!! $blog->body!!}

                    <form action="{{route('blogs.update',$blog->id)}}" method="post">
                        {{method_field('patch')}}
                        <input type="checkbox" name="status" value="1" checked style="display: none">
                        <button type="submit" class="btn btn-success btn-xs">Published</button>
                        @csrf
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@stop
