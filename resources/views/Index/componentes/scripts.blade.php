{{--@include('Index.Menu')--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('js/peticionesProveedor.js')}}"></script>
<script src="{{asset('js/FormularioPlacas.js')}}"></script>
<script src="{{asset('js/peticionesConsignacion.js')}}"></script>
<script src="{{asset('js/FormularioRegistroCliente.js')}}"></script>
<script src="{{asset('js/peticiones/peticionesInventario.js')}}"></script>
<script src="{{asset('js/peticiones/Salidas.js')}}"></script>
<script src="{{asset('js/peticiones/transferencia.js')}}"></script>
<script src="{{asset('js/peticiones/TransferenciasInternas.js')}}"></script>
<script src="{{asset('js/peticiones/ConstanciaCirculacion.js')}}"></script>
<script src="{{asset('js/DocumentosEntradas.js')}}"></script>
<script src="{{asset('js/FormularioPlacas.js')}}"></script>
<script src="{{asset('js/PlacasInformacion.js')}}"></script>
<script src="{{asset('js/FormTransPlacas.js')}}"></script>
<script src="{{asset('js/ValidacionesFormularios/Validacion.js')}}"></script>
<script src="{{asset('js/ValidacionesFormularios/FormCliente.js')}}"></script>
<script src="{{asset('js/ValidacionesFormularios/FormRegistroMoto.js')}}"></script>
<script src="{{asset('js/LotesPlacas.js')}}"></script>
<script src="{{asset('js/ValidacionesFormularios/FormEntregaPlaca.js')}}"></script>
<script src="{{asset('js/ValidacionesFormularios/FormSalida.js')}}"></script>
<script src="{{asset('js/ValidacionesFormularios/FormRegistroEntrada2.js')}}"></script>
<script src="{{asset('Urls/urls.js')}}"></script>
<script src="{{asset('js/MenuReportes.js')}}"></script>
<script src="{{asset('Reportes/VentasMes.js')}}"></script>
<script src="{{asset('js/ValidacionesFormularios/FormPrecioModelos.js')}}"></script>

<script>

function UrlBack() {
    window.history.back();
}
</script>

<script src="{{asset('js/app.js')}}"></script>
<script>
    @if(session('error'))
        Command: toastr["error"]("{{session('error')}}");
    @endif
        @if(session('aprobado'))
        Command: toastr["success"]("{{session('aprobado')}}");
    @endif





</script>
