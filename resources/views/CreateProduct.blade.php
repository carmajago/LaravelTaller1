@extends('welcome')

@section('content')

<div class="container">
    <h1 class="display-3 text-center">Crear producto</h1>
<div class="box" style="margin: 0 50px">
                <form method="POST" action="{{ route('products.store') }}">
                    @csrf

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input class="form-control" name="name" placeholder="Ingrese el nombre">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Precio</label>
                        <input type="number" class="form-control" name="price" placeholder="Precio" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Iva</label>
                        <input class="form-control" name="iva" placeholder="Iva">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Cantidad disponible</label>
                        <input class="form-control" type="number" name="quantity_available"
                            placeholder="Cantidad disponible">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Monto mínimo</label>
                        <input class="form-control" type="number" name="min_amount" placeholder="Monto mínimo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Monto máximo</label>
                        <input class="form-control" type="number" name="max_amount" placeholder="Monto máximo">
                    </div>
                    <a class="btn btn-secondary" href="{{ route('products.index') }}">Cancelar</a>
                    <button type="submit"  id="save" class="btn btn-primary">Guardar</button>
                </form>
            </div>
</div>
@stop