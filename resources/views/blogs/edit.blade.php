@extends('layouts.app')

@section('content')

    @include('partials.tinymce')
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Create Blog</h1>
        </div>
        <div class="col-md-8">
            <form action="{{route('blogs.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$blog->title}}">
                </div>

                <div class="form-group">
                    <label for="body">Body :</label>
                    <textarea  name="body" class="form-control my-editor" >{{$blog->body}}</textarea>
                </div>

                <div class="form-group form-check form-check-inline">

                    {{$blog->category->count() ? 'Current Category :' : ''}}&nbsp
                    @foreach($blog->category as $category)
                        <input type="checkbox" class="form-check-input" checked name="category_id[]"
                               value="{{$category->id}} ">
                        <lable class="form-check-label btn-margin-right">{{$category->name}}</lable>
                    @endforeach
                </div>

                <div class="form-group form-check form-check-inline">

                    {{$filtered->count() ? 'unused Category :' : ''}}&nbsp
                    @foreach($filtered as $category)
                        <input type="checkbox" class="form-check-input"  name="category_id[]"
                               value="{{$category->id}} ">
                        <lable class="form-check-label btn-margin-right">{{$category->name}}</lable>
                    @endforeach
                </div>

                <div class="form-group">
                    <label class="btn btn-default">
                        <span class="btn btn-outline- btn-info">Upload Image</span>
                        <input type="file" name="image" value="{{$blog->image}}" hidden>
                    </label>
                </div>

                <div>
                <button type="submit" class="btn btn-primary">Update Blog</button>
                </div>

            </form>
        </div>

    </div>
@stop
