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
                            <table id="tablajugadores" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombres y Apellidos </th>
                                        <th>Equipo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $consulta = mysql_query("SELECT * FROM tb_jugadores WHERE estado_jugador='1' ");
                                    while ($listajugadores = mysql_fetch_array($consulta)) {
                                        $equipo = $listajugadores["equipo"];
                                        $consultaequipo = mysql_query("SELECT * FROM tb_equipos WHERE id_equipo='$equipo' ");
                                        $equipos = mysql_fetch_array($consultaequipo);
                                        ?>
                                        <tr class="default caja">
                                            <th scope="row"><?php echo $i ?></th> 
                                            <td><?php echo $listajugadores["nombre1"] . " " . $listajugadores["nombre2"] . " " . $listajugadores["apellido1"] . " " . $listajugadores["apellido2"] ?></td>
                                            <td><?php echo $equipos["nombre_equipo"] ?></td>
                                    <input value="<?php echo $listajugadores["id_jugadores"] ?>"type="hidden"/>
                                    <td><button id="editar" type="button" class="btn btn-success editar" data-id="<?php echo $listajugadores["id_jugadores"] ?>"  data-toggle="modal" >Editar</button></td>

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
                            <h4 class="modal-title" id="myModalLabel">Editar jugador</h4>

                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post"> 
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1"> 
                                                <label>Primer nombre:</label>
                                                <input type="text" class="form-control" name="nombre1" required>
                                            </div>
                                            <div class="col-md-5 "> 
                                                <label>Segundo nombre:</label>
                                                <input type="text" class="form-control" name="nombre2">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1"> 
                                                <label>Primer apellido:</label>
                                                <input type="text" class="form-control" name="apellido1" required>
                                            </div>
                                            <div class="col-md-5 "> 
                                                <label>Segundo apellido:</label>
                                                <input type="text" class="form-control" name="apellido2">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1"> 
                                                <label>Télefono/celular:</label>
                                                <input type="tel" class="form-control" name="tel">
                                            </div>
                                            <div class="col-md-5 "> 
                                                <label>E-mail:</label>
                                                <input type="email" class="form-control" name="correo">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1"> 
                                                <label>Profesión:</label>
                                                <select class="form-control" style="" required="required" name="profesion">
                                                    <option value=""></option>
                                                </select>

                                            </div>
                                            <div class="col-md-5"> 
                                                <label>Estado:</label>
                                                <select class="form-control" style="" required="required" name="profesion">
                                                    <option value=""></option>
                                                </select>

                                            </div>
                                            <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <br>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success">Guardar cambios</button>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                $(document).ready(function () {
                    $('#tablajugadores').DataTable({
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
                    $('.editar').off('click').on('click', function () {
                        var id = $(this).data('id');

                        $.ajax({
                            url: 'PeticionesJugadores.php',
                            type: 'POST',
                            data: {
                                Bandera: "MostrarJugador",
                                id: id
                            },
                            success: function (resp) {
                                $('.modal').modal('show');
                                var resp = $.parseJSON(resp);
                                console.log(resp);
                            }

                        });
                    });


                    $('.dataTables_paginate').off('click').on('click', function () {
                        jugadores.recargarEventos();
                    });

                });
                var jugadores = {
                    recargarEventos: function () {
                        $('.editar').off('click').on('click', function () {
                            var id = $(this).data('id');
                            $('.id').val(id);
                            $('.modal').modal('show');
                        });


                    }
                };


            </script>
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

    </body></html>
