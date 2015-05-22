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


    <div data-role="page" id="pagina5">   <!--Pagina Pirnicpal Mi Equipo -->
        <body style="font-family: Century Gothic;">
            <div  data-role="header">
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

                <ul data-role="listview" data-inset="true" style="font-family: Century Gothic;">
                    <?php
                    $numerodelafecha = mysql_query("SELECT  DISTINCT fecha FROM tb_partidos WHERE Estado='1' AND (equipo1=$id OR equipo2=$id)");
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
                                              <?php
                                              ?><br>
                                        <span style="font-size: small;"><?php echo date("d-M", strtotime($jornada)); ?></span>
                                        <?php
                                        break;
                                    case '1':
                                        ?>
                                        <span style="font-size: larger; color: black;
                                              font-weight: bold;"><?php echo "Lunes"; ?></span>
                                              <?php
                                              ?><br>
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
                            ?> </div> 
                        <!--  numero de la fecha vigente para que aparesca en calendario -->
                        <?php
                        $nametor = mysql_query("SELECT * from tb_partidos where  Estado!='2'   AND fecha='$numeroparalafecha'  AND (equipo1=$id  or equipo2=$id) ")or die(mysql_error());
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
                                        <tr width="100%" style="font-family: Century Gothic;">
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
                    ?>
                </ul>

                <?php
                /// INICIO RESULTADOS POR EQUIPO
// consulta los partidos de la fecha
                $nametor = mysql_query("SELECT * FROM tb_partidos where  Estado='2' AND (equipo1=$id   OR equipo2=$id ) ORDER BY fecha desc")or die(mysql_error());
                while ($tor = mysql_fetch_array($nametor)) {
                    ?>
                    <ul data-role="listview" data-inset="true">
                        <div align="center" data-role="list-divider" style="color: grey;height: 30px;margin-top: 3px;padding-top: 5px;
                             " ><?php
                                 date_default_timezone_set('America/Bogota');
                                 $diadelasemana = date("w");
                                 $sum = date("Ymd") . "<br>";
                                 $jornada = $tor['fecha'];
                                 $fechareal = date("Ymd", strtotime($jornada));
                                 $nuevo = date("w", strtotime($jornada));
                                 $resta = $fechareal - $sum;
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
                                              <?php
                                              ?><br>
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
                            ?> </div> 
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
                                        if ($afectadas != 0) {
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

                            <!----    Empieza Amonestaciones  -->

                            <table style="font-size: smaller ;" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Amonestaciones</th>
                                        <th>Amonestaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr width="100%">
                                        <!--  GOLES TABLA DE GOLES TABLA DE GOLES -->
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
                                                                    <span><img src="../../images/amarilla.png" style="width: 15px;"></span>
                                                                    <?php
                                                                } elseif ($amonestacio4 == 2) {
                                                                    ?>
                                                                    <span><img src="../../images/roja.png" style="width: 15px;"></span>
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
                                                            <span><img src="../../images/amarilla.png" style="width: 15px;"></span>
                                                            <?php
                                                        } elseif ($amonestacio4 == 2) {
                                                            ?>
                                                            <span><img src="../../images/roja.png" style="width: 15px;"></span>
                                                                <?php
                                                            }
                                                            ?>                                    </span></div>
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
                            <!---  fin segunda tabla   -->
                            </p>
                        </div>
                    </ul>  
                    <?php
                    /// fin de resultados por EQUIPO
                }
                mysql_close($con);
                ?>
            </div>
    </div>
</body>
</html>

