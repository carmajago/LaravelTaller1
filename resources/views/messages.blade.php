@extends('welcome')


@section('content')


<div class="container">

    <div class="row">

        <div class="col-12">

            <h1 class="text-center">Lista de mensajes</h1>
        </div>
        <div class="col-12" style="margin: 10px">

            <a class="btn btn-primary btn-block" href="{{ route('messages.create')}}">Crear mensaje</a>

        </div>

        <table class="table">
            <thead>
                <tr>
    
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Asunto</th>
                    <th scope="col">Mensaje</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($messages->all() as $message)

                <tr>
                    <td>{{ $message['created_at'] }}</td>
                    <td>{{ $message['name'] }}</td>
                    <td>{{ $message['subject'] }}</td>
                    <td>{{ $message['message'] }}</td>

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
                Eliminar Mensaje
            </div>
            <div class="modal-body">
                ¿Estas seguro de eliminar el mensaje?
            </div>
            <div class="modal-footer">
                <form method="POST" class="form-delete">
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

@stop