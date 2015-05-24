    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    session_start();
    include('../conexion.php');
    include('RutinaDeLogueo.php');
    if ($pruebadeinicio == 2) {
        ?>
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de administracion</title>
            <link rel="stylesheet" href="../css/styler.css" type="text/css" media="all" />
        </head>
        <style type="text/css">

            #bienvenido{

                width: auto;
                margin-left: 0px;
                margin-right: 15px;
                margin-top: 0px;
                float: right;
                color: black;

            }
            .cerrar{

                color: #000000;
                float: right;
                clear: right;
                padding-right:  15px;
            }
        </style>
        <body>
            <div id="header">
                <br>
                    
                    <b><p style="color:#3CB371;font-size:16px"id="bienvenido"><?php echo $_SESSION['admin'] ?></p></b>

                    <b><a style="font-size:13px"class="cerrar" href="cerrarsesion.php">Cerrar sesión <img src="../images/salir.png" width="30px" height="30px"></a></b>

                    <div><img src="../images/Logo.png" style="padding-left: 30px;width: 100px;height: 100px;padding-right: 400px"/></div>



            </div>
            <div id="nav">
                <ul style="margin: 0px;padding: 0px">

                    <li><a href="#">Agregar</a>
                        <ul>
                            <li><a href="Jugadores/AgregarJugadores.php">Jugadores</a></li>
                            <li><a href="Equipos/AgregarEquipos.php">Equipos</a></li>
                            <li><a href="Partidos/AgregarPartidoAlCalendario.php">Partidos</a></li>
                            <li><a href="Noticias/form_noticias.php">Noticias</a></li>
                            <li><a href="Partidos/AgregarResultados.php">Resultados</a></li>
                            <li><a href="Amonestaciones/Equipos/AgregarAmonEquipos.php">Amonestaciones Equipos</a></li>
                            <li><a href="Jugadores/Profesion.php">Profesión</a></li>     </ul>
                    </li>

                    <li> <a href="#">Modificar</a>
                        <ul>	
                            <li><a href="Jugadores/ModificarJugadores.php">Jugadores</a></li>
                            <li><a href="Equipos/ModificarEquipos.php">Equipos</a></li>
                            <li><a href="Noticias/ModificarNoticias.php">Noticias</a></li>
                            <li><a href="Partidos/ModificarResultados.php">Resultados</a></li>
                            <li><a href="#">Amonestaciones</a>
                                <ul style="display: block;margin-top: 0px;margin-left: 180px">
                                    <li><a>De jugadores</a>
                                        <ul style="position: absolute;margin-top: -40px;margin-left: 180px;">
                                            <li><a href="Amonestaciones/Jugadores/ModificarAmonestaciones.php">Detalles</a></li>
                                            <li><a href="Amonestaciones/Jugadores/ModificarAmonestacionesDePartidos.php" >Por partido</a></li>
                                        </ul>
                                    </li>
                                    <li><a>De equipos</a>
                                        <ul style="position: absolute;margin-top: 5px;margin-left: 180px;">
                                            <li ><a href="Amonestaciones/Equipos/ModificarAmonestacionesEquipo.php">Detalles</a></li>
                                        </ul></li>
                                </ul>
                            </li>
                            <li><a href="Partidos/ModificarCalendario.php">Calendario</a></li>
                            <li><a href="Partidos/ModificarAsistencia.php">Asistencia</a></li>

                        </ul>
                    </li>


                    <li><a href="Estadísticas/Estadisticas.html">Estadísticas</a></li>

                    <li><a href="Transpasos/ModuloTraspasos.html">Traspasos</a></li>

                    <li><a href="#">Informes</a>
                        <ul>	
                            <li><a href="Informes/pdf.php">Amonestaciones</a></li>
                            <li><a href="Informes/pdf1.php">Ficha técnica</a></li>
                            <li><a href="Informes/pdf2.php">Posiciones</a></li>
                            <li><a href="Informes/pdf3.php">Goleadores</a></li>
                            <li><a href="Informes/ListarProfesiones.php">Listar Profesiones</a></li>
                        </ul>
                </ul>
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
        ?>