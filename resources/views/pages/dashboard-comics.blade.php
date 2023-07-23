@extends('layout/main')

@section('content')
    <div class="container">
        <p><a href="/new-post" role="button" class="btn btn-default">Create new post</a></p>
        <p><a href="/new-comic" role="button" class="btn btn-default">Add new comic</a></p>
        <div class="row">
            <div class="navbar">
                <h2><a class="navbar-brand" href="/admin">Posts</a></h2>
                <h2><a class="navbar-brand" href="/admin-comics"><u>Comics</u></a></h2>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year</th>
                    <th>Genre</th>
                    <th>Publisher</th>
                    <th>Price</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
                @foreach($comics as $comic)
                    @if(Auth::id() == 1)
                        <tr>
                            <td>{{$comic->isbn}}</td>
                            <td>{{$comic->title}}</td>
                            <td>{{$comic->author}}</td>
                            <td>{{$comic->year}}</td>
                            <td>{{$comic->genre}}</td>
                            <td>{{$comic->publisher}}</td>
                            <td>{{$comic->price}}</td>
                            <td>{{$comic->created_at}}</td>
                            <td>{{$comic->updated_at}}</td>
                            <td>
                                <p>
                                    <a class="btn btn-default" href="comic/{{$comic->id}}" role="button" >More</a>
                                    <a href="/comic/{{$comic->id}}/edit" role="button" class="btn-warning btn">Edit</a>
                                    <a href="/comic/{{$comic->id}}/delete" role="button" class="btn-danger btn">Delete</a>
                                </p>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endsection