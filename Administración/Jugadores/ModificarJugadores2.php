<?php

include('../../conexion.php');
include('../RutinaDeLogueo.php');
if($pruebadeinicio==1 or $pruebadeinicio==2 or $pruebadeinicio==4){
if(isset($_POST['modificar'])){

  $primernombre= $_POST['primernombre'];
  $segundonombre= $_POST['segundonombre'];
  $primerapellido= $_POST['primerapellido'];
  $segundoapellido=  $_POST['segundoapellido'];
  $fecha_nacimiento=$_POST['fecha_nacimiento'];
  $correo = $_POST['correo'];
  $telefono=$_POST['telefono'];
  $profesion= $_POST['profesion'];
  $idjugador=$_POST['idjugador'];
  $estado=$_POST['estado'];
  $ruta="../Modificar/Imagenes";
  $archivo= $_FILES['foto']['tmp_name'];
  $nombreArchivo=$_FILES['foto']['name'];
  move_uploaded_file($archivo, $ruta."/".$nombreArchivo);
  $ruta=$ruta."/".$nombreArchivo;
 

if ($ruta == "../Modificar/Imagenes/"){

$modificarjugador1=mysql_query("UPDATE tb_jugadores SET nombre1='$primernombre', nombre2='$segundonombre', apellido1='$primerapellido', apellido2='$segundoapellido', 
  fecha_nacimiento='$fecha_nacimiento', email='$correo', telefono='$telefono', profesion='$profesion', estado_jugador='$estado' WHERE id_jugadores=$idjugador");

if($modificarjugador1 == FALSE){
	?>
    <script>

  alert("Falló la modificación")
  window.location.href="ModificarJugadores.php";
  
  </script>

<?php

}
else

?>
    <script>

  alert("Jugador modificado!")
  window.location.href="ModificarJugadores.php";
  
  </script>

<?php
}
	else
{
		$modificarjugadores=mysql_query("UPDATE tb_jugadores SET nombre1='$primernombre', nombre2='$segundonombre', apellido1='$primerapellido', apellido2='$segundoapellido', 
  fecha_nacimiento='$fecha_nacimiento', email='$correo', telefono='$telefono', profesion='$profesion', estado_jugador='$estado', foto_jugador='".$ruta."' WHERE id_jugadores=$idjugador");
if($modificarjugadores == FALSE){
	?>
    <script>

  alert("Falló la modificación")
  window.location.href="ModificarJugadores.php";
  
  </script>

<?php

}
else

		?>
    <script>

  alert("Jugador modificado!")
  window.location.href="ModificarJugadores.php";
  
  </script>

<?php


}
}}else{
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
} ?>