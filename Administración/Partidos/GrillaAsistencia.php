<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
$pruebadeinicio=20;
include('../../conexion.php');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {
    $equipo = $_GET['equipo'];
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de Administracion</title>
            <!--            <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />-->
            <script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.css">
            <script src="../../bootstrap/js/bootstrap.min.js"></script>
            <!--  ALERTAS-->
            <script src="../../dist/sweetalert.min.js"></script>
            <link rel="stylesheet" type="text/css" href="../../dist/sweetalert.css">
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
            .nombre{
                font-size: xx-small;
                padding-top: 2px;
                padding-bottom: 2px;
            }
            .cuadro{
                text-align:center;padding-top: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
                padding-right: 0px;
            }
            #boton{
                padding-top: 0px;
                padding-bottom: 0px;
            }
        </style>
        <body>

            <div class="contenido">
                <?php include('../Encabezado.html'); ?>
                  <div class="col-md-12 col-md-offset-1">
                                <h2 style="color:#27AE60;">Grilla de asistencia</h2><hr>
                            </div>
                <div class="row col-md-10 col-md-offset-1">
                    <div class="row">
                        </div>
                    <table width="100%" class="table table-bordered">
                        <thead>
                            <tr>
                                <th  width="3%">
                                    Botón
                                    <br>
                                    <button data-estado="true"  id="boton" type="button" class="btn btn-default habilitar" aria-label="Left Align"><span class=" glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                </th>
                                <th width="3%">Nombre/Fecha</th>
                                <?php
                                $queryfechasjugadas = mysql_query("SELECT numero_fecha FROM tb_partidos WHERE (equipo1='$equipo' or equipo2='$equipo') and Estado='2' order by numero_fecha asc ");
                                while ($FECHAS = mysql_fetch_array($queryfechasjugadas)) {
                                    $numerofecha = $FECHAS['numero_fecha'];
                                    ?>
                                    <th width="3%" style="text-align:center;">fecha <br><?php echo $numerofecha; ?>
                                        <br>
                                        <button data-estado="true"style=" padding-left: 0px;padding-right: 0px;" data-id="<?php echo $numerofecha; ?>"  id="boton" type="button" class="btn btn-default habilitarradios" data-estado="true" aria-label="Left Align"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span></button>
                                        <button data-estado="true" style=" padding-left: 0px;padding-right: 0px;" data-id="<?php echo $numerofecha; ?>"  id="boton" type="button" class="btn btn-default seleccionar" data-estado="false" aria-label="Left Align"><span class=" glyphicon glyphicon-ok" aria-hidden="true"></span></button>

                                    </th>
                                    <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            $querydatosjugador = mysql_query("SELECT nombre1,nombre2,apellido1,apellido2,id_jugadores FROM tb_jugadores WHERE equipo='$equipo' and estado_jugador='1' order by fecha_nacimiento asc");
                            while ($jugador = mysql_fetch_array($querydatosjugador)) {
                                $datosjugadornombre = $jugador['nombre1'];
                                $datosjugadornombre2 = $jugador['nombre2'];
                                $datosjugadorapellido1 = $jugador['apellido1'];
                                $datosjugadorapellido2 = $jugador['apellido2'];
                                $datosjugador = $jugador['id_jugadores'];
                                ?>
                                <tr class="padre">
                                    <td class="botones" width="3%"><button  id="boton" type="button" class="btn btn-default  subir" aria-label="Left Align"><span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span></button>
                                        <button  type="button" id="boton"  class="btn btn-default  bajar" aria-label="Left Align"><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></button></td>
                                    <td class="nombre"><?php echo $datosjugadornombre . " " . $datosjugadornombre2 . " " . $datosjugadorapellido1 . " " . $datosjugadorapellido2; ?></td>

                                    <?php
                                    ?>
                                    <?php
                                    $queryfechasjugadas = mysql_query("SELECT numero_fecha,id_partido FROM tb_partidos WHERE (equipo1='$equipo' or equipo2='$equipo') and Estado='2' order by numero_fecha asc ");
                                    while ($FECHAS = mysql_fetch_array($queryfechasjugadas)) {

                                        $idpartido = $FECHAS['id_partido'];
                                        $fechapartido = $FECHAS['numero_fecha'];
                                        ?>
                                        <td class="cuadro<?php echo $fechapartido; ?>" width="3%">
                                            <?php
                                            $partidosasistidas = mysql_query("SELECT * FROM tr_jugadoresxpartido WHERE jugador='$datosjugador' and partido='$idpartido'");
                                            if (mysql_num_rows($partidosasistidas) > 0) {
                                                ?>
                                                <input   data-fecha="<?php echo $fechapartido; ?>" data-partido="<?php echo $idpartido; ?>" data-jugador="<?php echo $datosjugador; ?>" style="width: 30px; height: 30px;"  type="checkbox" class="asistido" checked="checked"> 
                                            <?php } else { ?>
                                                <input data-fecha="<?php echo $fechapartido; ?>" data-partido="<?php echo $idpartido; ?>" data-jugador="<?php echo $datosjugador; ?>" style="width: 30px; height: 30px;" type="checkbox" class="asistido">
                                                <?php
                                            }
                                            ?>
                                        </td><?php
                                    }
                                    ?>
                                </tr><?php
                            }
                            ?>

                        </tbody>

                    </table>

                </div>
            </div>
        <link rel="stylesheet" href="../../datepicker/css/datepicker.css"/>
        <link rel="stylesheet" href="../../timepicker/css/bootstrap-timepicker.css"/>
        <script type="text/javascript" src="../../datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../../timepicker/js/bootstrap-timepicker.js"></script>
        <script src="../../datepicker/js/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
        <script>
            var valordeterminante = false;
            $(document).ready(function () {
                partidos.inicio();
                partidos.recargareventos();
            });
            var partidos = {
                inicio: function () {
                    partidos.recargareventos();
                },
                recargareventos: function () {
                    partidos.eventosbotones();
                    partidos.habilitar();
                    partidos.modificarjugador();
                },
                ModificarDatos: function (elemento) {
                    var partido = elemento.data('partido');
                    var jugador = elemento.data('jugador');
                    var fecha = elemento.data('fecha');
                    $.ajax({
                        url: 'PeticionesPartidos.php',
                        type: 'POST',
                        data: {
                            Bandera: "ModificarAsistencia",
                            partido: partido,
                            jugador: jugador,
                            fecha: fecha
                        },
                        success: function (resp) {
                            var resp = $.parseJSON(resp);
                            if (resp.Salida === true && resp.Mensaje === true) {
                                console.log(resp.Mensaje);
                            } else {
                                swal("", "Ha habido un error,intenta nuevamente.", "error");
                            }
                        }

                    });

                },
                eventosbotones: function () {
                    $('.subir').off('click').on('click', function () {
                        var linea = $(this).parents('.padre');
                        linea.prev('.padre').before(linea);
                    });
                    $('.bajar').off('click').on('click', function () {
                        var linea = $(this).parents('.padre');
                        linea.next('.padre').after(linea);
                    });
                },
                habilitar: function () {
                    $('.habilitar').off('click').on('click', function () {
                        if ($(this).data('estado') === true) {
                            $.each($('.subir'), function (e, i) {
                                $(this).attr("disabled", true);
                            });
                            $.each($('.bajar'), function (e, i) {
                                $(this).attr("disabled", true);
                            });
                            $(this).data('estado', false)
                        } else {
                            $.each($('.subir'), function (e, i) {
                                $(this).attr("disabled", false);
                            });
                            $.each($('.bajar'), function (e, i) {
                                $(this).attr("disabled", false);
                            });
                            $(this).data('estado', true)
                        }
                    });
                    $('.habilitarradios').off('click').on('click', function () {
                        var id = $(this).data('id');
                        if ($(this).data('estado') === true) {
                            $.each($('.cuadro' + id + ''), function (e, i) {
                                $(this).children('input').attr("disabled", true);
                            });
                            $(this).parent().children('.seleccionar').attr("disabled", true);
                            $(this).data('estado', false);
                        } else {
                            $.each($('.cuadro' + id + ''), function (e, i) {
                            $(this).children('input').attr("disabled", false);
                            });
                            $(this).parent().children('.seleccionar').attr("disabled", false);
                            $(this).data('estado', true);
                        }
                    });
                    $('.seleccionar').off('click').on('click', function () {
                        var id = $(this).data('id');
                        if ($(this).data('estado') === true) {
                            $.each($('.cuadro' + id + ''), function (e, i) {
                                $(this).children('input').prop("checked", true);
                                partidos.ModificarDatos($(this).children('input'));
                            });
                            $(this).data('estado', false);
                        } else {
                            $.each($('.cuadro' + id + ''), function (e, i) {
                                $(this).children('input').prop("checked", false);
                                partidos.ModificarDatos($(this).children('input'));
                            });
                            $(this).data('estado', true);
                        }
                    });
                },
                modificarjugador:function(){
                   $('.asistido').off('change').on('change',function(){
                       partidos.ModificarDatos($(this));
                   });
                }
            };</script>
        <?php
    } else {
        ?>
        <!-- CUANDO EL PERSONAJE NO ESTA AUTORIZADO PARA EL INGRESO-->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <center>
            <div class="row">
                <div class="col-md-10 col-md-offset-1"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-danger" role="alert">Lo sentimos pero usted no tiene autorización para estar en este lugar.</div>
                </div>
            </div>
        </center>
        <center>
            <button type="button" class="btn btn-success"><a href="../../iniciox.php" style="color: white">Volver</a></button></center>
            <?php
        }
        ?>



</body>
</html>
