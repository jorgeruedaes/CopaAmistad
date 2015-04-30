<?php
 include('conexion.php');
   $idF = $_GET['id'];
?>

<html>
<head>
	<title>Copa Amistad</title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<link rel="stylesheet" href="css/themes/revolucion.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>
</head>
<div data-role="page">
<div data-role="header" >
	<h1 style="margin: auto ;">Resultados fecha <?php echo $idF ?></h1>
</div>

<div data-role="main">
<ul data-role="listview" data-inset="true">
	<?php
// consulta los partidos de la fecha
$nametor = mysql_query("SELECT * FROM tb_partidos where numero_fecha=$idF AND Estado='2' ORDER BY fecha desc")or die(mysql_error());
	while ($tor=mysql_fetch_array($nametor)) {

			 $nombre=$tor['equipo1'];
$nom=mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre");
$nome=mysql_fetch_array($nom);
$nombre1=$tor['equipo2'];
$nom1=mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre1");
$nome1=mysql_fetch_array($nom1);
	
	
	?>
<div  align="center" data-role="collapsible" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u" data-iconpos="right">
	<h1  style="font-size: small " align: "center" >
<table width="100%" aling="center"  style="font-size: small ">
		<tr width="100%">
				<td align="center" width="33%"> <?php echo $nome['nombre_equipo']; ?> </td>
				<td align="center" width="20%"><span style=" color: black ;  font-weight: bold; font-size: initial;">  <?php echo $tor['resultado1']; ?>-<?php echo $tor['resultado2'];   ?>  </span></td>
				<td align="center" width="33%"><?php echo $nome1['nombre_equipo']; ?> </td>
		</tr>	

</table>
</h1>
<p style="font-size: smaller ;">
<table style="font-size: smaller ;" width="100%" >
<thead>
<tr>
<th>Goles</th>
<th>Goles</th>
</tr>
</thead>
<tbody>
	<!--  GOLES TABLA DE GOLES TABLA DE GoLES -->
<?php
   $id_partido= $tor['id_partido'];                       
		$id_equipo1 = $tor['equipo1'];
		$id_equipo2 = $tor['equipo2'];
$query =mysql_query("SELECT jugador,goles FROM tr_jugadoresxpartido WHERE partido=$id_partido AND goles>0 
	AND jugador IN ( SELECT jugador FROM tb_jugadores WHERE equipo=$id_equipo1) ");
$afectadas=mysql_num_rows($query);
	while($consulta2=mysql_fetch_array($query)){ 
$jugador1=$consulta2['jugador'];
		if ($afectadas!=0) {
?>
<tr>
<?php
$consulta12=mysql_query("SELECT nombre1,apellido1 FROM tb_jugadores WHERE id_jugadores=$jugador1  AND equipo=$id_equipo1" );
	while($consultar=mysql_fetch_array($consulta12)){   
		?>
<td align="center" > <span width="50%"><?php echo $consultar['nombre1']." ".$consultar['apellido1'];    ?>
 </span><span width="50%" style="font-size: larger;font-weight: bold; "><?php echo $consulta2['goles']; ?></span></td>
<?php 
}}else{
	 ?>
	 <td align="center"  width="50%">No hubieron</td>
	 <?php
}
} 
// Segunda parte de la tabla ----------------------------------------------------------------->
$query =mysql_query("SELECT jugador,goles FROM tr_jugadoresxpartido WHERE partido=$id_partido AND goles>0
	AND jugador IN ( SELECT jugador FROM tb_jugadores WHERE equipo=$id_equipo2) ");
$afectadas=mysql_num_rows($query);
	while($consulta2=mysql_fetch_array($query)){ 
	$jugador1=$consulta2['jugador'];
	if ($afectadas==0) {
			 
?>
	 <td align="center"  width="50%">No hubieron</td>
	 <?php
	}else{



$consulta12=mysql_query("SELECT nombre1,apellido1 FROM tb_jugadores WHERE id_jugadores=$jugador1  AND equipo=$id_equipo2" );
	while($consultar=mysql_fetch_array($consulta12)){

	   ?>
<td align="center" > <span width="50%" ><?php echo $consultar['nombre1']." ".$consultar['apellido1'];    ?> </span width="50%" ><span style="font-size: larger;font-weight: bold; " >
	<?php echo $consulta2['goles'];?></span></td>
<?php 

}
} 
 ?>
 </tr>
 <?php

} 
 ?>
</tbody>
</table>

<!----    Fin primera tabla   -->

<!----    Empieza Amonestaciones                                     ---------------------------------------->

<table style="font-size: smaller ;" width="100%" >
<thead>

<tr>
<th>Amonestaciones</th>
<th>Amonestaciones</th>
</tr>

</thead>
<tbody>
	
<?php
   $id_partido= $tor['id_partido'];                       
		$id_equipo1 = $tor['equipo1'];
		$id_equipo2 = $tor['equipo2'];
$query =mysql_query("SELECT jugador,amonestacion FROM tr_jugadoresxpartido WHERE partido=$id_partido AND amonestacion!=5 
	AND jugador IN ( SELECT jugador FROM tb_jugadores WHERE equipo=$id_equipo1) ");
$afectadas=mysql_num_rows($query);
	while($consulta2=mysql_fetch_array($query)){ 
$jugador1=$consulta2['jugador'];
	$amonestaciones1=$consulta2['amonestacion'];
		if ($afectadas==0) {
	
		
	
?>
<tr>
<?php

$consulta12=mysql_query("SELECT nombre1,apellido1 FROM tb_jugadores WHERE id_jugadores=$jugador1  AND equipo=$id_equipo1" );
	while($consultar=mysql_fetch_array($consulta12)){   
		?>
<td align="center" > <span width="50%"><?php echo $consultar['nombre1']." ".$consultar['apellido1'];    ?>

 </span><span width="50%" style="font-size: larger;font-weight: bold; ">
 <?php $consulta3=mysql_fetch_array(mysql_query("SELECT nombre FROM tb_amonestaciones WHERE id_amonestacion=$amonestaciones1"));
 echo $consulta3['nombre']; ?>

</span></td>
<?php 


}
}else{


	 ?>
	 <td align="center"  width="50%">No hubieron</td>
	 <?php
}

} 

// Segunda parte de la tabla ----------------------------------------------------------------->


$query =mysql_query("SELECT jugador,amonestacion FROM tr_jugadoresxpartido WHERE partido=$id_partido AND amonestacion!=5 
	AND jugador IN ( SELECT jugador FROM tb_jugadores WHERE equipo=$id_equipo2) ");
$afectadas=mysql_num_rows($query);
	while($consulta2=mysql_fetch_array($query)){ 
	$jugador1=$consulta2['jugador'];
	$amonestaciones1=$consulta2['amonestacion'];
	if ($afectadas==0) {
			 
?>
	 <td align="center"  width="50%">No hubieron</td>
	 <?php
	}else{



$consulta12=mysql_query("SELECT nombre1,apellido1 FROM tb_jugadores WHERE id_jugadores=$jugador1  AND equipo=$id_equipo2" );
	while($consultar=mysql_fetch_array($consulta12)){

	   ?>
<td align="center" > <span width="50%" ><?php echo $consultar['nombre1']." ".$consultar['apellido1'];    ?> </span width="50%" ><span style="font-size: larger;font-weight: bold; " >
	<?php          
 $consulta3=mysql_fetch_array(mysql_query("SELECT nombre FROM tb_amonestaciones WHERE id_amonestacion=$amonestaciones1"));
 echo $consulta3['nombre'];?></span></td>
<?php 

}
} 
 ?>
</tr>
 <?php

} 
 ?>
 
</tbody>
</table>
<!---  fin segunda tabla   -->
</p>
</div>


</ul>
<?php

}

?>
</div>
<!--pie de pagina-->	
	<div data-role="footer" align="center">
		<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u='+document.URL,'ventanacompartir', 'toolbar=0, status=0, width=device-width, height=device-height');"><img src="https://lh3.googleusercontent.com/-H8xMuAxM-bE/UefWwJr2vwI/AAAAAAAAEdY/N5I41q19KMk/s32-no/facebook.png"></a>
</a>

<a href="javascript: void(0);" onclick="window.open('http://www.twitter.com/home?status='+document.URL,'ventanacompartir', 'toolbar=0, status=0, width=device-width, height=device-height');"><img src="https://lh5.googleusercontent.com/-xZVxH6CsUaQ/UefWwgi8o3I/AAAAAAAAEdk/reo5XS6z8-8/s32-no/twitter.png"></a></a>
</a>

<a href="javascript: void(0);" onclick="window.open('https://plus.google.com/share?url='+document.URL,'ventanacompartir', 'toolbar=0, status=0,
 width=device-width, height=device-height');"><img src="https://lh5.googleusercontent.com/-5Q7Sj0SXhOA/UefWwcrnZ-I/AAAAAAAAEdg/auK3wqGCbZE/s32-no/googleplus.png"></a>
</a>
</a>
</div>
</div>
</html>