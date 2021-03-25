@extends('layouts.principal')
@section('title')
Permisos
@stop
@section('content')
<div class="content">
    <!-- 404 Error Text -->
    <div class="error-page">
        <h2 class="headline text-yellow">9</h2>
        <h3><i class="fa fa-warning text-yellow"></i>Página no disponible.</h3>
        <p>Permisos insuficentes</p>
    </div>
    
</div>
<div class="callout callout-warning" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Nota: </h4>
            <p>
            Necesitas más privilegios para acceder a este contenido.
            Puedes retroceder a <a href="{{ url('/') }}">la página principal</a> o usando el menú.
            </p>
        </div>
@stop