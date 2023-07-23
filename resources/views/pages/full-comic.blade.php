@extends('layout/main')

@section('content')
        <div class="row">
            <div class="col-8 col-sm-4">
                <img src="{{ asset($comic->image) }}" alt="" height="400px" width="300px">
            </div>
            <div class="col-4 col-sm-8">
                <div class="row py-3 px-lg-5">
                    <h2>Title: {{$comic->title}}</h2>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Author: {{$comic->author}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Year: {{$comic->year}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Pages: {{$comic->page}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Genre: {{$comic->genre}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Publisher: {{$comic->publisher}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>ISBN: {{$comic->isbn}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Price: &euro;{{$comic->price}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p><a class="btn btn-success" href="/add-to-cart/{{$comic->id}}" role="button" >Add to cart</a></p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            @if(Auth::id() == 1)
                <a href="/comic/{{$comic->id}}/edit" role="button" class="btn btn-warning">Edit</a>
                <a href="/comic/{{$comic->id}}/delete" role="button" class="btn btn-danger">Delete</a>
            @endif
            <div class="reviews">
                <h4>Reviews:</h4>
                <ul class="list-group">
                    @foreach($comic->reviews as $review)
                        <li class="list-group-item"><strong>{{$review->created_at}}</strong> {{$review->body}}</li>
                    @endforeach
                </ul>
            </div>

            <hr>
            @if(Auth::check())
                <div class="card">
                    <div class="card-block">
                        <form action="/comic/{{$comic->id}}/review" method="Post">
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