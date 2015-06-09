<?php 
session_start();
include('../../conexion.php'); 
include ('../Encabezado.html');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

$letras=$_SESSION['admin'];
$numeros=mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysql_fetch_array($numeros);
$name=$caracteres['id_torneo'];
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
            $i = 0;
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
                            <table id="tablaequipos" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Equipo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $consulta = mysql_query("SELECT * FROM tb_equipos");


                                    while ($listaequipos = mysql_fetch_array($consulta)) {
                

                                        if ($i % 2 == 0) {
                                            ?>
                                            <tr class="default caja">
                                                <th scope="row"><?php echo $i ?></th> 
                                                <td><?php echo $listaequipos["nombre_equipo"] ?></td>
                                        <input value="<?php echo $listaequipos["id_equipo"] ?>"type="hidden"/>
                                        <td><a class="editar">Editar</a></td>

                                        </tr>
                                        <?php
                                    } else {
                                        ?>

                                        <tr class="default caja">
                                            <th scope="row"><?php echo $i ?></th>
                                            <td><?php echo $listaequipos["nombre_equipo"] ?></td>
                                        <input value="<?php echo $listaequipos["id_equipo"] ?>"type="hidden"/>
                                        <td><a class="editar">Editar</a></td>

                                        </tr>
                                        <?php
                                    }$i++;
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

            <script>
                $(document).ready(function () {
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
                    
                });
                
        
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
</body>
</html>
