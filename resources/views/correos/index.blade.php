@extends("layouts.principal")
@section('titulo')
Envio Correo | Semillero
@stop

@section('css')
<style>
    table.table .actions {
        width: 100px;
        text-align: center;
    }
</style>
@stop
@section('page-header')
<h1 class="h3 mb-0 text-gray-800 text-center">Envio de correos</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box" style="border:1px solid #d2d6de;">
            <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">
            </div>
            <div class="box-body table-responsive no-padding">
                <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre del Cliente</th>
                            <th>Apellidos</th>
                            <th>email</th>
                            <th>Selección</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th class="actions"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse( $usuarios as $usuario)
                        @if($usuario->type == 'Client')
                        <tr>

                            <td>{{ $usuario->name}}</td>
                            <td>{{ $usuario->surname}} </td>
                            <td>{{ $usuario->email}}</td>
                            <td class="actions">
                                <ul class="list-inline" style="margin-bottom:0px;">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="{{$usuario->id}}">
                                        </label>
                                    </div>
                            </td>

                        </tr>
                        @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            <form action="{{route('enviarEmail')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group" style="padding-left: 20px;">
                    <h4>Selección de productos:</h4>
                    <select name="productos">
                        @foreach($productos as $producto)
                        <option value="{{ $producto['name'] }}">{{ $producto['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group" style="padding-left: 20px;">
                    <h4>Asunto email:</h4>
                    <label for="asunto"></label>
                    <input type="text" name="asunto" size="64" />
                </div>
                <br>
                <div class="form-group" style="padding-left: 20px;">
                    <h4>Mensaje:</h4>
                    <label for="Mensaje"></label>
                    <textarea name="mensaje" placeholder="Envia la información del producto" cols="66" rows="5"></textarea>
                </div>
                <br>
                <br>
                <input type="submit" value="Enviar email" style="margin-left: 450px; margin-bottom:40px" class="btn-success">

            </form>
            {{$usuarios->links()}}
        </div>
    </div>
</div>
</div>
@stop

@section('js')
<script>
    (function($) {

        var table = $('.data-tables').DataTable({
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
        });
        //replace bool column to checkbox
        renderBoolColumn('#tbl', 'bool');
    })(jQuery);
</script>
@stop