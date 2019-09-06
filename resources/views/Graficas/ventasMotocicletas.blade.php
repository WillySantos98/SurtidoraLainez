<div class="container" style="margin-top: 10px">
    <div class="row">
        <div class="col-md-8">
            <canvas id="ReporteMarcas-1" style="width: 80%; height: 80%"></canvas>
            <div id="ReporteMarcas-2-completo">
                <canvas id="ReporteMarcas-2" style="width: 80%; height: 80%"></canvas>
                <div class="d-flex justify-content-center">
                    @include('Graficas.Componentes.MenuMeses')
                </div>
            </div>
            <canvas id="ReporteMarcas-3" style="width: 80%; height: 80%"></canvas>
        </div>
        <div class="col">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action" disabled>Exportar a excel</button>
                <button type="button" class="list-group-item list-group-item-action" onclick="btnSeccionMarcas(1)">Ventas totales por marcas</button>
                <button type="button" class="list-group-item list-group-item-action" onclick="btnSeccionMarcas(2)">Ventas totales por marcas mensual</button>
                <button type="button" class="list-group-item list-group-item-action" onclick="btnSeccionMarcas(3)">Ventas totales por marcas anual</button>
                <button type="button" class="list-group-item list-group-item-action" >Descargar Grafico</button>
                <button type="button" class="list-group-item list-group-item-action" disabled>Generar Reporte PDF</button>

            </div>
        </div>
    </div>
</div>
<hr>
<p>Este reporte se pueden observar en las graficas todas las ventas que han tenido las motocicletas por marca.
    Si quiere ver el reporte en excel seleccione el boton de "Exportar a excel"
    que esta a la a la derecha del reporte.</p>
<hr>


