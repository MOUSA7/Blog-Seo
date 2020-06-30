@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="jumbotron">
            <table>
                <thead>
                <tr>
                    <td>Name</td>
                    <td></td>
                    <td>Role</td>
                    <td></td>
                    <td>Blog</td>
                </tr>
                </thead>
                <tbody>
                @foreach($user->blogs as $blog)
                <tr>
                    <td>{{$user->name}}</td>
                    <td></td>
                    <td>{{$user->role->name}}</td>
                    <td></td>
                    <td><a href="{{route('blogs.show',$blog->id)}}">{{$blog->title}}</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>


    </div>

@stop
