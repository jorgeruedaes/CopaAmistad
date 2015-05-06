<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../conexion.php');  
//$identificadordepartido=$_POST['id'];
//$identificadordepartido=$identificadordepartido;
if (isset($_SESSION['admin'])) {

$letras=$_SESSION['admin'];
$numeros=mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysql_fetch_array($numeros);
$name=$caracteres['id_torneo'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!--<meta http-equiv="Content-type" content="text/html; charset=utf-8" />-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <li><a href="AgregarJugadores.php">Jugadores</a></li>      
    <li><a href="AgregarEquipos.php">Equipos</a></li>
    <li><a href="AgregarPartidoAlCalendario.php">Partidos</a></li>
    <li><a href="form_noticias.php">Noticias</a></li>
    <li><a href="AgregarResultados.php">Resultados</a></li>
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
          
         <li><a href="Estadisticas.php">Estadísticas</a></li>

         <li><a href="ModuloTraspasos.php">Traspasos</a></li>
           <li><a href="#">Informes</a>
          <ul>  
    
    <li><a href="../Modificar/pdf.php">Amonestaciones</a></li>
    <li><a href="../Modificar/pdf1.php">Ficha Técnica</a></li>
    <li><a href="../Modificar/pdf2.php">Posiciones</a></li>
    <li><a href="#">Goleadores</a></li>
  </ul>
      </ul>
      <div class="cl">&nbsp;</div>
    
  </div>
	<!-- End Navigation -->
	
	<br><br>
<link rel="stylesheet" href="formoid5_files/formoid1/formoid-solid-dark.css" type="text/css" />
<script type="text/javascript" src="formoid5_files/formoid1/jquery.min.js"></script>

<script type="text/javascript" src="formoid5_files/formoid1/formoid-solid-dark.js"></script>

<form  id="principal"
 class="formoid-solid-dark" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',
 Arial,Helvetica,sans-serif;color:#34495E;max-width:800px;min-width:150px" method="POST">
<br>
<b><label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProfesiones&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label></b>
<br>
<?php
$consulta1=mysql_query("SELECT * FROM `tb_profesiones` ORDER BY nombre asc ");
while($resultado1=mysql_fetch_array($consulta1)){

	?>

<input style="margin-left: 40px;" class="medium" style="margin-left:2px"type="text" name="jugador<?php echo $i ?>" readonly="readonly" value="<?php echo $resultado1['nombre'] ?>"/>
<?php
}
?>
<br><br>
<br>
</form>

<br><br>
</body>
</html>
<?php
}
?>