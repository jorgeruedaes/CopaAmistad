<?php

session_start();
include '../../conexion.php';
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2 or $pruebadeinicio == 4) {
    $resultado = '{"Salida":true,';
    $Bandera = $_POST['Bandera'];
    if ($Bandera === "MostrarEquipo") {
        $equipo = $_POST['id'];
        $query = mysql_query("SELECT * FROM tb_equipos WHERE id_equipo='$equipo'");
        $datos = mysql_fetch_array($query);
        $nombre = $datos['nombre_equipo'];
        $tecnico1 = $datos['tecnico1'];
         $tecnico2 = $datos['tecnico2'];
         $id = $datos['id_equipo'];
        
        if ($query) {
            $resultado.='"equipo":{"identificador": "' . $id . '","nombre": "' . $nombre . '","tecnico1": "' . $tecnico1 . '","tecnico2": "' . $tecnico2. ' "}';
            $resultado.=',"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "EditarEquipo") {
        $nombre = $_POST['nombre'];
        $tecnico1 = $_POST['tecnico1'];
        $tecnico2 = $_POST['tecnico2'];
        $id = $_POST['id'];
       
        $query = mysql_query("UPDATE tb_equipos SET nombre_equipo='$nombre',tecnico1='$tecnico1',tecnico2='$tecnico2'WHERE  id_equipo=$id");
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