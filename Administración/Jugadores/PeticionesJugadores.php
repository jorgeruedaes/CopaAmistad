<?php

session_start();
include '../../conexion.php';
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2 or $pruebadeinicio == 4) {
    $resultado = '{"Salida":true,';
    $Bandera = $_POST['Bandera'];
    if ($Bandera === "MostrarJugador") {
        $jugador = $_POST['id'];
        $query = mysql_query("SELECT * FROM tb_jugadores WHERE id_jugadores='$jugador'");
        $datos = mysql_fetch_array($query);
        $nombre1 = $datos['nombre1'];
        $nombre2 = $datos['nombre2'];
        $apellido1 = $datos['apellido1'];
        $apellido2 = $datos['apellido2'];
        $nacimiento = $datos['fecha_nacimiento'];
        $email = $datos['email'];
        $equipo = $datos['equipo'];
        $ingreso = $datos['fecha_ingreso'];
        $estado = $datos['estado_jugador'];
        $telf = $datos['telefono'];
        $id = $datos['id_jugadores'];
        $profesion = $datos['profesion'];
        if ($query) {
            $resultado.='"jugador":{"identificador": "' . $id . '","nombre": "' . $nombre1 . '","nombre2": "' . $nombre2 . '","apellido": "' . $apellido1 . '","apellido2": "' . $apellido2 . '","nacimiento": "' . $nacimiento . '","email":" ' . $email . '","ingreso": "' . $ingreso . '","telefono": "' . $telf . '","estado": "' . $estado . '","profesion": "' . $profesion . ' "}';
            $resultado.=',"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "EditarJugador") {
        $nombre1 = $_POST['nombre'];
        $nombre2 = $_POST['nombre2'];
        $apellido1 = $_POST['apellido'];
        $apellido2 = $_POST['apellido2'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];
        $telf = $_POST['telefono'];
        $id = $_POST['id'];
        $profesion = $_POST['profesion'];
        $query = mysql_query("UPDATE tb_jugadores SET nombre1='$nombre1',nombre2='$nombre2',apellido1='$apellido1',apellido2='$apellido2',email='$email',estado_jugador='$estado',telefono='$telf',profesion='$profesion' WHERE  id_jugadores=$id");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    }
} else {
    $resultado = '{"Salida":false,';
}
$resultado.='}';
echo ($resultado);
?>