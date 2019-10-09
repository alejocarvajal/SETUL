<?php
include_once("funciones.php");
llamado_jquery();
llamado_bootstrap();
llamado_noty();
global $conexion;

if(!$_REQUEST['id']){
	redireccionar("index.php");
	die();
}
$fondo=consultar_datos_db($conexion,"valor","configuracion","nombre='fondo_juego'");

$orden_pregunta=consultar_datos_db($conexion,"pregunta_id,orden","registro_juego","estado=1 and respuesta_id is null and participante_id=".$_REQUEST['id']." order by orden asc");

$pregunta=consultar_datos_db($conexion,"a.id as idpregunta,b.id as idrespuesta,b.respuesta as nombre,a.pregunta, b.correcta","preguntas a, respuestas b","a.id=b.pregunta_id and a.id=".$orden_pregunta['pregunta_id'][0]." order by rand()");
if($pregunta['correcta'][0]==1){
	insertar_datos_db("update registro_juego set letra_correcta='A' where pregunta_id=".$pregunta['idpregunta'][0]." and estado=1 and participante_id=".$_REQUEST['id']."");
}
if($pregunta['correcta'][1]==1){
	insertar_datos_db("update registro_juego set letra_correcta='B' where pregunta_id=".$pregunta['idpregunta'][1]." and estado=1 and participante_id=".$_REQUEST['id']."");
}
if($pregunta['correcta'][2]==1){
	insertar_datos_db("update registro_juego set letra_correcta='C' where pregunta_id=".$pregunta['idpregunta'][2]." and estado=1 and participante_id=".$_REQUEST['id']."");
}
if($pregunta['correcta'][3]==1){
	insertar_datos_db("update registro_juego set letra_correcta='D' where pregunta_id=".$pregunta['idpregunta'][3]." and estado=1 and participante_id=".$_REQUEST['id']."");
}
$puntuacion='';

$tabla_ayuda='<table id="tabla_ayuda" class="table table-bordered"><tbody>
<tr style="background-image: url(\''.$fondo['valor'][0].'\');"><th colspan="3">Ayudas</th></tr>
<tr>
<td><span class="puntajes" id="llamada" onclick="usar_llamada()">Ayuda de un amigo<span></td>
<td><span class="puntajes" id="elimina" onclick="usar_elimina()">50/50</span></td>
<td><span>...</span></td>
</tr></tbody></table>';
?>
<style xmlns="http://www.w3.org/1999/html">

body{
background: url(<?php echo($fondo['valor'][0]);?>) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}


th {
	color:white;
}

#tabla_respuesta, #tabla_ayuda, #texto_pregunta{
	font-size:21px;
	font-weight: bold;
	font-family:seryf;
	color: #333;
	border-collapse: separate;
  	border-spacing: 10px;
}

.tr_respuesta:hover {
	background-color: #28B463;
  	cursor: pointer;
  	color: white;
}

.td, span  {
	font-size: 19px;
}
.tr_respuesta, .puntajes {
 background-color: #f2f2f2;
 font-size: 15px;
}

.progress-bar-vertical {
  margin-top: 30px;
  width: 90px;
  min-height: 370px;
  display: flex;
  align-items: flex-end;
  margin-right: 20px;
  float: left;
  
}

.progress-bar-vertical .progress-bar {
  width: 100%;
  height: 0;
  -webkit-transition: height 0.6s ease;
  -o-transition: height 0.6s ease;
  transition: height 0.6s ease;
}

.reloj{
	float: left;
	font-size: 80px;
	font-family: seryf;
	color: white;
}	

</style>
<link href="css/estilo_botones.css" rel="stylesheet">
<html>
<body>
<audio id="suspenso" autoplay loop>
   <source src="audio/musica-suspenso-.mp3" type="audio/mp3" />
</audio>
<audio id="seleccion">
   <source src="audio/seleccion.mp3" type="audio/mp3" />
