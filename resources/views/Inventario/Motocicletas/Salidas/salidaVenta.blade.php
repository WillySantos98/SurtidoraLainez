@extends('Index.base')
@section('title', 'Salidas por Venta')
@section('content')
<div class="container-fluid" style="overflow-y: scroll; height: 600px">
    <h4 class="text-center">Salidas por Venta</h4>
    <hr>
    <form action="{{route('salida.save')}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <select class="form-control" required name="SelectVenta" id="">
                        <option value="">Tipo de Venta</option>
                        @foreach($tipo_venta as $info)
                            <option value="{{$info->id}}">{{$info->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-control" required name="SelectColaborador" id="">
                        <option value="">Colaborador Responsable</option>
                        @foreach($colaborador as $info)
                            <option value="{{$info->id}}">{{$info->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-control" required name="SelectSucursal" id="">
                        <option value="">Seleccione Sucursal de Venta</option>
                        @foreach($sucursal as $info)
                            <option value="{{$info->id}}">{{$info->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <input type="text" required name="CodVenta" class="form-control" placeholder="# de Venta" >
            </div>
            <div class="col">
                <input type="date" name="Fecha_Venta" class="form-control">
                <span>(Fecha de la Venta)</span>
            </div>
        </div>
        @include('Inventario.Motocicletas.Salidas.formulario')
    </form>

</div>
@endsection