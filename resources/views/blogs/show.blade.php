@extends('layouts.app')

@section('content')

    @include('partials.meta_dynamic')
    <div class="container-fluid">



        <div class="jumbotron">

            <div class="col-md-12">
                @if($blog->image)
                <img src="/images/blog/{{$blog->image ? $blog->image : 'Not Found Image'}}" alt="{{Str::limit($blog->title)}}"
                class="img-responsive image">
                    <br/>
                @endif
            </div>

            <div class="col-md-12">
                <h1>{{$blog->title}}</h1>
            </div>

            <div class="col-md-12">
                <div class="btn-group">
                <a class="btn btn-primary btn-xs pull-left btn-margin-right" href="{{route('blogs.edit',$blog->id)}}">Edit</a>

                <form action="{{route('blogs.delete',$blog->id)}}" method="post">
                    {{csrf_field('delete')}}
                    <button type="submit" class="btn btn-danger btn-xs pull-left">Delete</button>
                </form>
                </div>
            </div>

        </div>

       {!! $blog->body !!}
        <hr>
        <strong>Categories : </strong>

        @if(count($blog->category) > 0)

        @foreach($blog->category as $category)


            <span><a href="{{route('categories.show',$category->slug)}}">{{$category->name}}</a></span>

            @endforeach
            @else
                <span>Categories Not Found</span>
            @endif
    </div>

@stop
