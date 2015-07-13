<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
session_start();
include('../../../conexion.php');
include('../Encabezado.html');
include('../../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {

    $letras = $_SESSION['admin'];
    $numeros = mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
    $caracteres = mysql_fetch_array($numeros);
    $name = $caracteres['id_torneo'];
    ?>



    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Copa Amistad Profesional modulo de Administracion</title>
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
            a.list-group-item:hover{
                background-color: #dff0d8;
            }
        </style>
        <body>



            <?php
            if (isset($_POST['buscar']))
                $equipo = $_POST['equipo'];
            {
                ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <br>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <br>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                             <div class="alert alert-success" role="alert">Haga click en el partido en el que desee editar las amonestaciones.</div>
                                <form action="" method="post">
                                    <div class="list-group">
                                        <?php
                                        $partidos = mysql_query("SELECT * FROM tb_partidos where Estado='2' and equipo1='$equipo' or equipo2='$equipo'");
                                        while ($listapartidos = mysql_fetch_array($partidos)) {
                                            $idequipo1 = $listapartidos['equipo1'];
                                            $idequipo2 = $listapartidos['equipo2'];
                                            $nombreequipo1 = mysql_query("select * from tb_equipos where id_equipo=$idequipo1");
                                            $nombreequipo2 = mysql_query("select * from tb_equipos where id_equipo=$idequipo2");

                                            while ($temp1 = mysql_fetch_array($nombreequipo1)) {

                                                while ($temp2 = mysql_fetch_array($nombreequipo2)) {
                                                    ?>
                                        <a href="#" class="list-group-item"  value="<?php echo $listapartidos["id_partido"]?>">
                                                   
                                                    <?php echo $temp2["nombre_equipo"] . " vs " . $temp1["nombre_equipo"] ?><b> <?php echo " - Fecha " . $listapartidos["numero_fecha"];?></b>
                                                    </a>
                                        
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <script>
            
            $('.list-group-item').on('click', function(){
                
                //hacer que vaya a otra pagina donde se consulten y se muestren las amonestaciones de ese partido 
                //con posibilidad de editar
                
            });
            </script>
            </body>
        </html>

        <?php
    }
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