<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" >
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
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
    top: 35%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    /*border: 1px solid #FFF;*/
 }
 
 h1,h2,span { color: white; }
</style>
<html>
<body background="<?php echo e(asset( $fondo_juego->valor )); ?>">
<div class="contenido2">
	<h1><?php echo e($participante->nombres); ?></h1>
	<br/>
	<h1>MODO DE JUEGO</h1>
	<span>
		<li>Nadie puede hablar ni ayudarle.</li>
		<li>Todos somos espectadores.</li>
	</span>
	<br/><br/>
	<h2>AYUDAS</h2>
	<span>
		<li>Ayuda de un amigo.</li>
		<li>Cincuenta cincuenta.</li>
	</span>
	
	
</div>

<div class="contenido1">
	<form action="<?php echo e(route('juego.start', $participante->id)); ?>" method="post">
    <?php echo e(csrf_field()); ?>

		<button class="btn btn-success" type="submit" name="guardar">Iniciar</button>
	</form>
</div>
<audio id="aplausos" autoplay loop>
   <source src="<?php echo e(asset('audio/musica-suspenso-.mp3')); ?>" type="audio/mp3" />
</audio>
</body>
</html>

<script>
$(document).ready(function(){
    var playPromise = $("#aplausos")[0].play();

  if (playPromise !== undefined) {
    playPromise.then(_ => {
      // Automatic playback started!
      // Show playing UI.
    })
    .catch(error => {
      // Auto-play was prevented
      // Show paused UI.
    });
  }
});
</script><?php /**PATH C:\xampp\htdocs\SETUL\resources\views/juego/reglas.blade.php ENDPATH**/ ?>