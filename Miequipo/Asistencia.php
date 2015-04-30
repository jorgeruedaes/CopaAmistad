<?php
 session_start();
    include('../conexion.php');
    	 $id = $_GET['id'];

?>
<html>
<head>
	<title>Copa Amistad Profesional</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../jquery.mobile-1.4.3.css">
<link rel="stylesheet" href="../css/themes/revolucion.css" />
  <link rel="stylesheet" href="../css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="../jquery-1.11.1.js"></script>
<script type="text/javascript" src="../jquery.mobile-1.4.3.js"></script>
</head>
<body>


<div data-role="page">
<div data-role="header">
	<?php 
	$a=mysql_query("SELECT nombre_equipo FROM tb_equipos where id_equipo=$id");
$asistencia=mysql_fetch_array($a);
$consulta1=mysql_query("SELECT  distinct numero_fecha FROM tb_partidos");
$consulta2=mysql_query("SELECT * FROM tb_jugadores WHERE equipo=$id order by nombre1 asc, apellido1 asc  ");
	?>

	<h1 style=" margin: auto;" >Asistencia <?php echo  $asistencia['nombre_equipo']; ?> </h1>
</div>
	<div width="80%" height="50%" >
<table style="font-size: small;" data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive t" 
data-column-btn-text="=">
<thead>
	<tr>
		<th>Nombre</th>
		<?php       
while($asistenciasacrear=mysql_fetch_array($consulta1)){
		?>
		<th data-priority="2"><?php echo "P ".$asistenciasacrear['numero_fecha']; ?></th>
		<?php 
}
		?>
		<th>Asistencia hasta hoy</th>
		<th>Asistencia sobre el total</th></tr>
</thead>
<tbody>
	<?php  
while($consultajugadores=mysql_fetch_array($consulta2)){
 ?>
<tr>

<td><?php echo $consultajugadores['nombre1']." ".$consultajugadores['apellido1'];  ?></td>
		<?php       
		$consulta1=mysql_query("SELECT  distinct numero_fecha FROM tb_partidos");
while($asistenciasacrear=mysql_fetch_array($consulta1)){
		?>
		<td>
		<?php 
		$asistenciasacrear1=$asistenciasacrear['numero_fecha'];
		$player1=$consultajugadores['id_jugadores'];
$pruebasconsulta=mysql_query("SELECT partido FROM tr_jugadoresxpartido WHERE jugador=$player1 AND partido 
	In (SELECT id_partido FROM tb_partidos WHERE numero_fecha=$asistenciasacrear1 )");
while($nuevaprueba=mysql_fetch_array($pruebasconsulta)){
$game1=$nuevaprueba['partido'];
$consulta3=mysql_fetch_array(mysql_query("SELECT numero_fecha FROM tb_partidos WHERE id_partido=$game1"));
$date=$consulta3['numero_fecha'];
if($date==$asistenciasacrear1){
  ?> <img src="check-black.png"> <?php 
}else{
  echo "X";
}
}
		 ?>
		</td>
		<?php 
}
		?>
<td><?php    
$calculo1=mysql_query("SELECT partido FROM tr_jugadoresxpartido WHERE jugador=$player1");
$fechasasistidas=mysql_num_rows($calculo1);
$fechasHastaahora=mysql_num_rows($consulta1);
$resultado=($fechasasistidas/$fechasHastaahora)*100;
echo round($resultado)."%";
 ?></td>
<td><?php    
$result=($fechasasistidas/19)*100;
echo round($result)."%";
  ?></td>

</tr>
<?php

} 

?>
</tbody>
</table>
</div>
</div>
</body>
</html>
	
 