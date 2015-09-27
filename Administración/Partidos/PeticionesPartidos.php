<?php

session_start();
include ('../../conexion.php');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2 or $pruebadeinicio == 4) {
    $resultado = '{"Salida":true,';
    $Bandera = $_POST['Bandera'];
    if ($Bandera === "ConsultarFecha") {
        $query1 = mysql_fetch_array(mysql_query("SELECT Max(numero_fecha)as fecha FROM `tb_partidos` WHERE Estado=2"));
        $query2 = mysql_fetch_array(mysql_query("SELECT Count(*) as cantidad FROM `tb_partidos` WHERE Estado=1"));
        $Cantidad = $query2['cantidad'];
        $fecha = $query1['fecha'];
        if ($fecha === null && $Cantidad === 0) {
            $resultado.='"fecha":"1"';
            $resultado.=',"Mensaje":true';
        } else if ($fecha != null) {
            if ($Cantidad === 0) {
                $fecha = $fecha + 1;
                $resultado.='"fecha":"' . $fecha . '"';
                $resultado.=',"Mensaje":true';
            } else if ($Cantidad > 11) {
                $query3 = mysql_fetch_array(mysql_query("SELECT Max(numero_fecha)as fecha FROM `tb_partidos` WHERE Estado=1"));
                $fecha = $query3['fecha'];
                $residuo = fmod($Cantidad, 11);
                if ($residuo != 0) {
                    $resultado.='"fecha":"' . $fecha . '"';
                    $resultado.=',"Mensaje":true';
                } else {
                    $fecha = $fecha + 1;
                    $resultado.='"fecha":"' . $fecha . '"';
                    $resultado.=',"Mensaje":true';
                }
            } else if($Cantidad==11){
                $query3 = mysql_fetch_array(mysql_query("SELECT Max(numero_fecha)as fecha FROM `tb_partidos` WHERE Estado=1"));
                $fecha = $query3['fecha']+1;
                $resultado.='"fecha":"' . $fecha . '"';
                $resultado.=',"Mensaje":true';
            }else {
                $fecha = $fecha + 1;
                $resultado.='"fecha":"' . $fecha . '"';
                $resultado.=',"Mensaje":true';
            }
        } else {
               
            if($Cantidad === 0){
                $query3 = mysql_fetch_array(mysql_query("SELECT Max(numero_fecha)as fecha FROM `tb_partidos` WHERE Estado=1"));
                $fecha = $query3['fecha'];
                $fecha = $fecha+ 1;
                $resultado.='"fecha":"' . $fecha . '"';
                $resultado.=',"Mensaje":true';
            }
            
            else if ($Cantidad > 11) {
                $query3 = mysql_fetch_array(mysql_query("SELECT Max(numero_fecha)as fecha FROM `tb_partidos` WHERE Estado=1"));
                $fecha = $query3['fecha'];
                $residuo = fmod($Cantidad, 11);
                if ($residuo != 0) {
                    $resultado.='"fecha":"' . $fecha . '"';
                    $resultado.=',"Mensaje":true';
                } else {
                    $fecha = $fecha + 1;
                    $resultado.='"fecha":"' . $fecha . '"';
                    $resultado.=',"Mensaje":true';
                }
            } else if($Cantidad==11){
                $query3 = mysql_fetch_array(mysql_query("SELECT Max(numero_fecha)as fecha FROM `tb_partidos` WHERE Estado=1"));
                $fecha = $query3['fecha']+1;
                $resultado.='"fecha":"' . $fecha . '"';
                $resultado.=',"Mensaje":true';
            }else{
                $query3 = mysql_fetch_array(mysql_query("SELECT Max(numero_fecha)as fecha FROM `tb_partidos` WHERE Estado=1"));
                $fecha = $query3['fecha'];
                $resultado.='"fecha":"' .$fecha. '"';
                $resultado.=',"Mensaje":true';
            }
        }
    } else if ($Bandera === "AgregarPartidos") {
       $hora =$_POST['hora'];
       $fecha=$_POST['fecha'];
       $equipo1=$_POST['equipo1'];
       $equipo2=$_POST['equipo2'];
       $lugar=$_POST['lugar'];
       $juez=$_POST['juez'];
       $jornada=$_POST['fechatorneo'];
        $query = mysql_query("INSERT INTO `tb_partidos`(`id_partido`, `equipo1`, `equipo2`, `resultado1`, `resultado2`, `fecha`, `hora`, `numero_fecha`, `Lugar`, `Estado`, `Juez`) "
                . "VALUES (NULL,'$equipo1','$equipo2','0','0','$fecha','$hora','$jornada','$lugar','1','$juez')");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "Comprobarpartidos") {
       $equipo1=$_POST['equipo1'];
       $equipo2=$_POST['equipo2'];
       $jornada=$_POST['fechatorneo'];
        $query = mysql_fetch_array(mysql_query("SELECT count(*)as cantidad FROM `tb_partidos` WHERE numero_fecha=$jornada and (equipo1=$equipo1 or equipo2 =$equipo1) and Estado!=6 and Estado!=3 and Estado!=4"));
        $query1 = mysql_fetch_array(mysql_query("SELECT count(*) as cantidades FROM `tb_partidos` WHERE numero_fecha=$jornada and (equipo1=$equipo2 or equipo2 =$equipo2) and Estado!=6 and Estado!=3 and Estado!=4"));
        $cantidad1=$query['cantidad'];
        $cantidad=$query1['cantidades'];
        if($cantidad>0 || $cantidad1>0){
            $resultado.='"Mensaje":false';
        }else{
                $resultado.='"Mensaje":true';
        }
         
    } else if ($Bandera === "ModificarAsistencia") {
       $partido=$_POST['partido'];
       $jugador=$_POST['jugador'];
       $fecha=$_POST['fecha'];
        $querydeprueba=mysql_query("SELECT * FROM tr_jugadoresxpartido WHERE jugador='$jugador' and partido='$partido' ");
        if(mysql_num_rows($querydeprueba)>0){
            $variable = mysql_query("DELETE FROM tr_jugadoresxpartido WHERE jugador='$jugador' and partido='$partido' "); 
            mysql_query("DELETE FROM `tr_amonestacionesxjugador` WHERE jugador='$jugador' AND jornada_amonestacion='$fecha' ");
        }else{
          $variable=  mysql_query("INSERT INTO `tr_jugadoresxpartido`(`jugador`, `partido`, `amonestacion`, `goles`) "
                    . "VALUES ('$jugador','$partido',5,0)");
        }
        if($variable){
                $resultado.='"Mensaje":true';
        }else{
              $resultado.='"Mensaje":false';
        }
         
    }
} else {
    $resultado = '{"Salida":false,';
}
$resultado.='}';
echo ($resultado);
mysql_close($con);
?>