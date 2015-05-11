<?php
session_start();
include('../../conexion.php');
$id = $_GET['id'];
?>

<html>
    <head>
        <title>Copa Amistad Profesional</title>
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
                        <span><a href="Miequipos.php?id=<?php echo $id ?>"><img style=" margin-right: 8%;margin-left: 5%;" src="../../images/icons-png/calendario.png"></a></span>
                        <span><a href="AmonestacionesDeEquipos.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="../../images/icons-png/amonestaciones.png"></a></span>
                        <span><a href="TablaAmonestacionesHistorico.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="../../images/icons-png/icon-his.png"></a></span>
                        <span><a href="TablaDeGoleadoresDeEquipo.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="../../images/icons-png/goleadores.png"></a></span>
                        <span><a href="JugadoresDeEquipo.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="../../images/icons-png/jugadores.png"></a></span>
                        <span><a href="TablaDeAsistencia.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="../../images/icons-png/asistencia.png"></a></span>

                    </center>
                </div>
            </div>

            <div data-role="main" class="ui-content">
                <center><cite>Goleadores del equipo</cite></center>
                <table width="100%" style="font-size: small; margin: auto;" data-role="table" id="table-custom-2" data-mode="columntoggle" 
                       class="ui-body-d ui-shadow table-stripe ui-responsive t" 
                       data-column-btn-text="" >

                    <thead>
                        <tr class="ui-bar-d">

                            <th style="width: 33%;" >Nombre</th>
                            <th style="width: 33%;" >Goles</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $id = $_GET['id'];
                        $goleadores1 = mysql_query("SELECT jugador,SUM(goles) AS goles1 from tr_jugadoresxpartido WHERE goles!=0 GROUP BY jugador order by goles1 desc")or die(mysql_error());
                        while ($numerodegoles = mysql_fetch_array($goleadores1)) {
                            $jugador = $numerodegoles['jugador'];
                            $prueba = mysql_query("SELECT nombre1,apellido1,equipo FROM tb_jugadores WHERE id_jugadores=$jugador AND equipo=$id ");
                            while ($nombrej = mysql_fetch_array($prueba)) {
                                ?>
                                <tr  width="100%">
                                    <td style="width: 50%;"> <?php echo $nombrej['nombre1'] . " " . $nombrej['apellido1']; ?></td>
                                    <td style="width: 50%;"> <?php echo $numerodegoles['goles1']; ?> </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>

    </body>  

</html>