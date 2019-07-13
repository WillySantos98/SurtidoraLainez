@extends('Index.base')
@section('title', 'Transferencias')
@section('content')
    @include('Inventario.Motocicletas.Documentos.encabezado')
    <hr>
    <h4 class="text-center">Transferencias Pendientes</h4>
 <div class="container-fluid">
     <table class="table table-sm">
         <thead>
            <tr>
                <th># de Transferencia</th>
                <th>Almacen de Salida</th>
                <th>Fecha Solicitada</th>
                <th>Transferencia</th>
            </tr>
         </thead>
         <tbody id="bodyTable">
            @foreach($transferencia as $info)
                <tr>
                    <td>{{$info->cod_transferencia}}</td>
                    <td>{{$info->nombre_suc}}</td>
                    <td>{{$info->fecha_solicitada}}</td>
                    <td><a href="/inventario/motocicletas/documentos/transferencias_internas/{{$info->cod_transferencia}}">ver Transferencia</a></td>
                </tr>
            @endforeach
         </tbody>
     </table>
 </div>
@endsection