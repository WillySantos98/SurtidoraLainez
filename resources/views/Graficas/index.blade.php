@extends('Index.base')
@section('title', 'Reportes')
@section('content')
    <div class="container-fluid">
        <h4 class="text-center">Reportes de Surtidora Lainez</h4>
        <h6>Reportes de:</h6>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#MotocicletasVendidas" role="tab" aria-controls="home" aria-selected="true">Motocicletas Vendidas Por Marcas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#VentasPorEmpleado" role="tab" aria-controls="profile" aria-selected="false">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#VentasPorMes" role="tab" aria-controls="contact" aria-selected="false">Ventas por Mes</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="MotocicletasVendidas" role="tabpanel" aria-labelledby="home-tab">
                @include('Graficas.ventasMotocicletas')
            </div>
            <div class="tab-pane fade" id="VentasPorEmpleado" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="VentasPorMes" role="tabpanel" aria-labelledby="contact-tab">
                @include('Graficas.ventasMes')
            </div>
        </div>
    </div>


@endsection
