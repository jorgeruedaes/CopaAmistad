<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="es-Es" xmlns="http://www.w3.org/1999/xhtml">
<?php
 session_start();
    include('conexion.php');
?>

<?php
/// Consulta de numero de equipos que han jugado para generar la Tabla de posiciones

$equiposquehanjugado = mysql_query("SELECT distinct id_equipo,nombre_equipo,puntos
FROM copaamistad.tb_equipos, copaamistad.tb_partidos
WHERE tb_equipos.id_equipo = tb_partidos.equipo1 AND  tb_partidos.Estado='2'
GROUP BY id_equipo");




// se realiza la busqueda equipo por equipo con el fin de que se guarden los datos en una matrix , esto ayudara a organizar la informacion
// se calcula el numero de equipos que han jugado hasta ahora con una nueva variable que define el numero de columnas creadas (numero de equipos que ha jugado)
$numerodeequiposparaeltamañodelamatriz=mysql_num_rows($equiposquehanjugado);
$matriz = array();
$i=0;
while($identificaciones=mysql_fetch_array($equiposquehanjugado)){		
$matriz[$i]['3']=0;  // GOLES A FAVOR
$matriz[$i]['4']=0; // GOLES CONTRA
$matriz[$i]['5']=0;  // PARTIDOS PERDIOS
$matriz[$i]['6']=0;  // PARTIDOS GANADOS
$matriz[$i]['7']=0; // EMPATES


 $matriz[$i]['0'] =$identificaciones['id_equipo'];
 $matriz[$i]['1'] =$identificaciones['nombre_equipo'];
 $matriz[$i]['2'] =$identificaciones['puntos']; 



// // saber en que lugar esta si en el equipo1 o equipo2 para tomar los valores de los goles 
 $lugardentrodelospartidos=mysql_query("SELECT  distinct equipo1,equipo2,resultado1,resultado2
 FROM  copaamistad.tb_partidos WHERE tb_partidos.Estado='2'
 ");

while ($equipoparticipante=mysql_fetch_array($lugardentrodelospartidos)) { 
	if ($equipoparticipante['equipo1']==$identificaciones['id_equipo'] || $equipoparticipante['equipo2']==$identificaciones['id_equipo'] ) {
	
	// se incluira el codigo para saber que partidos se han ganado perdido o empatado por el respectivo equipo
// ifs para definir el ganador perdedor o empate

if ($equipoparticipante['resultado1']==$equipoparticipante['resultado2']) {
	// EMPATE
$matriz[$i]['7']=$matriz[$i]['7']+1;
}

if ($equipoparticipante['resultado1']>$equipoparticipante['resultado2']) {
	// GANA EQUIPO 1
	$matriz[$i]['6']=$matriz[$i]['6']+1;
}

if($equipoparticipante['resultado1']<$equipoparticipante['resultado2']){
	// GANA EQUIPO 2
	$matriz[$i]['5']=$matriz[$i]['5']+1;
}

// --->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>AQUI TERMINA CODIGO PARTIDOS

		if($equipoparticipante['equipo1']==$identificaciones['id_equipo']){
		  $Golesafavor =	$equipoparticipante['resultado1'];
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
		  $matriz[$i]['3']=$matriz[$i]['3']+$Golesafavor;
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
		  $Golescontra =	$equipoparticipante['resultado2'];
		  $matriz[$i]['4']=$matriz[$i]['4']+$Golescontra;

		}else{
  $Golesacontra =$equipoparticipante['resultado1'];
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
		  $matriz[$i]['4']=$matriz[$i]['4']+$Golesacontra;
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
		  $Golesafavor =	$equipoparticipante['resultado2'];
		  $matriz[$i]['3']=$matriz[$i]['3']+$Golesafavor;

		}
	


	}
}
$i++;
	
}

for ($i=0; $i <$numerodeequiposparaeltamañodelamatriz ; $i++) { 


?>


	<td> <?php  echo $matriz[$i]['0'] ?>; </td>
	<td> <?php  echo $matriz[$i]['2'] ?>; </td>
	<td> <?php  echo $matriz[$i]['3'] ?>; </td>
	<td> <?php  echo $matriz[$i]['4'] ?>; </td>
	<td>"EMPIEZAN LOS VALORES DE LOS PARTIDOS"</td>
	<br>
	<td> <?php  echo $matriz[$i]['6'] ?>; </td>
	<td> <?php  echo $matriz[$i]['7'] ?>; </td>
	<td> <?php  echo $matriz[$i]['5'] ?>; </td>
	<br>
<?php

}

	?>