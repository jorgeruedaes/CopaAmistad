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


<link rel="stylesheet" href="formoid3_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="formoid3_files/formoid1/jquery.min.js"></script>
<center><div class="title"><h2>Listado de equipos</h2></div></center>

	<?php
$equipos = mysql_query("SELECT * from tb_equipos WHERE torneo='1'");
	while ($res_equipos=mysql_fetch_array($equipos)) {

	?>

<form action="ModificarEquipos1.php"class="formoid-flat-black" style="background-color:#ffffff;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">

	<div class="element-input" style="padding-left:5px"><label class="title"></label>
		<input style="width:300px" type="text" name="input" readonly="readonly" value="<?php echo $res_equipos['nombre_equipo'];?>"/>
	<button style="width:70px;padding-left:5px;padding-right:5px;margin-left:10px"class="boton_modificar" name="modificar" type="submit">Modificar</button>
		<input type="hidden" name="idequipo" value="<?php echo $res_equipos['id_equipo'];?>">
		
		
		</div>
</form>&nbsp
<?php
}
?>
<script type="text/javascript" src="formoid3_files/formoid1/formoid-flat-black.js"></script>

<br><br>
</body>
</html>

<?php





}
?>