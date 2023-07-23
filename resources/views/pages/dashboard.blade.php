@extends('layout/main')

@section('content')
    <div class="container">
        <p><a href="/new-post" role="button" class="btn btn-default">Create new post</a></p>
        <p><a href="/new-comic" role="button" class="btn btn-default">Add new comic</a></p>
        <div class="row">
            <div class="navbar">
                <h2><a class="navbar-brand" href="/admin"><u>Posts</u></a></h2>
                <h2><a class="navbar-brand" href="/admin-comics">Comics</a></h2>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
                @foreach($posts as $post)
                    @if(Auth::id() == $post->user_id)
                        <tr>
                            <td>{{$post->category}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <p>
                                    <a class="btn btn-default" href="post/{{$post->id}}" role="button" >More</a>
                                    <a href="/post/{{$post->id}}/edit" role="button" class="btn-warning btn">Edit</a>
                                    <a href="/post/{{$post->id}}/delete" role="button" class="btn-danger btn">Delete</a>
                                </p>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endsection