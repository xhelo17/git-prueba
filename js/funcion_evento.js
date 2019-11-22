jQuery('#txt_carabinero_nro_parte').keypress(function (tecla) //BLOQUEA  la letra e en el input number
{
  if (tecla.charCode < 48 || tecla.charCode > 57) return false;
});


$("#nav-detenidos-tab").hide();
$("#nav-personas-tab").hide();
$("#nav-carabineros-tab").hide();
$("#nav-daños-tab").hide();


function guardar_evento()//Funcion que "GUARDA" nuevos eventos 
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
    var Descripcion = $("#txt_descripcion_evento").val();
 if(Motivo != 0 && Evento !=0 && F_inicio !="" && H_inicio !="" && F_termino !="" && H_termino !="" && Autorizado !=0 && Cant_asis != "" && Cant_asis != 0 && Per_inter != 0 && Zona != 0 &&  Comizaria !=0 && Provincia !=0 )
 {
    if (Descripcion!="")
    {
      $.post("funciones/ingresar_evento.php",{motivo:Motivo,evento:Evento,f_inicio:F_inicio,
        h_inicio:H_inicio,f_termino:F_termino,autorizado:Autorizado,h_termino:H_termino,
        cant_asis:Cant_asis,per_inter:Per_inter,zona:Zona,comizaria:Comizaria,provincia:Provincia,
        descripcion:Descripcion},
        function(data){
          if(data==1)
          {
              swal('Genial!','Todo salio bien!','success');
              $("#nav-detenidos-tab").show();
              $("#nav-personas-tab").show();
              $("#nav-carabineros-tab").show();
              $("#nav-daños-tab").show();
             
          }
          else
          {
            swal('Oops...!','Algo no dejo guardar los eventos!','error');
          }
        }); 
    } 
    else
    {
      swal('Recuerda!','Debes poner la descripcion del evento ej: marcha de profesores por sueldo.','info');
    }
 }
 else{
     swal('Recuerda!','Debes completar todos los campos para poder guardar el evento.','info');
    
 }

}//Fin de Funcion que "GUARDA" nuevos eventos 

function guardar_detenidos()//Funcion que "GUARDA" nuevos detenidos 
{
  var Detenido_evento = $("#cmb_detenido_evento").val();
  var Detenido_edad = $("#txt_edad_detenido").val();
  var Detenido_genero = $("#cmb_detenido_genero").val();
  var Detenido_motivo = $("#cmb_detenido_motivo").val();
  var Detenido_lesiones = $("#cmb_detenido_lesiones").val();
  var Detenido_nro_parte = $("#txt_detenido_nro_parte").val();

  if (Detenido_evento !=0 &&  Detenido_genero !=0 && Detenido_motivo !=0 && Detenido_lesiones !=0 && Detenido_nro_parte!=""&& Detenido_nro_parte>-1 ) 
  {
      if (Detenido_edad >-1 && Detenido_edad!="" && Detenido_edad<150) {
        $.post("funciones/ingreso_detenido.php",{detenido_evento:Detenido_evento,detenido_edad:Detenido_edad,
              detenido_genero:Detenido_genero,detenido_motivo:Detenido_motivo,detenido_lesiones:Detenido_lesiones,
              detenido_nro_parte:Detenido_nro_parte},
              function(data){
                  if (data ==1) 
                  {
                    swal('Genial!','Todo salio bien!','success');
                    
                   
                  }
                  else
                  {
                    swal('Oops...!','Algo no dejo guardar los eventos!','error');
                  }
              });
        
      } 
      else 
      {
        swal('Recuerda!','El campo edad no debe ser inferior a "0" y mayor "150".','info');
      }
  } 
  else 
  {
    swal('Recuerda!','Debes completar todos los campos de forma correcta para poder guardar al detenido.','info');
  }
}//Fin de Funcion que "GUARDA" nuevos eventos 



