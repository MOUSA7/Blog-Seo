@extends('layouts.app')

@section('content')

    @include('partials.meta_static')

    <div class="container-fluid">
        <div class="jumbotron">
            <h2>Manage Users</h2>
        </div>

        <div class="col-md-12">
        <div class="row">
                @foreach($users as $user)
                    <div class="col-md-4">
                    <form action="{{route('users.update',$user->id)}}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <input  class="form-control" value="{{$user->name}}" disabled>
                        </div>

                        <div class="form-group">
                            <select name="role_id" class="form-control" >
                                <option selected>{{$user->role->name}}</option>
                                <option value="2">Author</option>
                                <option value="3">Mentor</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="email" value="{{$user->email}}" disabled>
                        </div>

                        <div class="form-group">
                            <input class="form-control" value="{{$user->created_at->diffForHumans()}}" disabled>
                        </div>

                        <button class="btn btn-success btn-xs pull-left col-md-12">Update</button>
                    </form>
                <form action="{{route('users.destroy',$user->id)}}" method="post">
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger btn-xs col-md-12 mt-2">Delete</button>
                </form>
                    </div>

            @endforeach
            </div>

        </div>
    </div>

@stop
