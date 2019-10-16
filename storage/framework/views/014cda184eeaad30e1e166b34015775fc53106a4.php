<style>
.contenido1{
 position: absolute;
    left: 40%;
    top: 78%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    /*border: 1px solid #FFF;*/
 }
 
 .contenido2{
 position: absolute;
    left: 40%;
    top: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    /*border: 1px solid #FFF;*/
 }


 h1,h2,span { color: white; }
</style>
<html>
<body background="<?php echo e(asset( $fondo_juego->valor )); ?>">
<br/>	
<center><img width="250px" heigth="250px" src="<?php echo e(asset('images/escudo.png')); ?>"></center>	

<div class="contenido2">
	<h1>Resumen del juego</h1>
	<span>
		<h2><?php echo e($datos_jugador['nombres']); ?> <h2>
		<h3>Ud acaba de realizar una prueba de <?php echo e($datos_jugador['preguntas_total']); ?> Preguntas. Su resultado es:</h3>
		<li>Correctas: <?php echo e($datos_jugador['correctas']); ?></li>
		<br/>
		<a href="<?php echo e(url('/')); ?>" target="_top">Volver al listado</a>
	</span>	
</div>


</body>
</html>
<style>
a{
  color: white;
}

a:hover{
  color: white;
}

a:active{
  color: white;
}
</style><?php /**PATH F:\SETUL\resources\views/juego/resumen.blade.php ENDPATH**/ ?>