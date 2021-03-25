@extends('layouts.principal')
@section('title')
Perfil
@stop
@section('page-header')
<h1 class="h3 mb-0 text-gray-800">Perfil del usuario conectado: </h1>
@stop
@section('content')
<div class="col-md-3">
    <div class="box box-primary">
        <div class="box-body box-profile">
            <h3 class="profile-username text-center">{{auth()->user()->firstname}}</h3>
            <p class="text-muted text-center">{{auth()->user()->name}}</p>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item"><b>{{'Telefono'}}</b><a class="pull-right">{{auth()->user()->phone}}</a></li>
                <li class="list-group-item"><b>{{'email'}}</b><a class="pull-right">{{auth()->user()->email}}</a></li>
                <li class="list-group-item"><b>{{'Tipo de cuenta'}}</b><a class="pull-right">{{auth()->user()->type}}</a></li>
            </ul>
        </div>
    </div>
</div>
@stop