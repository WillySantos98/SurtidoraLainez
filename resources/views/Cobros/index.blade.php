@extends('Index.base')
@section('title', 'Cobros - Reporte ')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color: white">

                <div >
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight">
                            <a href="{{route('cobros.index')}}">Volver Atras</a>
                        </div>
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h5 class="text-center text-gray-600">Reporte {{$cod}}</h5>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="">Calendario</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="InformacionReporte" data-toggle="tab" href="#DivInformacionpoReporte" role="tab" aria-controls="InformacionReporte"
                           aria-selected="true">Informacion del Reporte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="CuerpoReporte" data-toggle="tab" disabled href="#DivCuerpoReporte" role="tab" aria-controls="home"
                           aria-selected="true">Cuerpo del Reporte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="PromesasReporte" data-toggle="tab" href="#DivPromesasPagosReporte" role="tab" aria-controls="profile"
                           aria-selected="false">Promesas de Pago</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="VisitasReporte" data-toggle="tab" href="#DivVisitasReporte" role="tab" aria-controls="contact"
                           aria-selected="false">Visitas</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="DivInformacionpoReporte" role="tabpanel" aria-labelledby="InformacionReporte">
                        @include('Cobros.CuerpoInformacionReporte')
                    </div>
                    <div class="tab-pane fade" id="DivCuerpoReporte" role="tabpanel" aria-labelledby="CuerpoReporte">
                        @include('Cobros.CuerpoIndexReporte')
                    </div>
                    <div class="tab-pane fade" id="DivPromesasPagosReporte" role="tabpanel" aria-labelledby="PromesasReporte">
                        @include('Cobros.CuerpoPromesasPagosReporte')
                    </div>
                    <div class="tab-pane fade" id="DivVisitasReporte" role="tabpanel" aria-labelledby="VisitasReporte">3</div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    {!! Html::script('js/Cobros/cobros.js') !!}
@endsection


