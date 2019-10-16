<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
<br/>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 col-md-offset-3">
			<table style="color:white; width:70%; font-size:18px" class="table borderless">
				<th  >Participante</th>
				<th  >Instituci&oacute;n</th>
				<th  >Asignatura</th>
				<td rowspan="12"><img width="150px" heigth="150px" src="{{ asset('images/escudo.png') }}"></td>
				@foreach($participantes as $participante)
					<tr>
						<td>
							<a href="{{ route('juego.index', $participante->id) }}">{{$participante->nombres}}</a>
						</td>
						<td>{{$participante->universidad}}</td>
						<td>
							{{$participante->test->nombre}}
						</td>
					</tr>
				@endforeach
				<!--tr>
					<td colspan="3" ><a href="desempate.php" style="text-align: center; color: red;">DESEMPATE</a> </td>
				</tr-->
				<tr>
					<td colspan="3" >{{ $participantes->links() }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>



<style>
a, a:hover, a:active{
  color: white;
}

body{
	background-image: url({{ URL::asset('images/escenario.jpg') }});	
	/* Para dejar la imagen de fondo centrada, vertical y horizontalmente */
	background-position: center center;	
	/* Para que la imagen de fondo no se repita */
	background-repeat: no-repeat;	
	/* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */
	background-attachment: fixed;	
	/* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */
	background-size: cover;	
	/* Se muestra un color de fondo mientras se está cargando la imagen de fondo o si hay problemas para cargarla */
	background-color: #66999;
}
.borderless td, .borderless th, .borderless tbody {
    border: none !important;
	border-top: none !important;
  	border-bottom: none !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	padding: 5px;
}
.row{
	padding: 30px;
}
</style>