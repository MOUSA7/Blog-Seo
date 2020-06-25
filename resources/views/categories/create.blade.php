@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Create Category</h1>
        </div>
        <div class="col-md-8">
            <form action="{{route('categories.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" >
                </div>

                <div>
                <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </form>
        </div>

    </div>
@stop
