<?php
session_start();
include('../../conexion.php');
$id = $_GET['id'];
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" type="text/css" href="../../js/jquery.mobile-1.4.3.css">
        <script type="text/javascript" src="../../js/jquery-1.11.1.js"></script>
        <link rel="stylesheet" href="../../themes/nuevarevolucion1.css"/>
        <link rel="stylesheet" href="../../themes/jquery.mobile.icons.min.css"/>
        <script type="text/javascript" src="../../js/jquery.mobile-1.4.3.js"></script>
    </head>
    <body>
        <div data-role="page" id="pagina7">  <!-- PAGINA PRINCIPAL 7 GOLEADORES -->
            <div data-role="header">
                <a href="../../index.php" style="
                   background-color: #8cc63f;
                   border-color: #8cc63f;
                   " class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="../../images/icons-png/carat-l-black.png"></a>
                <h1 style="height: 2%;margin: auto;">
                    <?php
                    $nombredequipo = mysql_fetch_array(mysql_query("SELECT nombre_equipo FROM tb_equipos WHERE id_equipo=$id"));
                    echo $nombredequipo['nombre_equipo'];
                    ?>
                </h1>
                <div id="iconos" style="height: 8%;">
                    <center> 
                        <span><a href="Miequipos.php?id=<?php echo $id ?>"><img style="width: 30px; margin-right: 5%;margin-left: 5%;" src="../../images/icons-png/calendario.png"></a></span>
                        <span><a href="AmonestacionesDeEquipos.php?id=<?php echo $id ?>"  ><img style="width: 30px;margin-right: 5%;" src="../../images/icons-png/amonestaciones.png"></a></span>
                        <span><a href="TablaAmonestacionesHistorico.php?id=<?php echo $id ?>"  ><img style="width: 30px;margin-right: 5%;" src="../../images/icons-png/icon-his.png"></a></span>
                        <span><a href="TablaDeGoleadoresDeEquipo.php?id=<?php echo $id ?>"  ><img style="width: 30px;margin-right: 5%;" src="../../images/icons-png/goleadores.png"></a></span>
                        <span><a href="JugadoresDeEquipo.php?id=<?php echo $id ?>"  ><img style="width: 30px;margin-right: 5%;" src="../../images/icons-png/jugadores.png"></a></span>
                        <span><a href="TablaDeAsistencia.php?id=<?php echo $id ?>"  ><img style="width: 30px;margin-right: 5%;" src="../../images/icons-png/asistencia.png"></a></span>
                    </center>
                </div>
            </div>

            <div data-role="main" class="ui-content">
                <center><cite>Asistencia</cite></center>

                <?php
                $a = mysql_query("SELECT nombre_equipo FROM tb_equipos where id_equipo=$id");
                $asistencia = mysql_fetch_array($a);
                $consulta1 = mysql_query("SELECT  distinct numero_fecha FROM tb_partidos WHERE Estado='2' AND (equipo1=$id or equipo2=$id)");
                $consulta2 = mysql_query("SELECT * FROM tb_jugadores WHERE equipo=$id order by nombre1 asc, apellido1 asc  ");
                ?>
                <table style="font-size: small;" data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive t" 
                       data-column-btn-text="=">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <?php
                            while ($asistenciasacrear = mysql_fetch_array($consulta1)) {
                                ?>
                                <th data-priority="2"><?php echo "P " . $asistenciasacrear['numero_fecha']; ?></th>
                                <?php
                            }
                            ?>
                            <th>Partidos asistidos</th>
                            <th>Porcentaje de asistencia</th></tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($consultajugadores = mysql_fetch_array($consulta2)) {
                            ?>
                            <tr>

                                <td><?php echo $consultajugadores['nombre1'] . " " . $consultajugadores['apellido1']; ?></td>
                                <?php
                                $consulta1 = mysql_query("SELECT  distinct numero_fecha FROM tb_partidos where Estado='2'AND (equipo1=$id or equipo2=$id)");
                                while ($asistenciasacrear = mysql_fetch_array($consulta1)) {
                                    ?>
                                    <td>
                                        <?php
                                        $asistenciasacrear1 = $asistenciasacrear['numero_fecha'];
                                        $player1 = $consultajugadores['id_jugadores'];
                                        $fechaingreso = $consultajugadores['fecha_ingreso'];
                                        $pruebasconsulta = mysql_query("SELECT partido FROM tr_jugadoresxpartido WHERE jugador=$player1 AND partido 
                        In (SELECT id_partido FROM tb_partidos WHERE fecha>'$fechaingreso' and Estado='2') ");
                                        while ($nuevaprueba = mysql_fetch_array($pruebasconsulta)) {
                                            $game1 = $nuevaprueba['partido'];
                                            $consulta3 = mysql_fetch_array(mysql_query("SELECT numero_fecha FROM tb_partidos WHERE id_partido=$game1"));
                                            $date = $consulta3['numero_fecha'];


                                            if ($date == $asistenciasacrear1) {
                                                ?> <img src="../../images/icons-png/check-black.png"> <?php
                                            }
                                        }
                                        ?>
                                    </td>
                                    <?php
                                }
                                ?>
                                <td>
                                    <?php
                                    $partidosreales = mysql_query("SELECT id_partido FROM tb_partidos WHERE fecha>'$fechaingreso' AND (equipo1=$id || equipo2 =$id)  AND Estado='2'");
                                    $partidosuperreales = mysql_query("SELECT id_partido FROM tb_partidos WHERE  (equipo1=$id || equipo2 = $id) AND Estado='2'");
                                    $calculo1 = mysql_query("SELECT * FROM tr_jugadoresxpartido  WHERE jugador=$player1 and partido IN (SELECT id_partido FROM tb_partidos WHERE Estado='2')");
                                    $fechasHastaahora = mysql_num_rows($partidosreales);
                                    if ($fechasHastaahora == 0) {
                                        echo $resultado = 0;
                                    } else {

                                        echo mysql_num_rows($calculo1);
                                        ?>
                                    </td>
                                    <td><?php
                                        $mini = mysql_num_rows($partidosuperreales);
                                        $result = (   mysql_num_rows($calculo1)/ ((16 - ( $mini - $fechasHastaahora ))) * 100);
                                        echo round($result) . "%";
                                        ?>
                                    </td>

                                </tr>
                                <?php
                            }
                        }
                        mysql_close($con);
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

    </body>  

</html>