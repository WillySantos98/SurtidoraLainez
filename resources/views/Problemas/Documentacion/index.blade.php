@extends('Problemas.index')
@section('title','SL-Documentacion')
@section('content-p')
<h3 class="uk-text-center uk-text-bold">Documentación</h3>
<hr>
<div style="overflow-y: scroll;height: 600px;width: 25%">
    @include('Problemas.Documentacion.Componentes.Menu')
</div>

@endsection
