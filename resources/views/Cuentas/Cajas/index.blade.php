@extends('Index.base')
@section('title', 'Cajas')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight">
                        @include('Index.componentes.ButtonBack')
                    </div>
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <h3 class="text-center text-gray-600"><strong>Calendario de Caja</strong></h3>
                    </div>
                </div>
            </div>
            <div id="SpinnerCalendarioCaja">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                    </div>
                </div>
            </div>
            <div>
                <div class="row" style="padding: 4px">
                    <div class="col">
                    </div>
                    <div class="col-10"><div id="calendarioCaja"></div></div>
                    <div class="col"></div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    {!! Html::script('js/Cuentas/cajas.js') !!}
@endsection
