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
    <li><a href="../Modificar/ModificarAsistencia.php">Asistencia</a></li>    </ul>

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

<link rel="stylesheet" href="formoid3_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="formoid3_files/formoid1/jquery.min.js"></script>
<center><div class="title"><h2>Listado de equipos</h2></div></center>

	<?php

	if(isset($_POST['modificar'])){
			$id_equipo=$_POST['idequipo'];
$equipos = mysql_query("SELECT * from tb_equipos WHERE id_equipo=$id_equipo");
	if ($res_equipos=mysql_fetch_array($equipos)) {

	?>

<form action="ModificarEquipos1.php"class="formoid-flat-black" style="background-color:#ffffff;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:550px;min-width:150px" method="post">

	<div class="element-input"><label class="title"></label>
		<center><label>Nombre del Equipo: &nbsp<input class="large" type="text" name="nombre"  value="<?php echo $res_equipos['nombre_equipo'];?>"/></label></center>
		<center><label>Técnico 1: <br><input class="large" type="text" name="tecnico1"  value="<?php echo $res_equipos['tecnico1'];?>"/></label></center>
		<center><label>Técnico 2: <br><input class="large" type="text" name="tecnico2" value="<?php echo $res_equipos['tecnico2'];?>"/></label></center>
<br>
		<button style="width:150px;padding-left:20px;padding-right:20px;margin-left:105px"class="boton_modificar" name="guardar" type="submit">Guardar cambios</button>
		<input type="hidden" name="idequipo" value="<?php echo $res_equipos['id_equipo'];?>">
		
		
		</div>
</form>&nbsp
<?php
}
}

if(isset($_POST['guardar'])){

	$nombre_equipo= $_POST["nombre"]; 
	$tecnico1= $_POST["tecnico1"]; 
	$tecnico2 = $_POST["tecnico2"]; 
	$id_equipo=$_POST['idequipo'];

$modificarequipo=mysql_query("UPDATE tb_equipos SET nombre_equipo='$nombre_equipo', tecnico1='$tecnico1', tecnico2='$tecnico2' WHERE id_equipo=$id_equipo");

if($modificarequipo=== FALSE) { 
    echo "No se pudo modificar el equipo";
}

else{
?>
    <script>

  alert("El equipo se modifico exitosamente")
   window.location.href="ModificarEquipos.php";
  </script>
<?php
}
}

if(isset($_POST['eliminar'])){

  $id_equipo=$_POST['idequipo'];

  $eliminarequipo=mysql_query("DELETE FROM tb_equipos where id_equipo=$'id_equipo'");


if($eliminarequipo=== FALSE) { 
    echo "No se pudo eliminar el equipo";
}

else{
?>
    <script>

  alert("El equipo se eliminó exitosamente")
   window.location.href="ModificarEquipos.php";
  </script>
<?php
}
  }



?>
<script type="text/javascript" src="formoid3_files/formoid1/formoid-flat-black.js"></script>

<br><br>
</body>
</html>

<?php

}
?>