<?php
 session_start();
    include('conexion.php');
    $id = $_GET['id'];
?>
<html>
<head>
	<title>Copa Amistad Profesional</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<link rel="stylesheet" href="../css/themes/revolucion.css" />
  <link rel="stylesheet" href="../css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>
</head>
<body>


<div data-role="page">
<div data-role="header" data-theme="b">

<?php 

$nom=mysql_query("select nombre_equipo from tb_equipos where id_equipo=$id");  //// para el nombre del jugador
		$fe=mysql_fetch_array($nom);  // para el nombre del jugador en amonestaciones

$nombreequipo=$fe['nombre_equipo'];
 ?>

	<h1 style=" margin: auto;"  >Jugadores de <?php echo $nombreequipo; ?> </h1>
</div>
	<div width="80%" height="50%" >
<table data-role="table" width="100%" style="font-size: small; margin: auto;" data-role="table" id="table-custom-2" data-mode="columntoggle" 
class="ui-body-d ui-shadow table-stripe ui-responsive t" 
data-column-btn-text="" >
<thead>
	<tr><th>Nombre</th>
		<th>Fecha De Nacimiento</th>
		<th>Color Carnet</th>
	</tr>
</thead>
<tbody>

<tr class="alt">
	<?php
	 
         /// Para el nombre del jugador
		$nomju=mysql_query("select * from tb_jugadores where equipo=$id");  //// para el nombre del jugador
		while($fe=mysql_fetch_array($nomju)){  // para el nombre del jugador en amonestaciones

	

       	?>

	<td> <?php  echo $fe['nombre1']." ".$fe['apellido1'] ; ?> </td>
	<td> <?php  echo $fe['fecha_nacimiento']; ?> </td>
	<td> <?php  
$tiempoahora=date_default_timezone_set('America/Bogota');
$horanow=date("Y-m-d");
$edadreal  =$horanow-$fe['fecha_nacimiento'];
if ($edadreal>=40) {
	?>
	<span style="background-color: green ; color : green; ">....</span>
	<?php
}elseif ($edadreal<40 &&  $edadreal>=35 ) {
	?>
	<span style="background-color: blue; color : blue; ">....</span>
	<?php
}elseif ($edadreal<35) {
		?>
	<span style="background-color: red ; color : red; ">....</span>
	<?php
}
	 ?> </td>
	</tr>
	<?php  
}
?>
</tbody>
</table></div>
	
 