</audio>	
<div class="global">
<table id="estructura" border="0">
	<tr>
	<td style="width:10%">
	<div class="progress progress-bar-vertical">
	    <div class="progress-bar progress-bar-striped progress-bar-success active" id="barra" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 1%;">
	    1%</div>   		
	  </div>
  	</td>
  	<td style="width:80%">
	<div class="div_preguntas">
		<form action="preguntas.php" method="post">
			<div style="padding-top: 1em;">
		  		<div class="panel panel-default">
		    		<div class="panel-heading" style="background-image: url(<?php echo($fondo['valor'][0]);?>); color:white; font-weight: bold">Pregunta #<span id="contador_pregunta">1<span></div>
					<table id="tabla_respuesta" class="table">
					<tbody>
					<caption align="top"><center><span id="texto_pregunta"><?php echo($pregunta['pregunta'][0]);?></span></center></caption>
		    		<tr id="<?php echo($pregunta['idrespuesta'][0]);?>" onclick="verificar_respuesta(<?php echo($pregunta['idrespuesta'][0]);?>)" class="contenido2 respuesta tr_respuesta" >
		      			<td>      				
							<span id="texto_r1">A) <?php echo($pregunta['nombre'][0]);?></span>					
						</td>
		    		</tr>
				    <tr id="<?php echo($pregunta['idrespuesta'][1]);?>" onclick="verificar_respuesta(<?php echo($pregunta['idrespuesta'][1]);?>)" class="contenido3 respuesta tr_respuesta">
				      	<td>
				      		<span id="texto_r2">B) <?php echo($pregunta['nombre'][1]);?></span>
						</td>
				    </tr>
				    <tr id="<?php echo($pregunta['idrespuesta'][2]);?>" onclick="verificar_respuesta(<?php echo($pregunta['idrespuesta'][2]);?>)" class="contenido4 respuesta tr_respuesta">
				      	<td>		      		
							<span id="texto_r3">C) <?php echo($pregunta['nombre'][2]);?></span>
						</td>
				    </tr>
				    <tr id="<?php echo($pregunta['idrespuesta'][3]);?>" onclick="verificar_respuesta(<?php echo($pregunta['idrespuesta'][3]);?>)" class="contenido5 respuesta tr_respuesta">
				      	<td>	      		
							<span id="texto_r4">D) <?php echo($pregunta['nombre'][3]);?></span>
						</td>
				    </tr>   
		  			</tbody>
					</table>
					<?php echo($tabla_ayuda);?>
		  		</div>
			</div>		
			<input type="hidden" id="pregunta" name="pregunta" value="<?php echo(($orden_pregunta['pregunta_id'][0]))?>">
			<input type="hidden" id="id" name="id" value="<?php echo($_REQUEST['id'])?>">
			<input type="hidden" id="consecutivo" name="consecutivo" value="1">
			<input type="hidden" id="cantidad_preguntas" name="consecutivo" value="<?php echo($orden_pregunta["numcampos"]
)?>">
<audio id="aplausos">
   <source src="audio/aplausos.mp3" type="audio/mp3" />
</audio>
<audio id="error">
   <source src="audio/error.mp3" type="audio/mp3" />
</audio>			
		</form>
	</div>
	</td>

	<td style="width:10%">

		<span style="color:white; font-weight:bold; font-family:seryf;">&nbsp;&nbsp;TIEMPO</span>
		<div class="reloj" id="Segundos">&nbsp;00</div>
		<div class="reloj" id="Centesimas">&nbsp;00</div>
		<input type="button" class="boton btn btn-success" id="inicio" value="Comenzar &#9658;" onclick="inicio();"><br><br>
        <input type="button" class="boton btn btn-info"id="reiniciar_partida" onclick="reiniciar_partida()" value="Reiniciar Partida &#9658;">
	</td>
	</tr>
	</table>
