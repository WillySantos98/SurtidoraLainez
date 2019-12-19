@extends('Index.base')
@section('title', 'Revision Posteo')
@section('content')
<div class="container card">
    <div class="card-header" style="background-color: white">
       <h3 class="text-center"><strong>Cuenta {{$cuenta}} posteada</strong></h3>
    </div>
    <div class="row" style="margin-top: 5px">
        <div class="col-auto">
            <h5 class="text-center">Tareas realizadas</h5>
            <div class="alert alert-success" role="alert">
                Recibo creado satisfactoriamente
            </div>
            <div class="alert alert-success" role="alert">
                Saldo actual de la cuenta actualizado correctamente
            </div>
            <div class="alert alert-success" role="alert">
                Moras revisadas correctamente
            </div>
            <div class="alert alert-success" role="alert">
                Pagos revisados correctamente
            </div>
            <div class="alert alert-success" role="alert">
                Estado de cuenta modificado correctamente
            </div>
            <div class="alert alert-success" role="alert">
                Creacion de recibo
            </div>
        </div>
        <div class="col-auto">
            <h5 class="text-center">Recibo</h5>
            <iframe src="/cuenta/posteo/{{$cuenta}}/{{$recibo_id}}" width="600" height="400">

            </iframe>
        </div>
    </div>
</div>
@endsection
{{--@section('js')--}}
{{--    {!! Html::script('js/Cuentas/Posteo.js') !!}--}}
{{--@endsection--}}
