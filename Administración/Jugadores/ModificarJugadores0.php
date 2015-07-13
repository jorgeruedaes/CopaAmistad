
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../conexion.php');
include('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2 or $pruebadeinicio == 4) {

    $letras = $_SESSION['admin'];
    $numeros = mysql_query("SELECT * from tb_torneo where usuario='$letras'")or die(mysql_error());
    $caracteres = mysql_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>



            <title>Copa Amistad Profesional modulo de Administracion</title>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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


</form><br><br>
</body>
</html>