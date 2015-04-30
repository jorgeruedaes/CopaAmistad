
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
    <li><a href="../Modificar/ModificarAsistencia.php">Asistencia</a></li>
	</ul>

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
			</ul>
			<div class="cl">&nbsp;</div>
		
	</div>
	<!-- End Navigation -->
	
	<br>
<div  data-theme="b">

	<center><div class="title"><h2>Resultados</h2></div></center>
<?php
$nametor = mysql_query("SELECT * from tb_partidos WHERE  Estado='1' ")or die(mysql_error());
	while ($tor=mysql_fetch_array($nametor)) {

	?>

<tr class="alt">
	
	<td>  
	 <?php
	 $nombre=$tor['equipo1'];
	 $par= $tor['id_partido'];

$nom=mysql_query("select * from tb_equipos where id_equipo=$nombre");
$nome1=mysql_fetch_array($nom);

	   ?> 


	</td>
	
	<td> 
	 <?php 
$nombre=$tor['equipo2'];
$nom=mysql_query("select * from tb_equipos where id_equipo=$nombre");
$nome2=mysql_fetch_array($nom);

	
$final = $nome1['nombre_equipo']." vs ".$nome2['nombre_equipo'];  
$par= $tor['id_partido'];
 
 	?>


	 </td>
	 
</tr>

<link rel="stylesheet" href="formoid2_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="formoid2_files/formoid1/jquery.min.js"></script>
<form action= "formularioResultados.php"class="formoid-flat-black" style="background-color:#FFFFFF;font-size:13px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
<input type="hidden"  name="equipo1" value="<?php echo $nome1['id_equipo'];?>">
<input type="hidden" name="equipo2" value="<?php echo $nome2['id_equipo'];?>">
	<div class="element-input"><label class="title"></label><input style="width:360px" type="text" name="input" readonly="readonly" value="<?php echo $final; ?>" />
<input type="submit" name="agregar" value="+"/>
</div>

<input type="hidden"  name="idpartido" value="<?php echo $par;?>">

	<!--<a href="formularioResultados.php?id=<?php echo $tor['id_partido'];?>">Agregar Resultado</a>-->
</form><script type="text/javascript" src="formoid2_files/formoid1/formoid-flat-black.js"></script>

<?php

}

?>

	<div id="footer">
		<div class="shell">
			<div class="cl">&nbsp;</div>
			
			<div class="cl">&nbsp;</div>
		</div>
	</div>
</div>
	<!-- End Footer -->
</body>
</html>
<?php
}
?>