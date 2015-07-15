
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

    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de Administracion</title>
            <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />
            <script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.css">
            <script src="../../bootstrap/js/bootstrap.min.js"></script>
            
            <!--ALERTs -->
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
                                    <h2 style="color:#27AE60;">Nuevo equipo</h2><hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2"> 
                                    <label>Nombre del equipo:</label>
                                    <input type="text" class="form-control" style="" id="exampleInputPassword1" name="equipo" required>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2"> 
                                    <label>Nombre del técnico 1:</label>
                                    <input type="text" class="form-control" name="tecnico1" required>

                                </div>
                                <div class="col-md-4"> 
                                    <label>Nombre del técnico 2:</label>
                                    <input type="text" class="form-control" name="tecnico2">
                                    <input type="hidden" value="1" name="torneo">
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
}

if (isset($_POST['enviar'])) {

// INSERTAR EQUIPOS EN LA BASE DE DATOS

    $nombre = $_POST['equipo'];
    $tecnico1 = $_POST['tecnico1'];
    $tecnico2 = $_POST['tecnico2'];
    $torneo = $_POST['torneo'];
    $guardaramonestacion = mysql_query("INSERT INTO `tb_equipos`(`id_equipo`, `nombre_equipo`, `tecnico1`, `tecnico2`, `puntos`, `torneo`, `imagen_escudo`) 
	VALUES (NULL,'$nombre','$tecnico1','$tecnico2','0','$torneo','xx')");
if($guardaramonestacion==TRUE){
     ?>
                                            <script>

                                                  swal("", "El equipo se ha agregado exitosamente", "success");

                                            </script>

                                            <?php
}else{
              ?>
                                            <script>

                                                  swal("", "Ha ocurrido un error y el equipo no se ha podido crear,intenta nuevamente", "error");

                                            </script>

                                            <?php
}
}
?>