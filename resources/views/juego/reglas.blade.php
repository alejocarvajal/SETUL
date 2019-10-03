<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
<script src="{{ asset('js/jquery.min.js') }}"></script>
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
<body background="{{ asset('images/Fondo2.jpg') }}">
<div class="contenido2">
	<h1>{{ $participante->nombres}}</h1>
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
	<form action="{{ route('juego.start', $participante->id) }}" method="post">
    {{ csrf_field() }}
		<button class="btn btn-success" type="submit" name="guardar">Iniciar</button>
	</form>
</div>
<audio id="aplausos" autoplay loop>
   <source src="{{ asset('audio/musica-suspenso-.mp3') }}" type="audio/mp3" />
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
</script>