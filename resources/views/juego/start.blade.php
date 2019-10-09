
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
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
<div style="background-image: url('{{ asset( $fondo_juego->valor ) }}');" id="all">
    <iframe src="preguntas.php?id={{ $participante->id }}"  marginwidth="0" marginheight="0" frameborder="0" scrolling="yes"></iframe>
</div>
?>
