
<?php
session_start();
include('../../conexion.php');
include('../RutinaDeLogueo.php');

if ($pruebadeinicio == 1 or $pruebadeinicio == 2 or $pruebadeinicio == 4) {

    $letras = $_SESSION['admin'];
    $numeros = mysql_query("SELECT * from tb_torneo where usuario='$letras'")or die(mysql_error());
    $caracteres = mysql_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
    ?>

    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Módulo Admin</title>
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
                            .contenido{

                                /*width: 1000px;*/
                                margin: 0 auto;
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
                                                    <h2 style="color:#27AE60;">Nuevo jugador</h2><hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-2"> 
                                                    <label>Primer nombre:</label>
                                                    <input type="text" class="form-control" name="nombre1" required>
                                                </div>
                                                <div class="col-md-4 "> 
                                                    <label>Segundo nombre:</label>
                                                    <input type="text" class="form-control" name="nombre2">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-2"> 
                                                    <label>Primer apellido:</label>
                                                    <input type="text" class="form-control" name="apellido1" required>

                                                </div>
                                                <div class="col-md-4"> 
                                                    <label>Segundo apellido:</label>
                                                    <input type="text" class="form-control" name="apellido2">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-2"> 
                                                    <label>Télefono/celular:</label>
                                                    <input type="tel" class="form-control" name="tel">
                                                </div>
                                                <div class="col-md-4 "> 
                                                    <label>E-mail:</label>
                                                    <input type="email" class="form-control" name="correo">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-2"> 
                                                    <label>Fecha de nacimiento:</label>
                                                    <input type="date" class="form-control" style="" id="exampleInputPassword1" name="fechanac" required>
                                                </div>   

                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-2"> 
                                                    <label>Fecha de inscripción:</label>
                                                    <input type="date" data-format="yyyy-mm-dd" class="form-control" style="" id="exampleInputPassword1" name="fechainsc" required>
                                                </div>   

                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-2"> 
                                                    <label>Profesión:</label>

                                                    <select class="form-control" style="" required="required" name="profesion">
                                                        <option value="" selected></option>
                                                        <?php
                                                        $profesiones = mysql_query("SELECT * from tb_profesiones ORDER BY nombre asc");
                                                        while ($listaprofesiones = mysql_fetch_array($profesiones)) {
                                                            ?>
                                                            <option value="<?php echo $listaprofesiones['id_profesion']; ?>"><?php echo $listaprofesiones['nombre']; ?> </option>

                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4"> 
                                                    <label>Equipo:</label>
                                                    <select class="form-control" style="" required="required" name="equipo">
                                                        <option value="" selected></option>
                                                        <?php
                                                        $equipos = mysql_query("SELECT * from tb_equipos where torneo='1' ORDER BY nombre_equipo asc ");
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
                                                <div class="col-md-8 col-md-offset-2 text-right"> 
                                                    <button type="reset" class="btn btn-default">Limpiar</button>
                                                    <button type="submit" name="enviar" class="btn btn-success">Enviar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <br><br><br>
                                        <script>
                                        </script>
                                        </body>
                                        </html>


                                        <?php
                                    }

                                    if (isset($_POST['enviar'])) {


                                        $primnom = $_POST["nombre1"];
                                        $segnom = $_POST["nombre2"];
                                        $primape = $_POST["apellido1"];
                                        $segape = $_POST["apellido2"];
                                        $tel = $_POST["tel"];
                                        $correo = $_POST["correo"];
                                        $fechanac = $_POST["fechanac"];
                                        $fechainsc = $_POST["fechainsc"];
                                        $profesion = $_POST["profesion"];
                                        $equipo = $_POST["equipo"];


                                        $guardarjugador = mysql_query("INSERT INTO tb_jugadores VALUES ('null','$primnom','$segnom','$primape','$segape','$fechanac',
	'$correo','$equipo','" . 'xxx' . "','$fechainsc','1','$tel','$profesion')");

                                        if ($guardarjugador === FALSE) {
                                            alert("No se pudo agregar el jugador.");
                                        } else {
                                            ?>
                                            <script>

                                                alert("Jugador agregado.");

                                            </script>

                                            <?php
                                        }
                                    }
                                    ?>
    