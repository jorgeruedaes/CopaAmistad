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
                                    <label>Fecha:</label>
                                    <input type="date" class="form-control" name="fecha" required>

                                </div>
                                <div class="col-md-4"> 
                                    <label>Hora:</label>
                                    <input type="time" class="form-control" name="hora" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
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
                                    <input type="text" class="form-control" name="fechatorneo" required>
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

            <?php
            if (isset($_POST['enviar'])) {
                if ($_POST['equipo1'] == $_POST['equipo2']) {
                   echo "<script language='JavaScript' type='text/javascript'>
alert('Los partidos deben ser entre equipos diferentes.');
</script>
                    ";
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
                        echo "<script language='JavaScript' type='text/javascript'>
alert('Partido creado.');
</script>
                    ";
                    } else {
                        echo "<script language='JavaScript' type='text/javascript'>
alert('Hubo un error y el partido no fue creado.');
</script>";
                    }
                }
            }
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



    </body>
</html>
