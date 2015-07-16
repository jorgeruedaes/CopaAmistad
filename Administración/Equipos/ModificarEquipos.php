<?php
session_start();
include('../../conexion.php');
include ('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {

    $letras = $_SESSION['admin'];
    $numeros = mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
    $caracteres = mysql_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
    ?>



    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de Administracion</title>
            <link rel="stylesheet" href="../../css/styler.css" type="text/css" media="all" />
            <script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>
            <!--<link rel="stylesheet" type="text/css" href="../../DataTables-1.10.7/media/css/jquery.dataTables.css">-->


            <script type="text/javascript" charset="utf8" src="../../DataTables-1.10.7/media/js/jquery.js"></script>

            <!-- DataTables -->
            <script type="text/javascript" charset="utf8" src="../../DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
            <script type="text/javascript" charset="utf8" src="../../DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
                <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.css">
                    <link rel="stylesheet" href="../../DataTables-1.10.7/media/css/dataTables.bootstrap.css">
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


                                <?php
                                $i = 1;
                                ?>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2"><br></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2"><br></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <table id="tablaequipos" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Equipo</th>
                                                            <th style="width:80px">Opciones</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $consulta = mysql_query("SELECT * FROM tb_equipos");
                                                        while ($listaequipos = mysql_fetch_array($consulta)) {
                                                            ?>

                                                            <tr class="default caja">
                                                                <th scope="row"><?php echo $i ?></th> 
                                                                <td><?php echo $listaequipos["nombre_equipo"] ?></td>
                                                                <td><button data-id="<?php echo $listaequipos["id_equipo"] ?>" id="editar" type="button" class="btn btn-success editar" data-toggle="modal" >Editar</button></td>

                                                            </tr>
                                                            <?php
                                                            $i++;
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>

                                            </div></div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2"><br></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2"><br></div>
                                        </div>
                                    </div></div>
                                <div class="modal fade" id="myModal" tabindex="-1" data-jugador="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Editar equipo</h4>

                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form > 
                                                            <div class="row">
                                                                <div class="col-md-5 col-md-offset-1">
                                                                    <br>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-md-offset-1"> 
                                                                    <label>Nombre equipo:</label>
                                                                    <input type="text" class="form-control" name="nombre" required  id="nombre">
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-md-offset-1">
                                                                    <br>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-5 col-md-offset-1">
                                                                    <br>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-md-offset-1"> 
                                                                    <label>Nombre tecnico 1 :</label>
                                                                    <input type="tel" class="form-control" name="tel" id="tecnico1">
                                                                </div>
                                                                <div class="col-md-5 "> 
                                                                    <label>Nombre tecnico 2 :</label>
                                                                    <input type="email" class="form-control" name="correo" id="tecnico2" >
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5 col-md-offset-1">
                                                                    <br>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" id="identificador"/>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-success guardar">Guardar cambios</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    $(document).ready(function () {

                                        editarequipos.inicio();

                                    });

                                    var editarequipos = {
                                        inicio: function () {
                                            $('#tablaequipos').DataTable({
                                                "language": {
                                                    "lengthMenu": "Mostrar _MENU_",
                                                    "search": "Buscar:",
                                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                                                    "loadingRecords": "Cargando...",
                                                    "processing": "Procesando...",
                                                    "zeroRecords": "No se encontraron resultados",
                                                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                                                    "infoFiltered": "(filtrado de _MAX_ entradas)",
                                                    "paginate": {
                                                        "first": "Primera",
                                                        "last": "Última",
                                                        "next": "Siguiente",
                                                        "previous": "Anterior"
                                                    }
                                                }

                                            });
                                            editarequipos.RecargarEventos();
                                        },
                                        RecargarEventos: function () {
                                            editarequipos.EventoConsultaDatos();
                                            editarequipos.EventosEnviarDatos();
                                        },
                                        EventoConsultaDatos: function () {
                                            $('.editar').off('click').on('click', function () {
                                                var id = $(this).data('id');
                                                $.ajax({
                                                    url: 'PeticionesEquipos.php',
                                                    type: 'POST',
                                                    data: {
                                                        Bandera: "MostrarEquipo",
                                                        id: id
                                                    },
                                                    success: function (resp) {
                                                        $('.modal').modal('show');
                                                        var resp = $.parseJSON(resp);
                                                        if (resp.Salida === true && resp.Mensaje === true) {
                                                            $('#nombre').val(resp.equipo.nombre);
                                                            $('#tecnico1').val(resp.equipo.tecnico1);
                                                            $('#tecnico2').val(resp.equipo.tecnico2);
                                                            $('#identificador').val(id);
                                                            editarequipos.RecargarEventos();
                                                        } else {
                                                            swal("", "Ha habido un error,intenta nuevamente", "error");
                                                        }
                                                    }
                                                });
                                            });
                                        },
                                        EventosEnviarDatos: function () {
                                            $('.guardar').off('click').on('click', function () {
                                                if (editarequipos.ValidarInformacion()) {
                                                    $.ajax({
                                                        url: 'PeticionesEquipos.php',
                                                        type: 'POST',
                                                        data: {
                                                            Bandera: "EditarEquipo",
                                                            nombre: $('#nombre').val(),
                                                            tecnico1: $('#tecnico1').val(),
                                                            tecnico2: $('#tecnico2').val(),
                                                            id: $('#identificador').val()
                                                        },
                                                        success: function (resp) {
                                                            var resp = $.parseJSON(resp);
                                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                                swal({title: "",
                                                                    text: "El equipo se ha modificado exitosamente!",
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
                                                                $('.modal').modal('hide');
                                                            } else {
                                                               swal("", "Ha habido un error,intenta nuevamente", "error");
                                                            }
                                                        }

                                                    });
                                                }
                                            });
                                        },
                                        ValidarInformacion: function () {
                                            if (/\w/gi.test($('#nombre').val())) {
                                                if (/\w/gi.test($('#tecnico1').val())) {
                                                    return true;
                                                } else {
                                                    $('#tecnico1').focus();
                                                    swal("", "Debes ingresar un tecnico principal", "error");
                                                    return false;
                                                }

                                            } else {
                                                $('#nombre').focus();
                                                swal("", "Debes ingresar un nombre", "error");
                                                return false;
                                            }
                                        }
                                    };
                                </script>
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
