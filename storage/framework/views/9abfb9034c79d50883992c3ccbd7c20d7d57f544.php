<link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
<style>
#all{
    width:100%;
    float:left;
    text-align:center;
}
div.sub, iframe {
    width: 75%;
    height: 100%;
    margin: 0 auto;
    background-color: #777;

}
</style>
<div style="background-image: url('<?php echo e(asset( $fondo_juego->valor )); ?>');" id="all">
    <iframe src="<?php echo e(route('juego.preguntasJuego', $participante->id)); ?>"  marginwidth="0" marginheight="0" frameborder="0" scrolling="yes"></iframe>
</div>
?>
<?php /**PATH C:\xampp\htdocs\SETUL\resources\views/juego/start.blade.php ENDPATH**/ ?>