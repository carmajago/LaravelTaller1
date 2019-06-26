@extends('welcome')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h1 class="card-title text-center">Iniciar sesión</h1>
                    <form class="form-signin" method="POST" action="login">
                            @csrf
                        <div class="form-label-group">
                            <label for="inputEmail">Correo</label>

                            <input type="email" id="email" name="email" class="form-control" placeholder="Correo" required
                                autofocus>
                        </div>

                        <div class="form-label-group">
                            <label for="inputPassword">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>

                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Iniciar
                            sesión</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection