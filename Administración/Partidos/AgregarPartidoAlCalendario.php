<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../conexion.php');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de Administracion</title>
            <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />
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
        </style>
        <body>

            <div class="contenido">
                <?php include('../Encabezado.html'); ?>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form method="post"> 
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h2 style="color:#27AE60;">Nuevo partido</h2><hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2"> 
                                    <div class="control-group">
                                        <label class="control-label" for="fechaInicio1">Fecha:</label>
                                        <div class="controls">
                                            <div data-date="" class="input-append date datepicker" id="dp" style="padding-left:0px">
                                                <input type="text" format="AAAA-MM-DD" class="span4 form-control inicio" value="" name="fecha" id="fechaInicio" required="required"/>	
                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>				
                                    </div>                                         
                                </div>   
                                <div class="col-md-4">
                                     <label>Hora:</label>
                                    <div class="input-append bootstrap-timepicker">
                                        <input name="hora" id="timepicker1" style="width:100px;margin-top: 5px" type="text" readonly="readonly" value="12:00 PM" required="required"/>
                                        <span class="add-on"><i class="glyphicon glyphicon-time"></i></span>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2"> 
                                    <label>Lugar</label>
                                    <select class="form-control" style="" required="required" name="lugar">
                                        <option value="" selected></option>
                                        <?php
                                        $lugares = mysql_query("SELECT * from tb_lugares ORDER BY nombre asc");
                                        while ($listalugares = mysql_fetch_array($lugares)) {
                                            ?>
                                            <option value="<?php echo $listalugares['id_lugar']; ?>"><?php echo $listalugares['nombre']; ?> </option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2"> 
                                    <label>Equipo local:</label>
                                    <select class="form-control" style="" required="required" name="equipo1">
                                        <option value="" selected></option>
                                        <?php
                                        $equipos = mysql_query("SELECT * from tb_equipos ORDER BY nombre_equipo asc");
                                        while ($listaequipos = mysql_fetch_array($equipos)) {
                                            ?>
                                            <option value="<?php echo $listaequipos['id_equipo']; ?>"><?php echo $listaequipos['nombre_equipo']; ?> </option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4"> 
                                    <label>Equipo visitante:</label>
                                    <select class="form-control" style="" required="required" name="equipo2">
                                        <option value="" selected></option>
                                        <?php
                                        $equipos = mysql_query("SELECT * from tb_equipos ORDER BY nombre_equipo asc");
                                        while ($listaequipos = mysql_fetch_array($equipos)) {
                                            ?>
                                            <option value="<?php echo $listaequipos['id_equipo']; ?>"><?php echo $listaequipos['nombre_equipo']; ?> </option>

                                            <?php
                                        }
                                        ?>
                                    </select>                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2"> 
                                    <label>Juez:</label>
                                    <select class="form-control" style="" required="required" name="juez">
                                        <option value="" selected></option>
                                        <?php
                                        $arbitros = mysql_query("SELECT * from tb_arbitros ORDER BY nombre asc");
                                        while ($listaarbitros = mysql_fetch_array($arbitros)) {
                                            ?>
                                            <option value="<?php echo $listaarbitros['id_arbitro']; ?>"><?php echo $listaarbitros['nombre']; ?> </option>

                                            <?php
                                        }
                                        ?>
                                    </select>  
                                </div>
                                <div class="col-md-4"> 
                                    <label>Número de la fecha:</label>
                                    <input type="number" style="width:90px" class="form-control" name="fechatorneo" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 text-right"> 
                                    <button type="reset" class="btn btn-default">Limpiar</button>
                                    <button type="submit" name="enviar" class="btn btn-success">Enviar</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <link rel="stylesheet" href="../../datepicker/css/datepicker.css"/>
        <link rel="stylesheet" href="../../timepicker/css/bootstrap-timepicker.css"/>
        <script type="text/javascript" src="../../datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../../timepicker/js/bootstrap-timepicker.js"></script>
        <script src="../../datepicker/js/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
        <script>
            $(document).ready(function () {
                $(function () {
                    $("#dp").datepicker({
                        format: "yyyy/mm/dd",
                        language: "es",
                        autoclose: true
                 
                    });
                    $("#dp").datepicker().on('changeDate', function (ev)
                    {
                        fdp2 = new Date(ev.date);
                        $('#fechainicio').text($('#dp').data('date'));
                        $('#dp').datepicker('hide');
                    });
                });
                $('#timepicker1').timepicker();

            });

        </script>
        <?php
        if (isset($_POST['enviar'])) {
            if ($_POST['equipo1'] == $_POST['equipo2']) {
                     ?>
                                            <script>

                                                  swal("", "Los equipos deben ser diferentes", "error");

                                            </script>

                                            <?php
            } else {

                $pal = $_POST['equipo1'];
                $pal1 = $_POST['equipo2'];
                $pal3 = $_POST['fecha'];
                $pal4 = $_POST['hora'];
                $pal5 = $_POST['lugar'];
                $pal8 = $_POST['fechatorneo'];
                $pal9 = $_POST['juez'];
                $guardar = mysql_query("INSERT INTO `tb_partidos`(`id_partido`, `equipo1`, `equipo2`, `resultado1`, `resultado2`, `fecha`, `numero_fecha`, `Lugar`, `Estado`, `Juez`,`hora`) VALUES (NULL,'$pal','$pal1',0,0,'$pal3','$pal8','$pal5','1','$pal9','$pal4');")or die(mysql_error());
                if ($guardar == TRUE) {
                     ?>
                                            <script>

                                                  swal("", "El partido se ha agregado exitosamente", "success");

                                            </script>

                                            <?php
                } else {
                       ?>
                                            <script>

                                                  swal("", "El partido no se ha podido agregar, intenta nuevamente", "error");

                                            </script>

                                            <?php
                }
            }
        }
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
                            <button type="button" class="btn btn-success"><a href="iniciox.php" style="color: white">Volver</a></button></center>
                            <?php
    }
    ?>



</body>
</html>
