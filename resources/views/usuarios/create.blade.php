@extends("layouts.principal")
@section('titulo')
Usuarios
@stop
@section('page-header')
<h1 class="h3 mb-0 text-gray-800 text-center">Crear usuarios</h1>
@endsection
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    @include('partials.errors')
                    <form action="{{ url('usuario') }}" method="post">
                        {{ csrf_field() }}



                        <label for="name">{{'Nombre del usuario'}}</label>
                        <input type="text" name="name" id="name">
                        <br />
                        <br />
                        <label for="surname">{{'Apellido'}}</label>
                        <input type="text" name="surname" id="surname">
                        <br />
                        <br />
                        <label for="email">{{'Email del usuario'}}</label>
                        <input type="text" name="email" id="email">
                        <br />
                        <br />
                        <label for="email_verified_at">{{'Verificación email'}}</label>
                        <input type="text" name="email_verified_at" id="email_verified_at">
                        <br />
                        <br />
                        <label for="password">{{'Contraseña del usuario'}}</label>
                        <input type="password" name="password" id="password">
                        <br />
                        <br />
                        <label for="activated">{{'Activación:'}}</label>
                        <input type="radio" name="activated" value="1"> Activado
                        <input type="radio" name="activated" value="0"> Desactivado
                        <br />
                        <br />
                        <label for="type">{{'Tipo de usuario:'}}</label>
                        <input type="radio" name="type" value="ad"> Administrador
                        <input type="radio" name="type" value="us"> Usuario
                        <br />
                        <br />

                        <input type="submit" value="Crear" class="btn btn-info">

                        <a href="{{url('usuario')}}" class="btn btn-primary"> Volver</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop