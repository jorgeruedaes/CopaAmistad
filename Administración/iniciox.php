

<?php

session_start();
include('../conexion.php');
if (isset($_SESSION['admin'])) {
    include('RutinaDeLogue.php');
    if ($_SESSION['tipo_usuario'] == 1) {
        header("location:modulosuperadmin.php");
    } elseif ($_SESSION['tipo_usuario'] == 2) {

        header("location:modulousuariostutorneo.php");
    } elseif ($_SESSION['tipo_usuario'] == 3) {
        header("location:../Usuarios/Planilleros/moduloplanilla.php");
        $pruebadeinicio = 3;
    } else {
        echo "Usted no está autorizado para ingresar";
        header("location:iniciox.php");
    }
} else {
    ?>
    <style type="text/css">
        /*                body{
                            background: url(../images/footballfan.jpg) no-repeat fixed center;
                            -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;}*/

        body { 
            background: url('../images/fondo.jpg') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .panel-default {
            opacity: 0.9;
            margin-top:30px;
        }
        .form-group.last {
            margin-bottom:0px;
        }
        
    </style>

    <html>
        <head>
            <meta charset="utf-8" />
            <title>Módulo Administrador</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
            <script src="../bootstrap/js/bootstrap.min.js"></script>
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-7">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <strong class="">Modulo de Administración</strong>

                            </div>
                            <div class="panel-body" style="padding-bottom:5px;">
                                <form action="comprobar.php" class="form-horizontal" role="form" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Usuario</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Usuario" name="user" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Contraseña</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña" name="pass" required="">
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" name="enviar" class="btn" style="background-color:#2ECC71;color:white;font-weight: bold">Iniciar sesión</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">Olvidaste tu contraseña? <a href="#" class="">Click aquí</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </body>
    </html>
    <?php

}if (isset($_SESSION['error'])) {
    header("location:index.php");
}
?>