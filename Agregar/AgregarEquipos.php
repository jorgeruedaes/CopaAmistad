
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
		
		<div class="shell">
			<!-- Logo -->
			<br>
	    <h1 id="logo" class="notext"><a href="#">Tu torneo App</a></h1>
			
			<!-- End Logo -->
		</div>
	</div>
	<!-- End Header -->
	
	<!-- Navigation -->
	<div id="navigation">
		<div class="shell">
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
		<li><a href="../Modificar/ModificarAsistencia.php">Asistencia</a></li></ul>

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
			


</div>
<br><br><br>
<BR><BR>
<link rel="stylesheet" href="formoid_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="formoid_files/formoid1/jquery.min.js"></script>

<form action="AgregarEquipos.php" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:16px;font-family:'Lato', sans-serif;color:#666666;max-width:500px;min-width:150px" method ="post">
	<div class="title"><h2>Nuevo equipo</h2></div>
	<div class="element-input" title="sccxc"><label class="title">Nombre del nuevo equipo:</label><input class="medium" type="text" name="nombre" id="nombre" required/></div>
	<div class="element-input"><label class="title">Nombre del técnico 1:</label><input class="large" type="text" name="tecnico1" id="tecnico1" required/></div>
	<div class="element-input"><label class="title">Nombre del técnico 2:</label><input class="large" type="text" name="tecnico2" id="tecnico2" / ></div>
<div class="submit"><input type="submit" value="Agregar" name="enviar"/></div>
<input type="hidden" value="1" name="torneo">
<input type="hidden" value="0" name="puntos">
</form>

<script type="text/javascript" src="formoid_files/formoid1/formoid-flat-black.js"></script>


</body>
</html>
<?php
}

if(isset($_POST['enviar'])){

// INSERTAR EQUIPOS EN LA BASE DE DATOS

	$nombre= $_POST['nombre'];
	$tecnico1= $_POST['tecnico1'];
	$tecnico2= $_POST['tecnico2'];
	//$imagen= $_POST['imagen'];
	$puntos= $_POST['puntos'];
	$torneo= $_POST['torneo'];
	$query ="INSERT INTO `tb_equipos`(`id_equipo`, `nombre_equipo`, `tecnico1`, `tecnico2`, `puntos`, `torneo`, `imagen_escudo`) 
	VALUES (NULL,'$nombre','$tecnico1','$tecnico2','$puntos','$torneo','xx');";
$insertar=mysql_query($query);
	echo "<script language='JavaScript' type='text/javascript'>
alert('Equipo Creado!');
</script>";

}

?>