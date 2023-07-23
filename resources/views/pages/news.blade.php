@extends('layout/main')


@section('content')
    @foreach($posts as $post)
        <div class="col-md-4">
            <h2>{{str_limit($post->title, 25)}}</h2>
            <p>{{str_limit($post->body, 100)}}</p>
            <p><a class="btn btn-primary" href="post/{{$post->id}}" role="button" >More <span class="glyphicon glyphicon-chevron-right"></span></a></p>
        </div>
    @endforeach
    {{$posts->links()}}
@endsection