<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('../../../conexion.php');  
include('../Encabezado.html');;
include('../../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

$letras=$_SESSION['admin'];
$numeros=mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysql_fetch_array($numeros);
$name=$caracteres['id_torneo'];
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
</style>
<body>
  
<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <br>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <form action="ModificarAmonestacionesDePartidos0.php" method="post">
                                    <div class="form-group">
                                        <label>Seleccione el equipo:</label>
                                        <select class="form-control" name="equipo">
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
                                    <center><button type="submit" class="btn btn-success" name="buscar">Buscar</button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>

<?php
}else{
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