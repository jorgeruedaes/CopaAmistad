<?php
session_start();
include('../../../conexion.php');
include('../Encabezado.html');
include('../../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {

    $letras = $_SESSION['admin'];
    $numeros = mysql_query("SELECT * from tb_torneo where usuario='$letras'")or die(mysql_error());
    $caracteres = mysql_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
    ?>



    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Copa Amistad Profesional modulo de Administracion</title>

        <script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" charset="utf8" src="../../DataTables-1.10.7/media/js/jquery.js"></script>
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="../../DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="../../DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="../../DataTables-1.10.7/media/css/dataTables.bootstrap.css">
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <!-- ALERTS-->
          <script src="../../../dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../dist/sweetalert.css">

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
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
      <ul class="nav nav-tabs" role="tablist" id="principal">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Amonestaciones vigentes</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Amonestaciones antiguas</a></li>
        </ul>

             <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
          
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"><br></div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"><br></div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <table id="tablaasistencia" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Jugador</th>
                                    <th>Amonestación</th>
                                    <th>Fecha</th>
                                    <th style="width:100px">Opciones</th>

                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                $i = 1;
                                if (isset($_POST["buscar"])) {
                                    $equipo = $_POST["equipo"];


                                    $consultajugadoresdelequipo = mysql_query("SELECT * FROM tb_jugadores where equipo=$equipo");

                                    while ($res = mysql_fetch_array($consultajugadoresdelequipo)) {

                                        $idjugador = $res['id_jugadores'];

                                        $consultaamon = mysql_query("SELECT * FROM tr_amonestacionesxjugador WHERE jugador = $idjugador and estado_amonestacion='1' and amonestacion !='5'");

                                        while ($res1 = mysql_fetch_array($consultaamon)) {

                                            $idjugadoramon = $res1['jugador'];
                                            $idamon = $res1['amonestacion'];
                                            $idestado = $res1['estado_amonestacion'];
                                            $jornada = $res1['jornada_amonestacion'];


                                            $consultanomamon = mysql_query("SELECT * FROM tb_jugadores WHERE id_jugadores = $idjugadoramon");
                                            $consultanomamon1 = mysql_query("SELECT * FROM tb_amonestaciones WHERE id_amonestacion = $idamon");
                                            $consultanomamon2 = mysql_query("SELECT * FROM tb_estados_amonestacion WHERE id_estado = $idestado");

                                            $res3 = mysql_fetch_array($consultanomamon1);
                                            $res4 = mysql_fetch_array($consultanomamon2);

                                            while ($res2 = mysql_fetch_array($consultanomamon)) {
                                                ?>

                                                <tr class="default caja">
                                                    <td><?php echo $res2['nombre1']." ".$res2['nombre2']." ".$res2['apellido1']." ".$res2['apellido2']?></td>
                                                    <td><?php echo $res3['nombre']?></td>
                                                    <td><?php echo $jornada ?></td>
                                                    <td>  <center><div class="dropdown">
                                                    <button id="editar" class="dropdown-toggle btn btn-default" data-toggle="dropdown" type="button" data-toggle="modal" > <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a class="detalles">Agregar Detalles</a></li>
                                                        <li><a href="">Pagar</a></li>
                                                        <li><a href="">Eliminar</a></li>
                                                    </ul>
                                                </div></center></td>
                                            </tr>

                    <?php
                    $i++;
                }
            }
        }
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
            </div>
          <div role="tabpanel" class="tab-pane" id="profile">
                    
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"><br></div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"><br></div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <table id="tablaasistencia1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Jugador</th>
                                    <th>Amonestación</th>
                                    <th>Fecha</th>
                                    <th style="width:100px">Opciones</th>
                                    <th>Vigente</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                $i = 1;
                                if (isset($_POST["buscar"])) {
                                    $equipo = $_POST["equipo"];


                                    $consultajugadoresdelequipo = mysql_query("SELECT * FROM tb_jugadores where equipo=$equipo");

                                    while ($res = mysql_fetch_array($consultajugadoresdelequipo)) {

                                        $idjugador = $res['id_jugadores'];

                                        $consultaamon = mysql_query("SELECT * FROM tr_amonestacionesxjugador WHERE jugador = $idjugador and estado_amonestacion='2' and amonestacion !='5'");

                                        while ($res1 = mysql_fetch_array($consultaamon)) {

                                            $idjugadoramon = $res1['jugador'];
                                            $idamon = $res1['amonestacion'];
                                            $idestado = $res1['estado_amonestacion'];
                                            $jornada = $res1['jornada_amonestacion'];


                                            $consultanomamon = mysql_query("SELECT * FROM tb_jugadores WHERE id_jugadores = $idjugadoramon");
                                            $consultanomamon1 = mysql_query("SELECT * FROM tb_amonestaciones WHERE id_amonestacion = $idamon");
                                            $consultanomamon2 = mysql_query("SELECT * FROM tb_estados_amonestacion WHERE id_estado = $idestado");

                                            $res3 = mysql_fetch_array($consultanomamon1);
                                            $res4 = mysql_fetch_array($consultanomamon2);

                                            while ($res2 = mysql_fetch_array($consultanomamon)) {
                                                ?>

                                                <tr class="default caja">
                                                    <td><?php echo $res2['nombre1']." ".$res2['nombre2']." ".$res2['apellido1']." ".$res2['apellido2']?></td>
                                                    <td><?php echo $res3['nombre']?></td>
                                                    <td><?php echo $jornada ?></td>
                                                    <td>  <center><div class="dropdown">
                                                    <button id="editar" class="dropdown-toggle btn btn-default" data-toggle="dropdown" type="button" data-toggle="modal" > <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a >Comentario</a></li>
                                                        <li><a >Duración</a></li>
                                                    </ul>
                                                </div></center></td>
                                                <td><center><input type="checkbox"/></center></td>
                                            </tr>

                    <?php
                    $i++;
                }
            }
        }
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
              
              
         </div>
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
                                    <form > 
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1"> 
                                                <label>Duración:</label>
                                                <input type="number" class="form-control" value="0" name="nombre1" required  id="duracion">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1"> 
                                                <label>Comentario:</label>
                                                <textarea class="form-control" name="apellido1" required  id="comentario"></textarea>
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
            amonestacion.inicio();

            });
            var amonestacion = {
               inicio: function (){
                   $('#tablaasistencia').DataTable({
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
                 $('#tablaasistencia1').DataTable({
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
                  $('#principal').tab();
                  amonestacion.RecargarEventos();
               },
               RecargarEventos: function (){
                   amonestacion.EventosConsultarDetalles();
               },
               EventosConsultarDetalles: function (){
                       $('.detalles').off('click').on('click', function () {
                            var id = $(this).data('id');
                            $.ajax({
                                url: 'PeticionesAmonestaciones.php',
                                type: 'POST',
                                data: {
                                    Bandera: "MostrarAmonestacion",
                                    id: id
                                },
                                success: function (resp) {
                                    $('.modal').modal('show');
                                    var resp = $.parseJSON(resp);
                                    if (resp.Salida === true && resp.Mensaje === true) {
                                 
                                    } else {
                                        swal("", "Ha habido un error,intenta nuevamente", "error");
                                    }
                                }
                            });
                        });
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
