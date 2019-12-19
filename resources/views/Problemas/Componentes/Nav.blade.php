<nav class="uk-navbar-container " uk-navbar>

    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="{{route('problemas.index')}}">Sección de Documentación</a></li>
            <li>
                <a href="#">Problemas con el sistema</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="{{route('problemas.reporte')}}">Reportar</a></li>
                        <li><a href="#">Resumen de problemas</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">Documentación</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="{{route('documentacion.index')}}">Documentación</a></li>
                        <li><a href="{{route('documentacion.procesos')}}">Procesos</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                    </ul>
                </div>
            </li>
        </ul>

    </div>

    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav uk-text-bold">
            <li><a href="{{route('index')}}">Ir a SurtidoraLainez</a></li>
        </ul>

    </div>

</nav>

