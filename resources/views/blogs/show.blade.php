@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')

    <div class="container-fluid">

        <div class="jumbotron">

            <div class="col-md-12">
                @if($blog->image)
                <img src="/images/blog/{{$blog->image ? $blog->image : 'Not Found Image'}}" alt="{{Str::limit($blog->title)}}"
                class="img-responsive image" style="width: 200px;height: auto">
                    <br/>
                @endif
            </div>

            <div class="col-md-12">
                <h1>{{$blog->title}}</h1>
            </div>

            <div class="col-md-12">
                <div class="btn-group">
                <a class="btn btn-success btn-xs pull-left btn-margin-right" href="{{route('blogs.edit',$blog->id)}}">Edit</a>

                <form action="{{route('blogs.delete',$blog->id)}}" method="post">
                    {{csrf_field('delete')}}
                    <button type="submit" class="btn btn-danger btn-xs pull-left">Delete</button>
                </form>
                </div>
            </div>

        </div>

       {!! $blog->body !!}
        @if($blog->user)
            Author: <a href="{{route('users.show',$blog->user->name)}}">{{$blog->user->name}}</a> | Posted: <a href="">{{$blog->created_at->diffForHumans()}}</a>
        @endif
        <hr>
        <strong>Categories : </strong>

        @if(count($blog->category) > 0)

        @foreach($blog->category as $category)


            <span><a href="{{route('categories.show',$category->slug)}}">{{$category->name}}</a></span>

            @endforeach
            @else
                <span>Categories Not Found</span>
            @endif

        <hr>

        <aside>

        <div id="disqus_thread"></div>
        <script>
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://Larablog.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        </aside>
    </div>

@stop
