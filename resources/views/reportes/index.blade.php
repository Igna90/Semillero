@extends("layouts.principal")
@section('titulo')
Envio Reportes | Semillero
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
<h1 class="h3 mb-0 text-gray-800 text-center">Envio de reportes</h1>
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
                            <th>Titulo opinión</th>
                            <th>Número de likes</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse( $opiniones as $opinion)
                        @if($opinion->num_likes > 0)
                        <tr>

                            <td>{{ $opinion->headline}}</td>
                            <td>{{ $opinion->num_likes}} </td>
                            </td>

                        </tr>
                        @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>

                <br>
                <div  style="padding-left: 20px;">
                    <h5>Buscar por fecha:</h5>
                    @include('partials.errors')
                    <form action="{{route('descargarPDF')}}" method="get">
                        {{ csrf_field() }}
                        <label>De: </label>
                        <input type="date" name="fecha_de" id="fecha_de">
                        <label>A: </label>
                        <input type="date" name="fecha_a" id="fecha_a">
                        <input type="submit" value="Enviar reporte" style="margin-left: 450px; margin-bottom:40px" class="btn-success">

                    </form>
                </div>
                <br>
            </div>


            {{$opiniones->links()}}
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