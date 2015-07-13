<?php
session_start();
include '../../conexion.php';
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2 or $pruebadeinicio == 4) {
     $resultado ='{"Salida":true,';
    $Bandera=$_POST['Bandera'];
    if($Bandera==="MostrarJugador"){
    $jugador=$_POST['id'];
    $query=  mysql_query("SELECT * FROM tb_jugadores WHERE id_jugadores='$jugador'");
   $datos = mysql_fetch_array($query);
   $nombre1 =$datos['nombre1'];
   $nombre2 =$datos['nombre2'];
   $apellido1=$datos['apellido1'];
   $apellido2=$datos['apellido2'];
   $nacimiento=$datos['fecha_nacimiento'];
   $email=$datos['email'];
   $equipo=$datos['equipo'];
   $ingreso=$datos['fecha_ingreso'];
   $estado=$datos['estado_jugador'];
   $telf=$datos['telefono'];
   $profesion=$datos['profesion'];
   if($query){
       $resultado.='\"Jugador\":"'.$nombre1.'" ';
       
   }else{
        $resultado.='"Mensaje":false';
   }
    }
}else{
  $resultado ='{"Salida":false,';
}
  $resultado.='}';
 echo ($resultado);
?>