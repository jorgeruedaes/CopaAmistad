
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
date_default_timezone_set('America/Bogota');
include('../../conexion.php');
include('../../Administración/RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2 or $pruebadeinicio == 3) {
    $lafechadehoy = date("Y-m-d");
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
            <!--- AQUI AGREGAN SUS SCRIPTS -->
            <!-- ///////////////////////// -->
        </head>
        <body>

            <div data-role="page" id="pageone">
                <div data-role="header">
                    <a href="../../index.php" style="
                       background-color: #8cc63f;
                       border-color: #8cc63f;
                       " class="ui-btn ui-btn-inline ui-icon-back ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon" ></a>
                    <h1>Modúlo Planillero</h1>
                    <a style="
                       background-color: #8cc63f;
                       border-color: #8cc63f;
                       " href="../../Administración/cerrarsesion.php" class="ui-btn ui-btn-inline ui-icon-delete ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon"></a>
                </div>

                <div data-role="main" class="ui-content">
                    <div align="center" data-role="list-divider" style="color: black;height: 30px;margin-top: 3px;padding-top: 5px; font-family: sans-serif;
                         font-weight: 700;" >Partidos por empezar</div>
                         <?php
                         /*
                          * ******************************************************************************************
                          * ************INICIO PARTIDOS POR EMPEZAR*************************************************
                          * ******************************************************************************************
                          */
                         $nametor = mysql_query("SELECT * FROM tb_partidos WHERE fecha='$lafechadehoy'  AND Estado='1'  ORDER BY fecha desc,hora desc")or die(mysql_error());
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
                                        <td align="center" width="15%"><span style=" color: black ;  font-weight: bold; font-size: initial;">  <?php echo $tor['resultado1']; ?>-<?php echo $tor['resultado2']; ?>  </span></td>
                                        <td align="center" width="33%"><?php echo $nome1['nombre_equipo']; ?> </td>
                                    </tr> 

                                </table>
                            </h1>
                        </div>
                        <?php
                    }
                    /*
                     * ******************************************************************************************
                     * ************INICIO PARTIDOS JUGANDOSE*************************************************
                     * ******************************************************************************************
                     */
                    ?>
                    <div align="center" data-role="list-divider" style="color: black;height: 30px;margin-top: 3px;padding-top: 5px; font-family: sans-serif;
                         font-weight: 700;" >Partidos Jugandose</div>
                         <?php
                         $nametor = mysql_query("SELECT * FROM tb_partidos WHERE fecha='$lafechadehoy'  AND Estado='5'  ORDER BY fecha desc,hora desc")or die(mysql_error());
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
                        </div>
                        <?php
                    }

                    /*
                     * ******************************************************************************************
                     * ************INICIO TERMINADOS ************************************************
                     * ******************************************************************************************
                     */
                    ?>
                    <div align="center" data-role="list-divider" style="color: black;height: 30px;margin-top: 3px;padding-top: 5px; font-family: sans-serif;
                         font-weight: 700;" >Partidos Terminados</div>
                         <?php
                         $nametor = mysql_query("SELECT * FROM tb_partidos WHERE fecha='$lafechadehoy'  AND Estado='2'  ORDER BY fecha desc,hora desc")or die(mysql_error());
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
                        </div>
                        <?php
                    }
                    ?>

                </div> 

        </body>
    </html>

    <?php
} else {
    ?>
    <!-- CUANDO EL PERSONAJE NO ESTA AUTORIZADO PARA EL INGRESO-->
    <br><br>
    <center>
        <div>
            <label>Lo sentimos pero usted no tiene autorización para estar en este lugar.</label>
        </div>
    </center>
    <center><button  type="submit" ><a href="iniciox.php">Volver</a></button></center>
    <?php
}
mysql_close($con);
?>