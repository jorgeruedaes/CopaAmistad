
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../conexion.php');
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {

    $letras = $_SESSION['admin'];
    $numeros = mysql_query("SELECT * from tb_torneo where usuario='$letras'")or die(mysql_error());
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
                    <h2 style="color:#2ECC71">Resultados</h2>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <br>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Equipo 1</th>
                                <th>Equipo 2</th>
                                <th style="width:100px">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 1;
                            $consulta = mysql_query("SELECT * FROM tb_partidos WHERE Estado='1'");
                            while ($listapartidos = mysql_fetch_array($consulta)) {
                                $equipo1 = $listapartidos["equipo1"];
                                $equipo2 = $listapartidos["equipo2"];

                                $consultaequipo1 = mysql_query("SELECT * from tb_equipos WHERE id_equipo = '$equipo1'");
                                $consultanombre1 = mysql_fetch_array($consultaequipo1);
                                $consultaequipo2 = mysql_query("SELECT * from tb_equipos WHERE id_equipo = '$equipo2'");
                                $consultanombre2 = mysql_fetch_array($consultaequipo2);
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?php echo $consultanombre1["nombre_equipo"] ?></td>
                                    <td><?php echo $consultanombre2["nombre_equipo"] ?></td>
                                    <td><button type="button" class="btn btn-success">Agregar</button></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div></div>

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