@extends('welcome')


@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">

            <h1 class="text-center display-3">{{ $product['name'] }}</h1>
        </div>
        <div class="col-md-4">
            <img src="{{ $product['image'] }}" class="img-fluid" />
        </div>
        <div class="col-md-8">
            <h2><strong>Precio: </strong> $ {{ $product['price'] }}</h2>
            <h2><strong>Fecha de creación: </strong>{{ $product['created_at'] }}</h2>
            <h2><strong>Cantidad disponible: </strong>{{ $product['quantity_available'] }}</h2>
            <h2><strong>Monto mínimo: </strong>{{ $product['min_amount'] }}</h2>
            <h2> <strong>Monto máximo: </strong>{{ $product['max_amount'] }}</h2>
       
       <a class="btn btn-primary" style="color: white" href="{{ route('products.index')}}">Regresar</a>
        </div>
    </div>


</div>
@stop