
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    session_start();
    include('../../conexion.php');
    include('../Encabezado.html');
    include('../RutinaDeLogueo.php');
    if ($pruebadeinicio == 1 or $pruebadeinicio == 2) { // LOGUEO PARA ADMIN Y SUPERADMIN
        $letras = $_SESSION['admin'];
        $numeros = mysql_query("SELECT * from tb_torneo where usuario='$letras'")or die(mysql_error());
        $caracteres = mysql_fetch_array($numeros);
        $name = $caracteres['id_torneo'];
        ?>
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de Administracion</title>
            <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />
            <!--- AQUI IMPORTAN SUS SCRIPT -->
            <!-- ///////////////////////// -->
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
            <!--- AQUI INICIA SU CODIGO-->
            <!-- ///////////////////////// -->
        </body>
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