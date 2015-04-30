<?php
 session_start();
    include('conexion.php');
 $id = $_GET['id'];
?>
<html>
<head>
	<title>Copa Amistad Profesional</title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<link rel="stylesheet" type="text/css" href="js/jquery.mobile-1.4.3.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<link rel="stylesheet" href="themes/nuevarevolucion1.css"/>
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css"/>
<script type="text/javascript" src="js/jquery.mobile-1.4.3.js"></script>
</head>
<body>


<div data-role="page">
<div data-role="header">
      <a href="index.php" style="
    background-color: #8cc63f;
    border-color: #8cc63f;
" class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="images/icons-png/carat-l-black.png"></a>
    <h1 style="height: 2%;margin: auto;">
            <?php 
$nombredequipo = mysql_fetch_array(mysql_query("SELECT nombre_equipo FROM tb_equipos WHERE id_equipo=$id"));
echo $nombredequipo['nombre_equipo'];
      ?>

    </h1>
    <div id="iconos" style="height: 8%;">
      <center> 
      <span><a href="Miequipos.php?id=<?php echo $id ?>"><img style=" margin-right: 8%;margin-left: 5%;" src="images/icons-png/calendario.png"></a></span>
      <span><a href="AmonestacionesDeEquipos.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="images/icons-png/amonestaciones.png"></a></span>
       <span><a href="TablaAmonestacionesHistorico.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="images/icons-png/icon-his.png"></a></span>
      <span><a href="TablaDeGoleadoresDeEquipo.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="images/icons-png/goleadores.png"></a></span>
      <span><a href="JugadoresDeEquipo.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="images/icons-png/jugadores.png"></a></span>
      <span><a href="TablaDeAsistencia.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="images/icons-png/asistencia.png"></a></span>
      </center>
    </div>
</div>


<div data-role="main" class="ui-content">
<center><cite>Amonestaciones acumuladas</cite></center>
<table data-role="table" width="100%" style="font-size: small; margin: auto;" data-role="table" id="table-custom-2" data-mode="columntoggle" 
class="ui-body-d ui-shadow table-stripe ui-responsive t" 
data-column-btn-text="" >
<thead>
	<tr>
		<th>Nombre</th>
		<th><img src="images/amarilla.png" 
style="width: 15px;"></th>
		<th> <img src="images/roja.png" style="
    width: 15px;"></th></tr>
</thead>
<tbody>

<tr class="alt">
	<?php
	
$nametor = mysql_query("SELECT * from tr_amonestacionesxjugador WHERE  amonestacion!=5 GROUP BY jugador")or die(mysql_error());
	while ($tor=mysql_fetch_array($nametor)) {
	    $col=$tor['jugador'];                           /// Para el nombre del jugador
		$nomju=mysql_query("SELECT * from tb_jugadores where id_jugadores=$col");  //// para el nombre del jugador
		$fe=mysql_fetch_array($nomju);  // para el nombre del jugador en amonestaciones                          ///
    
       $ol=$tor['jugador'];   
       $casio=mysql_query("SELECT * from tb_jugadores where id_jugadores=$ol"); //
       $fest=mysql_fetch_array($casio);                                          /// Para nombre de equipo
       $equ=$fest['equipo'];
       $eq=mysql_query("SELECT * from tb_equipos where id_equipo=$equ");             ///
       $nombree=mysql_fetch_array($eq);
if ($nombree['id_equipo']==$id) {
       	?>
	<td> <?php  echo $fe['nombre1']." ".$fe['apellido1']; ?> </td>
	<td> <?php   
$Cantidad=mysql_fetch_array(mysql_query("SELECT COUNT(amonestacion)AS Numero from tr_amonestacionesxjugador WHERE  amonestacion!='5' AND amonestacion='1' AND jugador=$col"));
echo $Cantidad['Numero'];
   ?>
   </td>
  <td> 
<?php
$Cantidad1=mysql_fetch_array(mysql_query("SELECT COUNT(amonestacion)AS Numero1 from tr_amonestacionesxjugador WHERE  amonestacion!=5 AND amonestacion='2' AND jugador=$col"));
echo $Cantidad1['Numero1'];
?>
  </td>

	</tr>
	<?php  
}
}
?>
</tbody>
</table>
</div>
</div>
</html>