</div>	
</body>
</html>
<script>
var responder=0;
var centesimas = 0;
var segundos = 0;
var minutos = 0;
var horas = 0;
function inicio () {
	responder=1;
	$("#inicio").hide();
	control = setInterval(cronometro,10);
}
function parar () {
	clearInterval(control);
}
function reinicio () {
	responder=0;
	$("#inicio").show();
	clearInterval(control);
	centesimas = 0;
	segundos = 0;
	minutos = 0;
	horas = 0;
	Centesimas.innerHTML = "&nbsp;00";
	Segundos.innerHTML = "&nbsp;00";
}
function cronometro () {
	if (centesimas < 99) {
		centesimas++;
		if (centesimas < 10) { centesimas = "0"+centesimas }
		Centesimas.innerHTML = "&nbsp;"+centesimas;
	}
	if (centesimas == 99) {
		centesimas = -1;
	}
	if (centesimas == 0) {
		segundos ++;
		if (segundos < 10) { segundos = "0"+segundos }
		Segundos.innerHTML = "&nbsp;"+segundos;
	}
	if (segundos == 59) {
		segundos = -1;
	}
	if ( (centesimas == 0)&&(segundos == 0) ) {
		minutos++;
		if (minutos < 10) { minutos = "0"+minutos }
		Minutos.innerHTML = ""+minutos;
	}
	if (minutos == 59) {
		minutos = -1;
	}
	if(segundos == -1 && centesimas == -1){
		parar();
	}
	
	if ( (centesimas == 0)&&(segundos == 0)&&(minutos == 0) ) {
		horas ++;
		if (horas < 10) { horas = "0"+horas }
		Horas.innerHTML = horas;
	}
}	
function reiniciar_partida(){
    $.ajax({
        url: "reiniciar_partida.php",
        async: false,
        type: "POST",
        dataType: "json",
        data: {
            participante_id : <?php echo ($_REQUEST['id']); ?>
        }
    }).done(function(data){
        if(data){
            window.open('index.php');
        }else{
            new Noty({
                text: "Error al reiniciar",
                type: "error",
                timeout: '2000',
                layout: "topCenter"
            }).show();
        }
    });
}
function verificar_respuesta(opc){
	if(responder==1){
	parar();
		$.ajax({
		url: "verificar_respuesta.php",
		async:false,
		type: "POST",
		dataType: "json",
		data: {
			tipo:opc,
			idpregunta:$('#pregunta').val(),
			id:$('#id').val(),
			cantidad:$('#cantidad_preguntas').val(),
			consecutivo:$('#consecutivo').val()
		}
		}).done(function(data){
			
			if(data.continuar){						
				setTimeout(function(){
					$(".contenido2 .contenido3 .contenido4 .contenido5").show();
					$("#"+data.etiqueta_consecutivo).html(data.puntaje);
					if(data.correcta){
						new Noty({
							text: "Correcta",
							type: "success",
							timeout: '2000',
							layout: "topCenter"
						}).show();
						$("#aplausos")[0].play();
						setTimeout(function(){
							reinicio();
							$("#suspenso")[0].play();
							
						}, 5000);
					}else{
						new Noty({
							text: "Erronea",
							type: "error",
							timeout: '2000',
							layout: "topCenter"
						}).show();
						$("#error")[0].play();
						setTimeout(function(){
							window.location="resumen_juego.php?id="+data.jugador;
						}, 3500);
						
					}
					
					if(data.fin && data.correcta){
						new Noty({
							text: "Felicitacones!! a respondido correctamente a todas las Preguntas",
							type: "success",
							timeout: '2000',
							layout: "topCenter"
						}).show();
						setTimeout(function(){
							window.location="resumen_juego.php?id="+data.jugador;
						}, 4000);
					}
					$("#texto_pregunta").html(data.pregunta);
					$("#pregunta").val(data.idpregunta);
					$("#texto_r1").html(data.r1);
					$(".contenido2").attr('onclick','verificar_respuesta('+data.idr1+')');
					$(".contenido2").attr('id',data.idr1);
					$("#texto_r2").html(data.r2);
					$(".contenido3").attr('onclick','verificar_respuesta('+data.idr2+')');
					$(".contenido3").attr('id',data.idr2);
					$("#texto_r3").html(data.r3);
					$(".contenido4").attr('onclick','verificar_respuesta('+data.idr3+')');
					$(".contenido4").attr('id',data.idr3);
					$("#texto_r4").html(data.r4);
					$(".contenido5").attr('onclick','verificar_respuesta('+data.idr4+')');
					$(".contenido5").attr('id',data.idr4);
					$("#consecutivo").val(data.consecutivo);
					$("#contador_pregunta").html(data.consecutivo);
					$('#barra').css('height', data.porcentaje_barra+'%');
					$('#barra').html(data.porcentaje_barra+'%');
					$(".respuesta").show();
				}, 1500);
				$("#seleccion")[0].play();
				responder=0;			
				new Noty({
					text: "Su respuesta es:",
					type: "warning",
					timeout: '1000',
					layout: "topCenter"
				}).show();
				$("#suspenso")[0].pause();
				
			}else{
				alert("Fin del juego");
				window.location="resumen_juego.php?id="+data.jugador;
			}
		});
	}
}
	
	function usar_llamada(){
		alert("A quien desea llamar");
	}
	
	function usar_elimina(){
		$("#elimina").hide();
		$.ajax({
					type:'POST',
					async:false,
					url: "verificar_respuesta.php",
					dataType: "json",
					data: {
						idpregunta:$('#pregunta').val(),
						elimina:'1'
					}
					}).done(function(data){
						$('#'+data.r1).hide();
						$('#'+data.r2).hide();
					
		});
	}
	
</script>