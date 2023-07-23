@extends('layout/main')


@section('content')
    <div class="input-group">
        <form action="{{ route('search') }}" method="GET" class="form-inline">
            @csrf
            <div class="form-group">
                <input class="form-control rounded" placeholder="Search" type="text" name="search" required/>
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
    @foreach($comics as $comic)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset($comic->image) }}" class="card-img-top" alt="Comic image"/>
                <div class="card-body">
                    <h2 class="card-title">{{str_limit($comic->title, 25)}}</h2>
                    <p class="card-text">{{str_limit($comic->price, 10)}}</p>
                    <p><a class="btn btn-primary" href="comic/{{$comic->id}}" role="button" >More <span class="glyphicon glyphicon-chevron-right"></span></a></p>
                    <p><a class="btn btn-success" href="/add-to-cart/{{$comic->id}}" role="button" >Add to cart</a></p>
                </div>
            </div>
        </div>
    @endforeach
    {{$comics->links()}}
@endsection