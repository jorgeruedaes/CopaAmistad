
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
            <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />
            <script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.css">
            <script src="../../bootstrap/js/bootstrap.min.js"></script>
            <!-- ALERTS-->
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
                        <form method="post" enctype="multipart/form-data"> 
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h2 style="color:#27AE60;">Nueva noticia</h2><hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2"> 
                                    <label>Título:</label>
                                    <input type="text" class="form-control" style="" id="exampleInputPassword1" name="noticia" required>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-2"> 
                                    <label>Descripción:</label>
                                    <textarea class="form-control" rows="3" name="descripcion" required></textarea>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-2"> 
                                    <label>Imagen:</label>
                                    <input type="file" name="imagen" id="imagen" required/>
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


        </body>
    </html>
    <?php
    if (isset($_POST['enviar'])) {
//capturando los datos a guardar

        $titulo_noticia = $_POST["noticia"];
        $texto_noticia = $_POST["descripcion"];
        date_default_timezone_set("America/Bogota");
        $fecha = date('Y-m-d');
        $ruta = "../../images/Noticias";
        $archivo = $_FILES['imagen']['tmp_name'];
        $nombreArchivo = $_FILES['imagen']['name'];
        move_uploaded_file($archivo, $ruta . "/" . $nombreArchivo);
        $ruta = $ruta . "/" . $nombreArchivo;

        //guardar datos de nueva noticia en la bd

        $guardarnoticia = mysql_query("INSERT INTO tb_noticias VALUES ('null','$titulo_noticia','$texto_noticia','" . $ruta . "','1','$fecha')");

        if ($guardarnoticia === FALSE) {

            ?>
                                            <script>

                                                  swal("", "No se ha podido agregar la noticia,intentalo nuevamente", "error");

                                            </script>

                                            <?php
        } else {
            ?>
            <script>

                   swal("", "La noticia se agrego exitosamente", "success");

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