function guardar_perso_lesionadas()//Funcion que "GUARDA" nuevas personas lesionadas 
{
  var Persona_evento = $("#cmb_persona_evento").val();
  var Persona_edad = $("#txt_persona_edad").val();
  var Persona_genero = $("#cmb_persona_genero").val();
  var Persona_lesiones = $("#cmb_persona_lesiones").val();
  var Persona_causa = $("#cmb_persona_causa").val();
  var Persona_motivo = $("#cmb_persona_motivo").val();
  var Persona_nro_parte = $("#txt_persona_nro_parte").val();

  if (Persona_evento!=0 && Persona_genero!=0 && Persona_lesiones!=0 && Persona_causa!=0 && Persona_motivo!=0 && Persona_nro_parte>-1)
  {
    if (Persona_edad >-1 && Persona_edad<150 && Persona_edad!="") 
    {
      $.post("funciones/ingreso_perso_lesionada.php",{persona_evento:Persona_evento,persona_edad:Persona_edad,
            persona_genero:Persona_genero,persona_lesiones:Persona_lesiones,persona_causa:Persona_causa,
            persona_motivo:Persona_motivo,persona_nro_parte:Persona_nro_parte},
      function(data){
        if (data==1)
        {
          swal('Genial!','Todo salio bien!','success');
          
        }
        else
        {
          swal('Oops...!','Algo no dejo guardar los eventos!','error');
        }
      });
    }
    else
    {
      swal('Recuerda!','El campo edad no debe ser inferior a "0" y mayor "150".','info');  
    }
  } 
  else
  {
    swal('Recuerda!','Debes completar todos los campos de forma correcta para poder guardar a la persona lesionada.','info');
  }
}//Fin de Funcion que "GUARDA" nuevas personas lesionadas 


function guardar_carabinero()//Funcion que "GUARDA" nuevas carabinero lesionadas 
{
  var Carabinero_evento = $("#cmb_carabinero_evento").val();
  var Carabinero_codigo = $("#txt_carabinero_codigo").val();
  var Carabinero_lesiones = $("#cmb_carabinero_lesiones").val();
  var Carabinero_motivo = $("#cmb_carabinero_motivo").val();
  var Carabinero_nro_parte = $("#txt_carabinero_nro_parte").val();

  if (Carabinero_evento!=0 && Carabinero_codigo!="" && Carabinero_lesiones!=0 && Carabinero_motivo!=0 && Carabinero_nro_parte>=0 && Carabinero_nro_parte!="") 
  {
    $.post("funciones/ingresar_carabinero.php",{carabinero_evento:Carabinero_evento,
      carabinero_codigo:Carabinero_codigo,carabinero_lesiones:Carabinero_lesiones,
      carabinero_motivo:Carabinero_motivo,carabinero_nro_parte:Carabinero_nro_parte},
    function(data)
    {
        if (data == 1)
        {
          swal('Genial!','Todo salio bien!','success');

        }
        else
        {
          swal('Oops...!','Algo no dejo guardar los eventos!','error'); 
        }
    });
  }
  else
  {
    swal('Recuerda!','Debes completar todos los campos de forma correcta para poder guardar al carabinero lesionado.','info');
  }
 
}//Fin de Funcion que "GUARDA" nuevas personas lesionadas 

function guardar_daños()//Funcion que "GUARDA" nuevos daños
{
  var Daños_lesiones = $("#cmb_daños_lesiones").val();
  var Daños_motivo = $("#cmb_daños_motivo").val();
  if (Daños_lesiones!=0 && Daños_motivo!=0)
  {
    $.post("funciones/ingreso_danos.php",{daños_lesiones:Daños_lesiones,daños_motivo:Daños_motivo},
    function(data)
    {
      if (data == 1)
      {
        swal('Genial!','Todo salio bien!','success');
      }
      else
      {
        swal('Oops...!','Algo no dejo guardar los eventos!','error'); 
      }
    });  
  }
  else
  {
    swal('Recuerda!','Debes completar todos los campos de forma correcta para poder guardar los daños.','info');
  }
}//Fin de Funcion que "GUARDA" nuevos daños


