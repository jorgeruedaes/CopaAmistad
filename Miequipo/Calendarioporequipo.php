<?php
 session_start();
    include('../conexion.php');
 $id = $_GET['id'];
?>
<html>
<head>
	<title>Calendario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<link rel="stylesheet" type="text/css" href="../jquery.mobile-1.4.3.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/themes/revolucion.css" />
  <link rel="stylesheet" href="../css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="../jquery-1.11.1.js"></script>
<script type="text/javascript" src="../jquery.mobile-1.4.3.js"></script>
</head>

<div data-role="page" id="pagina1">
<div data-role="header">

  <h1>Calendario</h1>
</div>
	<div data-role="main" width="80%" height="50%">
<ul data-role="listview" data-inset="true">
<?php 
$numerodelafecha=mysql_query("SELECT  DISTINCT numero_fecha FROM tb_partidos WHERE Estado='1'  AND (equipo1=$id OR equipo2=$id) ");
while($fechas=mysql_fetch_array($numerodelafecha)){ 
  $numeroparalafecha=$fechas['numero_fecha'];
  ?>
	<div align="center" data-role="list-divider" style="
    background-color: #011126 /*{a-bar-background-color}*/;
     color: white;
 height: 30px;
    margin-top: 3px;
    padding-top: 5px;
      " >Fecha  <?php   echo $fechas['numero_fecha']  ?> </div> <!--  numero de la fecha vigente para que aparesca en calendario -->
<?php
$nametor = mysql_query("SELECT * from tb_partidos where  Estado!='2'  AND numero_fecha=$numeroparalafecha AND (equipo1=$id  or equipo2=$id)  ORDER BY Fecha desc")or die(mysql_error());
	while ($tor=mysql_fetch_array($nametor)) {
?>
<div  align="center" data-role="collapsible" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u" data-iconpos="right">
	<h1  style="font-size: smaller " align: "center" >

<?php
		$lugar1=$tor['Lugar'];
$nombrelugar=mysql_query("SELECT nombre FROM tb_lugares WHERE id_lugar=$lugar1");
$to=mysql_fetch_array($nombrelugar);
	 $nombre=$tor['equipo1'];


	 $estados=$tor['Estado'];
$nom=mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre");
$nome=mysql_fetch_array($nom);

$estadopartido=mysql_query("select nombre from tb_estados_partido where id_estado=$estados");
$estados1=mysql_fetch_array($estadopartido);
	  ?>
	  <div align="center"><span style="margin: 1em 3%">  <?php echo $nome['nombre_equipo']; ?> </span></div>
	 

	 
<div align="center">
<span style="background-color: black; color: white;"><?php echo  $tor['hora']; ?></span>
	 </div>
	  <?php

$nombre=$tor['equipo2'];
$nom=mysql_query("SELECT nombre_equipo from tb_equipos where id_equipo=$nombre");
$nome=mysql_fetch_array($nom);

?>
<div align="center"> <span style="margin: 1em 2%">  <?php echo $nome['nombre_equipo']; ?>  </span> </div> 
	  



</h1>
<p style="
    margin-top: 00px;
    margin-bottom: 0px;"> 
<table style="margin: 1em 5% ; font-size: small ;">
<tr align="center">
<td style="
    font-weight: bold;" >Fecha :</td><td  style="margin 1em 5%;"><?php echo $tor['fecha']; ?></td>  <!--  fecha  -->
</tr>
<tr>
 
<td style="
    font-weight: bold;">Lugar :</td><td style="margin 1em 5%;"><?php echo $to['nombre']; ?></td>  <!-- lugar  -->
</tr>
<tr>
<td style="
    font-weight: bold;">Estado :</td><td  style="margin 1em 5%;" >  <?php echo $estados1['nombre']; ?> </td> <!--  Estado del partido  -->
</tr>
</table>
</p>
</div>
<?php
}
}
?>

</ul>


</div>
	
<!--pie de pagina-->
<div data-role="footer" align="center" >
		<p>Compartelo: </p>
		<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u='+document.URL,'ventanacompartir', 
		'toolbar=0, status=0, width=device-width, height=device-height');"><img src="https://lh3.googleusercontent.com/-H8xMuAxM-bE/
		UefWwJr2vwI/AAAAAAAAEdY/N5I41q19KMk/s32-no/facebook.png"></a>
</a>

<a href="javascript: void(0);" onclick="window.open('http://www.twitter.com/home?status='+document.URL,'ventanacompartir', 'toolbar=0, status=0, width=device-width, height=device-height');"><img src="https://lh5.googleusercontent.com/-xZVxH6CsUaQ/UefWwgi8o3I/AAAAAAAAEdk/reo5XS6z8-8/s32-no/twitter.png"></a></a>
</a>

<a href="javascript: void(0);" onclick="window.open('https://plus.google.com/share?url='+document.URL,'ventanacompartir', 'toolbar=0, status=0,
 width=device-width, height=device-height');"><img src="https://lh5.googleusercontent.com/-5Q7Sj0SXhOA/UefWwcrnZ-I/AAAAAAAAEdg/auK3wqGCbZE/s32-no/googleplus.png"></a>
</a>
</a>
</div>
</div>
</div>

</html>