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


	<?php
$totaljugadores=0;
if (isset($_POST['agregar'])) {
	$idpartido = $_POST['idpartido'];



$equipo1= $_POST['equipo1'];
$equipo2= $_POST['equipo2'];
$nombreequipo1 = mysql_query("SELECT * from tb_equipos WHERE id_equipo=$equipo1");
$nombreequipo2 = mysql_query("SELECT * from tb_equipos WHERE id_equipo=$equipo2");
$buscarjugadores1 = mysql_query("SELECT * from tb_jugadores WHERE equipo=$equipo1 ORDER BY nombre1 asc");
$buscarjugadores2 = mysql_query("SELECT * from tb_jugadores WHERE equipo=$equipo2 ORDER BY nombre1 asc");
if ($equ= mysql_fetch_array($nombreequipo1)){

?>

<form  id="principal"
 class="formoid-solid-dark" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',
 Arial,Helvetica,sans-serif;color:#34495E;max-width:800px;min-width:150px" method="POST">

<br>
<center><b><label><?php echo $equ['nombre_equipo'];?></b></label>
<input style="padding-left:8px;width:30px" type="text" name="resultado1" value="0" size="1" maxlength="1" required/></center>
<input type="hidden" name="idpartido" value="<?php echo $idpartido;?>">
<br>
<b><label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspJugadores&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp Amonestaciones&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGoles</label></b>


<?php
}

$arr = Array();
$i=0;
while ($jugadores1=mysql_fetch_array($buscarjugadores1)) {

	$id=$jugadores1['id_jugadores'];
	
		# code...
	
	 //$arr[] = "$id";


	?>

<input class="medium" style="margin-left:2px"type="text" name="jugador<?php echo $i ?>" readonly="readonly" value="<?php echo $jugadores1['nombre1']." ". $jugadores1['nombre2']. " ".$jugadores1['apellido1']. " ".$jugadores1['apellido2'] ;?>"/>
<input type="hidden" name="idjugador<?php echo $i ?>" value="<?php echo $id ?>"/>

<select class="small" name="amonestacion<?php echo $i ?>">																														">
		<option value="5" selected="selected">Ninguna</option>
		<option value="1">Amarilla</option>
  		<option value="2">Roja</option>
</select>

<input style="width:35px; margin-left:25px;padding-left:9px" type="text" name="goles<?php echo $i ?>" value="0" size="1" maxlength="1"/>
<!--<input type="hidden" name="ides" value='<?php echo serialize($arr) ?>'></input>-->

<div class="element-checkbox" style="width:80px;float:right"><input  type="checkbox" name="asistencia<?php echo $i ?>" value="on"/><span>Asistió</span></div>
	
<?php
$i=$i+1;
}
?>
<br>
	<?php

if ($equ= mysql_fetch_array($nombreequipo2)){
?>


<!--<div style="clear:both"><center><h2 style="margin-left:0"><?php echo $equ['nombre_equipo'];?></h2></center><center>
	<input style="padding-left:8px;width:20px" type="text" name="resultado1" /></center></div>
	<br><br>-->
	<br>

<center><b><label><?php echo $equ['nombre_equipo'];?></b></label>
<input style="padding-left:8px;width:30px" type="text" name="resultado2" value="0" size="1" maxlength="1" required/></center>

<br>
<b><label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspJugadores&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp Amonestaciones&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGoles</label></b>


<?php
}
while ($jugadores2=mysql_fetch_array($buscarjugadores2)) {

$id1=$jugadores2['id_jugadores'];

	?>

<input class="medium" style="margin-left:2px" type="text" name="jugador<?php echo $i ?>" readonly="readonly" value="<?php echo $jugadores2['nombre1']." ". $jugadores2['nombre2']. " ".$jugadores2['apellido1']. " ".$jugadores2['apellido2'] ;?>"/>
	<input type="hidden" name="idjugador<?php echo $i ?>" value="<?php echo $id1 ?>"/>
<select class="small" name="amonestacion<?php echo $i ?>">																														">
		<option value="5" selected="selected">Ninguna</option>
		<option value="1">Amarilla</option>
  		<option value="2">Roja</option>
</select>

<input style="width:35px; margin-left:25px;padding-left:9px" type="text" name="goles<?php echo $i ?>" value="0"  size="1" maxlength="1"/>
<!--<input type="hidden" name="ides" value='<?php echo serialize($arr) ?>'></input>-->

<div class="element-checkbox" style="width:80px;float:right"><input  type="checkbox" name="asistencia<?php echo $i ?>" value="on"/><span>Asistió</span></div>
		
	
<?php
$i=$i+1;
}

}
?>
<input type="hidden" name="numerodejugadores" value="<?php echo $i ?>"/>
<br><br>
<br>
<center><input type="submit" value="Guardar" name="guardar"></center>
<br>
</form>
<br><br>
</body>
</html>
<?php


}

if (isset($_POST['guardar'])) {
	$num=$_POST['numerodejugadores'];
	$idgame=$_POST['idpartido'];
	$result1=$_POST['resultado1'];
	$result2=$_POST['resultado2'];

$matriz['75']['4']=0;

for ($i=0; $i<$num ; $i++) { 
$matriz[$i]['0']=$_POST['jugador'.$i];
$matriz[$i]['1']=$_POST['amonestacion'.$i];
$matriz[$i]['2']=$_POST['goles'.$i];
$matriz[$i]['4']=$_POST['idjugador'.$i];
if(empty($_POST['asistencia'.$i])){
	$matriz[$i]['3']="off";
}else{
$matriz[$i]['3']="on";
}


}

for ($i=0; $i<$num;$i++) { 
	if($matriz[$i]['3']=="on"){
		$goal=$matriz[$i]['2'];
		$faul=$matriz[$i]['1'];
		$game= $_POST['idpartido'];
		$player=$matriz[$i]['4'];

		mysql_query("INSERT INTO `tr_jugadoresxpartido`(`jugador`, `partido`, `amonestacion`, `goles`)
		 VALUES ('$player','$game','$faul','$goal')");
$jornadadelaamonestacion=mysql_fetch_array(mysql_query("SELECT numero_fecha FROM tb_partidos WHERE id_partido='$idgame'"));
$jornada=$jornadadelaamonestacion['numero_fecha'];
		mysql_query("INSERT INTO `tr_amonestacionesxjugador`(`id_amonestacioxjugador`, `jugador`, `amonestacion`, `estado_amonestacion`, `duracion`,`comentario`, `jornada_amonestacion`) 
			VALUES (null,'$player','$faul','1','0','','$jornada')");
	}
}
$resultado = mysql_query("UPDATE `tb_partidos` SET `resultado1`=$result1,`resultado2`=$result2,`Estado`='2' WHERE id_partido=$idgame");
if ($resultado==TRUE){

?>
    <script>

  alert("Se agregó el resultado")
   window.location.href="AgregarResultados.php";
  </script>
<?php

}else{

?>
    <script>

  alert("Falló la operación")
   window.location.href="AgregarResultados.php";
  </script>
<?php

}
}

?>