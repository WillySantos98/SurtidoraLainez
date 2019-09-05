<div class="modal fade" id="ModalLotePlacas" tabindex="-1" role="dialog" aria-labelledby="ModalLotePlacas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lote de Placas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form action="{{route('placas.transferencia.aceptada.save')}}" method="post">
                    @csrf
                    <div id="ModalLotetitulo">

                    </div>
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th>Boleta</th>
                            <th>Placa</th>
                            <th>Chasis</th>
                            <th>Cliente</th>
                            <th>Viene Placa</th>
                        </tr>
                        </thead>
                        <tbody id="BodyModalLotePlacas">

                        </tbody>
                    </table>
                    <div id="PieModalLote">

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
