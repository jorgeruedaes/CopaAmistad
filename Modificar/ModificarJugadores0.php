
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('conexion.php');  

if (isset($_SESSION['admin'])) {

$letras=$_SESSION['admin'];
$numeros=mysql_query("SELECT * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysql_fetch_array($numeros);
$name=$caracteres['id_torneo'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



  <title>Copa Amistad Profesional modulo de Administracion</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
    <li><a href="../Agregar/AgregarEquipos.php"> Equipos</a></li>
    <li><a href="../Agregar/AgregarPartidoAlCalendario.php"> Partidos</a></li>
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
    
    <li><a href="../Modificar/pdf.php">Amonestaciones </a></li>
    <li><a href="../Modificar/pdf1.php">Ficha Técnica</a></li>
    <li><a href="../Modificar/pdf2.php">Posiciones</a></li>
    <li><a href="#">Goleadores</a></li>
  </ul>
      </ul>
      <div class="cl">&nbsp;</div>
    
  </div>
</div>
<br><br>
<link rel="stylesheet" href="formoid10_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="formoid10_files/formoid1/jquery.min.js"></script>
<form action="ModificarJugadores1.php" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
  <br><br>

<?php


if (isset($_POST['buscar'])) {


$equipo = $_POST['equipo'];

$nombreequipo= mysql_query("SELECT * FROM tb_equipos where id_equipo=$equipo ");
$res=mysql_fetch_array($nombreequipo);
$jugadores=mysql_query("SELECT * FROM tb_jugadores where equipo=$equipo ORDER BY nombre1 asc");

if (mysql_num_rows($jugadores) > 0)
  {
   echo"&nbsp&nbsp<center><h3>Jugadores de ".$res['nombre_equipo'].": </h3><center><BR><select name='idjugador' >\n";
    while ($temp = mysql_fetch_array($jugadores))
      {
       print" <option value='".$temp["id_jugadores"]."'>".$temp["nombre1"]." ".$temp["nombre2"]." ".$temp["apellido1"]." ".$temp["apellido2"]."</option>\n";
      }
   echo" </select></center></center>\n";
   ?>
   <br><br>
<center><div style="margin-left:80px">
<input type="submit" value="Modificar" name="modificar"/>
<input type="submit" value="Eliminar" name="eliminar"/>
</div></center>
<br><br>
   <?php
  }
  else
     {
      ?>
<center>
      <?php
      echo"No hay datos";
      ?>
</center>
      <?php
     }

    
}


}

?>


</form><br><br>
</body>
</html>