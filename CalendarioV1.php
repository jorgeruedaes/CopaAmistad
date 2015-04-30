<?php
 session_start();
    include('conexion.php');

?>
<html>
<head>
	<title>Calendario</title>
	<meta nanme="viewport" content="width=device-width, initial-scale=1,maximun-scale=no">
<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<link rel="stylesheet" href="css/themes/my-custom-theme.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>
</head>

<div data-role="page" id="pagina3">
<div data-role="header" data-theme="b">
	<h1>Calendario</h1>
</div>

	<div width="80%" height="50%">
<table data-role="table" id="table-custom-2"  class="ui-body-d ui-shadow table-stripe ui-responsive">

<thead>
<tr class="ui-bar-d">
             <th data-priority="1">Fecha Y Hora</th>
             <th data-priority="1">Lugar</th>
             <th data-priority="1">Equipo</th>
             <th data-priority="1">VS</th>
             <th data-priority="1">Equipo</th>
             <th data-priority="3">Estado</th>

           </tr>
</thead>
<tbody>

<?php
$nametor = mysql_query("SELECT * from tb_partidos where  Estado!='2'  ORDER BY Fecha desc")or die(mysql_error());
	while ($tor=mysql_fetch_array($nametor)) {
		$lugar1=$tor['Lugar'];
$nombrelugar=mysql_query("SELECT nombre FROM tb_lugares WHERE id_lugar=$lugar1");
$to=mysql_fetch_array($nombrelugar);
	?>
<tr>
<td> <?php echo $tor['fecha'];  ?>  </td>
	<td> <?php echo $to['nombre']; ?></td>
	<td>  
	 <?php
	 $nombre=$tor['equipo1'];
$nom=mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre");
$nome=mysql_fetch_array($nom);
	  echo $nome['nombre_equipo']; 
	   ?> 
	</td><td>vs</td>

	<td>  <?php 
$nombre=$tor['equipo2'];
$nom=mysql_query("SELECT nombre_equipo from tb_equipos where id_equipo=$nombre");
$nome=mysql_fetch_array($nom);
	echo $nome['nombre_equipo'];  
	?>
	 </td>
	 <td>
<?php  
$estadopartido=$tor['Estado'];
$query=mysql_query("SELECT nombre from tb_estados_partido where  id_estado=$estadopartido");
$nombreestado=mysql_fetch_array($query);
echo $nombreestado['nombre'];
?>
	 </td>
</tr>
<?php

}

?>
</tbody>
</table></div>
	
<!--pie de pagina-->
<div data-role="footer" data-theme="a">
	
	<div data-role="footer" data-theme="a" style="background-color : white;">
		<p>Compartelo: </p>
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
</div>

</html>