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
            <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
            <script type="text/javascript" src="../js/jquery-1.11.2.js"></script>
            <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
                <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
                    <script src="../bootstrap/js/bootstrap.min.js"></script>
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
                                <!--<b><p style="color:#3CB371;font-size:16px"id="bienvenido"><?php echo $_SESSION['admin'] ?></p></b>-->

                                <a style="font-size:15px;font-family: sans-serif"class="cerrar" href="cerrarsesion.php">Cerrar sesión 
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>

                                <div><img src="../images/Logo.png" style="padding-left: 30px;width: 100px;height: 100px;padding-right: 400px"/></div>
                        </div>

                        <nav class="navbar navbar-default">
                            <div class="container-fluid" style="width: 800px"> 
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="modulousuariostutorneo.php">
                                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                    </a>
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Jugadores <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="Jugadores/AgregarJugadores.php">Nuevo jugador</a></li>
                                                <li><a href="Jugadores/ModificarJugadores.php">Editar jugador</a></li>
                                                <li><a href="Jugadores/Profesion.php">Nueva profesión</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Equipos <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="Equipos/AgregarEquipos.php">Nuevo equipo</a></li>
                                                <li><a href="Equipos/ModificarEquipos.php">Editar equipo</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Amonestaciones <span class="caret"></span></a>
                                            <ul class="dropdown-menu multi-level" role="menu">                                
                                                <li class="dropdown-submenu">
                                                    <a tabindex="-1" href="#">De jugadores</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="Amonestaciones/Jugadores/ModificarAmonestaciones.php">Detalles</a></li>
                                                        <li><a href="Amonestaciones/Jugadores/ModificarAmonestacionesDePartidos.php">Por partido</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-submenu">
                                                    <a tabindex="-1" href="#">De equipos</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="Amonestaciones/Equipos/ModificarAmonestacionesEquipo.php">Detalles</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Noticias <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="Noticias/form_noticias.php">Nueva noticia</a></li>
                                                <li><a href="Noticias/ModificarNoticias.php">Editar noticia</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Partidos <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="Partidos/AgregarPartidoAlCalendario.php">Nuevo partido</a></li>
                                                <li><a href="Partidos/AgregarResultados.php">Nuevo resultado</a></li>
                                                <li><a href="Partidos/ModificarResultados.php">Editar resultado</a></li>
                                                <li><a href="Partidos/ModificarCalendario.php">Editar calendario</a></li>
                                                <li><a href="Partidos/ModificarAsistencia.php">Editar asistencia</a></li>
                                            </ul>
                                        </li>
                                        <!--                                        <li class="dropdown disabled">
                                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Estadísticas</a>
                                                                                    <ul class="dropdown-menu" role="menu">
                                                                                        <li><a href="#">Jugadores</a></li>
                                                                                        <li><a href="#">Equipos</a></li>
                                                                                        <li><a href="#">Partidos</a></li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li class="dropdown disabled">
                                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Traspasos</a>
                                                                                    <ul class="dropdown-menu" role="menu">
                                                                                        <li><a href="#">Jugadores</a></li>
                                                                                        <li><a href="#">Equipos</a></li>
                                                                                        <li><a href="#">Partidos</a></li>
                                                                                    </ul>
                                                                                </li>-->
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Informes <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="Informes/pdf.php">Amonestaciones</a></li>
                                                <li><a href="Informes/pdf1.php">Ficha técnica</a></li>
                                                <li><a href="Informes/pdf2.php">Posiciones</a></li>
                                                <li><a href="Informes/pdf3.php">Goleadores</a></li>
                                                <li><a href="Informes/ListarProfesiones.php">Profesiones</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <script>
                            $(function () {
                                $('.dropdown-toggle').dropdown();
                            })


                        </script>
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