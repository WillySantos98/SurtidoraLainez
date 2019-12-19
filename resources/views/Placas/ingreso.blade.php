@extends('Index.base')
@section('title', 'Ingreso de Placa')
@section('content')
<div class="container-fluid">

    @include('Index.componentes.status')
<div class="d-flex justify-content-center">
    <div class="card w-100">
        <div class="card-header">
            <h4 class="text-center">Ingreso de Boleta de Matricula</h4>
        </div>
        <form action="{{route('placas.save')}}" enctype="multipart/form-data" method="post" id="FormularioPlacas" >
            @csrf
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="">Numero de Boleta</label>
                            <input id="FormularioPlacas-NumeroBoleta" required type="text" maxlength="7" class="form-control @error('NumeroBoleta') is-invalid @enderror" name="NumeroBoleta">
                            @error('NumeroBoleta')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group" >
                            <label for="">Comprobante</label>
                            <input id="FormularioPlacas-Comprobante" required maxlength="11" type="text" class="form-control @error('Comprobante') is-invalid @enderror" name="Comprobante">
                        </div>
                        @error('Comprobante')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="">Fecha de Vencimiento</label>
                            <input type="date" required class="form-control @error('FechaVencimiento') is-invalid @enderror" name="FechaVencimiento" id="FormularioPlacas-FechaVencimiento">
                        </div>
                        @error('FechaVencimiento')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label>Placa No.</label>
                            <input type="text" required class="form-control @error('Placa') is-invalid @enderror" name="Placa" maxlength="7" id="FormularioPlacas-Placa">
                        </div>
                        @error('Placa')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label>Identificacion</label>
                            <input type="text" required maxlength="14" class="form-control @error('Identificacion') is-invalid @enderror" name="Identificacion" id="FormularioPlacas-Identificacion">
                        </div>
                        @error('Identificacion')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="row">

                    <div class="col-auto">
                        <div class="form-group">
                            <label>Propietario</label>
                            <input type="text" required class="form-control @error('Propietario') is-invalid @enderror" name="Propietario" id="FormularioPlacas-Propietario">
                        </div>
                        @error('Propietario')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label>Año</label>
                            <input type="number" required maxlength="4" class="form-control @error('Año') is-invalid @enderror" name="Año" id="FormularioPlacas-Ano" >
                        </div>
                        @error('Año')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="">Numero de Entrada</label>
                            <input type="text" placeholder="Numero que trae la factura de entrega" name="NumGuia" class="form-control">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="">Precio de la Matricula</label>
                            <input type="text" name="PrecioMatricula" class="form-control" placeholder="Precio de la matricula">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="">Motocicleta</label>
                            <button type="button" class="btn btn-outline-warning form-control" data-toggle="modal" data-target="#ModalVincularMoto" >
                                Motocicleta
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="padding: 10px">
                <div class="col">
                    <div class="form-group">
                        <label for="">Observaciones</label>
                        <input type="text" name="Observacion" class="form-control" value="Sin Observaciones" id="FormularioPlacas-Observaciones">
                    </div>
                </div>
            </div>

            <div class="row" style="padding: 10px">
                <div class="col">
                    <strong>*¿La boleta de matricula trae placa?</strong>
                </div>
                <div class="col-sm-2">
                    SI
                    <input type="radio" name="RadioOpcion" value="1" required>
                </div>
                <div class="col">
                    NO
                    <input type="radio" name="RadioOpcion" value="2">
                </div>
            </div>


            <div class="row" style="padding: 10px">
                <div class="col">
                    <div class="card-header text-center" style="margin-top: 20px">
                        <div class="row">
                            <div class="col">CARACTERISTICAS DEL VEHICULO</div>
                            <div class="col">DATOS DEL CLIENTE</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">MARCA:</strong> <strong id="BoletaMarca"></strong>
                        </div>
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">NOMBRES:</strong> <strong id="BoletaNombres"></strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">MODELO:</strong> <strong id="BoletaModelo"></strong>
                        </div>
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">APELLIDOS:</strong> <strong id="BoletaApellidos"></strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">TIPO:</strong> <input type="text" name="TipoVehiculo" required id="FormularioPlacas-TipoVehiculo"
                                                                                                          value="MOTOCICLETA">
                        </div>
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">IDENTIDAD:</strong> <strong id="BoletaIdentidad"></strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">COLOR:</strong> <strong id="BoletaColor"></strong>
                        </div>
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">RTN:</strong> <strong id="BoletaRtn"></strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">MOTOR:</strong> <strong id="BoletaMotor"></strong>
                        </div>
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">SUCURSAL VENTA:</strong> <strong id="BoletaSucursal"></strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">CHASIS:</strong> <strong id="BoletaChasis"></strong>
                            <div id="BoletaInputIdMoto"></div>
                            <div id="BoletaInputIdVenta"></div>
                            <div id="BoletaInputIdSucursal"></div>
                            <input type="text" name="Usuario" value="{{Auth::User()->id}}" hidden>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">AÑO:</strong> <strong id="BoletaAno"></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <strong style="background-color: #dda20a; color: white">CIL:</strong> <strong id="BoletaCil"></strong>
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Seleccione almacen de entrada</label>
                                <select name="SelectAlmacen" id="" required class="form-control">
                                    <option value="#">------</option>
                                    @foreach($almacenes as $almacen)
                                        <option value="{{$almacen->id}}">{{$almacen->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Fotos de la Placa</label>
                                <input type="file" multiple name="FilePlaca[]" class="form-control @error('FilePlaca') is-invalid @enderror">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Fotos de la Boleta</label>
                                <input type="file" multiple name="FileBoleta[]"  value="Fotos de la Boleta" class="form-control @error('FileBoleta') is-invalid @enderror">
                            </div>
                            @error('FileBoleta')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            <hr>

            <div class="row" style="padding: 10px">
                <div class="col">
                    <button type="submit" class="btn btn-outline-success" >Ingresar Boleta</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade bd-example-modal-xl" id="ModalVincularMoto" tabindex="-1" role="dialog" aria-labelledby="ModalVincularMotoMoto" aria-hidden="true">
    @include('Placas.Modals.ModalBuscarMoto')
</div>
@endsection
