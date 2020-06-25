@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Blog Trashes</h1>
        </div>
    <div class="col-md-12">
        @foreach($trash as $blog)

            <h3>Title : {{$blog->title}}</h3>
            <h3>Body  :{{$blog->body}}</h3>
        @endforeach

            <form action="{{route('blogs.restore',$blog->id)}}">
                <button type="submit" class="btn btn-success btn-xs pull-left">Restore</button>
            </form>
    </div>


    </div>
@stop
