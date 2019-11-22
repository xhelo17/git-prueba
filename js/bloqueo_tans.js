

function guardar_evento()
{
    var Motivo = $("#cmb_motivo").val();
    var Evento = $("#cmb_tipoEvento").val();
    var F_inicio = document.getElementById("txt_fechaInicio").value;
    var H_inicio = $("#txt_horaInicio").val();
    var F_termino = $("#txt_fechaTermino").val();
    var H_termino = $("#txt_horaTermino").val();
    var Autorizado = $("#cmb_autorizado").val();
    var Cant_asis = $("#txt_cant_asis").val();
    var Per_inter = $("#cmb_personalIntervino").val();
    var Zona = $("#cmb_zona").val();
    var Comizaria = $("#cmb_comizaria").val();
    var Provincia = $("#cmb_provincia").val();

 
 if(Motivo != 0 && Evento !=0 && F_inicio !="" && H_inicio !="" && F_termino !="" && H_termino !="" && Autorizado !=0 && Cant_asis != "" && Cant_asis != 0 && Per_inter != 0 && Zona != 0 &&  Comizaria !=0 && Provincia !=0 )
 {
   $.post("funciones/ingresar_evento.php",{motivo:Motivo,evento:Evento,f_inicio:F_inicio,
          h_inicio:H_inicio,f_termino:F_termino,autorizado:Autorizado,h_termino:H_termino,
          cant_asis:Cant_asis,per_inter:Per_inter,zona:Zona,comizaria:Comizaria,provincia:Provincia},
          function(data){
            if(data==1){
                swal('Genial!','Todo salio bien!','success');
            }
          });
 }
 else{
     alert("Recuerda completar todos los campos, por favor");
 }

}