$(document).ready(function () {
    axios.get('/cajas/consulta').then(
        function (abonos) {
            $("#SpinnerCalendarioCaja").hide();
            $("#calendarioCaja").fullCalendar({
                defaultView: 'basicDay',
                header:{
                    left:'title',
                    center:'',
                    right:'month,basicWeek,basicDay,prev,next',
                },
                dayClick:function (date, jsEvent, view) {

                },
                eventLimit: true,
                views:{
                    eventLimit:4
                },
                events: abonos.data,
                // eventClick:function (calEvent,jsEvent, view) {
                //     alert(calEvent)
                // }

            });
        }
    )
})
