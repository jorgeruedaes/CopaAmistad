<?php
session_start();
include('../../conexion.php');
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
        <div data-role="page" id="pagina3">  <!-- PAGINA PRINCIPAL 3 GOLEADORES -->
            <div data-role="panel" id="panel2" style="background-color: black;" > 
                <p style="font-family: Century Gothic;">
                <h3 style="color: white;">Opciones Adicionales</h3>
                <div><a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 10px;
                        margin-bottom: 10px;" 
                        href="../Menú_Lateral/Noticias.php" data-icon="info-white"  data-transition="Flip">
                        <img src="../../images/icons-png/info-white.png" style="margin-right: 10%;">Noticias
                        <img src="../../images/icons-png/carat-r-white.png" style="margin-left: 50%;"></a></div>

                <h3 style="color: white;">Copa Amistad</h3>
                <a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 9px;
                   margin-bottom: 10px;" 
                   href="../Menú_Lateral/Sugerencias.php" data-icon="info"  data-transition="Flip">
                    <img src="../../images/icons-png/comment-white.png" style="margin-right: 9%;">
                    Sugerencias<img src="../../images/icons-png/carat-r-white.png" style="margin-left: 39%;"></a>
                <br><br>
                <a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 10px;
                   margin-bottom: 10px;"
                   href="../Menú_Lateral/Acercade.php" data-icon="info"  data-transition="Flip"><img src="../../images/icons-png/gear-white.png" style="margin-right: 10%;">
                    Acerca de<img src="../../images/icons-png/carat-r-white.png" style="margin-left: 43%;"></a>
                </p>
            </div>
            <div data-role="header">
                <a href="#panel2" style="
                   background-color: #8cc63f;
                   border-color: #8cc63f;
                   " class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="../../images/icons-png/panel.png"></a>
                <h1 style="height: 2%;margin: auto;">Copa Amistad Profesional</h1>
                <div id="iconos" style="height: 8%;">
                    <center> 
                     <!-- <span><a href="../Finales/Cuadro.php"  ><img style="width: 30px;width: 30px;margin-right: 8%;margin-left: 7%;" src="../../images/icons-png/star.png"></a></span> -->  
                       <span><a href="../../index.php"><img style="width: 30px;margin-right: 8%;margin-left: 7%;" src="../../images/icons-png/calendario.png"></a></span>
                        <span><a href="TablaDePosiciones.php"  ><img style="width: 30px;margin-right: 8%;" src="../../images/icons-png/posiciones.png"></a></span>
                        <span><a href="TablaDeGoleadores.php"  ><img style="width: 30px;margin-right: 8%;" src="../../images/icons-png/goleadores.png"></a></span>
                        <span><a href="../Mi_Equipo/Miequipo.php"  ><img style="width: 30px;margin-right: 8%;" src="../../images/icons-png/miequipo.png"></a></span>
                    </center>
                </div>
            </div>

            <div data-role="main" class="ui-content">
                <table width="100%" style="font-size: small; margin: auto;" data-role="table" id="table-custom-2" data-mode="columntoggle" 
                       class="ui-body-d ui-shadow table-stripe ui-responsive t" 
                       data-column-btn-text="+" >

                    <thead>
                        <tr class="ui-bar-d">
                            <th style="width: 33%;">Equipo</th>
                            <th style="width: 33%;" >Nombre</th>
                            <th style="width: 17%;" >Goles</th>
                            <th data-priority="2" style="width: 16%;" >Eficiencia</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $goleadores1 = mysql_query("SELECT jugador,SUM(goles) AS goles1 ,nombre1,apellido1,nombre_equipo 
  from tr_jugadoresxpartido,tb_jugadores,tb_equipos 
  WHERE goles>=1 and jugador=id_jugadores and equipo=id_equipo and partido IN (SELECT id_partido FROM tb_partidos WHERE Estado=2 ) GROUP BY jugador ORDER BY `goles1` DESC, nombre_equipo asc")or die(mysql_error());
                        while ($numerodegoles = mysql_fetch_array($goleadores1)) {
                            $jugador = $numerodegoles['jugador'];
                            $numerodepartidosasistidos = mysql_num_rows(mysql_query("SELECT jugador FROM tr_jugadoresxpartido WHERE jugador=$jugador and partido In (SELECT id_partido FROM tb_partidos WHERE Estado=2)  "));
                            ?>
                            <tr  width="100%">
                                <td style="width: 33%;"> <?php echo $numerodegoles['nombre_equipo']; ?>  </td>
                                <td style="width: 33%;"> <?php echo $numerodegoles['nombre1'] . " " . $numerodegoles['apellido1']; ?></td>
                                <td style="width: 33%;"> <?php echo $numerodegoles['goles1']; ?> </td>
                                <td style="width: 33%;"> <?php echo round($numerodegoles['goles1'] / $numerodepartidosasistidos, 1); ?> </td>
                            </tr>
                            <?php
                        }
                        mysql_close($con);
                        ?>
                    </tbody>
                </table>   
            </div>
        </div>
    </body>  
</html>
