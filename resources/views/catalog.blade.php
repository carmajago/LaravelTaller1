@extends('welcome')


@section('content')
<div class=container style="margin-bottom: 20px">
    <div class="row">

        <div class="col" style="margin: 10px"><h1 class="text-center">Catalogo</h1></div>
        <div class="card-deck">

            @foreach ($products->all() as $product)

            <div class="card">
                <img class="card-img-top" src="{{ $product['image'] }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text">{{ $product['price'] }}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                <a class="btn btn-info" href="{{ route('products.show', $product )}}">Detalles</a>

            </div>
            @endforeach


        </div>
    </div>
</div>

@stop