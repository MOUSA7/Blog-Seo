@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Edit Category</h1>
        </div>
        <div class="col-md-8">
            <form action="{{route('categories.update',$category->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}" >
                </div>

                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>

    </div>
@stop
