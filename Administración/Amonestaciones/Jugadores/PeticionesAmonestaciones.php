<?php

session_start();
include '../../../conexion.php';
include('../../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2 or $pruebadeinicio == 4) {
    $resultado = '{"Salida":true,';
    $Bandera = $_POST['Bandera'];
    if ($Bandera === "MostrarAmonestacion") {
        $id = $_POST['id'];
        $query = mysql_query("SELECT * FROM tr_amonestacionesxjugador WHERE id_amonestacioxjugador='$id'");
        $datos = mysql_fetch_array($query);
        $comentario = $datos['comentario'];
        $duracion = $datos['duracion'];

        if ($query) {
            $resultado.='"datos":{"comentario": "' . $comentario . '","duracion": "' . $duracion . '"}';
            $resultado.=',"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "EditarAmonestacion") {
        $comentario = $_POST['comentario'];
        $duracion = $_POST['duracion'];
        $id = $_POST['id'];

        $query = mysql_query("UPDATE tr_amonestacionesxjugador SET duracion='$duracion',comentario='$comentario'WHERE  id_amonestacioxjugador=$id");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "PagarAmonestacion") {
        $id = $_POST['id'];

        $query = mysql_query("UPDATE tr_amonestacionesxjugador SET estado_amonestacion='2' WHERE  id_amonestacioxjugador=$id");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "EliminarAmonestacion") {
        $id = $_POST['id'];
// CONSULTA DE ELIMINAR
        $query = mysql_query("SELECT partido,tr_amonestacionesxjugador.jugador FROM tr_amonestacionesxjugador,tr_jugadoresxpartido  "
                . "WHERE id_amonestacioxjugador=$id and tr_amonestacionesxjugador.jugador=tr_jugadoresxpartido.jugador and partido "
                . "IN (SELECT partido FROM tb_partidos WHERE numero_fecha=jornada_amonestacion) and tr_jugadoresxpartido.amonestacion!=5 "
                . "and tr_jugadoresxpartido.amonestacion = tr_amonestacionesxjugador.amonestacion and estado_amonestacion=1");
        if ($query) {
            $eliminar = mysql_fetch_array($query);
            $partido=$eliminar['partido'];
            $jugador=$eliminar['jugador'];
            $query2 = mysql_query("UPDATE `tr_jugadoresxpartido` SET `amonestacion`=5 WHERE partido=$partido and jugador=$jugador");
            if ($query2) {
                $query1 = mysql_query("DELETE FROM `tr_amonestacionesxjugador` WHERE `id_amonestacioxjugador`=$id");
                if ($query1) {
                    $resultado.='"Mensaje":true';
                } else {
                    $resultado.='"Mensaje":false';
                }
            } else {
                $resultado.='"Mensaje":false';
            }
        } else {
            $resultado.='"Mensaje":false';
        }
    }
    else if ($Bandera === "RestaurarAmonestacion") {
        $id = $_POST['id'];
// CONSULTA DE ELIMINAR

                $query1 = mysql_query("UPDATE `tr_amonestacionesxjugador` SET `estado_amonestacion`=1 WHERE id_amonestacioxjugador=$id");
                if ($query1) {
                    $resultado.='"Mensaje":true';
                } else {
                    $resultado.='"Mensaje":false';
                }
        
       
    
} }else {
    $resultado = '{"Salida":false,';
}
$resultado.='}';
echo ($resultado);
?>