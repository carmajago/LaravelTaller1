@extends('welcome')


@section('content')


<div class="container">

    <div class="row">

        <div class="col-12">

            <h1 class="text-center">Lista de productos</h1>
        </div>
        <div class="col-12" style="margin: 10px">

            <a class="btn btn-primary btn-block" href="{{ route('products.create')}}">Crear producto</a>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">iva</th>
                    <th scope="col">Cantidad disponible</th>
                    <th scope="col">Monto mínimo</th>
                    <th scope="col">Monto máximo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products->all() as $product)

                <tr>
                    <td><img src="{{ $product['image'] }}" class="img-fluid" style="width: 50px"></td>
                    <td>{{ $product['created_at'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>$ {{ $product['price'] }}</td>
                    <td>$ {{ $product['iva'] }}</td>
                    <td>{{ $product['quantity_available'] }}</td>
                    <td>{{ $product['min_amount'] }}</td>
                    <td>{{ $product['max_amount'] }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('products.edit', $product)}}">Editar</a>
                        <a class="btn btn-info" href="{{ route('products.show', $product )}}">Detalles</a>

                        <a href="#" data-href="{{ route('products.destroy', $product)}}" data-toggle="modal"
                            data-target="#confirm-delete" class="btn btn-danger">Eliminar</a>

                    </td>

                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Eliminar producto
            </div>
            <div class="modal-body">
                ¿Estas seguro de eliminar el producto?
            </div>
            <div class="modal-footer">
                <form method="POST" class="form-delete" action="{{ route('products.destroy', $product)}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                        <input type="submit" class="btn btn-danger" value="Eliminar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.form-delete').attr('action', $(e.relatedTarget).data('href'));
    });
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                        <input type="number" class="form-control" name="price" placeholder="Precio">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="save" class="btn btn-primary">Guardar</button>
                </form>
            </div>


        </div>
    </div>
</div>
<br />

@stop