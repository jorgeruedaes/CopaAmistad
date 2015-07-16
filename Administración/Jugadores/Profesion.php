
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../conexion.php');
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
            <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" 
            <script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.css">
            <script src="../../bootstrap/js/bootstrap.min.js"></script>
            <!-- ALERTS -->
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
                                    <h2 style="color:#27AE60;">Nueva profesión</h2><hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4"> 
                                    <label>Nombre de la profesión:</label>
                                    <input type="text" class="form-control" style="" id="exampleInputPassword1" name="profesion" required>
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
                        </form>
                    </div>
                </div>
            </div>


        </body>
    </html>
    <?php
    if (isset($_POST['enviar'])) {

// INSERTAR PROFESIONES EN LA BASE DE DATOS

        $nombre = $_POST['profesion'];
        $query = "INSERT INTO `tb_profesiones`(`id_profesion`, `nombre`) VALUES (null,'$nombre')";
        $insertar = mysql_query($query);
        if ($insertar == true) {

            ?>
                                            <script>

                                                  swal("", "Profesion creada exitosamente", "success");

                                            </script>

                                            <?php
        } else {
        
            ?>
                                            <script>

                                                  swal("", "La profesion no se ha podido crear, intenta nuevamente", "error");

                                            </script>

                                            <?php
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