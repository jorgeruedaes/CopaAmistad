
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
                        .contenido{

                            /*width: 1000px;*/
                            margin: 0 auto;
                        }
                        /*                            label{margin-left: 20px;}
                                                    #datepicker{width:180px; margin: 0 20px 20px 20px;}
                                                    #datepicker > span:hover{cursor: pointer;}*/
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
                                                <input type="number" class="form-control" name="tel">
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
                                                <div class="control-group">
                                                    <label class="control-label" for="fechaInicio">Fecha de nacimiento:</label>
                                                    <div class="controls">
                                                        <div data-date="" class="input-append date datepicker" id="dp">
                                                            <input type="text" format="AAAA-MM-DD"class="span4 form-control inicio" value="" name="fechanac" id="fechaInicio" required="required"/>	
                                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                                        </div>
                                                    </div>				
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2"> 
                                                <div class="control-group">
                                                    <label class="control-label" for="fechaInicio1">Fecha de inscripción:</label>
                                                    <div class="controls">
                                                        <div data-date="" class="input-append date datepicker" id="dp1">
                                                            <input type="text" format="AAAA-MM-DD" class="span4 form-control inicio" value="" name="fechainsc" id="fechaInicio1" required="required"/>	
                                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                                        </div>
                                                    </div>				
                                                </div>                                         
                                            </div>   
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
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
                                    <link rel="stylesheet" href="../../datepicker/css/datepicker.css"/>
                                        <script type="text/javascript" src="../../datepicker/js/bootstrap-datepicker.js"></script>
                                        <script src="../../datepicker/js/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
                                        <script>
                                            $(document).ready(function () {
                                                $(function () {
                                                    $("#dp,#dp1").datepicker({
                                                        format: "yyyy/mm/dd",
                                                        language: "es",
                                                        autoclose: true

                                                    });
                                                    $("#dp,#dp1").datepicker().on('changeDate', function (ev)
                                                    {
                                                        fdp2 = new Date(ev.date);
                                                        $('#fechaInicio,#fechaInicio1').text($('#dp,#dp1').data('date'));
                                                        $('#dp,#dp1').datepicker('hide');
                                                    });
                                                });
                                            });</script>



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
                                          swal("", "No se ha podido agregar el jugador", "error");
                                        } else {
                                            ?>
                                            <script>

                                                  swal("", "Jugador agregado", "success");

                                            </script>

                                            <?php
                                        }
                                    }
                                    ?>
                                    </body>
                                    </html>
