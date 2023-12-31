@extends('layout/main')

@section('content')

    @if(Session::has('cart'));
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($comics as $comic)
                        <li class="list-group-item">
                            <span class="badge">{{ $comic['qty'] }}</span>
                            <strong>{{ $comic['item']['title'] }}</strong>
                            <span class="label-success">{{ $comic['price'] }} &euro;</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="/reduce/{{ $comic['item']['id'] }}">Reduce by 1</a></li>
                                    <li><a href="/remove/{{ $comic['item']['id'] }}">Remove All</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Total: {{ $totalPrice }} &euro;</strong>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <button type="button" class="btn btn-success">Checkout</button>
        </div>
    </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No items in cart</h2>
            </div>
        </div>
    @endif
@endsection