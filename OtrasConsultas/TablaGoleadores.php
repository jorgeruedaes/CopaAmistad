<?php
 session_start();
    include('conexion.php');

?>
<html>
<head>
	<title>Tabla Goleadores</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<link rel="stylesheet" href="../css/themes/revolucion.css" />
  <link rel="stylesheet" href="../css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>
</head>

<div data-role="page">
<div data-role="header">
	<h1  style=" margin: auto;">Tabla Goleadores</h1>
</div>

	<div  data-role="content" style="margin: auto;">
<table width="100%" style="font-size: small; margin: auto;" data-role="table" id="table-custom-2" data-mode="columntoggle" 
class="ui-body-d ui-shadow table-stripe ui-responsive t" 
data-column-btn-text="" >

<thead>
	<tr class="ui-bar-d">
             <th style="width: 33%;">Equipo</th>
             <th style="width: 33%;" >Nombre</th>
             <th style="width: 33%;" >Goles</th>
           </tr>
</thead>
<tbody>

<?php
$goleadores1=mysql_query("SELECT jugador,SUM(goles) AS goles1 from tr_jugadoresxpartido WHERE goles!=0 GROUP BY jugador order by goles1 desc")or die(mysql_error());
		while ($numerodegoles=mysql_fetch_array($goleadores1)) {
			$jugador=$numerodegoles['jugador'];
		  $nombrej=mysql_fetch_array(mysql_query("SELECT nombre1,apellido1,equipo FROM tb_jugadores WHERE id_jugadores=$jugador "));
		 $nueva=$nombrej['equipo'];
$nombree=mysql_fetch_array(mysql_query("SELECT nombre_equipo FROM tb_equipos WHERE id_equipo=$nueva"));

		?>
<tr  width="100%">
<td style="width: 33%;"> <?php echo $nombree['nombre_equipo'];  ?>  </td>
	<td style="width: 33%;"> <?php echo $nombrej['nombre1']." ".$nombrej['apellido1']   ; ?></td>
	<td style="width: 33%;"> <?php echo $numerodegoles['goles1']; ?> </td>
</tr>
<?php

}

?>
</tbody>
</table>
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