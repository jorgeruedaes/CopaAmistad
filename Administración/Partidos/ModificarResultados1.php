<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../../conexion.php');  
include('../Encabezado.html');

if (isset($_SESSION['admin'])) {

$letras=$_SESSION['admin'];
$numeros=mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysql_fetch_array($numeros);
$name=$caracteres['id_torneo'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="../../Formularios/formoid5_files/formoid1/formoid-solid-dark.css" type="text/css" />
<script type="text/javascript" src="../../Formularios/formoid5_files/formoid1/jquery.min.js"></script>

<script type="text/javascript" src="formoid5_files/formoid1/formoid-solid-dark.js"></script>
  <title>Copa Amistad Profesional modulo de Administracion</title>
  <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />
</head>
<style type="text/css">
#bienvenido{

    width: auto;
    margin-left: 0px;
    margin-right: 15px;
    margin-top: 0px;
    float: right;
    color: black;

}
.cerrar{

  color: #000000;
  float: right;
  clear: right;
  padding-right:  15px;
}
</style>
<body>
  
  
<?php



if (isset($_POST['ir'])) {

$partido=$_POST['partido'];

$consulta= mysql_query("SELECT * FROM tb_partidos WHERE id_partido=$partido");

$res=mysql_fetch_array($consulta);

$equipo1= $res['equipo1'];
$equipo2= $res['equipo2'];
$resultado1=$res['resultado1'];
$resultado2=$res['resultado2'];

$consulta2= mysql_query("SELECT * FROM tb_equipos WHERE id_equipo=$equipo1");
$consulta3= mysql_query("SELECT * FROM tb_equipos WHERE id_equipo=$equipo2");

$res2=mysql_fetch_array($consulta2);
$res3=mysql_fetch_array($consulta3);

$nombreequipo1=$res2['nombre_equipo'];
$nombreequipo2=$res3['nombre_equipo'];

?>


<form  id="principal" action="ModificarResultados2.php"
 class="formoid-solid-dark" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',
 Arial,Helvetica,sans-serif;color:#34495E;max-width:800px;min-width:150px" method="POST">
 <br><br>
 <center><cite>Las personas que aparecen en la siguiente lista han sido previamente marcados como asistentes del compromiso. </cite></center>
   <input type="hidden" value="<?php echo $partido?>" name="idpartido">
   <br>
<br><br>
<center><label><?php echo $nombreequipo1?></label>
<input type="text" size="1" name="resultado1" value="<?php echo $resultado1?>">
<center>
<br>
<div style="font-weight: bolder;"><span style="width: 50%;margin-left: 10%;margin-right: 18%;">Jugadores </span><span>Goles</span></div>
</center>
<?php 
$consulta4= mysql_query("SELECT * FROM tr_jugadoresxpartido where partido = $partido");

$consultadejugadoresdelequipo=mysql_query("SELECT jugador,nombre1,nombre2,apellido1,apellido2,goles FROM `tr_jugadoresxpartido`,tb_jugadores WHERE partido=$partido AND jugador IN (SELECT id_jugadores FROM tb_jugadores WHERE equipo=$equipo1) AND tr_jugadoresxpartido.jugador=tb_jugadores.id_jugadores");
$i=0;
while($resultadoconsulta=mysql_fetch_array($consultadejugadoresdelequipo)){


?>
<center>
<input type="text" size="30" readonly="readonly" value="<?php echo $resultadoconsulta['nombre1']." ".$resultadoconsulta['nombre2']." ".$resultadoconsulta['apellido1']." ".$resultadoconsulta['apellido2'];?>">
<input type="hidden" value="<?php echo $resultadoconsulta['jugador']?>" name="idjugadores<?php echo $i ?>">
<input type="text" size="1" value="<?php echo $resultadoconsulta['goles']?>" name="nuevosgoles<?php echo $i ?>">
</center>
<?php 
$i=$i+1;
}
?>
<br>
<br><br>
<label><?php echo $nombreequipo2?></label>
<input type="text" size="1" name="resultado2"value="<?php echo $resultado2?>"></center>
<br><br>
<center>
<div style="font-weight: bolder;"><span style="width: 50%;margin-left: 10%;margin-right: 18%;">Jugadores </span><span>Goles</span></div>
</center>
<?php 
$consulta4= mysql_query("SELECT * FROM tr_jugadoresxpartido where partido = $partido");

$consultadejugadoresdelequipo=mysql_query("SELECT jugador,nombre1,nombre2,apellido1,apellido2,goles FROM `tr_jugadoresxpartido`,tb_jugadores WHERE partido=$partido AND jugador IN (SELECT id_jugadores FROM tb_jugadores WHERE equipo=$equipo2) AND tr_jugadoresxpartido.jugador=tb_jugadores.id_jugadores");
while($resultadoconsulta=mysql_fetch_array($consultadejugadoresdelequipo)){


?>
<center>
<input type="text" size="30" readonly="readonly" value="<?php echo $resultadoconsulta['nombre1']." ".$resultadoconsulta['nombre2']." ".$resultadoconsulta['apellido1']." ".$resultadoconsulta['apellido2'];?>">
<input type="hidden" value="<?php echo $resultadoconsulta['jugador']?>" name="idjugadores<?php echo $i ?>">
<input type="text" size="1" value="<?php echo $resultadoconsulta['goles']?>" name="nuevosgoles<?php echo $i ?>">
</center>
<?php
$i=$i+1;
}

?>
<br>
<input type="hidden" name="numerodejugadores" value="<?php echo  $i ?>"/>
<center><input type="submit" value="Guardar" name="guardar"></center></form>
<br><br><br><br><br>
<?php

}
}
?>