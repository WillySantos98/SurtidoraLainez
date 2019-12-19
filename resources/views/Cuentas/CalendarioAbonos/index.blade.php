@extends('Index.base')
@section('title', 'Calendario de Abonos')
@section('content')



  <div class="container">

      <div class="card">
          <div class="card-header">
              <div class="d-flex bd-highlight">
                  <div class="p-2 bd-highlight">
                      @include('Index.componentes.ButtonBack')
                  </div>
                  <div class="p-2 flex-grow-1 bd-highlight">
                      <h3 class="text-center text-gray-600"><strong>Calendario de Abonos Pendientes</strong></h3>
                  </div>
              </div>
          </div>
          <div id="SpinnerCalendarioAbonos">
              <div class="d-flex justify-content-center">
                  <div class="spinner-border" role="status">
                  </div>
              </div>
          </div>
          <div id="CuerpoCalendarioAbonos">
              <div class="row" style="padding: 4px">
                  <div class="col">
                  </div>
                  <div class="col-10"><div id='calendar'></div></div>
                  <div class="col"></div>
              </div>
          </div>
      </div>
  </div>


  <div class="modal fade" id="ModalCalendario" tabindex="-1" role="dialog" aria-labelledby="ModalCalendario" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="TituloModalCalendario"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <h6>Pagos el dia de hoy</h6>
                  <table class="table table-sm table-bordered">
                      <thead>
                        <tr>
                            <td>Cuenta</td>
                            <td>Nombre Completo</td>
                            <td>Ir a cuenta</td>
                        </tr>
                      </thead>
                      <tbody id="ModalBodyFechaDiaPago">

                      </tbody>
                  </table>

                  <h6>Pagos con 3 dias de anticipacion</h6>
                  <table class="table table-sm table-bordered">
                      <thead>
                      <tr>
                          <td>Cuenta</td>
                          <td>Nombre Completo</td>
                          <td>Ir a cuenta</td>
                      </tr>
                      </thead>
                      <tbody id="ModalBodyFechaDiaAnticipado">

                      </tbody>
                  </table>
                  <h6>Pagos que son el dia limite</h6>
                  <table class="table table-sm table-bordered">
                      <thead>
                      <tr>
                          <td>Cuenta</td>
                          <td>Nombre Completo</td>
                          <td>Ir a cuenta</td>
                      </tr>
                      </thead>
                      <tbody id="ModalBodyFechaDiaLimite">

                      </tbody>
                  </table>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
          </div>
      </div>
  </div>
@endsection
@section('js')
    {!! Html::script('js/Cuentas/Calendario.js') !!}
@endsection


