<?php 
session_start();
include('../../conexion.php');
$resultado ='{"Salida":true,';
$Bandera = $_POST['Bandera'];
if($Bandera==="Activar"){
	$idpartido=$_POST['idPartido'];
	$query=mysql_query("UPDATE `tb_partidos` SET `Estado`='5' WHERE id_partido='$idpartido'");
	if($query){
$resultado.='"Mensaje":true';
	}else{
$resultado.='"Mensaje":false';
	}
$resultado.='}';
}
else if($Bandera==="Terminar"){
$idpartido=$_POST['idPartido'];
$query=mysql_query("UPDATE `tb_partidos` SET `Estado`='2' WHERE id_partido='$idpartido'");
if($query){
$resultado.='"Mensaje":true';
	}else{
$resultado.='"Mensaje":false';
	}

	$resultado.='}';
}
else if($Bandera==="Informar"){
$idpartido=$_POST['idPartido'];
$seleccion = $_POST['Seleccion'];
$query=mysql_query("UPDATE `tb_partidos` SET `Estado`='$seleccion' WHERE id_partido='$idpartido'");
if($query){
$resultado.='"Mensaje":true';
	}else{
$resultado.='"Mensaje":false';
	}

	$resultado.='}';
}
else if($Bandera==="EditarMarcador"){
$idpartido=$_POST['idPartido'];
$primero = $_POST['primero'];
$segundo = $_POST['segundo'];
$query=mysql_query("UPDATE `tb_partidos` SET resultado1=$primero,resultado2=$segundo WHERE id_partido='$idpartido'");
if($query){
	header("location:moduloplanilla.php");
	}else{
	header("location:moduloplanilla.php");
	}

	$resultado.='}';
}
echo ($resultado);

?>

<?php
mysql_close($con);

?>