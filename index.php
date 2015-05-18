<?php
session_start();
include('conexion.php');
date_default_timezone_set('America/Bogota');
?>

<html>
    <head>
        <title>Copa Amistad Profesional</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" type="text/css" href="js/jquery.mobile-1.4.3.css">
        <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
        <link rel="stylesheet" href="themes/nuevarevolucion1.css"/>
        <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css"/>
        <script type="text/javascript" src="js/jquery.mobile-1.4.3.js"></script>
    </head>

    <body >
        <div data-role="page" id="pagina1">    <!-- PAGINA PRINCIPAL 1 -->
            <div data-role="panel" id="panel4" style="background-color: black;" > 
                <p style="font-family: Century Gothic;">
                <h3 style="color: white;">Opciones Adicionales</h3>
                <div><a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 10px;
                        margin-bottom: 10px;" 
                        href="Usuarios/Menú_Lateral/Noticias.php" data-icon="info-white"  data-transition="Flip">
                        <img src="images/icons-png/info-white.png" style="margin-right: 10%;">Noticias
                        <img src="images/icons-png/carat-r-white.png" style="margin-left: 50%;"></a></div>

                <h3 style="color: white;">Copa Amistad</h3>
                <a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 9px;
                   margin-bottom: 10px;" 
                   href="Usuarios/Menú_Lateral/Sugerencias.php" data-icon="info"  data-transition="Flip">
                    <img src="images/icons-png/comment-white.png" style="margin-right: 9%;">
                    Sugerencias<img src="images/icons-png/carat-r-white.png" style="margin-left: 39%;"></a>
                <br><br>
                <a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 10px;
                   margin-bottom: 10px;"
                   href="Usuarios/Menú_Lateral/Acercade.php" data-icon="info"  data-transition="Flip"><img src="images/icons-png/gear-white.png" style="margin-right: 10%;">
                    Acerca de<img src="images/icons-png/carat-r-white.png" style="margin-left: 43%;"></a>
                </p>
            </div>

            <div style="" data-role="header">
                <a href="#panel4" style="
                   background-color: #8cc63f;
                   border-color: #8cc63f;
                   " class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="images/icons-png/panel.png"></a>
                <h1 style="height: 2%;margin: auto;">Copa Amistad Profesional</h1>
                <div id="iconos" style="height: 8%;">
                    <center> 
                        <span><a href="index.php"><img style="margin-right: 8%;margin-left: 15%;" src="images/icons-png/calendario.png"></a></span>
                        <span><a href="Usuarios/Tablas/TablaDePosiciones.php"  ><img style="margin-right: 8%;" src="images/icons-png/posiciones.png"></a></span>
                        <span><a href="Usuarios/Tablas/TablaDeGoleadores.php"  ><img style="margin-right: 8%;" src="images/icons-png/goleadores.png"></a></span>
                        <span><a href="Usuarios/Mi_Equipo/Miequipo.php"  ><img style="margin-right: 8%;" src="images/icons-png/miequipo.png"></a></span>
                    </center>
                </div>
            </div>

            <div data-role="main" class="ui-content">
                <ul data-role="listview" data-inset="true" style="">
                    <?php
                    $lafechadehoy = date("Y-m-d");
                    $primerafecha1 = date("Y-m-d");
                    $nuevafecha = strtotime('-7 day', strtotime($primerafecha1));
                    $primerafecha = date('Y-m-j', $nuevafecha);


                    $ultimafecha1 = date("Y-m-d");
                    $nuevafecha = strtotime('+7 day', strtotime($ultimafecha1));
                    $ultimafecha = date('Y-m-j', $nuevafecha);
                    /*
                      Se crea otro parametro para la fecha inicial de mostrar los resultados acontinuacion
                     */
                    $primerafecha2 = date("Y-m-d");
                    $nuevafecha2 = strtotime('-5 day', strtotime($primerafecha2));
                    $primerafecha2 = date('Y-m-j', $nuevafecha2);
                    /*
                      Se crea otro parametro para la fecha final de mostrar los resultados acontinuacion
                     */
                    $ultimafecha2 = date("Y-m-d");
                    $nuevafecha2 = strtotime('+1 day', strtotime($ultimafecha2));
                    $ultimafecha2 = date('Y-m-j', $nuevafecha2);



                    $variable = mysql_fetch_array(mysql_query("SELECT DISTINCT MAX(numero_fecha)AS numero FROM tb_partidos WHERE Estado='2'"));

                    $numerorealdelafecha = $variable['numero'];

                    $numerodelafecha = mysql_query("SELECT DISTINCT fecha FROM `tb_partidos` WHERE `fecha` >= '$lafechadehoy' AND `Estado` = '1' ORDER BY fecha asc,hora asc");
                    /*
                      Numero de columnas o sea prueba que haya partidos en estado 1 menor a hoy sino no muestra esta
                      parte solo muestra los resultados o las noticias.
                     * ******************************************************************************************
                     */
                    $numerodecolumnas = mysql_num_rows($numerodelafecha);
                    $bandera = 0;
                    if ($numerodecolumnas > 0) {
                        while ($fechas = mysql_fetch_array($numerodelafecha)) {
                            $numeroparalafecha = $fechas['fecha'];
                            ?>
                            <div align="center" data-role="list-divider" style="color: grey;height: 30px;margin-top: 3px;padding-top: 5px;
                                 " ><?php
                                     date_default_timezone_set('America/Bogota');
                                     $diadelasemana = date("w");
                                     $sum = date("Ymd") . "<br>";
                                     $jornada = $fechas['fecha'];
                                     $fechareal = date("Ymd", strtotime($jornada));
                                     $nuevo = date("w", strtotime($jornada));
                                     $jornada . "  " . $sum; // gives 201101
                                     $resta = $fechareal - $sum;

                                     $diadelasemanadefinido = $resta + $diadelasemana;
                                     if ($resta == 1) {
                                         ?>
                                    <span style="font-size: larger; color: black;
                                          font-weight: bold;"><?php echo "Mañana"; ?></span>
                                    <br><span style="font-size: small;"><?php echo date("d-M", strtotime($jornada)); ?></span>
                                    <?php
                                } elseif ($resta == 0) {
                                    ?>
                                    <span style="font-size: larger; color: black;
                                          font-weight: bold;"><?php echo "Hoy"; ?></span>  
                                    <br><span style="font-size: small;"><?php echo date("d-M", strtotime($jornada)); ?></span>
                                    <?php
                                } else {


                                    switch ($nuevo) {
                                        case '0':
                                            ?>
                                            <span style="font-size: larger; color: black;
                                                  font-weight: bold;"><?php echo "Domingo"; ?></span>
                                            <?php ?><br>
                                            <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada)); ?></span>
                                            <?php
                                            break;
                                        case '1':
                                            ?>
                                            <span style="font-size: larger; color: black;
                                                  font-weight: bold;"><?php echo "Lunes"; ?></span>
                                            <?php ?><br>
                                            <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada)); ?></span>
                                            <?php
                                            break;
                                        case '2':
                                            ?>
                                            <span style="font-size: larger; color: black;
                                                  font-weight: bold;"><?php echo "Martes"; ?></span>
                                                  <?php
                                                  ?><br>
                                            <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada)); ?></span>
                                            <?php
                                            break;
                                        case '3':
                                            ?>
                                            <span style="font-size: larger; color: black;
                                                  font-weight: bold;"><?php echo "Miércoles"; ?></span>
                                                  <?php
                                                  ?><br>
                                            <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada)); ?></span>
                                            <?php
                                            break;
                                        case '4':
                                            ?>
                                            <span style="font-size: larger; color: black;
                                                  font-weight: bold;"><?php echo "Jueves"; ?></span>
                                                  <?php
                                                  ?><br>
                                            <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada)); ?></span>
                                            <?php
                                            break;
                                        case '5':
                                            ?>
                                            <span style="font-size: larger; color: black;
                                                  font-weight: bold;"><?php echo "Viernes"; ?></span>
                                                  <?php
                                                  ?><br>
                                            <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada)); ?></span>
                                            <?php
                                            break;
                                        case '6':
                                            ?>
                                            <span style="font-size: larger; color: black;
                                                  font-weight: bold; "><?php echo "Sábado"; ?></span>
                                                  <?php
                                                  ?>
                                            <br>
                                            <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada)); ?></span>
                                            <?php
                                            break;
                                        default:
                                            echo "Proxima Semana";
                                            break;
                                    }
                                }
                                ?> </div> <!--  numero de la fecha vigente para que aparezca en calendario -->
                            <?php
                            $nametor = mysql_query("SELECT * from tb_partidos where  Estado!='2'   AND fecha='
  $numeroparalafecha' ORDER BY hora asc")or die(mysql_error());
                            while ($tor = mysql_fetch_array($nametor)) {
                                ?>
                                <div style="font-family: Century Gothic;"  align="center" data-role="collapsible" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u" data-iconpos="right">
                                    <?php
                                    $lugar1 = $tor['Lugar'];
                                    $nombrelugar = mysql_query("SELECT nombre FROM tb_lugares WHERE id_lugar=$lugar1");
                                    $to = mysql_fetch_array($nombrelugar);
                                    $nombre = $tor['equipo1'];
                                    $nombre1 = $tor['equipo2'];


                                    $estados = $tor['Estado'];
                                    $nom = mysql_query("SELECT nombre_equipo from tb_equipos where id_equipo=$nombre");
                                    $nome = mysql_fetch_array($nom);
                                    $nom1 = mysql_query("SELECT nombre_equipo from tb_equipos where id_equipo=$nombre1");
                                    $nome1 = mysql_fetch_array($nom1);

                                    $estadopartido = mysql_query("SELECT nombre from tb_estados_partido where id_estado=$estados");
                                    $estados1 = mysql_fetch_array($estadopartido);
                                    ?>
                                    <h1  style="font-size: small " align: "center" style="font-family: Century Gothic;">
                                         <table width="100%" aling="center"  style="font-size: small " style="font-family: Century Gothic;">
                                            <tr width="100%" style="">
                                                <td align="center" width="33%"> <?php echo $nome['nombre_equipo']; ?> </td>
                                                <td align="center" width="20%">
                                                    <span style=" color: black ;  font-weight: bold; font-size: small;"> 
                                                        <?php echo $tor['hora']; ?>  </span></td>
                                                <td align="center" width="33%"><?php echo $nome1['nombre_equipo']; ?> </td>
                                            </tr> 

                                        </table>
                                    </h1>
                                    <p style="margin-top: 00px; margin-bottom: 0px;" style="font-family: Century Gothic;"> 
                                    <table style="margin: 1em 5% ; font-size: small ;font-family: Century Gothic;s">
                                        <tr>
                                            <td style=" font-weight: bold;">Lugar :</td><td style="margin: 1em 5%;"><?php echo $to['nombre']; ?></td>  <!-- lugar  -->
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Estado :</td><td  style="margin: 1em 5%;" >  <?php echo $estados1['nombre']; ?> </td> <!--  Estado del partido  -->
                                        </tr>
                                    </table>
                                    </p>
                                </div>
                                <?php
                            }
                        }
                        $bandera = 100000;
                    }// cierra el if
                    ?>

                </ul>
                <div align="center" data-role="list-divider" style="color: black;height: 30px;margin-top: 3px;padding-top: 5px; font-family: sans-serif;
                     font-weight: 700;" >Resultados de la última fecha</div>
                <ul data-role="listview" data-inset="true">

                    <?php
                    /*
                     * ******************************************************************************************
                     * ************INICIO RESULTADOS DE LA FECHA*************************************************
                     * ******************************************************************************************
                     */

                    $nametor = mysql_query("SELECT * FROM tb_partidos WHERE fecha BETWEEN '$primerafecha2' and '$lafechadehoy' AND Estado='2'  ORDER BY fecha desc,hora desc")or die(mysql_error());
                    while ($tor = mysql_fetch_array($nametor)) {
                        ?>

                        <?php
                        $nombre = $tor['equipo1'];
                        $nom = mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre");
                        $nome = mysql_fetch_array($nom);
                        $nombre1 = $tor['equipo2'];
                        $nom1 = mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre1");
                        $nome1 = mysql_fetch_array($nom1);
                        ?>
                        <div  align="center" data-role="collapsible" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u" data-iconpos="right">
                            <h1  style="font-size: small " align: "center" >
                                 <table width="100%" aling="center"  style="font-size: small ">
                                    <tr width="100%">
                                        <td align="center" width="33%"> <?php echo $nome['nombre_equipo']; ?> </td>
                                        <td align="center" width="20%"><span style=" color: black ;  font-weight: bold; font-size: initial;">  <?php echo $tor['resultado1']; ?>-<?php echo $tor['resultado2']; ?>  </span></td>
                                        <td align="center" width="33%"><?php echo $nome1['nombre_equipo']; ?> </td>
                                    </tr> 

                                </table>
                            </h1>
                            <p style="font-size: smaller ;">
                            <table style="font-size: smaller ;" width="100%">
                                <thead>
                                    <tr>
                                        <th>Goles</th>
                                        <th>Goles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr width="100%">
                                        <!--  GOLES TABLA DE GOLES TABLA DE GoLES -->
                                        <td width="50%">
                                            <?php
                                            $id_partido = $tor['id_partido'];
                                            $id_equipo1 = $tor['equipo1'];
                                            $id_equipo2 = $tor['equipo2'];
                                            $query = mysql_query("SELECT jugador,goles FROM tr_jugadoresxpartido WHERE partido=$id_partido AND goles>0 
  AND jugador IN ( SELECT jugador FROM tb_jugadores WHERE equipo=$id_equipo1) ");
                                            $afectadas = mysql_num_rows($query);
                                            while ($consulta2 = mysql_fetch_array($query)) {
                                                ?>

                                                <?php
                                                $jugador1 = $consulta2['jugador'];
                                                if ($afectadas != 0) {
                                                    $consulta12 = mysql_query("SELECT nombre1,apellido1 FROM tb_jugadores WHERE id_jugadores=$jugador1  AND equipo=$id_equipo1");
                                                    while ($consultar = mysql_fetch_array($consulta12)) {
                                                        ?>
                                                        <div align="center" > <span width="50%"><?php echo $consultar['nombre1'] . " " . $consultar['apellido1']; ?>
                                                            </span><span width="50%" style="font-size: larger;font-weight: bold; "><?php echo $consulta2['goles']; ?></span></div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                } else {
                                                    ?>
                                            <tr align="center"  width="50%">No hubieron</tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </td>
                                <td width="50%">
                                    <?php
                                    $id_partido = $tor['id_partido'];
                                    $id_equipo1 = $tor['equipo1'];
                                    $id_equipo2 = $tor['equipo2'];
                                    $query = mysql_query("SELECT jugador,goles FROM tr_jugadoresxpartido WHERE partido=$id_partido AND goles>0 
  AND jugador IN ( SELECT jugador FROM tb_jugadores WHERE equipo=$id_equipo2) ");
                                    $afectadas = mysql_num_rows($query);
                                    while ($consulta2 = mysql_fetch_array($query)) {
                                        ?>

                                        <?php
                                        $jugador1 = $consulta2['jugador'];
                                        if ($afectadas > 0) {
                                            $consulta12 = mysql_query("SELECT nombre1,apellido1 FROM tb_jugadores WHERE id_jugadores=$jugador1  AND equipo=$id_equipo2");
                                            while ($consultar = mysql_fetch_array($consulta12)) {
                                                ?>
                                                <div align="center" > <span width="50%"><?php echo $consultar['nombre1'] . " " . $consultar['apellido1']; ?>
                                                    </span><span width="50%" style="font-size: larger;font-weight: bold; "><?php echo $consulta2['goles']; ?></span></div>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        } else {
                                            ?>
                                        <tr align="center"  width="50%">No hubieron</tr>
                                        <?php
                                    }
                                }
                                ?>
                                </td>
                                </tr>
                                </tbody>
                            </table>

                            <!----    Fin primera tabla   -->

                            <!----    Empieza Amonestaciones                                     ---------------------------------------->

                            <table style="font-size: smaller ;" width="100%" >
                                <thead>

                                    <tr>
                                        <th>Amonestaciones</th>
                                        <th>Amonestaciones</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr width="100%">
                                        <!--  GOLES TABLA DE GOLES TABLA DE GoLES -->
                                        <td width="50%">
                                            <?php
                                            $id_partido = $tor['id_partido'];
                                            $id_equipo1 = $tor['equipo1'];
                                            $id_equipo2 = $tor['equipo2'];
                                            $query = mysql_query("SELECT jugador,amonestacion FROM tr_jugadoresxpartido WHERE partido=$id_partido AND amonestacion!=5 
  AND jugador IN ( SELECT jugador FROM tb_jugadores WHERE equipo=$id_equipo1) ");
                                            $afectadas = mysql_num_rows($query);
                                            while ($consulta2 = mysql_fetch_array($query)) {
                                                ?>

                                                <?php
                                                $jugador1 = $consulta2['jugador'];
                                                $amonestacio4 = $consulta2['amonestacion'];
                                                if ($afectadas != 0) {
                                                    $consulta12 = mysql_query("SELECT nombre1,apellido1 FROM tb_jugadores WHERE id_jugadores=$jugador1  AND equipo=$id_equipo1");
                                                    while ($consultar = mysql_fetch_array($consulta12)) {
                                                        ?>
                                                        <div align="center" > <span width="50%"><?php echo $consultar['nombre1'] . " " . $consultar['apellido1']; ?>
                                                            </span><span width="50%" style="font-size: larger;font-weight: bold; "><?php
                                                                if ($amonestacio4 == 1) {
                                                                    ?>
                                                                    <span><img src="images/amarilla.png" style="width: 15px;"></span>
                                                                    <?php
                                                                } elseif ($amonestacio4 == 2) {
                                                                    ?>
                                                                    <span><img src="images/roja.png" style="width: 15px;"></span>
                                                                    <?php
                                                                }
                                                                ?></span></div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                    } else {
                                                        ?>
                                            <tr align="center"  width="50%">No hubieron</tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </td>
                                <td width="50%">
                                    <?php
                                    $id_partido = $tor['id_partido'];
                                    $id_equipo1 = $tor['equipo1'];
                                    $id_equipo2 = $tor['equipo2'];
                                    $query = mysql_query("SELECT jugador,amonestacion FROM tr_jugadoresxpartido WHERE partido=$id_partido AND amonestacion!=5
  AND jugador IN ( SELECT jugador FROM tb_jugadores WHERE equipo=$id_equipo2) ");
                                    $afectadas = mysql_num_rows($query);
                                    while ($consulta2 = mysql_fetch_array($query)) {
                                        ?>

                                        <?php
                                        $jugador1 = $consulta2['jugador'];
                                        $amonestacio4 = $consulta2['amonestacion'];
                                        if ($afectadas != 0) {
                                            $consulta12 = mysql_query("SELECT nombre1,apellido1 FROM tb_jugadores WHERE id_jugadores=$jugador1  AND equipo=$id_equipo2");
                                            while ($consultar = mysql_fetch_array($consulta12)) {
                                                ?>
                                                <div align="center" > <span width="50%"><?php echo $consultar['nombre1'] . " " . $consultar['apellido1']; ?>
                                                    </span><span width="50%" style="font-size: larger;font-weight: bold; "><?php
                                                        if ($amonestacio4 == 1) {
                                                            ?>
                                                            <span><img src="images/amarilla.png" style="width: 15px;"></span>
                                                            <?php
                                                        } elseif ($amonestacio4 == 2) {
                                                            ?>
                                                            <span><img src="images/roja.png" style="width: 15px;"></span>
                                                            <?php
                                                        }
                                                        ?></span></div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                            } else {
                                                ?>
                                        <tr align="center"  width="50%">No hubieron</tr>
                                        <?php
                                    }
                                }
                                ?>
                                </td>
                                </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>

                        <?php
                        /*
                         * ****************************************************************************************
                          FIN DE RESLTADOS POR EQUIPO
                         * *****************************************************************************************
                         */
                    }
                    ?>
                </ul>  
                <?php
                $lafechadehoy = date("Y-m-d");
                $primerafecha1 = date("Y-m-d");
                $nuevafecha = strtotime('-5 day', strtotime($primerafecha1));
                $primerafecha11 = date('Y-m-d', $nuevafecha);


                $ultimafecha1 = date("Y-m-d");
                $nuevafecha = strtotime('+1 day', strtotime($ultimafecha1));
                $ultimafecha11 = date('Y-m-d', $nuevafecha);
                $datos = mysql_query("SELECT * FROM tb_noticias WHERE fecha between '$primerafecha11' and '$ultimafecha11'  ORDER BY fecha DESC");
                $numeroco = mysql_num_rows($datos);

                if ($numeroco > 0) {
                    ?>

                    <div align="center" data-role="list-divider" style="color: black;height: 30px;margin-top: 3px;padding-top: 5px; font-family: sans-serif;
                         font-weight: 700;" >Noticias de la fecha</div>

                    <div data-role="collapsibleset">
                        <?php
                        $datos = mysql_query("SELECT * FROM tb_noticias WHERE fecha between '$primerafecha11' and '$ultimafecha11'  ORDER BY fecha DESC");
                        while ($noticias = mysql_fetch_array($datos)) {
                            ?>
                            <div data-role="collapsible">
                                <h3> 
                                    <table>    
                                        <tr>                           

                                            <td width="30%"><img width="70px" height="70px" src="<?php echo $noticias['imagen']; ?>"></td>
                                            <td width="50%"  style ="font-weight: 600;" ><span ><?php echo $noticias['titulo'] ?></span></td>  
                                            <td>   <tr>   
                                            <td></td>
                                            <td width="70%" style ="font-size: x-small;font-weight:  bold;">  <span><?php echo $noticias['fecha']; ?></span></td>
                                        </tr>  
                                        </td>
                                        </tr>       
                                    </table>
                                </h3>
                                <p style="font-size: small;text-align: justify;"><?php echo $noticias['texto']; ?> </p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div> 
            </div>
        </div>
    </body>

</html>
