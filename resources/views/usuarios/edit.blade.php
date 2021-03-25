@extends("layouts.principal")
@section('title')
Editar usuarios
@stop
@section('page-header')
<h1 class="h3 mb-0 text-gray-800 text-center">Edición de usuarios</h1>
@endsection
@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
                @include('partials.errors')
                <form action="{{ url('/usuario/' .$usuario->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <label for="name">{{'Nombre'}}</label>
                    <input type="text" name="name" id="name" value="{{$usuario->name}}" />
                    <br />
                    <br />
                    <label for="surname">{{'Apellido'}}</label>
                    <input type="text" name="surname" id="surname" value="{{$usuario->surname}}" />
                    <br />
                    <br />
                    <label for="email">{{'Email del usuario'}}</label>
                    <input type="text" name="email" id="email" value="{{$usuario->email}}" />
                    <br />
                    <br />
                    <label for="email_verified_at">{{'Verificación email'}}</label>
                    <input type="text" name="email_verified_at" id="email_verified_at" value="{{$usuario->email_verified_at}}" />
                    <br />
                    <br />
                    <label for="password">{{'Contraseña del usuario'}}</label>
                    <input type="password" name="password" id="password" value="{{$usuario->password}}" />
                    <br />
                    <br />
                    <label for="activated">{{'Activación:'}}</label>
                    <input type="radio" name="activated" value="0" {{ ($usuario->activated=="0")? "checked" : "" }}> Desactivado</input>
                    <input type="radio" name="activated" value="1" {{ ($usuario->activated=="1")? "checked" : "" }}> Activado</input>
                    <br />
                    <br />


                    <label for="type">{{'Tipo de usuario:'}}</label>
                    <input type="radio" name="type" value="ad" {{ ($usuario->type=="ad")? "checked" : "" }}> Administrador</input>
                    <input type="radio" name="type" value="us" {{ ($usuario->type=="us")? "checked" : "" }}> Usuario</input>
                    <br />
                    <br />
                    <input type="submit" value="Editar" class="btn btn-info">
                    <a href="{{url('usuario')}}" class="btn btn-primary"> Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop