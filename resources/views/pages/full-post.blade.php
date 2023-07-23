@extends('layout/main')

@section('content')
    <div class="col-md-12">
        <h2>{{$post->title}}</h2>
        <h4>{{$post->category}}</h4>
        <p>{{$post->body}}</p>
        @if(Auth::id() == 1)
            <a href="/post/{{$post->id}}/edit" role="button" class="btn btn-warning">Edit</a>
            <a href="/post/{{$post->id}}/delete" role="button" class="btn btn-danger">Delete</a>
        @endif
        <div class="comments">
            <h4>Comments:</h4>
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item"><strong>{{$comment->created_at}}</strong> {{$comment->body}}</li>
                @endforeach
            </ul>
        </div>

        <hr>
        @if(Auth::check())
        <div class="card">
            <div class="card-block">
                <form action="/post/{{$post->id}}/comment" method="Post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" placeholder="Type here..." class="form-control" required="required" maxlength="255"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
@endsection