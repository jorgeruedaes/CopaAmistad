<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('conexion.php');  

if (isset($_SESSION['admin'])) {

$letras=$_SESSION['admin'];
$numeros=mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysql_fetch_array($numeros);
$name=$caracteres['id_torneo'];
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Copa Amistad Profesional modulo de Administracion</title>
  <link rel="stylesheet" href="css/styler.css" type="text/css" media="all" />
  <!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
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
  
  <div id="header">
    <br>
    <div class="shell">
      <!-- Logo -->
      <h1 id="logo" class="notext"><a href="#">Tu torneo App</a></h1>
      
      <!-- End Logo -->
    </div>
  </div>
  <!-- End Header -->
  
  <!-- Navigation -->
  <div id="navigation">
    <div class="shell">
      <div class="cl">&nbsp;</div>
      <ul>
        <li><a href="../modulousuariostutorneo.php"><img src="../home.png" width="20" height="20"></a></li>
       
         <li><a href="#">Agregar</a>
         <ul>
          <li><a href="../Agregar/AgregarJugadores.php">Jugadores</a></li>
    <li><a href="../Agregar/AgregarEquipos.php">Nuevos Equipos</a></li>
    <li><a href="../Agregar/AgregarPartidoAlCalendario.php">Nuevos Partidos</a></li>
    <li><a href="../Agregar/form_noticias.php">Noticias</a></li>
    <li><a href="../Agregar/AgregarResultados.php">Resultados</a></li>
    </ul>
  </li>

         <li><a href="#">Modificar</a>
<ul>
    <li><a href="../Modificar/ModificarJugadores.php">Jugadores</a></li>
    <li><a href="../Modificar/ModificarEquipos.php">Equipos</a></li>
    <li><a href="../Modificar/ModificarNoticias.php">Noticias</a></li>
    <li><a href="../Modificar/ModificarResultados.php">Resultados</a></li>
    <li><a href="../Modificar/ModificarAmonestaciones.php">Amonestaciones</a></li>
    <li><a href="#">Calendario</a></li>
    <li><a href="../Modificar/ModificarAsistencia.php">Asistencia</a></li>   </ul>

          </li>
          
          </li>
          
         <li><a href="Estadisticas.php">Estadisticas</a></li>

         <li><a href="ModuloTraspasos.php">Traspasos</a></li>
          <li><a href="#">Informes</a>
          <ul>  
    
    <li><a href="../Modificar/pdf.php">Amonestaciones Jugadores</a></li>
    <li><a href="#">Amonestaciones Equipos</a></li>
    <li><a href="../Modificar/pdf1.php">Ficha Técnica</a></li>
    <li><a href="../Modificar/pdf2.php">Posiciones</a></li>
    <li><a href="#">Goleadores</a></li>
  </ul>
      </ul>
      <div class="cl">&nbsp;</div>
    
  </div>
</div>

<br><br>
<center><div class="title"><h2>Datos del partido</h2></div></center>
<br>
<?php

if(isset($_POST['modificar'])){

$partido=$_POST['idpartido'];
$estado=$_POST['idestado'];
$equipo1=$_POST['idequipo1'];
$equipo2=$_POST['idequipo2'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$equipos=$_POST['equipos'];
$lugar=$_POST['lugar'];

$nombrelugar= mysql_query("SELECT * from tb_lugares WHERE id_lugar='$lugar'");
$result=mysql_fetch_array($nombrelugar);

$nombreestado=mysql_query("SELECT * from tb_estados_partido WHERE id_estado='$estado'");

$res=mysql_fetch_array($nombreestado);
?>
<link rel="stylesheet" href="formoid17_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="formoid17_files/formoid1/jquery.min.js"></script>

<form action="ModificarCalendario1.php"class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:500px;min-width:150px" method="post">
<div class="element-input"><label class="title"></label><input style="font-weight:bold;;width:330px" size="30" type="text" readonly="readonly" value="<?php echo $equipos?>" name="input" />
<input type="hidden" name="idpartido" value="<?php echo $partido?>"> 
<input type="hidden" name="fecha" value="<?php echo $fecha?>"> 
<input type="hidden" name="hora" value="<?php echo $hora?>"> 

<label>Fecha:</label> <input  type="text" name="nuevafecha" size="20" value="<?php echo $fecha?>">
<br>
<label>Hora:</label> <input  type="time" size="20" name="nuevahora" value="<?php echo $hora?>">
<br>
<label>Lugar  actual:</label> <input  type="text" readonly="readonly" size="20" name="lugar" value="<?php echo $result['nombre']?>">
<br>
<?php
$lugares=mysql_query("SELECT * FROM tb_lugares");

if (mysql_num_rows($lugares) > 0)
  {
   echo"Nuevo lugar del partido: (Seleccione el mismo si no hay cambio) <center><select name='lugar' selected=selected>\n ";
    while ($tempo = mysql_fetch_array($lugares))
      {
       print" <option value='".$tempo["id_lugar"]."'>".$tempo["nombre"]."</option>\n";
      }
   echo" </select></center>\n";
  }
  else
     {
      echo"No hay datos";
     }
?>
<label>Estado actual:</label> <input type="text" size="30" readonly="readonly" value="<?php echo $res['nombre']?>">
<br>
<?php
$estados=mysql_query("SELECT * FROM tb_estados_partido where id_estado!='2'");

if (mysql_num_rows($estados) > 0)
  {
   echo"Nuevo estado del partido: (Seleccione el mismo si no hay cambio) <center><select name='estado' selected=selected>\n ";
    while ($temp = mysql_fetch_array($estados))
      {
       print" <option value='".$temp["id_estado"]."'>".$temp["nombre"]."</option>\n";
      }
   echo" </select></center>\n";
  }
  else
     {
      echo"No hay datos";
     }
?>

</div>
<br>
<center><button style="width:200px;height:30px;padding-left:30px;padding-right:30px;margin-left:10px"class="boton_modificar" name="guardar" type="submit">Guardar cambios</button></center>
<br>
</form><script type="text/javascript" src="formoid17_files/formoid1/formoid-flat-black.js"></script>
<br>
</body>
</html>
<?php
}}

if(isset($_POST['guardar'])){
$partido=$_POST['idpartido'];
$fecha=$_POST['nuevafecha'];
$hora=$_POST['nuevahora'];
$estado=$_POST['estado'];
$lugar=$_POST['lugar'];

$consultaguardar= mysql_query("UPDATE tb_partidos SET fecha='$fecha', hora='$hora', Estado='$estado', Lugar='$lugar' WHERE id_partido=$partido");

if($consultaguardar == FALSE){
  ?>
    <script>

  alert("Falló la modificación")
  window.location.href="ModificarCalendario.php";
  
  </script>

<?php

}
else

    ?>
    <script>

  alert("Calendario modificado!")
  window.location.href="ModificarCalendario.php";
  
  </script>

<?php


}

?>