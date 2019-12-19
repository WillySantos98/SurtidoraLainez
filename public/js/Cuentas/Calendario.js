// var cal = new tui.Calendar('#calendar', {
//     defaultView: 'month', // monthly view option
//     taskView: true,
//     template: {
//         monthDayname: function (dayname) {
//             return '<span class="calendar-week-dayname-name">' + dayname.label + '</span>';
//         }
//     },
// });
// import { Calendar } from '@fullcalendar/core';
// import dayGridPlugin from '@fullcalendar/daygrid';
//
// document.addEventListener('DOMContentLoaded', function() {
//     var calendarEl = document.getElementById('calendar');
//
//     var calendar = new Calendar(calendarEl, {
//         plugins: [ dayGridPlugin ]
//     });
//
//     calendar.render();
// });


$(document).ready(function () {
    var pagos1 ;
    let fecha = new Date();
    axios.get('/calendario/abonos/'+fecha.getFullYear()+'/'+fecha.getMonth()).then(
        function (pagos) {
            $("#SpinnerCalendarioAbonos").hide();
            $("#calendar").fullCalendar({
                header:{
                    left:'title',
                    center:'',
                    right:'month,basicWeek,basicDay,today,prev,next',
                },
                dayClick:function (date, jsEvent, view) {
                    $("#ModalCalendario").modal();
                    $("#TituloModalCalendario").text("Dia " + date.format())
                    DatosModalFecha(date.format(), pagos);
                },
                eventLimit: true,
                views:{
                    eventLimit:4
                },
                events: pagos.data,
                // eventClick:function (calEvent,jsEvent, view) {
                //     alert(calEvent)
                // }

            });
            // $("#CuerpoCalendarioAbonos").show();
        }
    )

})

function DatosModalFecha(fecha, pagos) {
    let htmlBueno = '';
    let htmlAntes= '';
    let htmlLimite = '';
    for (let i = 0; i < pagos.data.length; i++){
        if (fecha === pagos.data[i].start){
            if (pagos.data[i].color === "#0BEC6A"){
                htmlBueno +=`
                <tr>
                    <td>${pagos.data[i].cuenta}</td>
                    <td>${pagos.data[i].title}</td>
                    <td><a href="">cuenta</a></td>
                </tr>
            `
            }
            if (pagos.data[i].color === "#F7A203"){
                htmlAntes +=`
                <tr>
                    <td>${pagos.data[i].cuenta}</td>
                    <td>${pagos.data[i].title}</td>
                    <td><a href="">cuenta</a></td>
                </tr>
            `
            }
            if (pagos.data[i].color === "#F70A03"){
                htmlLimite +=`
                <tr>
                    <td>${pagos.data[i].cuenta}</td>
                    <td>${pagos.data[i].title}</td>
                    <td><a href="">cuenta</a></td>
                </tr>
            `
            }
        }

        document.getElementById("ModalBodyFechaDiaPago").innerHTML = htmlBueno;
        document.getElementById("ModalBodyFechaDiaAnticipado").innerHTML = htmlAntes;
        document.getElementById("ModalBodyFechaDiaLimite").innerHTML = htmlLimite;
    }
}
