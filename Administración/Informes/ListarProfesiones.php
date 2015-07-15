<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../conexion.php');
include('../Encabezado.html');

if (isset($_SESSION['admin'])) {

    $letras = $_SESSION['admin'];
    $numeros = mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
    $caracteres = mysql_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de Administracion</title>
            <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />
            <script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>


            <script type="text/javascript" charset="utf8" src="../../DataTables-1.10.7/media/js/jquery.js"></script>

            <!-- DataTables -->
            <script type="text/javascript" charset="utf8" src="../../DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
            <script type="text/javascript" charset="utf8" src="../../DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.css">
            <link rel="stylesheet" href="../../DataTables-1.10.7/media/css/dataTables.bootstrap.css">
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


        </style>
        <body>
            <div class="row">
                <div class="col-md-8 col-md-offset-2"><br></div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2"><br></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <table id="tablaprofesiones" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Profesión</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $consulta = mysql_query("SELECT * FROM `tb_profesiones` ORDER BY nombre asc");
                            while ($listaprofesiones = mysql_fetch_array($consulta)) {
                                ?>

                                <tr class="default caja">
                                    <td><?php echo $listaprofesiones["nombre"] ?></td>
                                </tr>

                            </tbody>
                            <?php
                        }
                        ?>
                    </table>

                </div></div>

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
    </body>
</html>