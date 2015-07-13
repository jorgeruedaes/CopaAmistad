<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

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



    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
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
                <?php
                $idequipo = $_POST['equipo'];
                $consultanom_equipo = mysql_query("SELECT nombre_equipo from tb_equipos where id_equipo=$idequipo");
                $result = mysql_fetch_array($consultanom_equipo);
                $i = 1;
                $consulta = mysql_query("SELECT * FROM tr_amonestacionxequipo WHERE id_equipo=$idequipo and estado_amonestacion='1' and amonestacion !='5'");
                if(mysql_num_rows($consulta)>0){
                while ($listaamonestaciones = mysql_fetch_array($consulta)) {
                    ?>
                    <div class="col-md-8 col-md-offset-2">
                        <h2 style="color:#2ECC71">Amonestaciones</h2>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <br>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <table id="tablaresultados" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Equipo</th>
                                    <th>Amonestación</th>
                                    <th>Pagada</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $idamonestacion = $listaamonestaciones["amonestacion"];

                                $consultanom_amon = mysql_query("SELECT * FROM tb_amonestaciones where id_amonestacion=$idamonestacion");
                                $consultaamon = mysql_fetch_array($consultanom_amon);
                                ?>
                                <tr class="default caja">
                                    <td><?php echo $result["nombre_equipo"] ?></td>
                                    <td><?php echo $consultaamon["nombre"] ?></td>
                                    <td><center><input type="checkbox"/></center></td>

                                </tr>

                                <?php
                                $i++;
                }
                            ?>

                        </tbody>
                    </table>
                    <center><button type="button" class="btn btn-success">Guardar</button></center>
                    <?php
                    
                }else{
                    echo "<div align=\"center\">No hay resultados.</div><br>"; 
                } 
                    ?>
                </div></div> 
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