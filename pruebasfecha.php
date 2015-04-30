<?php 
 session_start();
    include('conexion.php');
?>
<html>
<head>
	<title>Calendario</title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<link rel="stylesheet" type="text/css" href="js/jquery.mobile-1.4.3.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<link rel="stylesheet" href="themes/nuevarevolucion1.css"/>
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css"/>
<script type="text/javascript" src="js/jquery.mobile-1.4.3.js"></script>
</head>
<body>
<div data-role="page" id="pagina1">    <!-- PAGINA PRINCIPAL 1 -->

  <div data-role="header">
  </div>

  <div data-role="main" class="ui-content" style="font-family: Century Gothic;">
<ul data-role="listview" data-inset="true" style="font-family: Century Gothic;">
<?php 
$numerodelafecha=mysql_query("SELECT  DISTINCT fecha FROM tb_partidos WHERE Estado='1'");
while($fechas=mysql_fetch_array($numerodelafecha)){ 
  $numeroparalafecha=$fechas['fecha'];
  ?>
  <div align="center" data-role="list-divider" style="color: grey;height: 30px;margin-top: 3px;padding-top: 5px;
      " ><?php
date_default_timezone_set('America/Bogota');
$diadelasemana = date("w");
 $sum =date("Ymd")."<br>";
 $jornada= $fechas['fecha']; 
  $fechareal =date("Ymd", strtotime($jornada)); 
 $nuevo =date("w", strtotime($jornada)); 
  $jornada."  ".$sum;// gives 201101
 $resta=$fechareal-$sum;

$diadelasemanadefinido = $resta+$diadelasemana;
// dia de la semana    = domingo
if ($resta==1) {
?>
<span style="font-size: larger; color: black;
font-weight: bold;"><?php echo "Mañana";?></span>
<br><span style="font-size: small;"><?php echo date("d-M", strtotime($jornada));?></span>
		<?php 
}elseif ($resta==0) {
	?>
<span style="font-size: larger; color: black;
font-weight: bold;"><?php echo "Hoy";?></span>	
<br><span style="font-size: small;"><?php echo date("d-M", strtotime($jornada));?></span>
		<?php
}else{


switch ($nuevo) {
	case '0':
	?>
		  <span style="font-size: larger; color: black;
font-weight: bold;"><?php echo "Domingo";?></span>
	<?php
		?><br>
		  <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada));?></span>
		<?php 
		break;
	case '1':
	?>
		  <span style="font-size: larger; color: black;
font-weight: bold;"><?php echo "Lunes";?></span>
	<?php
		?><br>
		  <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada));?></span>
		<?php
		break;
		case '2':
	?>
		  <span style="font-size: larger; color: black;
font-weight: bold;"><?php echo "Martes";?></span>
	<?php
		?><br>
		  <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada));?></span>
		<?php
		break;
		case '3':
	?>
		  <span style="font-size: larger; color: black;
font-weight: bold;"><?php echo "Miercoles";?></span>
	<?php
		?><br>
		  <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada));?></span>
		<?php
		break;
		case '4':
	?>
		  <span style="font-size: larger; color: black;
font-weight: bold;"><?php echo "Jueves";?></span>
	<?php
		?><br>
		 <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada));?></span>
		<?php
		break;
		case '5':
		?>
		  <span style="font-size: larger; color: black;
font-weight: bold;"><?php echo "Viernes";?></span>
	<?php
		?><br>
		 <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada));?></span>
		<?php
		break;
		case '6':
		?>
		  <span style="font-size: larger; color: black;
font-weight: bold; "><?php echo "Sabado";?></span>
	<?php
		?>
		<br>
		 <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada));?></span>
		<?php
		break;
	default:
		echo "Proxima Semana";
		break;
}
}
         ?> </div> <!--  numero de la fecha vigente para que aparesca en calendario -->
<?php
$nametor = mysql_query("SELECT * from tb_partidos where  Estado!='2'   AND fecha='$numeroparalafecha'")or die(mysql_error());
  while ($tor=mysql_fetch_array($nametor)) {
?>
<div style="font-family: Century Gothic;"  align="center" data-role="collapsible" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u" data-iconpos="right">
	<?php
    $lugar1=$tor['Lugar'];
$nombrelugar=mysql_query("SELECT nombre FROM tb_lugares WHERE id_lugar=$lugar1");
$to=mysql_fetch_array($nombrelugar);
   $nombre=$tor['equipo1'];
   $nombre1=$tor['equipo2'];


   $estados=$tor['Estado'];
$nom=mysql_query("SELECT nombre_equipo from tb_equipos where id_equipo=$nombre");
$nome=mysql_fetch_array($nom);
$nom1=mysql_query("SELECT nombre_equipo from tb_equipos where id_equipo=$nombre1");
$nome1=mysql_fetch_array($nom1);

$estadopartido=mysql_query("SELECT nombre from tb_estados_partido where id_estado=$estados");
$estados1=mysql_fetch_array($estadopartido);
    ?>
	<h1  style="font-size: small " align: "center" style="font-family: Century Gothic;">
<table width="100%" aling="center"  style="font-size: small " style="font-family: Century Gothic;">
		<tr width="100%" style="font-family: Century Gothic;">
				<td align="center" width="33%"> <?php echo $nome['nombre_equipo']; ?> </td>
				<td align="center" width="20%">
					<span style=" color: black ;  font-weight: bold; font-size: small;"> 
				 <?php echo $tor['hora'];?>  </span></td>
				<td align="center" width="33%"><?php echo $nome1['nombre_equipo']; ?> </td>
		</tr>	

</table>
</h1>
<p style="margin-top: 00px; margin-bottom: 0px;" style="font-family: Century Gothic;"> 
<table style="margin: 1em 5% ; font-size: small ;font-family: Century Gothic;s">
<tr>
<td style=" font-weight: bold;">Lugar :</td><td style="margin 1em 5%;"><?php echo $to['nombre']; ?></td>  <!-- lugar  -->
</tr>
<tr>
<td style="font-weight: bold;">Estado :</td><td  style="margin 1em 5%;" >  <?php echo $estados1['nombre']; ?> </td> <!--  Estado del partido  -->
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
</div>
</body>
</html>