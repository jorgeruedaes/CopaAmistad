<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../conexion.php');
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {

    $letras = $_SESSION['admin'];
    $numeros = mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
    $caracteres = mysql_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
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
            <link rel="stylesheet" href="../../DataTables-1.10.7/media/css/dataTables.bootstrap.css">
            <script src="../../bootstrap/js/bootstrap.min.js"></script></head>
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
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <br>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <form action="ModificarAsistencia0.php" method="post">
                                    <div class="form-group">
                                        <label>Seleccione el equipo:</label>
                                        <select class="form-control" name="equipo">
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
                                    <center><button type="submit" class="btn btn-success" name="buscar">Buscar</button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </body>
    </html>

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
                            <button type="button" class="btn btn-success"><a href="iniciox.php" style="color: white">Volver</a></button></center>
                            <?php
}
?>