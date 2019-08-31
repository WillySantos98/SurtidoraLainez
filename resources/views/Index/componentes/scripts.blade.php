
<script src="{{ asset('css/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('css/vendor/jquery-easing/jquery.easing.min.js')}}"></script>



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

<script>
function UrlBack() {
    window.history.back();
}
</script>

<script src="{{asset('js/app.js')}}"></script>
<script>
    @if(session('error'))
    new Noty({
        type: 'error',
        layout: 'topRight',
        text: '{{session('error')}}'+'Para desaparecer la advertencia haga click aca.',
        animation:{
            speed: 500,
        }
    }).show();
    @endif

</script>
