
$( function() {
    $( "#txt_fechaInicio" ).datepicker({
    dateFormat: "yy-mm-dd",
    dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
    dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
    dayNamesShort: [ "Dom", "Lun", "Mar", "Mir", "Jue", "Vie", "Sab" ],
    duration: "slow",
    monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
    monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
    prevText: "Previo",
    nextText:	"Siguiente",
    showAnim: "slideDown",
    showOn: "both",
    });

    $( "#txt_fechaTermino" ).datepicker({
        dateFormat: "yy-mm-dd",
        dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        dayNamesShort: [ "Dom", "Lun", "Mar", "Mir", "Jue", "Vie", "Sab" ],
        duration: "slow",
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
        prevText: "Previo",
        nextText:	"Siguiente",
        showAnim: "slideDown",
        showOn: "both",
    });



        $(function () {
            $('#txt_horaInicio').datetimepicker({
                format: 'LT'
            });
        });


});
