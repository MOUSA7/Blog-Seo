@extends('layouts.app')

@section('content')

    @include('partials.tinymce')

    <div class="container-fluid">

        <div class="jumbotron">
            <h1>Create Blog</h1>
        </div>
        <div class="col-md-8">
            <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('partials.errors-messages')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" >
            </div>

                <div class="form-group">
                    <label for="body">Body :</label>
                    <textarea type="text" name="body" class="form-control my-editor">{!! old('body') !!}</textarea>
                </div>

                <div class="form-group form-check form-check-inline">

                    @foreach($categories as $category)
                        <input type="checkbox" class="form-check-input" name="category_id[]"
                               value="{{$category->id}} ">
                        <lable class="form-check-label btn-margin-right">{{$category->name}}</lable>
                    @endforeach
                </div>

                <div class="form-group">
                    <label class="btn btn-default">
                    <span class="btn btn-outline- btn-info">Upload Image</span>
                    <input type="file" name="image" hidden>
                    </label>
                </div>
                <div>
                <button type="submit" class="btn btn-primary">Create Blog</button>
                </div>
            </form>
        </div>

    </div>
    @stop
