<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('index')}}">
        <div class="sidebar-brand-icon">
            <img class="img-profile rounded-circle" src="{{asset('logo2.png')}}" style="width: 100%; height: 100%;" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Surtidora Lainez</div>
    </a>
    <hr class="sidebar-divider my-0">
@if(Auth::user()->tipousuario_id == 1)
    @include('Index.componentes.Menu.MenuAdministrador')
@endif
@if(Auth::user()->tipousuario_id == 2)
    @include('Index.componentes.Menu.MenuFacturacion')
@endif
@if(Auth::user()->tipousuario_id == 3)
    @include('Index.componentes.Menu.MenuVendedor')
@endif
    @if(Auth::user()->tipousuario_id == 2)
        @include('Index.componentes.Menu.MenuSupervisor')
    @endif
@if(Auth::user()->tipousuario_id == 5)
    @include('Index.componentes.Menu.MenuContabilidad')
@endif
@if(Auth::user()->tipousuario_id == 6)
    @include('Index.componentes.Menu.MenuGerente')
@endif
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

