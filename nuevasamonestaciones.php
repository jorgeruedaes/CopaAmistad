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
	 <a href="Amonestaciones.php" style="
    background-color: #8cc63f;
    border-color: #8cc63f;
" class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="images/icons-png/carat-l-black.png"></a>
    <h1 style="height: 2%;margin: auto;">Amonestaciones</h1>
</div>


<div data-role="main" class="ui-content">
<table data-role="table" width="100%" style="font-size: small; margin: auto;" data-role="table" id="table-custom-2" data-mode="columntoggle" 
class="ui-body-d ui-shadow table-stripe ui-responsive t" 
data-column-btn-text="" >
<thead>
	<tr>
		<th>Nombre</th>
		<th>Tarjeta</th>
		<th>Valor</th></tr>
</thead>
<tbody>

<tr class="alt">
	<?php
	
$nametor = mysql_query("SELECT * from tr_amonestacionesxjugador WHERE estado_amonestacion='1' AND amonestacion!=5  ")or die(mysql_error());
	while ($tor=mysql_fetch_array($nametor)) {
	    $col=$tor['jugador'];                           /// Para el nombre del jugador
		$nomju=mysql_query("select * from tb_jugadores where id_jugadores=$col");  //// para el nombre del jugador
		$fe=mysql_fetch_array($nomju);  // para el nombre del jugador en amonestaciones

	   $mi=$tor['amonestacion'];                           ///
	   $mis=mysql_query("select * from tb_amonestaciones where id_amonestacion=$mi");       /// Comentario para el nombre de la tarjeta
	   $fes=mysql_fetch_array($mis);                            ///

       $ol=$tor['jugador'];   
       $casio=mysql_query("select * from tb_jugadores where id_jugadores=$ol"); //
       $fest=mysql_fetch_array($casio);                                          /// Para nombre de equipo
       $equ=$fest['equipo'];
       $eq=mysql_query("select * from tb_equipos where id_equipo=$equ");             ///
       $nombree=mysql_fetch_array($eq);
if ($nombree['id_equipo']==$id) {
	

       	?>

	<td> <?php  echo $fe['nombre1']." ".$fe['apellido1']; ?> </td>
	<td> <?php  echo $fes['nombre']; ?> </td><td> <?php  echo $fes['valor']; ?> </td>
	</tr>
	<?php  
}
}
?>
</tbody>
</table>
</div>
</div>