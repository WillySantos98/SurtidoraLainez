@extends('Problemas.index')
@section('title','SL-Reportar Problema')
@section('content-p')
    <div  class="uk-flex uk-flex-center" style="margin:10px">
        <div class="uk-box-shadow-small uk-box-shadow-hover-large uk-padding uk-width-1-2 ">
            <form class="uk-form-stacked" method="post" action="{{route('problemas.reporte.save')}}">
                @csrf
                <legend class="uk-legend uk-text-center uk-text-bold">Formulario para reportar un problema con el sistema</legend>
                <div class="uk-margin">
                    <label class="uk-form-label">Pegar la url del error</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" name="url" type="text" placeholder="http://surtidoralainez.com/seccion_documentacion/reportar_problema">
                    </div>
                    <div class="uk-inline">
                        <button class="uk-button uk-button-default" type="button">Obtener la url de la pagina del error</button>
                        <div uk-drop>
                            <div class="uk-card uk-card-body uk-card-default">
                                Dirigite a la pagina donde ocurre el error. La url es donde aparece la direccion de la pagina web. Normalmente esta en la parte superior.
                                Cuando la identifiques haz click sobre ella presionas Ctrl+a y se pondra en azul toda la url,
                                luego presionas Ctrl+C y ya tienes la url copiada, luego te diriges al campo de arriba donde se
                                te pide la url y presionas Ctrl+v y la url se te pegara en el campo.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label">Descripción del problema</label>
                    <span>Tiene que detallar todo los movimientos que hizo antes de que se presentasra el problema. Si le dio click a un boton cuantas veces le dio click.</span>
                    <div class="uk-form-controls">
                        <textarea name="Descipcion" id="" class="uk-textarea" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="uk-margin">
                    <button class="uk-button uk-button-primary">Reportar Error</button>
                </div>


            </form>
        </div>
    </div>
@endsection
