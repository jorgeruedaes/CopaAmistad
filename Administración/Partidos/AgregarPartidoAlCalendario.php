<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../conexion.php');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de Administracion</title>
<!--            <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />-->
            <script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.css">
            <script src="../../bootstrap/js/bootstrap.min.js"></script>
            <!--  ALERTAS-->
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

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h2 style="color:#27AE60;">Nuevo partido</h2><hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-2"> 
                                <div class="control-group">
                                    <label class="control-label" for="fechaInicio1">Fecha:</label>
                                    <div class="controls">
                                        <div data-date="" class="input-append date datepicker fecha" id="dp" style="padding-left:0px">
                                            <input type="text" format="AAAA-MM-DD" class="span4 form-control fecha" value="" name="fecha" id="fechaInicio" required="required"/>	
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>				
                                </div>                                         
                            </div>   
                            <div class="col-md-4">
                                <label>Hora:</label>
                                <div class="input-append bootstrap-timepicker">
                                    <input class="hora" name="hora" id="timepicker1" style="width:100px;margin-top: 5px" type="text" readonly="readonly" value="12:00 PM" required="required"/>
                                    <span class="add-on"><i class="glyphicon glyphicon-time"></i></span>                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-2"> 
                                <label>Lugar</label>
                                <select class="form-control lugar" style="" required="required" name="lugar">
                                    <option value="" selected></option>
                                    <?php
                                    $lugares = mysql_query("SELECT * from tb_lugares ORDER BY nombre asc");
                                    while ($listalugares = mysql_fetch_array($lugares)) {
                                        ?>
                                        <option value="<?php echo $listalugares['id_lugar']; ?>"><?php echo $listalugares['nombre']; ?> </option>

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
                            <div class="col-md-4 col-md-offset-2"> 
                                <label>Equipo local:</label>
                                <select class="form-control equipo1" style="" required="required" name="equipo1">
                                    <option value="" selected></option>
                                    <?php
                                    $equipos = mysql_query("SELECT * from tb_equipos ORDER BY nombre_equipo asc");
                                    while ($listaequipos = mysql_fetch_array($equipos)) {
                                        ?>
                                        <option value="<?php echo $listaequipos['id_equipo']; ?>"><?php echo $listaequipos['nombre_equipo']; ?> </option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4"> 
                                <label>Equipo visitante:</label>
                                <select class="form-control equipo2" style="" required="required" name="equipo2">
                                    <option value="" selected></option>
                                    <?php
                                    $equipos = mysql_query("SELECT * from tb_equipos ORDER BY nombre_equipo asc");
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
                            <div class="col-md-4 col-md-offset-2"> 
                                <label>Juez:</label>
                                <select class="form-control juez" style="" required="required" name="juez">
                                    <option value="" selected></option>
                                    <?php
                                    $arbitros = mysql_query("SELECT * from tb_arbitros ORDER BY nombre asc");
                                    while ($listaarbitros = mysql_fetch_array($arbitros)) {
                                        ?>
                                        <option value="<?php echo $listaarbitros['id_arbitro']; ?>"><?php echo $listaarbitros['nombre']; ?> </option>

                                        <?php
                                    }
                                    ?>
                                </select>  
                            </div>
                            <div class="col-md-4"> 
                                <label>Número de la fecha:</label>
                                <input type="number" style="width:90px" class="form-control fechatorneo" name="fechatorneo" required disabled="disabled">
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
                                <button  class="btn btn-success enviar">Enviar</button>
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

                    </div>
                </div>
            </div>
        <link rel="stylesheet" href="../../datepicker/css/datepicker.css"/>
        <link rel="stylesheet" href="../../timepicker/css/bootstrap-timepicker.css"/>
        <script type="text/javascript" src="../../datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../../timepicker/js/bootstrap-timepicker.js"></script>
        <script src="../../datepicker/js/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
        <script>
                 var valordeterminante=false;
            $(document).ready(function () {
                partidos.inicio();
                partidos.recargareventos();
            });
            var partidos = {
                inicio: function () {
                    $("#dp").datepicker({
                        format: "yyyy-mm-dd",
                        language: "es",
                        autoclose: true

                    });
                    $("#dp").datepicker().on('changeDate', function (ev)
                    {
                        fdp2 = new Date(ev.date);
                        $('#fechainicio').text($('#dp').data('date'));
                        $('#dp').datepicker('hide');
                    });

                    $('#timepicker1').timepicker();
                    partidos.recargareventos();
                },
                recargareventos: function () {
                    partidos.ConsultarFecha();
                    partidos.EnviarDatos();
                },
                ConsultarFecha: function () {
                    $.ajax({
                        url: 'PeticionesPartidos.php',
                        type: 'POST',
                        data: {
                            Bandera: "ConsultarFecha",
                        },
                        success: function (resp) {
                            var resp = $.parseJSON(resp);
                            if (resp.Salida === true && resp.Mensaje === true) {
                                $('.fechatorneo').val(resp.fecha);
                            } else {
                                swal("", "Ha habido un error,intenta nuevamente", "error");
                            }
                        }

                    });
                },
                EnviarDatos: function () {
                    $('.enviar').off('click').on('click', function () {
                        if (partidos.ValidarDatos()) {
                            $.ajax({
                                url: 'PeticionesPartidos.php',
                                type: 'POST',
                                data: {
                                    Bandera: "AgregarPartidos",
                                    hora: $('.hora').val(),
                                    fecha: $('#fechaInicio').val(),
                                    fechatorneo: $('.fechatorneo').val(),
                                    lugar: $('.lugar option:selected').val(),
                                    juez: $('.juez option:selected').val(),
                                    equipo1: $('.equipo1 option:selected').val(),
                                    equipo2: $('.equipo2 option:selected').val()
                                },
                                success: function (resp) {
                                    var resp = $.parseJSON(resp);
                                    if (resp.Salida === true && resp.Mensaje === true) {
                                        swal({title: "",
                                            text: "El partido se ha agregado  exitosamente!",
                                            type: "success",
                                            showCancelButton: false,
                                            confirmButtonColor: "rgb(174, 222, 244)",
                                            confirmButtonText: "Ok",
                                            closeOnConfirm: false
                                        }, function (isConfirm) {
                                            if (isConfirm) {
                                                window.location.reload();
                                            }
                                        });

                                    } else {
                                        swal("", "Ha habido un error,intenta nuevamente.", "error");
                                    }
                                }

                            });
                        }
                    });
                },
                ValidarDatos: function () {
                    // validar igualda de equipos 
                    if ($('.equipo1 option:selected').val() === $('.equipo2 option:selected').val()) {
                          swal("", "Ha habido un error,los equipos deben ser diferentes para poder enfrentarse.", "error");
                        return false;
                    } else {
                        //Fecha
                        var date = $('#fechaInicio').val();
                        if(partidos.ValidarFecha(date)){
                            if(partidos.ValidacionesTipicas()){
                                return true;
                            }else{
                                return false;
                            }
//                            if( partidos.ValidarSipuedeCrearPartido()){ 
                                                     return true;
//                            }
//                            else{
//                                swal("Importante!", "Uno de los equipos ya tiene un partido para esta fecha.", "error");
//                                return false;
//                            }
                        }else{
                              swal("", "La fecha que ingresaste no es valida, introduce otra porfavor.", "error");
                            return false;
                        }

                    }

                },
                ValidarFecha: function (date) {
                    var x = new Date();
                    var y  = new Date();
                    var fecha = date.split("-");
                  var año = x.getFullYear();
                  var mes =x.getMonth()+1;
                  var dia =x.getDate();
                    if(año<fecha[0]){
                        return true;
                    }else if(año>fecha[0]){
                            return false;
                        }else{
                            // año igual
                              if(mes<fecha[1]){
                                  return true;
                              }else if (mes>fecha[1]){
                                  return false;
                              }else{
                                  // mes igual
                                   if(dia>fecha[2]){
                                       return false;
                                   }else if (dia<=fecha[2]){
                                       return true;
                                   }
                              }
                        }
                    },
                    ValidarSipuedeCrearPartido:function(){
                           $.ajax({
                                url: 'PeticionesPartidos.php',
                                type: 'POST',
                                async: false,
                                data: {
                                    Bandera: "Comprobarpartidos",   
                                    fechatorneo: $('.fechatorneo').val(),
                                    equipo1: $('.equipo1 option:selected').val(),
                                    equipo2: $('.equipo2 option:selected').val()
                                },
                                success: function (resp) {
                                    var resp = $.parseJSON(resp);
                                    if (resp.Salida === true && resp.Mensaje === true) {
                                       return true;
                                    } else {
                                      return false;
                                    }
                                }

                            });
                    },
                    ValidacionesTipicas: function(){
                       
                                       if (/\w/gi.test($('#fechaInicio').val())) {
                                           if(/\w/gi.test($('.lugar option:selected').val())){
                                               if(/\w/gi.test($('.juez option:selected').val())){
                                                   if(/\w/gi.test($('.equipo1 option:selected').val())){
                                                         if(/\w/gi.test($('.equipo2 option:selected').val())){
                                                             return true;
                                                         }else{
                                                             swal("", "Selecciona el equipo visitante.", "error");
                                           return false;
                                                         }
                                                   }else{
                                                       swal("", "Selecciona el equipo local.", "error");
                                           return false;
                                                   }
                                               }else{
                                                       swal("", "Selecciona un juez por favor.", "error");
                                           return false;
                                               }
                                           }else{
                                                swal("", "Selecciona un lugar por favor.", "error");
                                           return false;
                                           }
                                       }else{
                                                 swal("", "Introduce una fecha por favor.", "error");
                                           return false;
                                       }    
                                    
                    }

                
            
            };        </script>
            <?php
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



</body>
</html>
